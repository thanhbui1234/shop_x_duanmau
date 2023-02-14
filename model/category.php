<?php

include_once './model/connect.php';

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
