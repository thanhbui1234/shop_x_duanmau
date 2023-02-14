<?php

include_once './model/connect.php';

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
