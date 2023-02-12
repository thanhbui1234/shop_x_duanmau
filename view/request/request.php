<section class="mt-5 shadow  bg-body rounded" id="">
    <div class="">
        <div class="text-center mb-lg-5">
            <h2 class="section-heading text-uppercase">Chào mừng đến shop x</h2>
            <h3 class="section-subheading text-danger">
                Để trở thành quản trị viên bạn cần điền một số thông tin cơ bản
            </h3>
        </div>

        <form action="#" method="POST" id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <?php foreach ($dataRequestAdmin as $user) {?>
                    <div class="form-group mb-5">
                        <!-- Name input-->
                        <input class="form-control" id="name" value="<?php echo $user['user_fullName'] ?>" disabled
                            type="text" placeholder="Your Name *" data-sb-validations="required" />

                    </div>
                    <div class="form-group mb-5">
                        <!-- Email address input-->
                        <input class="form-control" value="<?php echo $user['email'] ?>" disabled id="email"
                            type="email" placeholder="Your Email *" data-sb-validations="required,email" />


                    </div>
                    <div class="form-group mb-md-0 mb-5">
                        <!-- Phone number input-->
                        <input class="form-control" value="<?php echo $user['phone'] ?>" disabled id="phone" type="tel"
                            placeholder="Your Phone *" data-sb-validations="required" />
                        <?php }?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0 ">
                        <!-- Message input-->
                        <textarea name="reason" class="form-control " id="messRequest"
                            placeholder="Lí do bạn muốn trở thành một quản trị viên *"></textarea>


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
<script>
const form = document.querySelector('#contactForm');
form.addEventListener('submit', function(e) {
    const
        textcmt = document.querySelector('#message');
    if (textcmt.value.length < 30) {
        e.preventDefault();
        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lý do phải trên 30 ký tự',
        });
    }
});
</script>