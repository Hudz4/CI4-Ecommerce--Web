<?php
ob_start();
require('header.php');

  $categories='';
  $msg='';
  $sub_categories='';

  if(isset($_GET['id'])){
  $id=$_GET['id'];
  $res=mysqli_query($con,"select * from subcategory where subcat_id='$id'");
  $check=mysqli_num_rows($res);
  if($check>0){
    $row=mysqli_fetch_assoc($res);
    $sub_categories=$row['subcategory'];
    $categories=$row['cat_id'];
  }else{
    $_SESSION['message'] = 'Deleted Successfulley';
    header('location:subcategory.php');
    die();
  }
  }

  if(isset($_POST['submit1'])){
    $categories=$_POST['categories_id'];
    $sub_categories=$_POST['sub_categories'];
    $res=mysqli_query($con,"select * from subcategory where subcategory='$sub_categories' and cat_id='$categories_id'");
    $check=mysqli_num_rows($res);
    if($check>0){
      if(isset($_GET['id'])){
        $getData=mysqli_fetch_assoc($res);
        if($id==$getData['id']){
        
        }else{

          $msg='Sub Category already exist';
        }
      }else{
        $msg='Sub Category already exist';
      }
    }
    if($msg==''){
      if(isset($_GET['id'])){
        mysqli_query($con,"update subcategory set subcategory='$sub_categories' where subcat_id='$id'");
        $_SESSION['message'] = 'Edited Successfulley';
      }else{
        
        mysqli_query($con,"insert into subcategory(cat_id,subcategory) values('$categories','$sub_categories')");
        $_SESSION['message'] = 'Added Successfulley';
      }
      header('location:subcategories.php');
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
                    <h4 class="box-title font-Montse" style="color:white">Edit Sub Category</h4>
                  </div>
            </div>
            <div class="card-body wd-auto h-auto" >
            	<input type="text" name="sub_categories" placeholder="Enter sub categories" class="form-control" required value="<?php echo $sub_categories?>">

            </div>
             <div class="card-footer">
	            <button type="submit" name="submit1" class="btn btn-success">Submit</button>
	            <a class="btn btn-danger" href="subcategories.php">Cancel</a>
	        </div>
           </div>
         </form>
          </div>
      </div>
    </div>


<?php

require 'footer.php';
?>
