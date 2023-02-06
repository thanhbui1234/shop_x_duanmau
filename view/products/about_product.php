<div class="bg-bg-light container" id="product">


    <?php foreach ($dataAboutProduct as $product) {extract($product)?>

    <div>
        <img width="400" src="./uploads/<?php echo $img ?>" alt="">
    </div>
    <div class="shadow p-3 mb-5 bg-body rounded ">

        <h1 id="prod_name" class=""><?php echo $name ?></h1><br>

        <h2 id="price_about"> <?php echo $price ?> <span>đ</span>

        </h2>


        <?php if (!empty($sale)) {?>

        <h5> <strike><?php echo $total_price_sale ?></strike><span> (- <?php echo $sale ?> %) </span>

        </h5>

        <?php }?>
        <p class="mt-4 fs-4"> <?php echo $content ?></p>

        <div class="buy">
            <h5>
                <i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng
            </h5>
            <button>Mua ngay</button>

        </div>

    </div>
    <?php }?>

</div>




<div id="commnets" class="bg-bg-light container">
    <section>

        <?php if (!isset($_SESSION['userId'])) {?>

        <h3>Bạn cần phải <a class="text-danger" href="/shop_xx/login/login.php">đăng nhập</a> để bình luận
        </h3>
        <?php } else {?>

        <form id="myForm" action="#" method="post" enctype="multipart/form-data">
            <div class="form-floating shadow  bg-body rounded ">
                <textarea name="textcmt" class="form-control" placeholder="Leave a comment here"
                    id="textcmt"></textarea>
                <label for="floatingTextarea">Comments</label>

            </div>


            <div class="d-flex flex-row justify-content-between mt-3">
                <div>
                    <input name="imgCmt" hidden id="imgCmt" type="file">
                    <label class="btn btn-primary" for="imgCmt">Thêm ảnh</label>
                </div>

                <button name="sendCmt" type="submit" class="btn btn-success">Gửi</button>


            </div>
        </form>

        <?php }?>
    </section>


</div>