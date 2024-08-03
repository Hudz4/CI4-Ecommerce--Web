

<div class="container rounded mt-3 mb-5" style="padding: 50px;color: white;">
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
</section>
<div class="d-flex align-items-center justify-content-center">
        <h3><?php echo $link_products; ?></h3>
    </div>
</div>