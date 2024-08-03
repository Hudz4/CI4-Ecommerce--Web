


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
            <?php
                include 'database.php';                    
                  $select_product = mysqli_query($con, "SELECT * FROM `product`") or die('query failed');
                  if(mysqli_num_rows($select_product) > 0){
                     while($fetch_product = mysqli_fetch_assoc($select_product)){
                ?>
                    <form method="POST" action="condition.php">
                    <div class="item py-2">
                        <div class="product font-rale">
                            <a href="#"><img src="<?php echo $fetch_product['item_image'] ?? "assets/products/1.png"; ?>" alt="product1" class="img-fluid">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_product['item_image'] ?? "./assets/products/1.png"; ?>"></a>
                            <div class="text-center">
                                <h6><?php echo $fetch_product['item_name']; ?></h6><input type="hidden" name="product_name" value="<?php echo $fetch_product['item_name']; ?>">
                                <div class="rating text-warning font-size-12">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <div>
                                <input type="number" min="1" name="product_quantity" value="1">
                                </div>
                                <div class="price py-2">
                                    <span>$<?php echo $fetch_product['item_price']; ?></span><input type="hidden" name="product_price" value="<?php echo $fetch_product['item_price']; ?>">
                                </div>
                                <?php   
                                    if (isset($_SESSION['user_id'])){
                                    ?>
                                        <?php       
                                            echo '<button type="submit" name="add_to_cart" class="btn btn-warning font-size-12">Add to Cart</button>';
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
            <?php
          };
       };
   ?>
        </div>
        <!-- !owl carousel -->


    </section>
