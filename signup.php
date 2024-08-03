<?php 

include 'database.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($con, $_POST['name']);
   $email = mysqli_real_escape_string($con, $_POST['email']);
   $pass = mysqli_real_escape_string($con, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($con, md5($_POST['cpassword']));

   $select = mysqli_query($con, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $message[] = 'user already exist!';
   }else{
      mysqli_query($con, "INSERT INTO `user_info`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');
      $message[] = 'registered successfully!';
      header('location:index.php');
   }

}

 ?>

<!DOCTYPE html>
<html>
<style>
<?php include 'style.css';
?>
body {font-family:Montserrat  }
* {box-sizing: border-box;border-radius: 50px;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */


/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: black;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body class="bg color-primary-bg">
<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

<div class="modal-content animate color-primary-bg">
  <form method="POST">
    
      <div class="container">
        <div class="row text-center">
          <h1>Sign Up</h1>
          <p>Please fill in this form to create an account.</p>
          <br>

          <div class="col-6">
            <label><b>Username</b></label>
            <input class ="form-control" type="text" placeholder="Enter Username" name="name" required>
          </div>

          <div class="col-6">
            <label><b>Email</b></label>
            <input class ="form-control" type="text" placeholder="Enter Email" name="email" required>
          </div>

          <div class="col-6">
            <label><b>Password</b></label>
            <input class ="form-control" type="password" placeholder="Enter Password" name="password" required>
          </div>

            <label> <b>Confirm Password</b></label>
          <input class ="form-control" type="password" placeholder="Repeat Password" name="cpassword" required>
        </div>
          <div class="position-relative">
            <button class="btn btn-success position-absolute top-50 start-50 translate-middle" type="submit" name="submit" style="height: 50px;width: 400px;margin-left: 30%;border-radius: 10px;"> <h2>Sign up </h2></button>
          </div>
  </form>

      <div class="text-center"> Already have an account?
          <a href="index.php" class="signup-link" >
            Log in now
          </a>
     </div>

</div>




<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>



</body>
</html>
