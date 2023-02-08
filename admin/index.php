<?php ob_start()?>
<?php include './layout/header.php'?>


<?php include './layout/sidebar.php'?>


<?php include './layout/nav.php'?>


<?php include_once './model/function.php'?>



<?php isset($_GET['act']) ? $act = $_GET['act'] : $act = false;

switch ($act) {
    case 'addProd':

        showCategory();
        addProducts();

        include './view/products/add_prod.php';

        break;
    case 'listProd':
        deleteProduct();
        selectOptionProduct();
        showProducts();
        include './view/products/list_prod.php';
        break;

    case 'update_prod';
        showProdUpdate();

        updateProducts();

        include './view/products/update_prod.php';

        break;
    case '';
        break;

    case 'categories':
        showCategory();
        addCategories();
        deleteCategory();
        showUpdateCategory();
        updateCategory();
        include './view/categories/categories.php';

        break;

    case 'listUser':

        break;
    case 'requestUser':

        break;

    case 'comments':
        showCmts();
        xetDuyet();
        deleteCmt();

        include './view/comments/commnets.php';

        break;

    default:

        include './layout/home.php';
        break;
}

?>









<?php include './layout/footer.php'?>