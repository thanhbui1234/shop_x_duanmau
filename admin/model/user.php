<?php

include '/xampp/htdocs/shop_xx/admin/model/connect.php';
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
