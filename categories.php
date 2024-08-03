<?php 

require('header.php');

if(!isset($_GET['id']) && $_GET['id']!=''){
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}

$cat_id=mysqli_real_escape_string($con,$_GET['id']);

$sub_categories='';
if(isset($_GET['sub_categories'])){
	$sub_categories=mysqli_real_escape_string($con,$_GET['sub_categories']);
}
$price_high_selected="";
$price_low_selected="";
$new_selected="";
$old_selected="";
$sort_order="";
if(isset($_GET['sort'])){
	$sort=mysqli_real_escape_string($con,$_GET['sort']);
	if($sort=="price_high"){
		$sort_order=" order by produkto.price desc ";
		$price_high_selected="selected";	
	}if($sort=="price_low"){
		$sort_order=" order by produkto.price asc ";
		$price_low_selected="selected";
	}if($sort=="new"){
		$sort_order=" order by produkto.id desc ";
		$new_selected="selected";
	}if($sort=="old"){
		$sort_order=" order by produkto.id asc ";
		$old_selected="selected";
	}

}




if($cat_id>0 && ($sub_categories!='' && $sub_categories>0)){
	$get_product=get_product($con,'',$cat_id,'','',$sort_order,'',$sub_categories);
}else{
	?>
	<script>
	window.location.href='index.php';
	</script>
	<?php
}										
?>


<div class="container" style="padding-left:100px;padding-right:100px">
    <div class="row">
    	
		<?php if(count($get_product)>0){?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">

                    <?php
					foreach($get_product as $list){
					?>
					<div class="py-4 col-md-4 col-lg-3 col-sm-4 col-xs-12">
						<form method="POST" action="condition.php" enctype="multipart/form-data">
		                            <div class="item" style="padding:27px">
		                                <div class="product">                  
		                                    <div class="card shadow border-0">
		                                        <div class="card-img-top">
		                                        <a href="product.php?id=<?php echo $list['id']?>">
		                                            <img class ="img-fluid" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
		                                            <input type="hidden" name="product_image" value="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>">
		                                        </a>
		                                        </div>
		                                        <div class="text-center"> 
		                                            <div class="card-body">
		                                                <h4><a href="product-details.html"><?php echo $list['name']?></a></h4>
		                                                <input type="hidden" name="product_name" value="<?php echo $list['name']?>">
		                                                <div class="rating text color-secondary font-size-12">
		                                                    <span><i class="fas fa-star"></i></span>
		                                                    <span><i class="fas fa-star"></i></span>
		                                                    <span><i class="fas fa-star"></i></span>
		                                                    <span><i class="fas fa-star"></i></span>
		                                                    <span><i class="far fa-star"></i></span>
		                                                </div>
		                                                <div class="price py-2">

		                                                    <span class="text text-decoration-line-through">P<?php echo $list['mrp']?></span>
		                                                </div>
		                                                    <span class="text fw-bold">P<?php echo $list['price']?></span>
		                                                    <input type="hidden" name="product_price" value="<?php echo $list['price']?>">
		                                            </div>

		                                        <input type="hidden" name="product_id" value="<?php echo $list['id'] ?>">
		                                        <div class="card-footer wd-auto h-auto">
		                                                <?php   
		                                                    if (isset($_SESSION['user_id'])){
		                                                    ?>
		                                                        <?php       
		                                                            echo '<button type="submit" name="add_to_cart" class="btn btn-success font-size-12">Add to Cart</button>';
		                                                        ?>
		                                                    <?php
		                                                 }else{
		                                                 echo '<button type="submit" disabled class="btn btn-danger font-size-12">Sign in!</button>';
		                                                 }        
		                                                ?>
		                                        </div>
		                                        </div> 
		                                    </div>
		                                 </div>
		                            </div>
		                        </form>
		                	</div>
					<?php } ?>
                </div>
        </div>
		<?php } else { 
			$_SESSION['message']='Product not found';
			header('location:index.php');
		} ?>
    
	</div>
</div>
          
        <!-- End Product Grid -->
        <!-- End Banner Area -->
		<input type="hidden" id="qty" value="1"/>
<?php require('footer.php')?>        