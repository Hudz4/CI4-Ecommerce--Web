<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <?php if($this->session->userdata('id')): ?>
            <?php foreach($results as $row ) :?>
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="yourclass rounded-circle mb-5" style="height: 200px;width: 200px;" src="<?php echo base_url('assets/images/users/'.$row->image) ?>">
                <span class="font-weight-bold"><?php echo $row->name ?></span><span class="text-black-50"><?php echo $row->email ?></span><span> </span></div>
            <?php endforeach; ?>
            <?php else:  ?>
            <?php endif; ?>
        </div>

        <div class="col-md-5 border-right">
        <input class="checkbox" type="checkbox" onchange="toggleDisable(this);" id="check"> 
            Enable Profile Edit
        <fieldset disabled="disabled"  id="field_set">
            <?php echo form_open_multipart('home/updateprofile','','') ?>
            <div class="p-3 py-5">
                <?php if($shipping): ?>
                <?php foreach($shipping as $list) :?>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
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
                <?php echo form_submit('Save profile','Save profile','href="" class="btn btn-success" type="button"'); ?>
                </div>
                <?php endforeach; ?>
                <?php else: ?>
                <?php endif; ?>
            </div>
            <?php echo form_close(); ?>
        </fieldset>
    
        </div>
        <div class="col-md-4">
            <input class="checkbox" type="checkbox" onchange="toggleDisable2(this);" id="check2"> 
            Enable Account Edit
            <fieldset disabled="disabled"  id="field_set2">
            <?php echo form_open_multipart('home/updateAcc','','') ?>
            <div class="p-3 py-5">
                <?php if($this->session->userdata('id')): ?>
                <?php foreach($results as $row ) :?>
                <div class="d-flex justify-content-between align-items-center experience">
                <h4>Account</h4>
                    <?php echo form_submit('Save','Save account','href="" class="btn btn-success" type="button"'); ?>
                </div><br>

                <div class="col-md-12">
                    <label class="labels">Name</label>
                     <?php echo form_input('name',$row->name,array('class'=>'form-control','type'=>'text','placeholder'=>$row->name)); ?>
                </div>

                <div class="col-md-12">
                    <label class="labels">Email</label>
                     <?php echo form_input('email',$row->email,array('class'=>'form-control','type'=>'text','placeholder'=>$row->email)); ?>
                </div>

                <div class="col-md-12">
                    <label class="labels">Username</label>
                     <?php echo form_input('username',$row->username,array('class'=>'form-control','type'=>'text','placeholder'=>$row->username)); ?>
                </div>
                <div class="col-md-12">
                    <label class="labels">Password</label>
                    <?php echo form_input('password',$row->password,array('class'=>'form-control','type'=>'password','placeholder'=>$row->password)); ?>
                </div>

               <div class="form col-md-12">
                    <label class="labels">Profile picture ( Image should be 1 : 1 ratio) </label>
                    <?php echo form_upload('image','','type="file" class="form-control" id="image"'); ?>
                </div>
                <div class="d-flex align-items-center justify-content-center  mt-2">
                    <div class="row">
                        <div class='col s12'>
                            <img src="" class="crop1" id="dp_preview1" />
                            <input type="hidden" id="x" name="x" />
                            <input type="hidden" id="y" name="y" />
                            <input type="hidden" name="x2" id="x2" />
                            <input type="hidden" name="y2" id="y2" />
                            <input type="hidden" id="w" name="w" />
                            <input type="hidden" id="h" name="h" />
                        </div>
                    </div>
                </div>

                <div class='file-path-wrapper'>
                    <?php echo form_hidden('path','image','type="file" id="path" class="file-path validate"') ?>
                </div>

                <img id="croppedImg">
                <div class="col-md-12" id="previewLoad" style='margin-left: 0px; display: none'>
                    <img src=' '/>
                </div>
                <div class="image_preview col-md-5   " >
                </div>

                <?php endforeach; ?>
                <?php else:  ?>
                <?php endif; ?>
            </div>
            <?php echo form_close(); ?>
            </fieldset>
        </div>

    </div>
    <div class="row">
        <div class=" rounded  p-4 text-center">
            <h4 class="mb-4">Your Order</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Order id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                         <th scope="col">Email</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($usertable): ?>
                    <?php foreach($usertable as $list) :?>
                    <tr>
                        <th scope="row"><?php echo $list->id ?></th>
                        <td><?php echo $list->name ?></td>
                        <td><?php echo $list->quantity ?></td>
                        <td><?php echo $list->price ?></td>
                        <td><?php echo $list->total ?></td>
                        <td><?php echo $list->date ?></td>
                        <td><?php echo $list->status ?></td>
                    </tr>
                    <?php endforeach; ?>
                     <?php else:  ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>





