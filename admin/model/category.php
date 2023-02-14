<?php

include '/xampp/htdocs/shop_xx/admin/model/connect.php';

//////// CATEGORY

function addCategories()
{

    if (isset($_POST['addCategory'])) {

        global $conn;

        $category = $_POST['category'];

        global $errCategory;
        $errCategory = [];

/// validate  category

        if (empty($category)) {

            $errCategory['category'] = '<h3 class="text-danger"> Bạn phải nhập trường này </h3> ';
        }

        if (empty($errCategory)) {
            $sql = "INSERT INTO categories (name) value  ('$category')  ";

            $statement = $conn->prepare($sql);

            if ($statement->execute()) {

                header('location: /shop_xx/admin/index.php?act=categories');
            }

        }

    }

}

function showCategory()
{

    global $conn;

    $sql = "select * from categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataCategoies;
    $dataCategoies = $statement->fetchAll();

}

function deleteCategory()
{

    if (isset($_GET['delete'])) {
        $id = $_GET['delete'];
        global $conn;

        $sql = " DELETE FROM categories where id = $id ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {

            header('location: /shop_xx/admin/index.php?act=categories');
        }

    }

}

function showUpdateCategory()
{

    if (isset($_GET['update'])) {

        global $conn;

        $id = $_GET['update'];

        $sql = " SELECT * FROM categories WHERE id = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();

        global $datashowUpDate;

        $datashowUpDate = $statement->fetchAll();

    }

}

function updateCategory()
{

    if (isset($_POST['updateCategory'])) {

        global $conn;

        $id = $_GET['update'];
        $category = $_POST['category22'];
        $sql = "update categories SET name = '$category' where id = $id ";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {

            header('location: /shop_xx/admin/index.php?act=categories');
        }

    }

    if (isset($_POST['cancelUpdate'])) {

        header('location: /shop_xx/admin/index.php?act=categories');

    }

}
