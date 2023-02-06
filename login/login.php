<?php include './layout/header.php'?>

<?php include './model/functions.php'?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;?>



<?php switch ($act) {

    case 'register';
        register();
        include './view/register.php';

        break;
    default:
        login();
        include './view/home.php';

        break;

}?>




<!-- Footer-->

<?php include './layout/footer.php'?>