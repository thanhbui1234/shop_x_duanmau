<div class=" mx-5">

    <table class="table table-bordered  shadow p-3 mb-5    bg-body rounded   ">

        <thead>
            <th>ID yêu cầu</th>
            <th>Tài khoản </th>
            <th>Lý do</th>
            <th>Ngày gửi</th>
            <th>Action</th>
        </thead>

        <tbody>
            <?php if (empty($dataRequests)) {

    echo " <tr> <td colspan='5' class='text-center text-danger fs-1'> EMPTY</td> </tr>";

}?>
            <?php foreach ($dataRequests as $request) {extract($request)?>
            <tr>
                <td><?php echo $id ?></td>
                <?php selectUserName($user_id)?>
                <?php foreach ($dataUsername as $userName) {?>
                <td><?php echo $userName['user_name'] ?> </td>

                <td> <?php echo $reason ?></td>
                <td><?php echo $date_request ?></td>


                <?php echo $userName['role'] != 0
    ? " <td class= 'text-center'> <a href='/shop_xx/admin/index.php?act=requestUser&delete=$id'> <button
                    class='btn btn-success'>Xóa </button></a> </td>"
    : "<td>
                    <a href='/shop_xx/admin/index.php?act=requestUser&accpetAdmin=$user_id'> <button
                    class='btn btn-success'>Chấp
                    nhận</button></a>
                <a href='/shop_xx/admin/index.php?act=requestUser&delete=$id'><button
                        class='btn btn-danger'>Hủy</button></a>
                </td>";

    ?>


            </tr>
            <?php }}?>
        </tbody>
    </table>
</div>