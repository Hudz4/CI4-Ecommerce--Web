<style type="text/css">
   
 
</style>


<div class="container-fluid pt-4 px-4">
    <div class="color-primary-bg text-center rounded p-4">
        <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex text-center p-3 ">
            <a class='btn btn-primary' style="padding-right: 10px;" href="<?php echo base_url('admin/index')?>">Go back</a>
            </div>
            <?php foreach($cart_details as $row ) :?>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="yourclass   mb-5" style="height: 50%;width: 50%;" src="<?php echo base_url('assets/images/products/'.$row->image) ?>">
                <span class="font-weight-bold"><strong><?php echo $row->name ?> </strong></span>

            </div>
            <?php endforeach; ?>
        </div>
        <div class="col-md-4">
            <fieldset disabled="disabled"  id="field_set2">
            <?php echo form_open_multipart('home/updateAcc','','') ?>
            <div class="p-3 py-5">
                <?php foreach($cart_details as $row ) :?>
                <div class="d-flex justify-content-between align-items-center experience">
                <h4>Order Details</h4>
                </div><br>


                <div class="col-md-12">
                    <label class="labels">Product price</label>
                     <?php echo form_input('email',$row->price,array('class'=>'form-control','type'=>'text')); ?>
                </div>

                <div class="col-md-12">
                    <label class="labels">Product total</label>
                     <?php echo form_input('username',$row->total,array('class'=>'form-control','type'=>'text')); ?>
                </div>
                <div class="col-md-12">
                    <label class="labels">Product Quantity</label>
                    <?php echo form_input('password',$row->quantity,array('class'=>'form-control','type'=>'password')); ?>
                </div>

                <div class="col-md-12">
                    <label class="labels">Product status</label>
                     <?php echo form_input('name',$row->status,array('class'=>'form-control','type'=>'text')); ?>
                </div>

  
                <?php endforeach; ?>
 
            </div>
            <?php echo form_close(); ?>
            </fieldset>
        </div>

        <div class="col-md-5 border-right">
        <fieldset disabled="disabled"  id="field_set">
 
            <div class="p-3 py-5">
                <?php if($shipping_info): ?>
                <?php foreach($shipping_info as $list) :?>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Shipping info</h4>
                </div>
    
                <div class="row mt-3">
                    <div class="col-md-12">
                        <label class="labels">Mobile Number</label>
                        <?php echo form_input('phone',$list->shipping_phone,array('class'=>'form-control','type'=>'text','placeholder'=>$list->shipping_phone)); ?>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Shipping Email</label>
                        <?php echo form_input('email',$list->shipping_email,array('class'=>'form-control','type'=>'text','placeholder'=>$list->shipping_phone)); ?>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Street / Village</label>
                        <?php echo form_input('street',$list->shipping_street,array('class'=>'form-control','type'=>'text','placeholder'=>$list->shipping_street)); ?>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">City</label>
                        <?php echo form_input('city',$list->shipping_city,array('class'=>'form-control','type'=>'text','placeholder'=>$list->shipping_city)); ?>
                    </div>
                    <div class="col-md-12">
                        <label class="labels">Zipcode</label>
                        <?php echo form_input('zipcode',$list->shipping_zipcode,array('class'=>'form-control','type'=>'number','placeholder'=>$list->shipping_zipcode)); ?>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <?php echo form_input('country',$list->shipping_phone,array('class'=>'form-control','type'=>'text','placeholder'=>$list->shipping_country)); ?>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">State / Region</label>
                            <?php echo form_input('region',$list->shipping_phone,array('class'=>'form-control','type'=>'text','placeholder'=>$list->shipping_region)); ?>
                        </div>
                    </div>
            
                <div class="mt-4 text-center">
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>
            </div>
 
        </fieldset>
    
        </div>
         
    </div>
    </div>
</div>