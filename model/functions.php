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
