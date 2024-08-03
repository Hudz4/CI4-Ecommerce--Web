
<style type="text/css">
    
    .one{
        height:566.200 px;
        width:373.800 px;
    }
    .img{
        height:385 px;
        width:290 px;
    }

    .img2{
        height:300 px;
        width:600 px;
    }

    html, body {
      height: 100%;
      scroll-behavior: smooth;
    }

    .dropdown-toggle, a{
    color: black;

    }

</style>


<div class="container rounded mt-3 mb-5" style="padding: 50px;color: white;">
    <div class="row ">
        <div class="col-lg-8">
              <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        foreach ($banner as $slider_post) {
                            ?>
                            <li><a href=" "><img src="<?php echo base_url() ?>assets/images/banners/<?php echo $slider_post->image ?>" alt=""/></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
        </div>
        <div class="col-lg-4">
             <img onClick="document.getElementById('discounted').scrollIntoView();" style="height: 100%;width: 100%;" src="<?php echo base_url('assets/Social_Teaser.gif') ?>">
            
        </div>
    </div>

    <section id="featured-items">
        <div class="row mt-5">
            <?php if($product1): ?>
            <?php
            $counter = 0; 
            foreach ($product1 as $row): ?>
            <div class="py-4 col-md-2">
                    <div class="item py-2 <?=($counter ==0)? "active" :"" ?>" >
                        <div class="product" >                    
                            <div class="card shadow-sm border-2" style="height:430">
                                <div class="card-img-top">
                                <a href="<?php echo $row->id ?>">
                                    <img class ="img-thumbnail" src="<?php echo base_url('assets/images/products/'.$row->image) ?>" >
                                    <input type="hidden" value="<?php echo base_url('assets/images/products/'.$row->image) ?>">
                                </a>
                                </div>

                                <div class="card-body text-center">
                                    <div class="row-3">
                                        <h4 class="font-montse font-size-14"><a href="<?php echo site_url('product/details/'.$row->id)?>"><?php echo $row->name ?></a></h4>
                                        <input type="hidden" name='categories_id' value="<?php echo $row->categories_id ?>">
                                    </div>
                                    <div class="row-3">
                                        <div class="d-flex justify-content-center color-secondary font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <div class="price">
                                            <span class="text color-primary fw-bold">P<?php echo $row->price ?></span>
                                            <input type="hidden" min="1" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <?php if(!$row->qty == 0): ?>
                                    <a class="btn btn-success" href="<?php echo site_url('product/details/'.$row->id)?>"> Details</a>
                                    <?php else: ?>
                                    <a class="btn btn-danger" href="<?php echo site_url('product/details/'.$row->id)?>"> Out of Stock</a>
                                    <?php endif; ?>

                                </div>
                            </div>
                         </div>
                    </div>
            </div>
             <?php endforeach; ?> 
        <?php else: ?>
        <?php endif; ?>
        </div>
        <div class="d-flex align-items-center justify-content-center" >
            <a href="<?php echo base_url('home/allproduct') ?>" class="text font-montse fw-bold" style="font-size:60px;">Click here to See All Items...</a>
              
        </div>
    </section>

    <div class="row">
        <section id="discounted">
        <div class="row" >
                <img src="<?php echo base_url('assets/flash2.png') ?>">
        </div>
        </section>
        <div class="row mt-4"  >
            <?php if($sale_product): ?>
            <?php
            $counter = 0; 
            foreach ($sale_product as $row): ?>
            <div class="py-4 col-md-2">
                    <div class="item py-2 <?=($counter ==0)? "active" :"" ?>" >
                        <div class="product" >                    
                            <div class="card shadow-sm border-2" style="height:430; border-color:#EC028C">
                                <div class="card-img-top">
                                <a href="<?php echo $row->id ?>">
                                    <img class ="img-thumbnail" src="<?php echo base_url('assets/images/products/'.$row->image) ?>" >
                                    <input type="hidden" value="<?php echo base_url('assets/images/products/'.$row->image) ?>">
                                </a>
                                </div>
                                
                                <div class="card-body text-center">
                                    <div class="row-3">
                                        <h4 class="font-montse font-size-14"><a href="<?php echo site_url('product/details/'.$row->id)?>"><?php echo $row->name ?></a></h4>
                                        <input type="hidden" name='categories_id' value="<?php echo $row->categories_id ?>">
                                    </div>
                                    <div class="row-3">
                                        <div class="d-flex justify-content-center color-secondary font-size-12">
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="fas fa-star"></i></span>
                                            <span><i class="far fa-star"></i></span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                            <span class="text color-primary"><strike>P<?php echo $row->price ?></strike></span>
                                            <h2 class="text-danger">P<?php echo $row->last_price ?></h2>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-center">
                                    <a class="btn btn-success" href="<?php echo site_url('product/details/'.$row->id)?>"> Details</a>
                                </div>
                            </div>
                         </div>
                    </div>
            </div>
             <?php endforeach; ?> 
        <?php else: ?>
        <?php endif; ?>
        </div>
        <div class="d-flex align-items-center justify-content-center" >
            <a href="<?php echo base_url('home/flash_sale') ?>" class="text font-montse fw-bold" style="font-size:60px;">Click here to See more</a>
              
        </div>
    </div>
</div>
