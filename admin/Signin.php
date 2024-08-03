<?php
require'database.php';
require'functions.inc.php';



if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:categories.php');
      $_SESSION['message']='Welcome Boss!';
		die();
	}else{
      $_SESSION['message']='Please Enter correct login details';

	}
	
}
?>
<!DOCTYPE html>
<html>
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
  
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
      <?php require 'style.css'; ?>

      .background-image{
         height: 10px;
      }
      .body{
         background-image: url('../uploads/adminshublogojpeg.png');
      }

    </style>
  
    
</head>
   <body class="body color-primary-bg">
      <div class="sufee-login d-flex align-content-center flex-wrap position-relative">
         <div class="container">
          <div class="login-content">
            <div class="login-form mt-150">
            <form method="POST">
             <div class="card shadow-lg mx-auto h-auto " style="width: 600px;height:200px;">

            <div class="card-body h-auto" >
                <label>Username</label>
               <input type="text" name="username" class="form-control" placeholder="Username" required>

               <label>Password</label>
               <input type="password" name="password" class="form-control" placeholder="Password" required>


               <div class="card-footer">
               <button type="submit" name="submit" class="btn btn-success">Submit</button>
               <a class="btn btn-danger" href="subcategory.php">Cancel</a>
               </div>
            </div>
             
           </div>
         </form>
      </div>
      </div>
    </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
      <!--  Alertifyjs javascpt  -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script type="text/javascript">
        <?php 
            if(isset($_SESSION['message']))
            { 
                ?>
                alertify.set('notifier','position', 'top-center');
                alertify.success('<?= $_SESSION['message']; ?>');
                <?php 
                unset($_SESSION['message']);
            } 
        ?>

    </script>
   </body>
</html>