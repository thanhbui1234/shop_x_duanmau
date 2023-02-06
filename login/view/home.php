<section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Đăng nhập</h2>
            <h3 class="section-subheading text-muted">
                Shop X uy tín số 1 thế giới
            </h3>
        </div>

        <form id="contactForm" method="post" action="#" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" name="userName" id="name" type="text" placeholder="Your User Name *"
                            data-sb-validations="required" />

                        <h2 class=" login text-lg">
                            <h2 class="login">
                                <?php echo isset($errLogin['userName']) ? $errLogin['userName'] : '' ?></h2>
                            <h2 class="login">
                                <?php echo isset($errLogin['falseUserName']) ? $errLogin['falseUserName'] : '' ?>
                            </h2>


                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" name="password" type="password" placeholder="Your Password *"
                            data-sb-validations="required,email" />

                        <h2 class=" login text-lg">
                            <h2 class="login">
                                <?php echo isset($errLogin['password']) ? $errLogin['password'] : '' ?></h2>
                            <h2 class="text-danger">
                                <?php echo isset($errLogin['falsePassword']) ? $errLogin['falsePassword'] : '' ?>
                            </h2>


                    </div>

                    <div id="notregister" class="">
                        <P class="text-white"> Bạn chưa có tài khoản shop-x ? <a
                                href="/shop_xx/login/login.php?act=register">Đăng ký</a>
                        </P>
                    </div>

                </div>

            </div>


            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" name="login" type="submit">
                    Đăng nhập
                </button>
            </div>
        </form>
    </div>
</section>