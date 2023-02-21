<body id="page-top">


    <?php if (!isset($_SESSION['userId'])) {
    header('Location: /shop_xx/index.php?act=false');
}

?>

    <?php updateProfile()?>


    <div class="bg-light ">
        <div class="container mt-5 shadow  bg-body rounded">
            <header class="pt-4">
                <h4>Hồ sơ của tôi</h4>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            </header>

            <hr>
            <section class="">

                <form action="#" enctype="multipart/form-data" method="POST">

                    <div id="profile">
                        <div>
                            <?php foreach ($dataPorfile as $profile) {?>

                            <div class="mb-5 form-group">
                                <label class="lable" for="">Tên đăng nhập</label> <input name="userName"
                                    value="<?php echo $profile['user_name'] ?>" type="text">
                            </div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Họ và tên </label> <input name="fullName"
                                    value="<?php echo $profile['user_fullName'] ?>" type="text">
                            </div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Email</label> <input value="<?php echo $profile['email'] ?>"
                                    name="email" type="email">
                            </div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Số điện thoại</label> <input
                                    value="<?php echo $profile['phone'] ?>" name="phone" type="text">
                            </div>

                            <input value="SAVE" class="btn btn-danger " name="save" type="submit">

                        </div>
                        <div id="avatar">
                            <?php echo empty($profile['avt']) ? "<img  id='img' width='250' src='/../shop_xx/uploads//avatardefault_92824.webp' alt=''><br>" : "<img class='rounded-circle' width='250' src='/../shop_xx/uploads//$profile[avt]' alt=''><br>"; ?>
                            <input name="avtUser" hidden id="file" type="file">
                            <label id="setAvt" class="border p-2 px-3 " for="file">Chọn ảnh</label>
                            <?php }?>


                        </div>
                    </div>



                </form>


            </section>
        </div>





    </div>