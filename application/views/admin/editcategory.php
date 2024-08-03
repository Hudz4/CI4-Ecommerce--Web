<div class="container-fluid">
<div class="container-fluid pt-4 px-4">
	    <div class="row">
	      <div class="col-xl-12">
	      <!-- <form method="POST"> -->
	      	<?php echo form_open_multipart('admin/updatecategory','','') ?>
		       <div class="card shadow-lg mx-auto" style="width: 600px;height:200px;background-color:white;">
		        <div class="card-header color-secondary-bg" >
		            <div class="col-6">
		            	<h2 class="box-title font-Montse" style="color:white">Edit Category</h2>
		            </div>
		      </div>
		      <input name="cid" type="hidden" value="<?php echo $category[0]['cat_id'] ?>">
		      <div class="card-body wd-auto" >
		      	<?php echo form_input('categoryName',$category[0]['category'],'class="form-control" required'); ?>
		      </div>
		       <div class="card-footer">
		        <?php echo form_submit('Update Category','Update Category','href="admin/updatecategory" class="btn btn-success"') ?>

		        <a class="btn btn-secondary" href="<?php echo site_url('admin/category');?>">Cancel</a>
		    	</div>
		     </div>
		   <?php echo form_close(); ?>
	   <!-- </form> -->
	    </div>
	</div>
</div>
</div>
