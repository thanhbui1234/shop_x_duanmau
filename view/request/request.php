<section class="page-section mt-3" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Chào mừng đến shop x</h2>
            <h3 class="section-subheading text-danger">
                Để trở thành quản trị viên bạn cần điền một số thông tin cơ bản
            </h3>
        </div>

        <form action="#" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <?php foreach ($dataRequestAdmin as $user) {?>
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" value="<?php echo $user['user_fullName'] ?>" disabled
                            type="text" placeholder="Your Name *" data-sb-validations="required" />

                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" value="<?php echo $user['email'] ?>" disabled id="email"
                            type="email" placeholder="Your Email *" data-sb-validations="required,email" />


                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" value="<?php echo $user['phone'] ?>" disabled id="phone" type="tel"
                            placeholder="Your Phone *" data-sb-validations="required" />
                        <?php }?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea name="reason" class="form-control" id="message"
                            placeholder="Lí do bạn muốn trở thành một quản trị viên *"
                            data-sb-validations="required"></textarea>


                        <h4 class="text-danger">
                            <?php echo isset($errRequest['reasonEmpty']) ? $errRequest['reasonEmpty'] : '' ?>
                        </h4>
                        <h4 class="text-danger">
                            <?php echo isset($errRequest['stringReason']) ? $errRequest['stringReason'] : '' ?></h4>


                    </div>
                </div>
            </div>

            <!-- Submit Button-->
            <div class="text-center">
                <button name="requestAdmin" class="btn btn-primary btn-xl text-uppercase " id="submitButton"
                    type="submit">
                    Gửi yêu cầu
                </button>
            </div>
        </form>
    </div>
</section>