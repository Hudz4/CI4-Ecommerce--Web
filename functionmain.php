<?php

function pr($arr){
	echo '<pre>';
	print_r($arr);
}

function prx($arr){
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con,$str){
	if($str!=''){
		$str=trim($str);
		return mysqli_real_escape_string($con,$str);
	}
}


function get_product($con,$limit='',$cat_id='',$product_id='',$search_str='',$sort_order='',$is_best_seller='',$sub_categories=''){
	$sql="select produkto.*,category.category from produkto,category where produkto.status=1 ";
	if($cat_id!=''){
		$sql.=" and produkto.categories_id=$cat_id ";
	}
	if($product_id!=''){
		$sql.=" and produkto.id=$product_id ";
	}
	if($sub_categories!=''){
		$sql.=" and produkto.sub_categories_id=$sub_categories ";
	}
	if($is_best_seller!=''){
		$sql.=" and produkto.best_seller=1 ";
	}
	$sql.=" and produkto.categories_id=category.cat_id ";
	if($search_str!=''){
		$sql.=" and (produkto.name like '%$search_str%' or produkto.description like '%$search_str%') ";
	}
	if($sort_order!=''){
		$sq.=$sort_order;
	}else{
		$sql.=" order by produkto.id desc ";
	}
	if($limit!=''){
		$sql.=" limit $limit";
	}
	//echo $sql;
	$res=mysqli_query($con,$sql);
	$data=array();
	while($row=mysqli_fetch_assoc($res)){
		$data[]=$row;
	}
	return $data;
}

function cart2_add($con,$uid,$pid){
	$added_on=date('Y-m-d h:i:s');
	mysqli_query($con,"insert into cart2(user_id,product_id) values('$uid','$pid')");
}




?>
