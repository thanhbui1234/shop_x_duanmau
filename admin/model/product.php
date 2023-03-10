<?php

include '/xampp/htdocs/shop_xx/admin/model/connect.php';

//////////////////// PRODUCTS

function addProducts()
{

    if (isset($_POST['addProd'])) {

        $name = $_POST['prod_name'];
        $category = $_POST['prod_category'];
        $price = $_POST['prod_price'];
        $img = $_FILES['prod_img']['name'];
        $prod_image_tmp = $_FILES['prod_img']['tmp_name'];
        $targe_dir = '../uploads//';
        $target_file = $targe_dir . $img;
        move_uploaded_file($prod_image_tmp, $target_file);

        $status = $_POST['prod_status'];
        $sale = $_POST['prod_sale'];
        $tag = $_POST['prod_tag'];
        $content = $_POST['prod_content'];

        // VALIDATE PRODUCT
        global $errProduct;
        $errProduct = [];

        if (empty($name)) {

            $errProduct['name'] = 'Bạn thiếu tên sản phẩm';

        }
        if ($category == 'default') {

            $errProduct['category'] = 'Bạn thiếu loại sản phẩm';

        }
        if (!is_numeric($price) || empty($price)) {

            $errProduct['price'] = 'Gía có vấn đề';

        }

        if (empty($img)) {

            $errProduct['img'] = 'Bạn thiếu hình ảnh';

        }

        if (empty($errProduct)) {
            global $conn;

            $price_old = $price;

            $price_sale = ($sale * $price) / 100;

            $price = $price_old - $price_sale;

            $sql = " insert into products (name, category, price , img , content , status ,sale ,tag ,total_price_sale ) ";
            $sql .= " values ('$name', '$category' , '$price' , '$img' , '$content', '$status' ,'$sale' , '$tag' ,'$price_old' )   ";

            $statement = $conn->prepare($sql);
            $statement->execute();

        }

    }

}

function showProducts()
{

    global $conn;

    $sql = "SELECT * FROM products order by id desc";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataProducts;
    $dataProducts = $statement->fetchAll();

}

function selectCategory($category)
{
    if (isset($category)) {
        global $conn;
        $sql = "SELECT * FROM categories WHERE id = $category";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataNameCate;
        $dataNameCate = $statement->fetchAll();
    }

}

function selectDifferentCategory($data)
{
    if (isset($data)) {
        global $conn;

        $sql = "SELECT * FROM categories where name != '$data'";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataDifferentCategory;
        $dataDifferentCategory = $statement->fetchAll();

    }

}

function updateProducts()
{
    if (isset($_POST['updateProd'])) {
        global $conn;
        $id = $_GET['id'];

        $name = $_POST['prod_name'];
        $category = $_POST['prod_category'];
        $price = $_POST['prod_price'];

        $img = $_FILES['prod_img']['name'];

        if (empty($img)) {
            $sqlimg = "select img from products where id = $id";
            $statementImg = $conn->prepare($sqlimg);
            $statementImg->execute();

            $dataImg = $statementImg->fetchAll();

            foreach ($dataImg as $value) {

                $img = $value['img'];
            }

        }

        $prod_image_tmp = $_FILES['prod_img']['tmp_name'];
        $targe_dir = '../uploads//';
        $target_file = $targe_dir . $img;
        move_uploaded_file($prod_image_tmp, $target_file);

        $status = $_POST['prod_status'];
        $sale = $_POST['prod_sale'];
        $tag = $_POST['prod_tag'];
        $content = $_POST['prod_content'];
        global $errUpdate;
        $errUpdate = [];

        if (empty($name)) {

            $errUpdate['name'] = 'Bạn thiếu tên sản phẩm';

        }

        if (!is_numeric($price) || empty($price)) {

            $errUpdate['price'] = 'Gía có vấn đề';

        }

        if (empty($errUpdate)) {
            global $conn;

            $price_old = $price;
            $price_sale = ($sale * $price) / 100;
            $price = $price_old - $price_sale;

            $sql = " update products set name ='$name' , category ='$category' , price = '$price' , img = '$img' ";
            $sql .= " , sale = '$sale'  , tag = '$tag' , content = '$content'  , total_price_sale = '$price_old'  where id = '$id'  ";

            $statement = $conn->prepare($sql);
            $statement->execute();

        }

    }
}

function showProdUpdate()
{
    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = " SELECT * from products where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataProdUpade;
        $dataProdUpade = $statement->fetchAll();
    }

}

function selectOptionProduct()
{

    if (isset($_POST['apply'])) {
        if (!empty($_POST['checkBoxArr'])) {
            global $conn;

            $checkboxs = $_POST['checkBoxArr'];
            foreach ($checkboxs as $checkbox) {

                $option = $_POST['option'];

                switch ($option) {

                    case 'public':
                        $sql = "update products set status = 'public' where id = '$checkbox' ";
                        $statement = $conn->prepare($sql);
                        if ($statement->execute()) {
                            echo "<script>
                                Swal.fire(
                            'Thành Công!',
                            'Public !',
                            'success'
                            )
                                </script>";

                        }

                        break;
                    case 'private':
                        $sql = "update products set status = 'private' where id = '$checkbox' ";
                        $statement = $conn->prepare($sql);
                        if ($statement->execute()) {
                            echo "<script>
                                Swal.fire(
                            'Thành Công!',
                            'Private !',
                            'success'
                            )
                                </script>";

                        }

                        break;

                    case 'clone':
                        $sql = "select * from products  where id = '$checkbox' ";
                        $statement = $conn->prepare($sql);
                        $statement->execute();

                        $dataClones = $statement->fetchAll();

                        foreach ($dataClones as $clone) {extract($clone);

                            $sqlClone = " insert into products (category,name,price,img,content,status,sale,tag,total_price_sale)  ";
                            $sqlClone .= " values ('$category','$name','$price','$img','$content','$status','$sale','$tag','$total_price_sale') ";
                            $statementClone = $conn->prepare($sqlClone);
                            if ($statementClone->execute()) {
                                echo "<script>
                                Swal.fire(
                            'Thành Công!',
                            'Clone !',
                            'success'
                            )
                                </script>";

                            }

                        }
                        break;

                    case 'delete':
                        $sql = " delete from products where id = '$checkbox' ";
                        $statement = $conn->prepare($sql);
                        if ($statement->execute()) {
                            echo "<script>
                                Swal.fire(
                            'Thành Công!',
                            'Delete !',
                            'success'
                            )
                                </script>";

                        }

                        break;
                    default:
                        echo "<script>Swal.fire('Bạn phải chọn chức năng')</script>";
                        break;

                }

            }
        }

    }

}

function deleteProduct()
{
    if (isset($_GET['deleteProduct'])) {
        global $conn;
        $id = $_GET['deleteProduct'];
        $sql = " delete from products where id = '$id' ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: index.php?act=listProd');

        }

    }
}
