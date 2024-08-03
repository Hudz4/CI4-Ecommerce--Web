
<?php
    $brand = array_map(function ($pro){ return $pro['item_brand']; }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

// request method post
//if($_SERVER['REQUEST_METHOD'] == "POST"){
    //if (isset($_POST['special_price_submit'])){
        // call method addToCart
        //$Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    //}
//}

//$in_cart = $Cart->getCartId($product->getData('cart'));


?>

    <style>
        <?php include 'style.css'; ?>
    </style>
<div class="row-fluid">
    <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12" style="min-height:75px">
          <h5 class="text"><img src="img/featured items.png" alt="" width="500" height="100" style="padding-top:5px  "></h5>
          </div>    
        </div>
    </div>
  </div>

<section id="featured-items">
    <div id="filters" class="button-group">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle font-Montse " href="#" data-filter="*"  aria-haspopup="true" aria-expanded="false">All Brand</a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> 
                <?php
                    array_map(function ($brand){
                        printf('<button class="dropdown-item" data-filter=".%s">%s</button>', $brand, $brand);
                    }, $unique);
                ?>
            </div>  
        </li>


        <div class="grid">
            <?php array_map(function ($item){ ?>
            <div class="grid-item border <?php echo $item['item_brand'] ?? "Brand" ; ?>">
                <div class="item py-2" style="width: 200px;">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/13.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo $item['item_name'] ?? "Unknown"; ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>$<?php echo $item['item_price'] ?? 0 ?></span>
                            </div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'], $in_cart ?? [])){
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                }else{
                                    echo '<button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle) ?>
        </div>

    </div>

    <script src="index.js"></script>
</section>