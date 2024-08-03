<!-- Shopping cart section  -->


<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
            <?php
                include 'database.php';

                if(isset($_POST['update_cart'])){
                   $update_quantity = $_POST['cart_quantity'];
                   $update_id = $_POST['cart_id'];
                   mysqli_query($con, "UPDATE `cart2` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
                   $message[] = 'cart quantity updated successfully!';
                }

                if(isset($_GET['remove'])){
                   $remove_id = $_GET['remove'];
                   mysqli_query($con, "DELETE FROM `cart2` WHERE id = '$remove_id'") or die('query failed');
                   header('location:cart.php');
                }
                  
                if(isset($_GET['delete_all'])){
                   mysqli_query($con, "DELETE FROM `cart2` WHERE user_id = '$user_id'") or die('query failed');
                   header('location:cart.php');
                }

                 $cart_query = mysqli_query($con, "SELECT * FROM `cart2` WHERE user_id = '$user_id'") or die('query failed');
                 $grand_total = 0;
                 if(mysqli_num_rows($cart_query) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
              ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $fetch_product['item_image'] ?? "assets/products/1.png"; ?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $fetch_cart['name']; ?></h5>
                        <small><?php echo $fetch_cart['name']; ?></small>
                        <!-- product rating -->
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <a href="#" class="px-2 font-rale font-size-14">20,534 ratings</a>
                        </div>
                        <!--  !product rating-->

                        <!-- product qty -->
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <form action="" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" name="update_cart" value="update" class="option-btn">
                                </form>
                            </div>

                            <form method="post">
                                <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="item_id">
                                <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="btn btn-success" onclick="return confirm('remove item from cart?');">Delete</a>
                            </form>

                            <form method="post">
                                <input type="hidden" value="<?php echo $item['item_id'] ?? 0; ?>" name="item_id">
                                <button type="submit" name="wishlist-submit" class="btn font-baloo text-danger">Save for Later</button>
                            </form>


                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['item_id'] ?? '0'; ?>"><?php echo $fetch_cart['price']; ?></span>
                        </div>
                    </div>
                </div>
                <!-- !cart item -->
                <?php
                 $grand_total += $sub_total;
                    }
                 }else{
                    echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                 }
              ?>
            </div>
            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger"><span class="text-danger" id="deal-price">$<?php echo $grand_total; ?></span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3 ">Proceed to Buy</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->