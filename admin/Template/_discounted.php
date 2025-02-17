<?php

    shuffle($product_shuffle);

    // request method post
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (isset($_POST['top_sale_submit'])){
            // call method addToCart
            $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
        }
    }


?>
<section id="offer-area">
    <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12" style="min-height:75px">
          <h5 class="text-primary " style="padding-top:15px"><img src="img/discounted items.png" alt="" width="600" height="auto" style="padding-top:5px  ">
          </div>
        </div>
    </div>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                    <div class="text-center">
                        <h6><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price'] ?? '0' ; ?></span>
                        </div>
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                            <?php   
                                if (isset($_SESSION['userid'])){
                                ?>
                                <?php 
                                    if (isset($_SESSION['username'])){
                                    ?>
                                        <?php
                                            if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])){
                                                echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                            }else{
                                                echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                            }
                                        ?>
                                        <?php
                                    }
                                 ?> 
                                <?php
                                }else{
                                            
                                            echo '<button type="cancel" name="#" class="btn btn-warning font-size-12">Add to Cart</button>';
                                    }             
                            ?>
                        </form>
                    </div>
                </div>
            </div>
            <?php } // closing foreach function ?>
        </div>
        <!-- !owl carousel -->


    </section>
