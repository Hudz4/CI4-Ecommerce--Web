<?php 
require '../database2.php';

echo '<pre>';
	print_r($_POST);
echo '</pre>';


$username = $_POST['username'];
$password = $_POST['password'];  

$email = $_POST['email']; 

$confirmpassword = $_POST['cpassword'];


 if ($password == $confirmpassword){
 		$sql = 'INSERT INTO usertable (username, password, email)
				VALUES ("'.$username.'", "'.$password.'", "'.$email.'")';

				echo $sql;

				if ($con->query($sql) == TRUE) {
					$_SESSION['message']="Registered Successfully!";
				  header('location: ../index.php');
				} else {
				  echo "Error: " . $sql . "<br>" . $con->error;
				}

				$con->close();
 }
 else {
 	$_SESSION['message']="Registered Successfully!";
 	header('location: ../signup.php?passwordmatch=error');
 }


 ?>