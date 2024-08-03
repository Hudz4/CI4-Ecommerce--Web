<?php
ob_start();
require'header.php';

$categories_id='';
$name='';
$mrp='';
$price='';
$qty='';
$image='';
$short_desc ='';
$description  ='';
$meta_title ='';
$meta_desc  ='';
$meta_keyword='';
$best_seller='';
$sub_categories_id='';

  $msg='';
  $image_required='required';
  if(isset($_GET['id']) && $_GET['id']!=''){
  $image_required='';
  $id=$_GET['id'];
  $res=mysqli_query($con,"select * from produkto where id='$id'");
  $check=mysqli_num_rows($res);
	  if($check>0){
	    $row=mysqli_fetch_assoc($res);
	    $categories_id=$row['categories_id'];
	    $sub_categories_id=$row['sub_categories_id'];
	    $name=$row['name'];
	    $mrp=$row['mrp'];
	    $price=$row['price'];
	    $qty=$row['qty'];
	    $short_desc=$row['short_desc'];
	    $description=$row['description'];
	    $meta_title=$row['meta_title'];
	    $meta_desc=$row['meta_desc'];
	    $meta_keyword=$row['meta_keyword'];
	    $best_seller=$row['best_seller'];
	  }else{
	    header('location:configproduct.php');
	    die();
	  }
}

  if(isset($_POST['submit'])){
  $categories_id=$_POST['categories_id'];
  $sub_categories_id=$_POST['sub_categories_id'];
  $name=$_POST['name'];
  $mrp=$_POST['mrp'];
  $price=$_POST['price'];
  $qty=$_POST['qty'];
  $short_desc=$_POST['short_desc'];
  $description=$_POST['description'];
  $meta_title=$_POST['meta_title'];
  $meta_desc=$_POST['meta_desc'];
  $meta_keyword=$_POST['meta_keyword'];
  $best_seller=$_POST['best_seller'];
  
  $res=mysqli_query($con,"select * from produkto where name='$name'");
  $check=mysqli_num_rows($res);
  if($check>0){
    if(isset($_GET['id']) && $_GET['id']!=''){
      $getData=mysqli_fetch_assoc($res);
      if($id==$getData['id']){
      
      }else{
        $msg="Product already exist";
      }
    }else{
      $msg="Product already exist";
    }
  }
  
  if(isset($_GET['id']) && $_GET['id']==0){
    if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
      $msg="Please select only png,jpg and jpeg image formate";
    }
  }else{
    if($_FILES['image']['type']!=''){
        if($_FILES['image']['type']!='image/png' && $_FILES['image']['type']!='image/jpg' && $_FILES['image']['type']!='image/jpeg'){
        $msg="Please select only png,jpg and jpeg image formate";
      }
    }
  }
  
  if($msg==''){
    if(isset($_GET['id']) && $_GET['id']!=''){
      if($_FILES['image']['name']!=''){
        $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/product/'.$image);
        $update_sql="update produkto set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
      }else{
        $update_sql="update produkto set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
      }
      mysqli_query($con,$update_sql);
    }else{
      $image=rand(111111111,999999999).'_'.$_FILES['image']['name'];
      move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/product/'.$image);
      mysqli_query($con,"insert into produkto(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,best_seller,sub_categories_id) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$best_seller','$sub_categories_id')");
    }
    header('location:products.php');
    die();
  }
}


?>


<div class="container-fluid ">

          <div class="row">
            <div class="col-xl-12">
            <form method="POST">
             <div class="card shadow-lg mx-auto" style="width: 600px;height:1100px;border-radius: 2rem;">
              <div class="card-header color-primary-bg" >
                  <div class="col-6">
                  	<h2 class="box-title font-Montse" style="color:white">Edit Product</h2>
                  </div>
            </div>
            <div class="card-body" >
            	<div class="form-group">
                           <label for="categories" class=" form-control-label">Choose category</label>
                             <select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
                             <option >Select Categories</option>
                             <?php
                             $res1=mysqli_query($con,"select cat_id,category from category order by category  asc");
                             while($row1=mysqli_fetch_assoc($res1)){
                               if($row1['id2']==$categories_id){
                                 echo "<option value=".$row1['cat_id']." selected>".$row1['category']."</option>";
                               }else{
                                 echo "<option value=".$row1['cat_id'].">".$row1['category']."</option>";
                               }
                             }
                             ?>
                             </select> 
                           </div>

                                 <label for="categories" class=" form-control-label">Sub Categories</label>
                                 <select class="form-control" name="sub_categories_id" id="sub_categories_id">
                                   <option>Select Sub Category</option>
                                 </select>
                   
                         
                                 <label for="categories" class=" form-control-label">Product Name</label>
                                 <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name?>">
                          
                            
                                 <label for="categories" class=" form-control-label">Discounted?</label>
                                 <select class="form-control" name="best_seller" required>
                                   <option value=''>Select</option>
                                   <?php
                                   if($best_seller==1){
                                     echo '<option value="1" selected>Yes</option>
                                       <option value="0">No</option>';
                                   }elseif($best_seller==0){
                                     echo '<option value="1">Yes</option>
                                       <option value="0" selected>No</option>';
                                   }else{
                                     echo '<option value="1">Yes</option>
                                       <option value="0">No</option>';
                                   }
                                   ?>
                                 </select>

 
                                 <label for="categories" class=" form-control-label">MRP</label>
                                 <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp?>">
                   
            
                                 <label for="categories" class=" form-control-label">Price</label>
                                 <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price?>">
               
                               
                     
                                 <label for="categories" class=" form-control-label">Quantitty</label>
                                 <input type="text" name="qty" placeholder="Enter qty" class="form-control" required value="<?php echo $qty?>">
                            
                               
          
                                 <label for="categories" class=" form-control-label">Image</label>
                                 <input type="file" name="image" class="form-control" <?php echo  $image_required?>>
                       
                               
                
                                 <label for="categories" class=" form-control-label">Short Description</label>
                                 <textarea name="short_desc" placeholder="Enter product short description" class="form-control" required><?php echo $short_desc?></textarea>
                      
                         
                                 <label for="categories" class=" form-control-label">Description</label>
                                 <textarea name="description" placeholder="Enter product description" class="form-control" required><?php echo $description?></textarea>
                      
                               
                 
                                 <label for="categories" class=" form-control-label">Meta Title</label>
                                 <textarea name="meta_title" placeholder="Enter product meta title" class="form-control" style="resize:none"><?php echo $meta_title?></textarea>
                 
                               
                      
                                 <label for="categories" class=" form-control-label">Meta Description</label>
                                 <textarea name="meta_desc" placeholder="Enter product meta description" class="form-control"><?php echo $meta_desc?></textarea>
                         
                               
                    
                                 <label for="categories" class=" form-control-label">Meta Keyword</label>
                                 <textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"><?php echo $meta_keyword?></textarea>
                   
                       </div>
                     <div class="modal-footer">
                         <button type="submit" name="submit" class="btn btn-success">Submit</button>
                         <a type="button" class="btn btn-danger" href="products.php" >Cancel</a>
                     </div>
            </div>
             <div class="card-footer">
	        </div>
           </div>
         </form>
          </div>
      </div>
    </div>
 <script>
    function get_sub_cat(sub_cat_id){
      var categories_id=jQuery('#categories_id').val();
      jQuery.ajax({
        url:'getsubcat.php',
        type:'post',
        data:'categories_id='+categories_id+'&sub_cat_id='+sub_cat_id,
        success:function(result){
          jQuery('#sub_categories_id').html(result);
        }
      });
    }
  </script>

         
<?php
require 'footer.php';
?>

 <script>
  <?php
  if(isset($_GET['id'])){
  ?>
  get_sub_cat('<?php echo $sub_categories_id?>');
  <?php } ?>
  </script>
