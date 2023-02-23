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
                <td><a class="delete " data-id="<?php echo $id ?>"><button class="btn btn-danger">Xóa</button></a>
                </td>

            </tr>
            <?php }?>
        </tbody>
    </table>
</div>



<script src="/shop_xx//js//comfirm_user.js"></script>