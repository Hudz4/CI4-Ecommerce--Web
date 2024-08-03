<?php

	require 'database2.php';
	require 'redirect.php';

	$user_id = $_SESSION['user_id'];
	if(!isset($user_id)){
	   header('location:backend/login_db.php');
	};
	if(isset($_POST['add_to_cart'])){

	 $product_name = $_POST['product_name'];
	 $product_price = $_POST['product_price'];
	 $product_image = $_POST['product_image'];
	 $product_quantity = $_POST['product_quantity'];
	 $product_id = $_POST['product_id'];


	 $select_cart = mysqli_query($con, "SELECT * FROM `cart2` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

	 if(mysqli_num_rows($select_cart) > 0){
	    redirect("index.php","Product Already Added!!!");
	 }else{
	    mysqli_query($con, "INSERT INTO `cart2`(user_id, name,product_id, price, image,quantity) VALUES('$user_id', '$product_name','$product_id', '$product_price', '$product_image','$product_quantity')") or die('query failed');
	    redirect("index.php","Product Added!!!");
	 }
	 }
	//CATEGORY DATABASE//
	
	if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
	}
	//CATEGORY DATABASE//
	error_reporting(0);// With this no error reporting will be there
	$category=$_POST['category'];
	$sub_category=$_POST['sub-category'];
	$t1=$_POST['t1'];

	echo "Category : $category <br> 
	Sub-category = $sub_category <br>
	Text field = $t1";

	
///////////////
	error_reporting(0);// With this no error reporting will be there
	@$cat_id=$_GET['cat_id'];
	//$cat_id=2;
	/// Preventing injection attack //// 
	if(!is_numeric($cat_id)){
	echo "Data Error";
	exit;
	 }
	/// end of checking injection attack ////
	require "subcatconfig.php";

	$no_of_records = $con->query("select count(cat_id) from  subcategory where cat_id='$cat_id'")->fetchColumn();

	if($no_of_records >=1){
	$sql="select subcategory,subcat_id from subcategory where cat_id='$cat_id'";
	$row=$con->prepare($sql);
	$row->execute();
	$result=$row->fetchAll(PDO::FETCH_ASSOC);
	}else{
	$result='';
	}

	$main = array('data'=>$result,'no_of_records'=>$no_of_records);
	echo json_encode($main);


?>