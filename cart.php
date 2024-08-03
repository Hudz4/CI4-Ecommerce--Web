<?php
ob_start();
// include header.php file
require 'header.php';



?>


<!-- Shopping cart section  -->


<section id="cart" class="py-3 mb-5">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>

        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
            <?php

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
                   mysqli_query($con, "DELETE FROM `cart2` WHERE user_id = '$user_id' ") or die('query failed');
                   header('location:cart.php');
                }

                 $cart_query = mysqli_query($con, "SELECT * FROM `cart2` WHERE user_id = '$user_id'") or die('query failed');
                 $grand_total = 0;
                 if(mysqli_num_rows($cart_query) > 0){
                    while($fetch_cart = mysqli_fetch_assoc($cart_query)){
                        $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']);
              ?>
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $fetch_cart['image'] ?>" style="height: 120px;" alt="cart1" class="img-fluid">
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
                        <div class="qty d-flex ">
                            <div class="d flex font-rale">
                                <form action="" method="post">
                                <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                <input type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" name="update_cart" value="update" class="btn btn-success">
                                </form>
                            </div>

                            <form method="post">
                                <input type="hidden" value="<?php echo $fetch_cart['id']; ?>" name="item_id">
                                <a href="cart.php?remove=<?php echo $fetch_cart['id']; ?>" class="btn btn-danger" onclick="return confirm('remove item from cart?');">Delete</a>
                            </form>


                        </div>
                        <!-- !product qty -->

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                            $<span class="product_price" data-id="<?php echo $item['product_id'] ?? '0'; ?>"><?php echo $fetch_cart['price']; ?></span>
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
                    <span class="">Subtotal</span>
                    <div class="border-top py-3">
                        <span class="text-danger"><h3>$<?php echo $grand_total; ?></h3> </span>
                    </div>
                    <a href="cart.php?delete_all" onclick="return confirm('Proceed?');" class="btn btn-success <?php echo ($grand_total > 1)?'':'disabled'; ?>">Proceed Checkout</a></td>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->

<script src="index.js"></script>




<?php
require ('footer.php');
?>
