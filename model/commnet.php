<?php

include_once './model/connect.php';

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
function deleteCmt()
{
    if (isset($_GET['deleteCmt'])) {
        global $conn;
        $id = $_GET['deleteCmt'];
        $sql = " delete from commnets where id = $id ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /shop_xx/index.php?act=about_product&id=' . $id);
        }
    }
}
