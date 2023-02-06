<?php
include './layout/header.php'
?>




<?php
include_once './model/functions.php';

?>

<body id="page-top">
    <!-- Navigation-->
    <?php include './layout/nav.php'?>



    <?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {

    case 'direct':
        break;

    default:
        showPorudcts();

        include './view/products/products.php';

        break;

}

?>











    <?php include './layout/footer.php'?>