<?php

include_once './model/connect.php';

function showPorudcts()
{
    global $conn;

    $sql = " select * from products order by id desc ";
    $statemnet = $conn->prepare($sql);

    $statemnet->execute();
    global $dataProducts;
    $dataProducts = $statemnet->fetchAll();
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
            $statement->execute();

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
        $sql = " SELECT user_fullName from user WHERE id = $id ";
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
