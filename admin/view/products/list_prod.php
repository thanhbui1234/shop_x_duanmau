<div class="mx-4">
    <form action="#" method="post" class="">



        <div class="d-flex flex-row gap-2  ">
            <select name="option" class="form-select form-select-sm form-control w-25 mb-4" id="selectAllprod"
                aria-label="Default select example">
                <option selected>Chức năng</option>
                <option value="public">Public</option>
                <option value="private">Private</option>
                <option value="clone">Tạo bản sao</option>
                <option value="delete">Xóa</option>

            </select>

            <button id="apply_prod" type="submit" name="apply" class="btn btn-google h-25 "> Apply </button>


        </div>
        <table class="table shadow p-3 mb-5 bg-body rounded  table-condensed table-bordered  ">
            <thead class="headTable">
                <tr>
                    <th> <input id="selectAllBoxes" type="checkbox"></th>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Loại sản phẩm</th>
                    <th>Gía</th>
                    <th>Hỉnh ảnh</th>
                    <th>Nội Dung</th>
                    <th>Trạng thái</th>
                    <th>Giảm giá </th>
                    <th>Action </th>

                </tr>

            </thead>
            <tbody>

                <?php if (empty($dataProducts)) {?>
                <tr>
                    <td class=" text-xl-center text-warning" colspan="10">EMPTY</td>

                </tr>
                <?php }?>
                <tr>

                    <?php foreach ($dataProducts as $product) {extract($product)?>

                <tr>
                    <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="?>" type="checkbox"> </td>
                    <td> <?php echo $id ?></td>
                    <td> <?php echo $name ?> </td>
                    <td> <?php echo $category ?> </td>
                    <td> <?php echo $price ?> </td>
                    <td><img width="50" src="../uploads//<?php echo $img ?>" alt=""></td>

                    <td class="content"> <?php echo substr($content, 0, 70) ?></td>
                    <td> <?php echo $status ?> </td>
                    <td> <?php echo $sale ?> % </td>
                    <td class="action_prod"> <a class="btn btn-success"
                            href="index.php?act=update_prod&&id      =<?php echo $id ?>">UPDATE</a>
                        <a class="btn btn-danger" href="index.php?act=listProd&&delete=<?php echo $id ?>">DELETE</a>
                    </td>


                    <?php }?>
                </tr>


                </tr>
            </tbody>

        </table>
    </form>

</div>