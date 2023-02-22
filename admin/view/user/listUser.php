<div class="mx-5">

    <table class="table table-bordered  shadow p-3 mb-5    bg-body rounded   ">

        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Tên đăng nhập</th>
                <th>SĐT</th>
                <th>Ảnh</th>
                <th>Vị trí</th>
                <th>Phân quyền</th>
                <th>Action</th>
            </tr>

        </thead>

        <tbody>
            <?php foreach ($dataAllUsers as $user) {extract($user)?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $user_fullName ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $user_name ?></td>
                <td><?php echo $phone ?></td>

                <td class="text-center"><img height="66" width="70" src="/../shop_xx/uploads/<?php echo $avt ?>"
                        alt="<?php echo $user_name ?>">
                </td>


                <td><?php
if ($role == 0) {
    echo 'Người dùng';
} else if ($role == 1) {
    echo 'Admin';
} else {
    echo 'Super Admin';
}
    ?>
                </td>
                <td><a href="/shop_xx/admin/index.php?act=listUser&normal=<?php echo $id ?>">Người dùng</a> or
                    <a href="/shop_xx/admin/index.php?act=listUser&admin=<?php echo $id ?>">Admin</a>
                </td>
                <td><a class="delete" href="/shop_xx/admin/index.php?act=listUser&delete=<?php echo $id ?>"><button
                            class="btn btn-danger">Xóa</button></a>
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<script>
const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
})
            
const deleteBtn = document.querySelectorAll('.delete');
console.log(deleteBtn);

deleteBtn.forEach((btn) => {


    btn.addEventListener('click', (e) => {
        e.preventDefault();


        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {

                return btn.unbind('click');
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {


                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })


    })

})
</script>