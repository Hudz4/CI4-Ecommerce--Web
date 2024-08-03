
 
<?php
ob_start();
require 'header.php';



$categories='';
	$msg='';

	if(isset($_GET['id'])&& $_GET['id']!=''){
	$id=$_GET['id'];
	$res=mysqli_query($con,"select * from category where cat_id='$id'");
	$check=mysqli_num_rows($res);
	if($check>0){
		$row=mysqli_fetch_assoc($res);
		$categories=$row['category'];
	}else{
    	header('location:categories.php');
    	die();
	}
	}

	if(isset($_POST['submit'])){
	$categories=$_POST['categories'];
	$res=mysqli_query($con,"select * from category where category='$categories'");
	$check=mysqli_num_rows($res);
	if($check>0){
		if(isset($_GET['id'])&& $_GET['id']!=''){
			$get=mysqli_fetch_assoc($res);
			if($id==$get['id']){
			
			}else{

				$msg="Categories already exist";
			}
		}else{
			$msg="Categories already exist";
		}
	}
	
	if($msg==''){
		if(isset($_GET['id'])){
			mysqli_query($con,"update category set category='$categories' where cat_id='$id'");
			$_SESSION['message'] = 'Edited Successfulley';
		}else{
			mysqli_query($con,"insert into category(category,status) values('$categories','1')");
			$_SESSION['message'] = 'Added Successfulley';
	
		}
    	header('location:categories.php');
    	die();
	
	}
	}




?>
<div class="content ">

          <div class="row">
            <div class="col-xl-12">
            <form method="POST">
             <div class="card shadow-lg mx-auto" style="width: 600px;height:200px;border-radius: 2rem;">
              <div class="card-header color-primary-bg" >
                  <div class="col-6">
                  	<h2 class="box-title font-Montse" style="color:white">Edit Category</h2>
                  </div>
            </div>
            <div class="card-body wd-auto" >
            	<input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories?>">
            </div>
             <div class="card-footer">
	            <button type="submit" name="submit" class="btn btn-success">Submit</button>
	            <a class="btn btn-danger" href="categories.php">Cancel</a>
	        </div>
           </div>
         </form>
          </div>
      </div>
    </div>
