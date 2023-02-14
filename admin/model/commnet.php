<?php

include '/xampp/htdocs/shop_xx/admin/model/connect.php';

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
