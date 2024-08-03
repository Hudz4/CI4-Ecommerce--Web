<?php
ob_start();
require('header.php');
    
    if(isset($_GET['type'])){
    $type=$_GET['type'];
    if($type=='status'){
      $operation=$_GET['operation'];
      $id=$_GET['id'];

        $update_status_sql="update subcategory where subcat_id='$id'";
        mysqli_query($con,$update_status_sql);
    }
    
    if($type=='delete'){
        $id=$_GET['id'];
        $delete_sql="delete from subcategory where subcat_id='$id'";
        mysqli_query($con,$delete_sql);
        $_SESSION['message'] = 'Deleted Successfulley';
    }
}

$sql="select subcategory.*,category.category from subcategory,category where category.cat_id=subcategory.cat_id order by subcategory.subcategory asc";
$res=mysqli_query($con,$sql);
?>

<main id='content' style="margin: 0 5rem; ">
      <div class="container-fluid">

          <div class="row">
            <div class="col-xl-12">
             <div class="card shadow-lg flex" style="border-radius: 2rem;">
              <div class="card-header color-primary-bg" >
                  <div class="col-6">
                  <h2 class="box-title font-Montse" style="color:white">Sub Categories</h2>
                  </div>
                  <div class="col-6">
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"><h5 class="font-Montse" style="margin-bottom: 0.1rem;"><i class="fas fa-plus"></i>&nbsp Add Sub Categories</h5></button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header color-primary-bg">
                                    <h5 class="modal-title text-white">Enter Sub Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="configsubcategory.php">
                                        <div class="md-3">
                                          <label for="categories" class=" form-control-label">Choose category</label>
                                            <select name="categories_id" required class="form-control ">
                                            <option value="">Select Categories</option>
                                            <?php
                                            $res1=mysqli_query($con,"select * from category");
                                            while($row1=mysqli_fetch_assoc($res1)){
                                              if($row1['id2']==$categories){
                                                echo "<option value=".$row1['cat_id']." selected>".$row1['category']."</option>";
                                              }else{
                                                echo "<option value=".$row1['cat_id'].">".$row1['category']."</option>";
                                              }
                                            }
                                            ?>
                                            </select> 
                                        </div>
                                            <label for="categories" class=" form-control-label">Sub Category</label>
                                            <input type="text" class="form-control" placeholder="Enter Sub Category" name="sub_categories" required>

                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit1" class="btn btn-success">Submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                </form>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card-body h-auto wd-auto">
              <div class="table-stats order-table ov-h">
                  <table class="table ">
                   <thead>
                    <tr>
                       <th class="serial">#</th>
                       <th>ID</th>
                       <th>Categories</th>
                       <th>Sub Categories</th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                    while($row=mysqli_fetch_assoc($res)){?>
                    <tr>
                       <td class="serial"></td>
                       <td><?php echo $row['subcat_id']?></td>
                       <td><?php echo $row['category']?></td>
                       <td><?php echo $row['subcategory']?></td>
                       <td class="btn g-4">
                        <?php

                        echo "<a class='btn btn-success' href='configsubcategory.php?id=".$row['subcat_id']."'>Edit</a>&nbsp;";
                        
                        echo "<a class='btn btn-secondary' href='?type=delete&id=".$row['subcat_id']."'>Delete</a>";
                        
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
    
<?php
require('footer.php');
?>