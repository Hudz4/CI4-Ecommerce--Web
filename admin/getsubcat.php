<?php
require('database.php');
require('functions.inc.php');


$categories_id=get_safe_value($con,$_POST['categories_id']);
$sub_cat_id=get_safe_value($con,$_POST['sub_cat_id']);
$res=mysqli_query($con,"select * from subcategory where cat_id='$categories_id'");
if(mysqli_num_rows($res)>0){
	$html='';
	while($row=mysqli_fetch_assoc($res)){
		if($sub_cat_id==$row['id']){
			$html.="<option value=".$row['subcat_id']." selected>".$row['subcategory']."</option>";
		}else{
			$html.="<option value=".$row['subcat_id'].">".$row['subcategory']."</option>";
		}
	}
	echo $html;
}else{
	echo "<option value=''>No sub categories found</option>";
}
?>