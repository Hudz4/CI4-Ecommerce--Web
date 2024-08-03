<?php 
  require 'database2.php';
  require 'functionmain.php';
  require'add_to_cart.inc.php';

$wishlist_count=0;
$cat_res=mysqli_query($con,"select * from category where status=1 order by category asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
  $cat_arr[]=$row;  
}


if(isset($_SESSION['user_id'])){
  $uid=$_SESSION['user_id'];

  
  if(isset($_GET['cart2_id'])){
    $wid=get_safe_value($con,$_GET['cart2_id']);
    mysqli_query($con,"delete from cart2 where id='$wid' and user_id='$uid'");
  }

  $wishlist_count=mysqli_num_rows(mysqli_query($con,"select produkto.name,produkto.image,produkto.price,produkto.mrp,cart2.id from produkto,cart2 where cart2.product_id=produkto.id and cart2.user_id='$uid'"));
}
$obj=new add_to_cart();
$totalProduct=$obj->totalProduct();


$script_name=$_SERVER['SCRIPT_NAME'];
$script_name_arr=explode('/',$script_name);
$mypage=$script_name_arr[count($script_name_arr)-1];

$meta_title="My Ecom Website";
$meta_desc="My Ecom Website";
$meta_keyword="My Ecom Website";
if($mypage=='product.php'){
  $product_id=get_safe_value($con,$_GET['id']);
  $product_meta=mysqli_fetch_assoc(mysqli_query($con,"select * from produkto where id='$product_id'"));
  $meta_title=$product_meta['meta_title'];
  $meta_desc=$product_meta['meta_desc'];
  $meta_keyword=$product_meta['meta_keyword'];
}if($mypage=='contact.php'){
  $meta_title='Contact Us';
}

?>  

<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="ThriftHub">
  <meta name="author" content="Hudairie Musa">
  <meta name="keyword" content="ThriftHub">
  <link rel="shortcut icon" href="img/Icon.png">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

  <!-- font awesome icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

  <!--alertifyjs -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


    <title>ThriftHub</title>

    <style>
      <?php include "style.css" ?>
    </style>
  
    
</head>
<body>


  <nav class="navbar navbar-expand-lg py-3 shadow-lg p-3 mb-5" style="width:100%; padding-left: 3rem;  padding-right: 3rem;background-color: #231F20">

    <div class="container-fluid " >
      <a class="navbar-brand" href="index.php" >
          <img src="img/TH logo.png" alt="" width="150" height="justified" style="padding-top:10px  ">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-6 mb-lg-0">
          <!--_category-hover-->

            <div id="sticky-header-with-topbar" class="col">
                <div class="container-fluid">
                    <div class="row">
                                <div class="nav navbar-nav me-auto mb-6 mb-lg-0">

                                  <?php
                                      foreach($cat_arr as $list){
                                          ?>
                                          <li class="nav-item dropdown" id="navbarDropdown"><a class="nav-link dropdown-toggle font-Montse " href="categories.php?id=<?php echo $list['cat_id']?>"><?php echo $list['category']?></a>
                                          <?php
                                          $cat_id=$list['cat_id'];
                                          $sub_cat_res=mysqli_query($con,"select * from subcategory where cat_id='$cat_id'");
                                          if(mysqli_num_rows($sub_cat_res)>0){
                                          ?>
                                          
                                             <ul id="dropdownMenuButton1" class="dropdown-menu" >
                                                  <?php
                                                  while($sub_cat_rows=mysqli_fetch_assoc($sub_cat_res)){
                                                      echo '<li class="drowpdown-item" ><a href="categories.php?id='.$list['cat_id'].'&sub_categories='.$sub_cat_rows['subcat_id'].'">'.$sub_cat_rows['subcategory'].'</a></li>
                                                  ';
                                                  }
                                                  ?>
                                              </ul>

                                            </li>

                                              <?php } ?>
                                          <?php
                                      }
                                      ?>
                                      <div class="col" style="" >
                                          <form action="#" class="font-size-14 font-rale">
                                            <a href="cart.php">
                                                    <?php
                                                      if (isset($_SESSION['user_id'])){
                                                      ?>
                                                      <span class="font-size-16 text-white"><i class="fas fa-shopping-cart" style="padding-top: 10px;"></i></span>
                                                      <span class="text px-2 py-2" style="color:white">
                                                            <?php echo $wishlist_count?></span>

                                                      <?php
                                                      }else{
                                                        ?>
                             
                                                        <?php
                                                      }
                                                      ?>
                                                </a>        
                                            </form>
                                        </div>
                                   
                                          <?php
                                    if (isset($_SESSION['user_id'])){
                                      ?>
                                        
                                        <form action="search.php" method="GET" style="padding-left: 10px;padding-top: 5px;">
                                              <input placeholder="Search here... " type="text" name="str">
                                              <button type="submit"><i class="fa fa-search"></i></button>
                                          </form>
                                          <div class="col">
                                            <button class="btn btn-success dropdown-toggle relative" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="font-style: montse;"> 
                                              <?php
                                              include 'database.php';
                                              $user_id = $_SESSION['user_id'];
                                                 
                                              if(!isset($user_id)){
                                                 header('location:backend/login_db.php');
                                              };
                                                $select_user = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
                                                if(mysqli_num_rows($select_user) > 0){
                                                   $fetch_user = mysqli_fetch_assoc($select_user);
                                                };
                                                  echo $fetch_user['email'];
                                              ?>
                                            </button>
      
                                            <ul class="dropdown-menu " aria-labelledby="dropdownMenuButton1" >
                                               <li ><a href="backend/logout.php" style="letter-spacing: normal;">Logout</a></li>
                                            </ul>
                                        </div>

                                        <?php
                                      }else{ ?>
                                        <form action="search.php" method="GET" style="padding-left: 10px;padding-top: 5px;">
                                              <input placeholder="Search here... " type="text" name="str">
                                              <button type="submit"><i class="fa fa-search"></i></button>
                                          </form>
                                        <button type="button" class="btn btn-success relative" data-bs-toggle="modal" data-bs-target="#myModal">Sign in</button>
                                          <form action="backend/login_db.php" method="POST">
                                            <div class="modal" id="myModal">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="background-color: green;">
                                                            <h5 class="modal-title" style="color: white;">Log in!</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                <div class="mb-3">
                                                                    <label class="form-label required">Email!</label>
                                                                    <input type="text" class="form-control" placeholder="Enter Username" name="email" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label required">Password</label>
                                                                    <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                                                </div>
                                                                <div> Don't have an account?
                                                                  <a href="signup.php" class="register-link">
                                                                    Sign up here
                                                                  </a>
                                                                </div>
                                                            </form> 
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success">Sign in</button>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </div>
                                              </div>

                                            </form>
                                            

                                          <?php
                                      }
                                    ?>

                              </div>

                    </div>

                </div>
              </div>
            </div>
          </ul>
      </nav>
    </nav>         
