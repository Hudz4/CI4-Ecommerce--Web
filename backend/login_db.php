<?php 
include '../database2.php';

echo '<pre>';
  print_r($_POST);
echo '</pre>';

$email = mysqli_real_escape_string($con, $_POST['email']);
$pass = mysqli_real_escape_string($con, md5($_POST['password']));

$select = mysqli_query($con, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');


if(mysqli_num_rows($select) > 0){
  // output data of each row
    $row = mysqli_fetch_assoc($select);
    $_SESSION['USER_LOGIN']='yes';
    $_SESSION['user_id'] = $row['id'];
    header('location: ../index.php?login=success');
  } else{
  $_SESSION['message']="We cannot find the account";
  header('location: ../signup.php');
  }

$con->close();

 ?>