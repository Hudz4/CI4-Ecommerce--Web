

<div class="container-fluid">
      <div class="container-fluid pt-4 px-4">
                <div class="row">
                  <div class="col-xl-12">
                  <!-- <form method="POST"> -->
                    <?php echo form_open_multipart('admin/addcategory','','') ?>
                       <div class="card shadow-lg mx-auto" style="width: 600px;height:200px;background-color: white;">
                        <div class="card-header color-secondary-bg" >
                            <div class="col-6">
                                <h2 class="box-title font-Montse" style="color:white">Add Category</h2>
                            </div>
                      </div>
                      <div class="card-body wd-auto" >
                        <?php echo form_input('categoryName','','class="form-control" required'); ?>
                      </div>
                       <div class="card-footer">
                        <?php echo form_submit('Add category','Add category','href="admin/category" class="btn btn-success"');

                        ?>

                        <a class="btn btn-secondary" href="<?php echo site_url('admin/category');?>">Cancel</a>
                        </div>
                     </div>
                   <?php echo form_close(); ?>
               <!-- </form> -->
                </div>
            </div>
        </div>
</div>