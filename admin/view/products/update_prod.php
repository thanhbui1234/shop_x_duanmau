<form id="fomr_update_prod" class="container" enctype="multipart/form-data" method="POST">

    <?php foreach ($dataProdUpade as $product) {extract($product)?>

    <div class="form-group">
        <label for="exampleInputEmail1">Tên sản phẩm</label>
        <input type="text" value="<?php echo $name ?>" name="prod_name" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="">
    </div>
    <h3 class="text-danger"> <?php echo isset($errUpdate['name']) ? $errUpdate['name'] : ''; ?>
    </h3>




    <br>
    <div class="form-group">
        <select name="prod_category" id="select" class="form-select" aria-label="Default select example">
            <?php selectCategory($category)?>
            <?php foreach ($dataNameCate as $nameCate) {?>
            <option value="<?php echo $category ?>"><?php echo $nameCate['name'] ?></option>

            <?php selectDifferentCategory($nameCate['name'])?>

            <?php foreach ($dataDifferentCategory as $differentCategory) {?>


            <option value="<?php echo $differentCategory['id'] ?>"><?php echo $differentCategory['name'] ?></option>

            <?php }?>

            <?php }?>






        </select>
    </div>

    <br>
    <div class="form-group">
        <label for="exampleInputPassword1">Giá</label>
        <input value="<?php echo $price ?>" name="prod_price" type="text" class="form-control"
            id="exampleInputPassword1">
    </div>
    <h3 class="text-danger"> <?php echo isset($errUpdate['price']) ? $errUpdate['price'] : ''; ?></h3>
    <h3 class="text-danger"> <?php echo isset($errUpdate['prod_price_num']) ? $errUpdate['prod_price_num'] : ''; ?>
    </h3>
    <br>

    <div class="form-group">
        <label class="border btn btn-success" for="img"> Thay đổi hình ảnh</label><br> <br>
        <td><img width="100" src="../uploads//<?php echo $img ?>" alt=""></td>
        <input hidden name="prod_img" type="file" id="img">




    </div>
    <br>

    <div class="form-group">
        <label for="exampleInputPassword1">Trạng thái</label> <br>
        <select name="prod_status" id="selectStatus" class="form-select" aria-label="Default select example">
            <option value="public"> Public </option>
            <option value="private">Private</option>
        </select>
    </div>
    <br>


    <div class="form-group">
        <label for="exampleInputPassword1">Giảm giá</label>
        <input name="prod_sale" type="number" min="0" max="100" step="5" value="<?php echo $sale ?>"
            class="form-control" id="exampleInputPassword1">
        <span id="percent">%</span>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Tag sản phẩm ( tìm kiếm )</label>
        <input value="<?php echo $tag ?>" type="text" name="prod_tag" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="">
    </div>


    <div class="form-group">
        <label for="exampleInputPassword1">Nội Dung</label>
        <textarea class="form-control" name="prod_content" id="" cols="30" rows="10"><?php echo $content ?> </textarea>
    </div>
    <br>
    <?php }?>





    <button type="submit" name="updateProd" class="btn btn-primary mb-3">Update</button>
</form>


<!-- <script src="/../shop_xx/js/comfirm_updateProd.js"></script> -->