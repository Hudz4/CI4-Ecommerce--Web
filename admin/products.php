
<?php 
  ob_start();
  require 'header.php';

  if(isset($_GET['type'])){
  $type=$_GET['type'];
  if($type=='status'){
    $operation=$_GET['operation'];
    $id=$_GET['id'];
    if($operation=='active'){
      $status='1';
    }else{
      $status='0';
    }
    $update_status_sql="update produkto set status='$status' where id='$id'";
    mysqli_query($con,$update_status_sql);
  }
  
  if($type=='delete'){
    $id=$_GET['id'];
    $delete_sql="delete from produkto where id='$id'";
    mysqli_query($con,$delete_sql);
  }
  }

$sql="select produkto.*,category.category from produkto,category where produkto.categories_id=category.cat_id order by produkto.id desc";
$res=mysqli_query($con,$sql);


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
    header('location:products.php');
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

    <style type="text/css">
        .img{
          height: 10px;
          width: 20px;
        }

    </style>

  <main id='content' style="margin: 0 5rem; ">
      <div class="container-fluid">
          <div class="row">
            <div class="col">
             <div class="card shadow-lg" style="border-radius: 2rem;">
              <div class="card-header color-primary-bg" >
                  <div class="col-6">
                  <h2 class="box-title font-Montse" style="color:white">Products</h2>
                  </div>
                  <div class="col-6">
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"><h5 class="font-Montse" style="margin-bottom: 0.1rem;"><i class="fas fa-plus"></i>&nbspAdd Product</h5></button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-lg">
                              <div class="modal-content">
                                <div class="modal-header" style="background-color: green;">
                                    <h5 class="modal-title" style="color: white;">Enter Product</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body h-auto">
                                  <div>
                                    <form method="post"  enctype="multipart/form-data">
                                        <div class="md-3">
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
                                              </div>
                
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
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                              </div>
                              </div>
                        </div>
                      </div>
                </div>
            
            <div class="card-body h-auto">
              <div class="table-stats order-table">
                  <table class="table ">
                   <thead>
                    <tr>
                        <th class="serial">#</th>
                         <th width="2%">ID</th>
                         <th width="10%">Category</th>
                         <th width="30%">Name</th>
                         <th width="10%">Imahe</th>
                         <th width="10%">MRP</th>
                         <th width="7%">Price</th>
                         <th width="7%">Quantitty</th>
                         <th width="26%"></th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php
                    $i=1; 
                    while($row=mysqli_fetch_assoc($res)){?>
                    <tr>
                       <td class="serial"><?php echo $i?></td>
                       <td><?php echo $row['id']?></td>
                       <td><?php echo $row['category']?></td>
                       <td><?php echo $row['name']?></td>
                       <td><img class="rounded-4" style ="height: 100px;width: 100px;" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row['image']?>"/></td>
                       <td><?php echo $row['mrp']?></td>
                       <td><?php echo $row['price']?></td>
                       <td><?php echo $row['qty']?></td>
                       <td>
                        <?php

                        echo "<a class='btn btn-success' href='configproduct.php?id=".$row['id']."'>Edit</a>&nbsp;";
                        
                        echo "<a class='btn btn-secondary' href='?type=delete&id=".$row['id']."'>Delete</a>";
                        
                        ?>
                      
                       </td>
                    </tr>
                    <?php } ?>
                   </tbody>
                  </table>
                 </div>
            </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</main>
    
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

