<?php include './layout/header.php'?>


<?php include './layout/sidebar.php'?>




<?php include './layout/nav.php'?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {
    case 'addProd':

        include './products/view/add_prod.php';

        break;
    case 'listProd':
        include './products/view/list_prod.php';

        break;

    case 'categories':

        break;
    case 'listUser':

        break;
    case 'requestUser':

        break;

    case 'commnets':

        break;

    default:
        include './layout/home.php';
        break;
}

?>









<?php include './layout/footer.php'?>