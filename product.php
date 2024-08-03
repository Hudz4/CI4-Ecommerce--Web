<?php 
require('header.php');
        if(isset($_GET['id'])){
        	$product_id=mysqli_real_escape_string($con,$_GET['id']);
        	if($product_id>0){
        		$get_product=get_product($con,'','',$product_id);
        	}else{
		?>
		<script>
		window.location.href='index.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}
?>

 <!-- Start Bradcaump area -->

 <style type="text/css">
    .product-img{
      vertical-align: middle;
      height: 200px;
    }
</style>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Product Details Area -->
        <section class="htc__product__details bg__white ptb--100">
            <!-- Start Product Details Top -->
            <div class="htc__product__details__top">
            <form method="POST" action="condition.php" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                            <div class="htc__product__details__tab__content">
                                <!-- Start Product Big Images -->
                                <div class="product__big__images">
                                    <div class="portfolio-full-image tab-content">
             
                                            <img class="img-fluid" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>">
                                            <input type="hidden" name="product_image" value="<?php echo PRODUCT_IMAGE_SITE_PATH.$get_product['0']['image']?>">
                        
                                    </div>
                                </div>
                                <!-- End Product Big Images -->
                                
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="ht__product__dtl">
                                <h2><?php echo $get_product['0']['name']?></h2>
                                <input type="hidden" name="product_name" value="<?php echo $get_product['0']['name']?>">
                                <ul  class="text">
                                    <h4 class="text text-decoration-line-through">P<?php echo $get_product['0']['mrp']?></h4>
                                    <h2 class="text fw-bold"><i class="fas color-secondary fa-star"></i>P<?php echo $get_product['0']['price']; ?></h2>
                                    <input type="hidden" name="product_price" value="<?php echo $get_product['0']['price']?>">
                                </ul>
                                <p class="pro__info"><?php echo $get_product['0']['short_desc']?></p>
                                <div class="ht__pro__desc">
                                    <div class="sin__desc">
                                        <p><span>Availability:</span> In Stock</p>
                                    </div>
									<div class="sin__desc">
										<input type="number" min="1" name="product_quantity" value="1">
			
                                    </div>
                                    <div class="sin__desc align--left">
                                        <p><span>Categories:</span></p>
                                        <ul class="pro__cat__list">
                                            <li><a href="#"><?php echo $get_product['0']['category']?></a></li>
                                        </ul>
                                    </div>
                                    <input type="hidden" name="product_id" value="<?php echo $get_product['0']['id']?>">
                                    </div>
									
                                </div>
								<?php   
                                    if (isset($_SESSION['user_id'])){
                                    ?>
                                        <?php       
                                            echo '<button type="submit" name="add_to_cart" class="btn btn-success font-size-12">Add to Cart</button>';
                                        ?>
                                    <?php
                                 }else{
                                 echo '<button type="submit" class="btn btn-danger font-size-12">Add to Cart</button>';
                                 }        
                                ?>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
            <!-- End Product Details Top -->
        </section>
        <!-- End Product Details Area 
		<!-sd-sStart Product Description -->
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xl  -12">
                        <!-- Start List And Grid View -->
                        <ul role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab" data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <!-- Start Single Content -->
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    <?php echo $get_product['0']['description']?>
                                </div>
                            </div>
                            <!-- End Single Content -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Product Description -->
        
										
<?php require('footer.php')?>        