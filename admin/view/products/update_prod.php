<form class="container" enctype="multipart/form-data" method="POST">

    <?php foreach ($dataProdUpade as $product) {extract($product)?>

    <div class="form-group">
        <label for="exampleInputEmail1">Tên sản phẩm</label>
        <input type="text" value="<?php echo $name ?>" name="prod_name" class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp" placeholder="">
    </div>




    <br>
    <div class="form-group">
        <select name="prod_category" id="select" class="form-select" aria-label="Default select example">
            <?php selectCategory($category)?>
            <?php foreach ($dataNameCate as $nameCate) {?>
            <option value="<?php echo $nameCate['name'] ?>"><?php echo $nameCate['name'] ?></option>

            <?php selectDifferentCategory($nameCate['name'])?>

            <?php foreach ($dataDifferentCategory as $differentCategory) {?>

            <option value="<?php echo $differentCategory['name'] ?>"><?php echo $differentCategory['name'] ?></option>


            <?php }?>

            <?php }?>







        </select>
    </div>
    <h3 class="text-danger"> <?php echo isset($errProduct['category']) ? $errProduct['category'] : ''; ?></h3>

    <br>
    <div class="form-group">
        <label for="exampleInputPassword1">Giá</label>
        <input value="<?php echo $price ?>" name="prod_price" type="text" class="form-control"
            id="exampleInputPassword1">
    </div>
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
        <input name="prod_sale" type="number" min="0" max="100" step="10" value="0" class="form-control"
            id="exampleInputPassword1">
        <span id="percent">%</span>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Tag sản phẩm ( tìm kiếm )</label>
        <input type="text" name="prod_tag" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="">
    </div>


    <div class="form-group">
        <label for="exampleInputPassword1">Nội Dung</label>
        <textarea class="form-control" name="prod_content" id="" cols="30" rows="10"></textarea>
    </div>
    <br>
    <?php }?>





    <br> <button type="submit" name="addProd" class="btn btn-primary">Thêm sản phẩm</button>
</form>