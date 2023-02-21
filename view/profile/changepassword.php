<body id="page-top">


    <?php if (!isset($_SESSION['userId'])) {
    header('Location: /shop_xx/index.php?act=false');
}

if (isset($_GET['success'])) {

    echo "<script>Swal.fire(
  'Đỉnh!',
  'Bạn đã đổi mật khẩu thành công!',
  'success'
)</script>";

}

?>



    <div class="bg-light ">
        <div class="container mt-5 shadow  bg-body rounded">
            <header class="pt-4">
                <h4>Đổi mật khẩu</h4>
                <p>Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
            </header>

            <hr>
            <section class="">

                <form id="my_form" action="#" method="POST">

                    <div id="profile">
                        <div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Mật khẩu hiện tại </label> <input name="nowPassword"
                                    type="password">

                                <?php echo isset($errChangePassword['nowPassword']) ? "<script>Swal.fire(
  'Mật khẩu hiện tại không đúng ',
  'Hãy kiểm tra lại?',
  'question'
)</script>" : ''; ?>


                            </div>




                            <div class="mb-5 form-group">
                                <label class="lable" for="">Mật khẩu mới </label> <input name="newPassword"
                                    type="password">
                            </div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Nhập lại mật khẩu</label> <input name="repateNewpassword"
                                    type="password">
                            </div>

                            <input value="Thay đổi" class="btn btn-danger " name="saveChangePassword" type="submit">


                        </div>

                </form>


            </section>
        </div>



    </div>



    <script>
    var myform = document.querySelector('#my_form');
    var oldPassword = document.querySelector('input[name="nowPassword"]');
    var newPassword = document.querySelector('input[name="newPassword"]');
    var repateNewpassword = document.querySelector('input[name="repateNewpassword"]');

    myform.addEventListener('submit', (e) => {

        if (oldPassword.value.length < 5) {
            e.preventDefault();
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Mật khẩu hiện tại không được bỏ trống!',
            });
        }

        if (newPassword.value.length < 5) {
            e.preventDefault();
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Mật khẩu phải trên 5 ký tự!',
            });
        }

        if (newPassword.value !== repateNewpassword.value) {
            e.preventDefault();
            return Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Phải nhập đúng mật khẩu',
            });

        }




    })
    </script>