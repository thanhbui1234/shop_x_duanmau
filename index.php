<?php

include './layout/header.php'
?>
<?php session_start();?>


<?php
include_once './model/functions.php';
?>




<body id="page-top">
    <!-- Navigation-->
    <?php include './layout/nav.php'?>



    <?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {

    case 'about_product':

        showAboutProduct();
        sendCmt();
        showCmt();
        include './view/products/about_product.php';
        break;
    case 'profile';
        profile();
        include './view/profile/profile.php';

        break;

    case 'search';
        search();
        include './view/search/search.php';

        break;
    case 'category';
        selectProductCategory();
        include './view/categories/categories.php';
        break;
    case 'request';
        selectInfoRequestAdmin();
        insertRequest();
        include './view/request/request.php';
        break;

    default:

        showPorudcts();
        include './view/products/products.php';

        break;

}

?>
    h










    <?php include './layout/footer.php'?>