<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Đăng ký tài khoản</h2>
            <h3 class="section-subheading text-muted">
                Khách hàng là thượng đế
            </h3>
        </div>





        <form action="#" method="POST" id="contactForm">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input name="name" class="form-control " id="name" type="text" placeholder="Họ và tên *"
                            data-sb-validations="required" />

                        <h4 class='err_user'><?php echo isset($errUser['fullName']) ? $errUser['fullName'] : ''; ?>
                        </h4>

                    </div>


                    <div class="form-group">
                        <input name="email" class="form-control " id="email" type="email" placeholder="Email *"
                            data-sb-validations="required,email" />
                        <h4 class='err_user'><?php echo isset($errUser['email']) ? $errUser['email'] : ''; ?></h4>


                    </div>

                    <div class="form-group mb-md-0">
                        <input name="phone" class="form-control " id="phone" type="text" placeholder="Số điện thoại *"
                            data-sb-validations="required" />
                        <h4 class='err_user'><?php echo isset($errUser['phone']) ? $errUser['phone'] : ''; ?></h4>
                        <h4 class='err_user'>
                            <?php echo isset($errUser['phonetext']) ? $errUser['phonetext'] : ''; ?></h4>
                        <h4 class='err_user'>
                            <?php echo isset($errUser['phoneCount']) ? $errUser['phoneCount'] : ''; ?></h4>

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input name="userName" class="form-control " id="name" type="text" placeholder="Tên tài khoản *"
                            data-sb-validations="required" />
                        <h4 class='err_user'><?php echo isset($errUser['userName']) ? $errUser['userName'] : ''; ?>
                        </h4>


                    </div>


                    <div class="form-group">
                        <input name="password" class="form-control " id="email" type="password" placeholder="Mật khẩu *"
                            data-sb-validations="required,email" />
                        <h4 class='err_user'><?php echo isset($errUser['password']) ? $errUser['password'] : ''; ?>
                            <h4 class='err_user'>
                                <?php echo isset($errUser['passwordLength']) ? $errUser['passwordLength'] : ''; ?>

                            </h4>

                    </div>

                    <div class="form-group mb-md-0">
                        <input name="password2" class="form-control " id="phone" type="password"
                            placeholder="Xác nhận lại mật khẩu *" data-sb-validations="required" />
                        <h4 class='err_user'>
                            <?php echo isset($errUser['password2']) ? $errUser['password2'] : ''; ?></h4>
                        <h4 class='err_user'>
                            <?php echo isset($errUser['errpass']) ? $errUser['errpass'] : ''; ?></h4>
                    </div>


                </div>
                <div id="notregister" class="">
                    <P class="text-white"> Bạn đã có tài khoản <a href="/shop_xx/login/login.php?act=false">Đăng
                            nhập</a>
                    </P>
                </div>

            </div>

            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase " name="register" id="submitButton" type="submit">
                    Đăng ký
                </button>
            </div>
        </form>
    </div>
</section>