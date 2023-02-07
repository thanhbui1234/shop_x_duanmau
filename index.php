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

        include './view/products/about_product.php';

        break;

    default:

        showPorudcts();

        include './view/products/products.php';

        break;

}

?>











    <?php include './layout/footer.php'?>