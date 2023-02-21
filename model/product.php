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

function updateCmtProd()
{

    if (isset($_GET['editCmt'])) {
        $id = $_GET['editCmt'];

    }
}

function view()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        global $conn;
        $sql = "update products set view = view +1 where id = $id ";
        $statemnet = $conn->prepare($sql);
        $statemnet->execute();

    }
}

function topView()
{
    global $conn;
    $sql = "  SELECT * from products  order by view  desc limit 0,10  ";
    $statemnet = $conn->prepare($sql);
    $statemnet->execute();

    global $dataTopView;
    $dataTopView = $statemnet->fetchAll();

}
