<?php 
require 'database.php';

require'functions.inc.php';
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
    header('location:Signin.php');
    die();
}
?>


<!DOCTYPE html>
<html>
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="AdminsHub">
  <meta name="author" content="Hudairie Musa">
  <meta name="keyword" content="AdminsHub">
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


  <link ref="stylesheet" type="text/css" href="style.css">

    <title>AdminsHub</title>

    <style>
      <?php include "style.css" ?>
    </style>
  
    
</head>
<body style="background-color:#E6E7E8">
<header style="width:100%">
  <nav class="navbar navbar-expand-lg py-3 shadow-lg p-3 mb-5" style="height: 95px;:width:100%; padding-left: 3rem;  padding-right: 3rem;background-color: #231F20">

    <div class="container-fluid ">
      <div class="navbar-brand ">
        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../uploads/adminshublogo.png" style="height:45px;width: 220px;"></a>
        <div class="user-menu dropdown-menu">
          <a class="nav-link " href="signout.php"><i class="fa fa-power-off"></i>Sign Out</a>
           </div>
      </div>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-6 mb-lg-0">
          <!--_category-hover-->
            <div class="container-fluid">
              <li class=" mx-12">
                        <a class="btn btn-success" href="categories.php">Category Section</a>
                   
                        <a class="btn btn-success" href="subcategories.php">Subcategory Section</a>
             
                        <a class="btn btn-success" href="products.php">Product Section</a>



                </li>



        </div>
          <!--_category-hover-->
        </ul>
          
                  
        </div>
    </div>
  </nav>


</header>

<main id="main-site">