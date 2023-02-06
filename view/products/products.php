 <!-- Products-->

 <div class="page-section  " id="categories_nav">
     <div class="container bg-bg-light">
         <h3 class="mb-5">Danh mục</h3>



         <ul id="categories" class="d-flex flex-row flex-wrap  ">


             <li class="flex-item"> <a href="cat.php?id=1"> a
                 </a></li>

         </ul>
     </div>


 </div>

 <section class="page-section bg-light" id="portfolio">
     <div class="container">
         <div class="text-center">
             <h2 class="section-heading text-uppercase"></h2>

         </div>




         <div class="row">


             <?php foreach ($dataProducts as $product) {extract($product)?>
             <div class="col-lg-4 col-sm-6 mb-4">
                 <!-- Portfolio item 1-->
                 <div class="portfolio-item">
                     <a class="portfolio-link" href="about_product.php?id=">

                         <img class="img-fluid" src="./uploads//<?php echo $img ?>" alt="" />
                     </a>
                     <div class="portfolio-caption">

                         <a class="text-decoration-none" href="about_product.php?id=">
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