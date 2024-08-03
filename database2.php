<?php
session_start();
$con=mysqli_connect("localhost","root","","thrifthub");
define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/htdocs/ThriftHub/');
define('SITE_PATH','http://localhost/ThriftHub/');

define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'uploads/product/');  //not working
define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'uploads/product/');
?>