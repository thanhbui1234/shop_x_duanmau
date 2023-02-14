<?php

include '/xampp/htdocs/shop_xx/admin/model/connect.php';

function coutAll()
{

    global $conn;

    $sqlUser = " select count(*) from user ";
    $statement = $conn->prepare($sqlUser);
    $statement->execute();
    global $users;
    $users = $statement->fetchColumn();

    $sqlCategories = " select count(*) from categories ";
    $statement = $conn->prepare($sqlCategories);
    $statement->execute();
    global $categories;

    $categories = $statement->fetchColumn();

    $sqlProduct = " select count(*) from products ";
    $statement = $conn->prepare($sqlProduct);
    $statement->execute();
    global $products;

    $products = $statement->fetchColumn();

    $sqlCommnets = " select count(*) from commnets ";
    $statement = $conn->prepare($sqlCommnets);
    $statement->execute();
    global $commnets;

    $commnets = $statement->fetchColumn();

    $sqlProductSale = " select count(*) from products where sale > 0 ";
    $statement = $conn->prepare($sqlProductSale);
    $statement->execute();
    global $saleProd;
    $saleProd = $statement->fetchColumn();

    $sqlUserNomal = " select count(*) from user where role = 0 ";
    $statement = $conn->prepare($sqlUserNomal);
    $statement->execute();
    global $userNomal;
    $userNomal = $statement->fetchColumn();

    $sqlUserAdmin = " select count(*) from user where role > 0 ";
    $statement = $conn->prepare($sqlUserAdmin);
    $statement->execute();
    global $userAdmin;
    $userAdmin = $statement->fetchColumn();

    $sqlCmtDuyet = " select count(*) from commnets where duyet = 1 ";
    $statement = $conn->prepare($sqlCmtDuyet);
    $statement->execute();
    global $cmtDuyet;
     $cmtDuyet = $statement->fetchColumn();

    $sqlCmtChuaDuyet = " select count(*) from commnets where duyet = 0 ";
    $statement = $conn->prepare($sqlCmtChuaDuyet);
    $statement->execute();
    global $cmtChuaDuyet;
     $cmtChuaDuyet = $statement->fetchColumn();

}