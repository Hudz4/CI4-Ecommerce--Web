<?php

	
 $host_name = 'localhost';
  $database = 'thrifthub';
  $user_name = 'root';
  $password = '';

  $con = mysqli_connect($host_name, $user_name, $password, $database);

  if ($con->connect_error) {
     //echo '<p>Failed to connect to MySQL: '. $link->connect_error .'</p>';
  } else {
     //echo '<p>Connection to MySQL server successfully established.</p>';
  }
	

	
?>