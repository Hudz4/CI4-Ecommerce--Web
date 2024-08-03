
<?php 

  require 'header.php';

    if(isset($_GET['type'])){
    $type=$_GET['type'];
    if($type=='status'){
      $operation=$_GET['operation'];
      $id=$_GET['id'];

      $update_status_sql="update category where cat_id='$id'";
      mysqli_query($con,$update_status_sql);
    }
    
    if($type=='delete'){
      $id=$_GET['id'];
      $delete_sql="delete from category where cat_id='$id'";
      mysqli_query($con,$delete_sql);
      $_SESSION['message'] = 'Deleted Successfulley';
    }
  }

   $sql="select * from category order by category asc";
   $res=mysqli_query($con,$sql);

?>

  <main id='content' style="margin: 0 5rem; ">
      <div class="container-fluid">

          <div class="row">
            <div class="col-xl-12">
             <div class="card shadow-lg flex" style="border-radius: 2rem;">
              <div class="card-header color-primary-bg" >
                  <div class="col-6">
                  <h2 class="box-title font-Montse" style="color:white">Categories</h2>
                  </div>
                  <div class="col-6">
                  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#myModal"><h5 class="font-Montse" style="margin-bottom: 0.1rem;"><i class="fas fa-plus"></i>Add Categories</h5></button>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header" style="background-color: green;">
                                    <h5 class="modal-title" style="color: white;">Enter Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="configcategory.php">
                                        <div class="mb-3">
                                            <input type="text" class="form-control" placeholder="Enter Category" name="categories" required>
                                        </div> 
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="submit" class="btn btn-success">submit</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                </div>
                                </form>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card-body h-auto">
              <div class="table-stats order-table ov-h">
                  <table class="table ">
                   <thead>
                    <tr>
                       <th class="serial">#</th>
                       <th>ID</th>
                       <th>Categories</th>
                       <th></th>
                    </tr>
                   </thead>
                   <tbody>
                    <?php 
                    include 'condition.php';
                    while($row=mysqli_fetch_assoc($res)){?>
                    <tr>
                       <td class="serial"></td>
                       <td><?php echo $row['cat_id']?></td>
                       <td><?php echo $row['category']?></td>
                       <td>
                        <?php

                        echo "<a class='btn btn-success' href='configcategory.php?id=".$row['cat_id']."'>Edit</a>&nbsp;";
                        
                        echo "<a class='btn btn-secondary' href='?type=delete&id=".$row['cat_id']."'>Delete</a>";
                        
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
  require 'footer.php';
?>