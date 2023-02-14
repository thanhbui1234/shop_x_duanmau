<?php

include_once './model/connect.php';

function getCart()
{
    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = "select * from products where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        $data = $statement->fetchAll();
        foreach ($data as $product) {
            extract($product);
            $item = [
                'id' => $id,
                'img' => $img,
                'price' => $price,
                'name' => $name,
                'quanlity' => 1,
            ];

            isset($_SESSION['cart'][$id]) ?
            $_SESSION['cart'][$id]['quanlity'] += 1 :
            $_SESSION['cart'][$id] = $item;

        }

    }

}
