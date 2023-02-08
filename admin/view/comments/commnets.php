 <?php
if (isset($_GET['alertDelete'])) {
    echo "<script>Swal.fire(
  'Bạn đã xóa thành công!'

)
</script>";
}

if (isset($_GET['alertDuyet'])) {
    echo "<script>Swal.fire(
  'Bạn đã duyệt thành công!'

)
</script>";
}

?>

 <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered  container ">
     <thead class="headTable">
         <tr>
             <th>ID</th>
             <th>Sản phẩm</th>
             <th>Người dùng</th>
             <th>Nội dung </th>
             <th>Hỉnh ảnh</th>
             <th>Trạng thái</th>
             <th>Action</th>

         </tr>

     </thead>
     <tbody>

         <?php if (empty($dataCmts)) {?>

         <tr>
             <td colspan="7" class="text-center text-danger">Empty</td>
         </tr>
         <?php }?>

         <?php foreach ($dataCmts as $cmt) {extract($cmt)?>

         <tr>
             <td><?php echo $id ?></td>

             <?php selectCmtProd($id_prod)?>
             <?php foreach ($dataSelectName as $name) {?>
             <td> <a href="/shop_xx/index.php?act=about_product&id=<?php echo $id_prod ?>"><?php echo $name['name'] ?>
                 </a></td>

             <?php }?>


             <td><?php echo $id_user ?></td>
             <td><?php echo $content ?></td>
             <td><?php echo $img ?></td>
             <td><?php

    echo $duyet == 0 ? "<i class='text-danger fa-solid fa-xmark'> </i> Chua phe duyet" : "<i class='text-success fa-solid fa-check'> </i> Da phe duyet";

    ?>

             </td>
             <td>
                 <a class="btn btn-success" href="/shop_xx/admin//index.php?act=comments&pheduyet=<?php echo $id ?>">Phe
                     duyet</a>
                 <a class="btn btn-danger" href="/shop_xx/admin//index.php?act=comments&deleteCmt=<?php echo $id ?>">Xoa
                 </a>

             </td>



         </tr>
         <?php }?>


     </tbody>

 </table>