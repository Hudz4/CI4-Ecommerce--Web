 
 <style type="text/css">
    td{
        font-family: 'Montserrat';
    }
    .return{
        margin-right: 30px;
    }


 </style>


 <div class="container py-3 my-3">
<?php echo form_open_multipart('home/add_to_cart','','') ?>
    <div class="row">
        <?php echo form_hidden('product_id',$detail[0]['id']) ?>
        <input name="oldImg" type="hidden" value="<?php echo $detail[0]['image'] ?>">
        <div class="col-sm-6" style="justify-content:space-between">
            <div class="d-flex align-items-center justify-content-center"> 
            <?php echo form_hidden('image',$detail[0]['image'],'') ?>
            <img name="image"  src="<?php echo base_url('assets/images/products/'.$detail[0]['image']); ?>" class="img-fluid">
            </div>
            <div class="form-group">
                <div class="col-6" style="padding: 10px">
                </div>
            </div>
        </div>
        <div class="col-sm-6 py-2">
            <?php echo form_hidden('name',$detail[0]['name'],'name') ?>
            <h5 class="font-baloo font-size-20" name="name"><?php echo $detail[0]['name'] ?></h5>
            <small class=" font-montse">by
            <?php 
                  foreach ($categoryOpt as $category) {
                  }
                  echo $category->category;
                  ?>  
             </small>
            <div class="d-flex">
                <div class="rating text-warning font-size-12">
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="fas fa-star"></i></span>
                    <span><i class="far fa-star"></i></span>
                </div>
                <a href="#" class="px-2 font-montse">20,534 ratings | 1000+ answered questions</a>
            </div>
            <hr class="m-2">

            <!---    product price       -->
            <table class="my-4">
                <tr class="font-montse font-size-14">
                    <td ><strong>Stock:</strong></td>
                    <?php echo form_hidden('stock',$detail[0]['id'],'') ?>
                    <td><?php echo $detail[0]['qty'] ?></td>
                </tr>
                <tr class="font-montse font-size-14 ">
                    <td ><strong>Deal Price:</strong></td>

                    <?php if($detail[0]['sale']==1): ?>
                    <?php echo form_hidden('price',$detail[0]['last_price'],'') ?>

                    <td class="font-size-20 text-danger">
                        P<span><?php echo $detail[0]['last_price'] ?></span><small class="text-dark font-size-12"><strike>P<span><?php echo $detail[0]['price'] ?></strike></small>
                    </td>
                    <?php else: ?>
                    <?php echo form_hidden('price',$detail[0]['price'],'') ?>
                    <td class="font-size-20 text-danger">P<span><?php echo $detail[0]['price'] ?></span><small class="text-dark font-size-12">&nbsp;&nbsp;Inclusive of all taxes</small></td>
                    <?php endif; ?>
                </tr>
   
            </table>
            <!---    !product price       -->

            <!--    #policy -->
            <div id="policy">
                <div class="d-flex">
                    <div class="return text-center mr-5" >
                        <div class="font-size-20 my-2 color-second">
                            <span class="fas fa-retweet border p-3 rounded-pill"></span>
                        </div>
                        <a href="#" class="font-montse font-size-14">10 Days <br> Replacement</a>
                    </div>
                    <div class="return text-center mr-5">
                        <div class="font-size-20 my-2 color-second">
                            <span class="fas fa-truck  border p-3 rounded-pill"></span>
                        </div>
                        <a href="#" class="font-montse font-size-14">Daily Tuition <br>Deliverd</a>
                    </div>
                    <div class="return text-center mr-5">
                        <div class="font-size-20 my-2 color-second">
                            <span class="fas fa-check-double border p-3 rounded-pill"></span>
                        </div>
                        <a href="#" class="font-montse font-size-14">1 Year <br>Warranty</a>
                    </div>
                </div>
            </div>
            <!--    !policy -->
            <hr>

            <!-- order-details -->
            <div id="order-details" class="font-montse d-flex flex-column text-dark">
                <small>Delivery by : Mar 29  - Apr 1</small>
                <small>Sold by <a href="#">Daily Electronics </a>(4.5 out of 5 | 18,198 ratings)</small>
                <small><i class="fas fa-map-marker-alt color-primary"></i>&nbsp;&nbsp;Deliver to Customer - 424201</small>
            </div>
            <!-- !order-details -->

            <div class="row">
                <div class="col-6">
            
                </div>
                <div class="row-3 py-2">
                    <div class="qty d-flex">
                        <h6 class="font-montse"><strong>Your quantity</strong></h6>
                        <div class="px-4 d-flex font-montse">
                            <?php if($quantity->result()): ?>
                            <?php 
                              foreach ($quantity->result() as $item): ?> 
                              <?php echo form_input('qty',$item->quantity,'class="form-control"','required="required"'); ?>
                            <?php endforeach; ?>
                            <?php else:?>  
                                <?php echo form_input('qty',''
                                ,array('class'=>'form-control', 'required'=>'required')); ?>
                            <?php endif; ?>  
                        </div>
                        <?php echo form_submit('Add to Cart','Add to Cart','href="" onclick="myFunction()" class="btn btn-success form-control "');
                         ?>
                    </div>
                </div>
            </div>

            <div class="size my-3">
                <h6 class="font-baloo">Size :</h6>
                <div class="d-flex justify-content-between w-75">
 
                </div>
            </div>
            <!-- !size -->


        </div>

        <div class="col-12">
            <h6 class="font-rubik">Product Description</h6>
            <hr>
            <p class="font-montse font-size-14"><?php echo $detail[0]['description'] ?></p>
        </div>
        <div class="col mb-5">
        </div>
    </div>
<?php echo form_close(); ?>
</div>