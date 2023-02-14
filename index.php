<?php

include './layout/header.php'
?>
<?php session_start();?>


<?php
require './model/cart.php';
require './model/category.php';
require './model/commnet.php';
require './model/product.php';
require './model/search.php';
require './model/user.php';

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
    case 'edit_cmt';
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
    case 'cart';
        getCart();
        include './view/cart/cart.php';
        break;
    case 'view_cart';
        include './view/cart/view_cart.php';
        break;
    default:

        showPorudcts();
        include './view/products/products.php';

        break;

}

?>










    <?php include './layout/footer.php'?>