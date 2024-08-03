 

<div class="container rounded bg-white mt-3 mb-3" style="padding: 50px;">
        <div class="row">
            <div class="col ">
                <div class="d-flex align-items-center justify-content-center">
                <h1 class="text-dark">
                    <?php echo $catname; ?>
                </h1>
                </div>
            </div>
        </div>
        <section id="featured-items">
            <div class="container ">
            <div class="row">
                <!-- Start Single Category -->
                <?php if($product): ?>
                <?php
                $counter = 0; 
                foreach ($product as $row): ?>
                <div class=" py-4 col-md-2">
                        <div class="item py-2 <?=($counter ==0)? "active" :"" ?>" >
                            <div class="product" >                    
                                <div class="card shadow-sm border-2" style="height:430">
                                    <div class="card-img-top">
                                    <input name=" pid" type="hidden" value="<?php echo $row->categories_id ?>">
                                    <input  type="hidden" value="<?php echo $row->id ?>">
                                    <a href="<?php echo $row->id ?>">
                                        <img class ="img-thumbnail" src="<?php echo base_url('assets/images/products/'.$row->image) ?>" >
                                        <input type="hidden" name="product_image" value="<?php echo base_url('assets/images/products/'.$row->image) ?>">
                                    </a>
                                    </div>
                                    <div class="text-center">
                                        <div class="card-body">
                                            <h4 class="font-montse font-size-14"><a href="<?php echo site_url('product/details/'.$row->id)?>"><?php echo $row->name ?></a></h4>
                                            <input type="hidden" name="product_name" value="">
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

                                    <input type="hidden" name="product_id" value="">
                                </div>
                                </div>
                             </div>
                        </div>

                </div>
                <!-- End Single Category -->
                 <?php endforeach; ?> 
            <!-- <?php echo $link; ?> -->
            <?php else: ?>
            <?php endif; ?>
            </div>
            </div>
        </section>

        <div class="row">
        <section id="discounted">
        <div class="row" >
                <img src="<?php echo base_url('assets/flash2.png') ?>">
        </div>
        </section>
    <div class="row mt-4"  >
            <!-- Start Single Category -->
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
            <!-- End Single Category -->
             <?php endforeach; ?> 
        <?php else: ?>
        <?php endif; ?>
        </div>
    </div>
</div>

 