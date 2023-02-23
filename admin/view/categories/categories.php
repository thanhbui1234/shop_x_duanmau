<div id="container">


    <div class="row mx-5 ">

        <div class="col">
            <form method="post" class="" action="#">

                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <input type="text" class="form-control" name="category" aria-describedby="emailHelp" placeholder="">

                    <p> <?php echo isset($errCategory['category']) ? $errCategory['category'] : ''; ?></p>
                </div>

                <input class="btn btn-primary" value="Thêm Loại" name="addCategory" type="submit">


            </form>

            <?php if (isset($_GET['update'])) {?>
            <form method="post" class="mt-5" action="#">

                <div class="form-group">
                    <label for="exampleInputEmail1"></label>
                    <?php foreach ($datashowUpDate as $value) {extract($value)?>
                    <input type="text" value="<?php echo $name ?>" class="form-control" name="category22"
                        aria-describedby="emailHelp" placeholder="">
                    <?php }?>

                </div>

                <div class="d-flex justify-content-between">
                    <button type="submit" name="updateCategory" id="add_category" class="btn btn-primary">Chỉnh
                        sửa</button>

                    <button type="submit" name="cancelUpdate" id="add_category" class="btn btn-primary btn-danger">Hủy
                    </button>

                </div>


            </form>

            <?php }?>

        </div>



        <div class="col">
            <table class="table table-bordered  mt-3">
                <thead>
                    <tr>
                        <th id="id">ID</th>
                        <th>Loại sản phẩm</th>
                        <th>Chức năng</th>


                    </tr>
                </thead>
                <tbody>


                    <?php if (empty($dataCategoies)) {?>

                    <td class="text-center text-danger" colspan="3">EMPTY</td>

                    <?php }?>

                    <?php foreach ($dataCategoies as $category) {extract($category)?>
                    <tr>
                        <td> <?php echo $id ?></td>
                        <td><?php echo $name ?></td>
                        <td><a class=" btn btn-success"
                                href="index.php?act=categories&&update=<?php echo $id ?>">UPDATE</a>
                            <a class="delete_categories" data-id="<?php echo $id ?>"><button
                                    class="btn btn-danger">DELETE</button></a>
                        </td>

                    </tr>
                    <?php }?>
                </tbody>

            </table>
        </div>

    </div>





</div>


</div>


<script src="/shop_xx//js//comfirm_category.js"></script>