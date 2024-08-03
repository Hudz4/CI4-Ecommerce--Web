<div class="container-fluid">
<div class="container-fluid pt-4 px-4">
    <div class="col-md-12 col-md-offset-2">
       <div class="card shadow-lg mx-auto" style="width: 600px;background-color: white;">
        <div class="card-header" style="background-color: var(--secondary);">
            <div class="text-center pt-2">
              <h2 class="box-title " style="color:white">Add Product</h2>
            </div>
        </div>
        <div class="card-body" >
             <?php echo form_open_multipart('admin/addProd','','') ?>

              <div class="form-group">
                 <label class=" form-control-label">Product Name</label>
                 <?php echo form_input('name','',array('placeholder'=>'Enter product name','class'=>'form-control','required'=>'required')); ?>
              </div>
            
              <div class="form-group">
                 <label class=" form-control-label">Price</label>
                 <?php echo form_input('price','',array('placeholder'=>'Enter product price','class'=>'form-control','required'=>'required')); ?>
              </div>

               <div class="form-group mt-2 ">
                <label class=" form-control-label">Sale?</label>
                <input class="checkbox" name="sale" type="checkbox" onchange="toggleDisable(this);" id="check">
              </div>
              <fieldset disabled="disabled"  id="field_set">
               <div class="form-group">
                 <label class=" form-control-label">New Price</label>
                 <?php echo form_input('last_price','',array('placeholder'=>'Enter New price','class'=>'form-control','required'=>'required')); ?>
              </div>
              </fieldset>
              <div class="form-group">
                <label class=" form-control-label">Category</label>
                 <?php 
                  $categoriesOptions = array();
                  foreach ($categoryOpt->result() as $category) {
                    $categoriesOptions[$category->cat_id]=$category->category;
                    
                  }
                  echo form_dropdown('categories_id',$categoriesOptions,'','class="form-control"');
                  ?>
              </div>

              <div class="form-group">
                 <label class=" form-control-label">Quantity</label>
                 <?php echo form_input('qty','',array('placeholder'=>'Enter quantity','class'=>'form-control','required'=>'required')); ?>
              </div>
            
               
              <div class="form-group">
                 <label class=" form-control-label">Image (jpeg,png,gif)</label>
                  <?php echo form_upload('image','','type="file" class="form-control" id="image"') ?>
              </div>
                
                <div class="d-flex align-items-center justify-content-center mt-4">
                    <div style='overflow: hidden;' class='row'>
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
               

               <div class="form-group">
                 <label class=" form-control-label">Description</label>
                 <?php echo form_textarea('description','',array('placeholder'=>'Enter product price','class'=>'form-control','required'=>'required', 'style'=>'height:100px;')); ?>
              </div>

              <div class='file-path-wrapper'>
                    <?php echo form_hidden('path','image','type="file" id="path" class="file-path validate"') ?>
                </div>
             
          </div>
         <div class="card-footer">
             <?php echo form_submit('Add product','Add product','href="" onclick="myFunction()" class="btn btn-success"');
                ?>
            <a class="btn btn-secondary" href="<?php echo site_url('admin/product');?>">Cancel</a>
         </div>
        </div>
    <?php echo form_close(); ?>
    </div>
</div>
</div>