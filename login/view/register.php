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


                    </div>


                    <div class="form-group">
                        <input name="email" class="form-control " id="email" type="email" placeholder="Email *"
                            data-sb-validations="required,email" />


                    </div>

                    <div class="form-group mb-md-0">
                        <input name="phone" class="form-control " id="phone" type="text" placeholder="Số điện thoại *"
                            data-sb-validations="required" />

                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <input name="userName" class="form-control " id="name" type="text" placeholder="Tên tài khoản *"
                            data-sb-validations="required" />


                    </div>


                    <div class="form-group">
                        <input name="password" class="form-control " id="email" type="password" placeholder="Mật khẩu *"
                            data-sb-validations="required,email" />

                    </div>

                    <div class="form-group mb-md-0">
                        <input name="password2" class="form-control " id="phone" type="password"
                            placeholder="Xác nhận lại mật khẩu *" data-sb-validations="required" />
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



<script>
var form_register = document.querySelector('#contactForm');
var hoten = document.querySelector('input[name=name]');
var email = document.querySelector('input[name=email]');
var phone = document.querySelector('input[name=phone]');
var userName = document.querySelector('input[name=userName]');
var password = document.querySelector('input[name=password]');
var password2 = document.querySelector('input[name=password2]');


form_register.addEventListener('submit', (e) => {

    if (hoten.value.length < 9 || !isNaN(Number(hoten.value))) {


        e.preventDefault()

        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Họ tên có vấn đề',

        })

    }
    if (email.value.length < 1) {

        e.preventDefault()

        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Email có vấn đề!',
        })

    }



    if (phone.value.length < 10 || isNaN(phone.value) || !phone.value.startsWith('0')) {

        e.preventDefault()

        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Lỗi số điện thoại rồi!',
        })

    }



    if (userName.value.length == 0) {

        e.preventDefault()

        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tên tài khoản không được bỏ trống!',
        })

    }

    if (userName.value.length <= 5) {

        e.preventDefault()

        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Tên tài khoản phải lớn hơn 5 ký tự!',
        })

    }
    if (password.value.length == 0) {
        e.preventDefault()

        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Mật khẩu không được bỏ trống!',
        })

    }


    if (password.value.length <= 5) {
        e.preventDefault()

        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Mật khẩu phải trên 5 ký tự!',
        })

    }

    if (password2.value.length == 0) {
        e.preventDefault()
        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Hãy nhật lại mật khẩu!',
        })

    }


    if (password.value !== password2.value) {
        e.preventDefault()
        return Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Mật khẩu phải đúng!',
        })

    }



})
</script>
