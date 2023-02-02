<form class="container" enctype="multipart/form-data" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên sản phẩm</label>
        <input type="text" name="prod_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="">
    </div>
    <span id='err_prod'> <?php echo isset($errProduct['prod_name']) ? $errProduct['prod_name'] : ''; ?></span>




    <br>
    <div class="form-group">
        <select name="prod_category" id="select" class="form-select" aria-label="Default select example">
            <option value="default" selected>Chọn sản phẩm</option>

            <?php foreach ($dataCategories as $category) {?>
            <option value="<?php echo $category['id_cat'] ?>"><?php echo $category['name_cat'] ?></option>
            <?php }?>
        </select>
    </div>
    <span id='err_prod'> <?php echo isset($errProduct['prod_category']) ? $errProduct['prod_category'] : ''; ?></span>

    <br>
    <div class="form-group">
        <label for="exampleInputPassword1">Giá</label>
        <input name="prod_price" type="text" class="form-control" id="exampleInputPassword1">
    </div>
    <span id='err_prod'> <?php echo isset($errProduct['prod_price']) ? $errProduct['prod_price'] : ''; ?></span>
    <span id='err_prod'> <?php echo isset($errProduct['prod_price_num']) ? $errProduct['prod_price_num'] : ''; ?></span>
    <br>

    <div class="form-group">
        <label for="exampleInputPassword1">Hình ảnh</label> <br>
        <input name="prod_img" type="file" id="exampleInputPassword1">
    </div>
    <span id='err_prod'> <?php echo isset($errProduct['prod_img']) ? $errProduct['prod_img'] : ''; ?></span>
    <br>

    <div class="form-group">
        <label for="exampleInputPassword1">Trạng thái</label> <br>
        <select name="prod_status" id="selectStatus" class="form-select" aria-label="Default select example">
            <option value="public"> Public </option>
            <option value="private">Private</option>
        </select>
    </div>
    <span id='err_prod'> <?php echo isset($errProduct['prod_status']) ? $errProduct['prod_status'] : ''; ?></span>
    <br>


    <div class="form-group">
        <label for="exampleInputPassword1">Giảm giá</label>
        <input name="prod_sale" type="number" min="0" max="100" step="10" value="0" class="form-control"
            id="exampleInputPassword1">
        <span id="percent">%</span>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Tag sản phẩm ( tìm kiếm )</label>
        <input type="text" name="prod_tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="">
    </div>
    <span id='err_prod'> <?php echo isset($errProduct['prod_tag']) ? $errProduct['prod_tag'] : ''; ?></span> <br>



    <div class="form-group">
        <label for="exampleInputPassword1">Nội Dung</label>
        <textarea class="form-control" name="prod_content" id="" cols="30" rows="10"></textarea>
    </div>
    <span id='err_prod'> <?php echo isset($errProduct['prod_content']) ? $errProduct['prod_content'] : ''; ?></span>
    <br>





    <br> <button type="submit" name="addProd" class="btn btn-primary">Thêm sản phẩm</button>
</form>