<?php

include_once './model/connect.php';

function showPorudcts()
{
    global $conn;

    $sql = " select * from products where status = 'public' order by id desc   ";
    $statemnet = $conn->prepare($sql);
    $statemnet->execute();
    $dataCount = $statemnet->fetchAll();
    $totalPage = count($dataCount);
    $perPage = 9;
    global $countPage;
    $countPage = ceil($totalPage / $perPage);

    isset($_GET['page']) ? $pageGet = $_GET['page'] : $pageGet = '';

    ($pageGet == '' || $pageGet == 1) ? $pageSelect = 0 : $pageSelect = ($pageGet * $perPage) - $perPage;

    $sqlPage = " select * from products where status = 'public' order by id desc limit  $pageSelect , $perPage    ";
    $statementPage = $conn->prepare($sqlPage);
    $statementPage->execute();

    global $dataProducts;
    $dataProducts = $statementPage->fetchAll();

}

function showAboutProduct()
{
    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = "select * from products where id =  $id";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();
        global $dataAboutProduct;
        $dataAboutProduct = $statemnet->fetchAll();

    }

}

function sendCmt()
{

    if (isset($_POST['sendCmt'])) {
        global $conn;
        $conntent = $_POST['textcmt'];
        $id = $_GET['id'];
        $dateCmt = date("Y-m-d H:i a ");

        $imgCmt = $_FILES['imgCmt']['name'];
        $imgCmt_tmp = $_FILES['imgCmt']['tmp_name'];
        $targe_dir = './uploads//';
        $target_file = $targe_dir . $imgCmt;
        move_uploaded_file($imgCmt_tmp, $target_file);

        if (!empty($conntent) && strlen($conntent) > 5) {
            $sql = " insert into commnets (content ,date,id_user,id_prod,img)  ";
            $sql .= " values ('$conntent' , '$dateCmt',$_SESSION[userId], $id,'$imgCmt')  ";
            $statement = $conn->prepare($sql);
            if ($statement->execute()) {
                header("location: /shop_xx/index.php?act=about_product&id=$id&success");
            }

        }

    }
}

function showCmt()
{

    if (isset($_GET['id'])) {

        global $conn;
        $sql = "select * from commnets where id_prod = $_GET[id] and duyet = 1  order by  id desc ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataCmtss;
        $dataCmtss = $statement->fetchAll();
    }

}
function selectavtCmtUser($id)
{
    if (isset($id)) {
        global $conn;
        $sql = " SELECT user_fullName ,avt from user WHERE id = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataCmtUser;
        $dataCmtUser = $statement->fetchAll();

    }
}

function search()
{

    if (isset($_POST['search_submit'])) {

        global $conn;
        $search = $_POST['search'];

        if (strlen($search) < 2 || ($search == " ,")) {
            header('location: index.php');
        }

        $sql = "SELECT * FROM products where tag like '%$search%' and tag not like ' ,'  ";

        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataSearchs;
        $dataSearchs = $statement->fetchAll();

    }

}

function avtNav()
{

    if (isset($_SESSION['userId'])) {
        $id = $_SESSION['userId'];
        global $conn;
        $sql = " select avt from user where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataAvtNav;
        $dataAvtNav = $statement->fetchAll();

    }

}

function showCategories()
{
    global $conn;
    $sql = " select * from categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataCategories;
    $dataCategories = $statement->fetchAll();

}

function selectProductCategory()
{

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        global $conn;
        $sql = "SELECT * from products where  category = $id order by id desc";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataselectProductCategory;
        $dataselectProductCategory = $statement->fetchAll();

    }

}
function profile()
{
    if (isset($_SESSION['userId'])) {
        global $conn;
        $id = $_SESSION['userId'];
        $sql = " select * from user where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataPorfile;
        $dataPorfile = $statement->fetchAll();
    }

}

function updateProfile()
{
    if (isset($_POST['save'])) {
        $id = $_SESSION['userId'];
        global $conn;
        $userName = $_POST['userName'];
        $fullName = $_POST['fullName'];

        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $avt = $_FILES['avtUser']['name'];

        if (empty($avt)) {
            $sqlavt = "select avt from user where id = $id ";
            $statementAvt = $conn->prepare($sqlavt);
            $statementAvt->execute();
            $dataAvt = $statementAvt->fetchAll();
            foreach ($dataAvt as $avtt) {

                $avt = $avtt['avt'];
            }

        }

        $avt_image_tmp = $_FILES['avtUser']['tmp_name'];
        $targe_dir = './uploads//';
        $target_file = $targe_dir . $avt;
        move_uploaded_file($avt_image_tmp, $target_file);

        $sql = " update user set user_fullName = '$fullName' ,  email = '$email' , user_name = '$userName' , avt = '$avt', phone = '$phone' where id = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();

    }

}

function selectInfoRequestAdmin()
{
    if (isset($_SESSION['userId'])) {
        global $conn;
        $sql = " select * from user where id = $_SESSION[userId] ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataRequestAdmin;
        $dataRequestAdmin = $statement->fetchAll();
    }

}

function insertRequest()
{

    if (isset($_POST['requestAdmin'])) {

        global $conn;
        $reason = $_POST['reason'];
        global $errRequest;
        $dateRequest = date("Y-m-d H:i a ");

        $errRequest = [];
        try {
            if (empty($reason)) {

                $errRequest['reasonEmpty'] = "Bạn phải cần lý do";

            } else if (strlen($reason) < 30) {

                $errRequest['stringReason'] = "Lý do phải hơn 50 ký tự";

            }

        } catch (exception $e) {
            echo ' ' . $e->getMessage();

        }

        if (empty($errRequest)) {

            $sql = "INSERT INTO requests_admin	(user_id,reason,date_request) values('$_SESSION[userId]','$reason','$dateRequest')";
            $statement = $conn->prepare($sql);
            if ($statement->execute()) {

                echo "<script>Swal.fire(
  'Đã gửi yêu cầu',
  'Chúng tôi sẽ sét duyệt yêu cầu của bạn!',
  'success'
)</script>";
            }

        }

    }
}
