<?php

	//CATEGORY DATABASE//


	
	//CATEGORY DATABASE//




	//SUBCATEGORY DATABASE//
	$categories='';
	$msg='';
	$sub_categories='';

	if(isset($_POST['submit1'])){
		$categories=$_POST['categories_id'];
	  $sub_categories=$_POST['sub_categories'];
	  $res=mysqli_query($con,"select * from subcategory where cat_id='$categories' and subcategory='$sub_categories'");
	  $check=mysqli_num_rows($res);
	  if($check>0){
	    if(isset($_GET['id'])){
	      $getData=mysqli_fetch_assoc($res);
	      if($id==$getData['id']){
	      
	      }else{
	      	$_SESSION['message'] = 'Sub Category already exist';
	      }
	    }else{
	    	$_SESSION['message'] = 'Sub Category already exist';
	    }
	  }
	  
	  if($msg==''){
	    if(isset($_GET['id'])){
	      mysqli_query($con,"update subcategory set subcategory='$sub_categories' where subcat_id='$id'");
	    }else{
	      
	      mysqli_query($con,"insert into subcategory(cat_id,subcategory) values('$categories','$sub_categories')");
	    }
	    header('location:subcategories.php');
	    die();
	  }
	}


?>