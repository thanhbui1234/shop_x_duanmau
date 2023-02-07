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
        $sql = "select * from products where id = $id";
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
