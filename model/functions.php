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
