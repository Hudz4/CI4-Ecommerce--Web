    
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
    </div>
    <div class="d-flex align-items-center justify-content-center">
        <h3><?php echo $link_sale; ?></h3>
    </div>
</div>