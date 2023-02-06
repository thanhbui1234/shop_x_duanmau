 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
     <div class="container">
         <a class="navbar-brand  text-white" href="index.php"><i class="fa-solid fa-shop"></i> SHOP X </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
             aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
             Menu
             <i class="fas fa-bars ms-1"></i>
         </button>

         <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                 <li class="nav-item">
                     <a class="nav-link" href="#categories_nav">Danh mục</a>
                 </li>

                 <li class="nav-item">
                     <a class="nav-link" href="#portfolio">Sản phẩm</a>
                 </li>


                 <li class="nav-item">

                     <?php if (isset($_SESSION['user_name'])) {?>
                     <div class="dropdown">

                         <span class=" nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                             aria-expanded="false">

                             <img src="/uploads//Ipad mini 6 5g.jpg" alt="">

                             <?php echo $_SESSION['user_name'] ?>
                         </span>
                         <ul class="dropdown-menu">
                             <?php echo $_SESSION['user_role'] == 0 ? " <li><a class='dropdown-item' href='/admin.php'> Admin</a></li>" : ''; ?>

                             <li><a class="dropdown-item" href="profile.php">Profile</a></li>

                             <?php echo $_SESSION['user_role'] != 0 ? " <li><a class='dropdown-item' href='/admin/index.php'> Trang quản trị</a></li>" : ''; ?>


                             <li><a class="dropdown-item" href="/shop_xx/view/logout/logout.php">Đăng xuất</a></li>


                         </ul>


                     </div>


                     <?php } else {?>

                     <a class="nav-link" href="/../shop_xx/login/login.php?act=fasle">Đăng nhập</a>

                     <?php }?>






                 </li>
                 <li id="search" class="nav-item">
                     <form action="search.php" method="post">
                         <input name="search" class="input-group" type="text">
                         <button name="search_submit"> <i class="fa-solid fa-magnifying-glass"></i></button>
                     </form>


                 </li>
             </ul>
         </div>
     </div>

 </nav>
 <header class="masthead">
     <div class="container">
         <div class="masthead-subheading"></div>
         <div class="masthead-heading text-uppercase"></div>
     </div>
 </header>