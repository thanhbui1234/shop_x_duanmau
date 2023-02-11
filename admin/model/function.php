<?php

include '/xampp/htdocs/shop_xx/admin/model/connect.php';

//////// CATEGORY

function addCategories()
{

    if (isset($_POST['addCategory'])) {

        global $conn;

        $category = $_POST['category'];

        global $errCategory;
        $errCategory = [];

/// validate  category

        if (empty($category)) {

            $errCategory['category'] = '<h3 class="text-danger"> Bạn phải nhập trường này </h3> ';
        }

        if (empty($errCategory)) {
            $sql = "INSERT INTO categories (name) value  ('$category')  ";

            $statement = $conn->prepare($sql);

            if ($statement->execute()) {

                header('location: /shop_xx/admin/index.php?act=categories');
            }

        }

    }

}

function showCategory()
{

    global $conn;

    $sql = "select * from categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataCategoies;
    $dataCategoies = $statement->fetchAll();

}

function deleteCategory()
{

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        global $conn;

        $sql = " DELETE FROM categories where id = $id ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {

            header('location: /shop_xx/admin/index.php?act=categories');
        }

    }

}

function showUpdateCategory()
{

    if (isset($_GET['update'])) {

        global $conn;

        $id = $_GET['update'];

        $sql = " SELECT * FROM categories WHERE id = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();

        global $datashowUpDate;

        $datashowUpDate = $statement->fetchAll();

    }

}

function updateCategory()
{

    if (isset($_POST['updateCategory'])) {

        global $conn;

        $id = $_GET['update'];
        $category = $_POST['category22'];
        $sql = "update categories SET name = '$category' where id = $id ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {

            header('location: /shop_xx/admin/index.php?act=categories');
        }

    }

    if (isset($_POST['cancelUpdate'])) {

        header('location: /shop_xx/admin/index.php?act=categories');

    }

}

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
                        $statement->execute();

                        break;
                    case 'private':
                        $sql = "update products set status = 'private' where id = '$checkbox' ";
                        $statement = $conn->prepare($sql);
                        $statement->execute();

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
                            $statementClone->execute();

                        }
                        break;

                    case 'delete':
                        $sql = " delete from products where id = '$checkbox' ";
                        $statement = $conn->prepare($sql);
                        $statement->execute();

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
    if (isset($_GET['delete'])) {
        global $conn;
        $id = $_GET['delete'];
        $sql = " delete from products where id = '$id' ";
        $statement = $conn->prepare($sql);
        $statement->execute();

    }
}

/// cmt

function showCmts()
{

    global $conn;
    $sql = "select * from commnets order by id desc ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataCmts;
    $dataCmts = $statement->fetchAll();
}
function xetDuyet()
{

    if (isset($_GET['pheduyet'])) {
        global $conn;
        $id = $_GET['pheduyet'];
        $sql = " update commnets set duyet = 1 where id = $id  ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /shop_xx/admin//index.php?act=comments&alertDuyet');

        }
    }
}
function deleteCmt()
{

    if (isset($_GET['deleteCmt'])) {
        global $conn;
        $id = $_GET['deleteCmt'];
        $sql = " DELETE FROM commnets where id = $id";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /shop_xx/admin//index.php?act=comments&alertDelete');

        }

    }
}

function selectCmtProd($id)
{
    if (isset($id)) {
        global $conn;
        $sql = "SELECT name from products where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataSelectName;
        $dataSelectName = $statement->fetchAll();
    }
}

function showRequest()
{

    global $conn;
    $sql = "SELECT * FROM requests_admin ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataRequests;
    $dataRequests = $statement->fetchAll();

}
function selectUserName($id)
{
    if (isset($id)) {
        global $conn;
        $sql = " select * from user where id = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataUsername;
        $dataUsername = $statement->fetchAll();
    }
}
function actionAdmin()
{
    if (isset($_GET['accpetAdmin'])) {

        global $conn;
        $id = $_GET['accpetAdmin'];
        $sql = " update user set role = 1 where  id = $id";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            echo "<script>
           Swal.fire(
  'Bạn đã cập nhập thành công!',
  ':333!',
  'success'
)</script>";
        }

    }
}
function deleteRequest()
{

    if (isset($_GET['delete'])) {

        global $conn;
        $sql = "DELETE FROM requests_admin where id = $_GET[delete]";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /shop_xx/admin//index.php?act=requestUser');
        }

    }
}
function showAlluser()
{
    global $conn;
    $sql = " select * from user";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataAllUsers;
    $dataAllUsers = $statement->fetchAll();
}

function deleteUser()
{

    if (isset($_GET['delete'])) {
        global $conn;
        $sql = " delete from user where id = $_GET[delete]";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /shop_xx/admin//index.php?act=listUser');
        }

    }
}
function roleUser()
{

    if (isset($_GET['admin'])) {
        global $conn;
        $sql = " update user set role = 1 where id = $_GET[admin] ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /shop_xx/admin//index.php?act=listUser');
        }

    }
    if (isset($_GET['normal'])) {
        global $conn;
        $sql = " update user set role = 0 where id = $_GET[normal] ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /shop_xx/admin//index.php?act=listUser');
        }

    }

}

function coutAll()
{

    global $conn;

    $sqlUser = " select count(*) from user  ";
    $statement = $conn->prepare($sqlUser);
    $statement->execute();
    global $users;
    $users = $statement->fetchColumn();

    $sqlCategories = " select count(*) from categories  ";
    $statement = $conn->prepare($sqlCategories);
    $statement->execute();
    global $categories;

    $categories = $statement->fetchColumn();

    $sqlProduct = " select count(*) from products  ";
    $statement = $conn->prepare($sqlProduct);
    $statement->execute();
    global $products;

    $products = $statement->fetchColumn();

    $sqlCommnets = " select count(*) from commnets  ";
    $statement = $conn->prepare($sqlCommnets);
    $statement->execute();
    global $commnets;

    $commnets = $statement->fetchColumn();

}
