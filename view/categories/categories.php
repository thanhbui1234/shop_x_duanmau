<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase"></h2>

        </div>




        <div class="row">

            <?php if (empty($dataselectProductCategory)) {?>
            <section>
                <h3 class="text-center text-danger"> Danh mục này không có sản phẩm nào
                </h3>
            </section>

            <?php }?>

            <?php foreach ($dataselectProductCategory as $product) {extract($product)?>
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" href="./index.php?act=about_product&id=<?php echo $id ?>">

                        <img class="img-fluid" src="/../shop_xx//uploads//<?Php echo $img ?>" alt="" />
                    </a>
                    <div class="portfolio-caption">

                        <a class="text-decoration-none" href="./index.php?act=about_product&id=<?php echo $id ?>">
                            <div class="portfolio-caption-heading"><?php echo $name ?>
                            </div>
                        </a>
                        <div class="portfolio-caption-subheading text-muted">
                            <?php echo $price ?> VND
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>

        </div>
    </div>
    <div id="paging" class=" mt-5">


    </div>

</section>