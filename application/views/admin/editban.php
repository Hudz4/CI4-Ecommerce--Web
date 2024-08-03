


<div class="container-fluid">
  <div class="container-fluid pt-4 px-4">
    <div class="content-wrapper">
      <div class="d-flex align-items-center justify-content-center">
      <div class="col-md-6 col-md-offset-2">
        <div class="card shadow-lg mx-auto" style=" background-color: white;">
            <div class="card-header" style="background-color:var(--secondary);">
                    <h2 class="box-title  mt-2" style="color:white">Edit Banner</h2>
            </div>
            <div class="card-body"  >
              <?php echo form_open_multipart('admin/updateban','','') ?>
                  <div class='row'>
                    <h6 class="text-danger">
                          <?php
                             echo $upload_error = $this->session->flashdata('upload_error');
                          ?>
                          </h6>
                            <div class='file-field input-field col s12'>
                                    <?php echo form_hidden('banner_id',$banner[0]['banner_id']) ?>
                                    <?php echo form_hidden('OldImg',$banner[0]['image']) ?>
                                <div class="form-group">
                                    <label>Banner name</label>
                                    <?php echo form_input('name',$banner[0]['bName'],'type="text" class="form-control" ') ?>
                                </div>

                                <div class="form-group">
                                    <label>Image ( jpg | gif | jpeg )</label>
                                    <?php echo form_upload('image','','type="file" class="form-control" id="image"') ?>
                                </div>
 
                                <div class='file-path-wrapper'>
                                    <?php echo form_hidden('path','image','type="file" id="path" class="file-path validate"') ?>
                                </div>
                                <span class='red-text'> <?php echo form_error('path'); ?> </span>
                            </div>
                         </div> <!--<div class='row'> completes here-->
   
                             
                        <!--Image Preview-->
                        <div style='overflow: hidden;' class='row'>
                            <div class='col s12'>
                                <img src="" class="crop" id="dp_preview" />
                                <input type="hidden" id="x" name="x" />
                                <input type="hidden" id="y" name="y" />
                                <input type="hidden" name="x2" id="x2" />
                                <input type="hidden" name="y2" id="y2" />
                                <input type="hidden" id="w" name="w" />
                                <input type="hidden" id="h" name="h" />
                            </div>
                        </div>
                </div>
              <div class="card-footer">
                <button type='submit' name='btn_add_brnd' class='btn btn-success'>Edit Banner</button>
                <button class="btn btn-secondary" href="<?php echo site_url('admin/banner');?>">Cancel</button>
            </div>
              <?php echo form_close(); ?>  
           </div>

        </div>
         <div class="col-md-6   ">
            <img class="image " src="<?php echo base_url('assets/images/banners/'.$banner[0]['image']); ?>" style="height: 300px;width: 600px;padding: 10;">
        </div>
      </div>
    </div>
  </div>
  
</div>

