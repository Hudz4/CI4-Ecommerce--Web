<?php 

class ModAdmin extends CI_Model{

	public function checkAdmin($data){
		return $this->db->get_where('admin_users',$data)
		->result_array();
	}

	public function addCategory($data){
		$this->db->insert('category',$data);
	}
	public function addBanner($data){
		return $this->db->insert('banner',$data);
	}

	public function addEditeBanner($image,$name){
		return $this->db->insert('banner',array(
			'bName'=>$name,
			'image'=>$image,
			'status'=>1
	));
	}


	public function addProduct($data){
		$this->db->set(array(
		      	'sale'=>0,
		      	'last_price'=>0
		   ));
	    return $this->db->insert('produkto',$data);
	}

	public function addProduct_Sale($data,$last_price){
		$this->db->set(array(
		      	'sale'=>1,
		      	'last_price'=>$last_price
		   ));
	   return  $this->db->insert('produkto',$data);
	}

	public function getShip($cartID){
		$query = $this->db->get_where('cart_details',array(
			'id'=>$cartID
	));
	    return $query->result();
	}

	public function getUser_id($cartID){
		$this->db->select('user_id');
	    $this->db->from('cart');
	    $this->db->where(array(
	    	'cart_details_id'=>$cartID
	    ));
	    $query = $this->db->get();
	    return $query->row()->user_id;
	}



	public function getShipping_id($Shipping_user_id){
		return $this->db->get_where('shipping',array(
			'user_id'=>$Shipping_user_id
		))->result();
	}

	public function getBannerForHOme(){
		return $this->db->get_where('banner',array('status'=>1))->result();

	}

	public function getAllBanner(){
		return $this->db->get_where('banner',array('status'=>1))->num_rows();

	}

	public function getAllCategories(){ //for home
		return $this->db->get_where('category',array('status'=>1))->num_rows();

	}
	public function getCategories(){
		return $this->db->get_where('category');
	}
	public function getCustomerName($user_id){
			$this->db->where(array(
    	   	'id'=>$user_id
    	   ));	
		   return $this->db->get('user_info');
	}


	public function getPayment(){
		return $this->db->get_where('payment',array('status'=>1));
	}

	public function getAllProducts(){
		return $this->db->get_where('produkto',array('status'=>1))->num_rows();
	}

	public function getAllSaleProducts(){
		return $this->db->get_where('produkto',array('status'=>1,'sale'=>1))->num_rows();
	}

	public function getAllusercart(){
		return $this->db->get_where('cart_details',array('status'=>'Active'))->num_rows();
	}
	public function getAllUsers(){
		return $this->db->get_where('user_info')->num_rows();
	}
	public function getAllorders(){
		return $this->db->get_where('cart')->num_rows();
	}
	public function getProducts(){
		return $this->db->get_where('produkto',array('status'=>1))->num_rows();
	}
 
	public function getProdCat($pid){
		$this->db->select('categories_id');
	    $this->db->from('produkto');
	    $this->db->where(array(
	    	'id'=>$pid
	    ));
	    $query = $this->db->get();
	    return $query->row()->categories_id;
	}


	public function get_name($cpid){
		$this->db->select('*');
	    $this->db->from('category');
	    $this->db->where(array(
	    	'cat_id'=>$cpid
	    ));
	    $query = $this->db->get();
	    return $query->result();
	}

	public function checkBanner($data){
		return $this->db->get_where('banner',array(
			'bName'=>$data['bName'],
			'banner_id'=>$data['banner_id']

		));
	}

	public function checkBanner2($bid,$name){
		return $this->db->get_where('banner',array(
			'bName'=>$name,
			'banner_id'=>$bid

		));
	}

	public function checkProduct($data){
		return $this->db->get_where('produkto',array(
			'name'=>$data['name'],
			'categories_id'=>$data['categories_id']

		));
	}
	public function fetchAllUsers($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('user_info');//'category',array('status'=>1)
		if ($query->num_rows()>0){//($query->num_rows()>0)
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function fetchOrders($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('cart');


		if ($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function fetchApprovOrders($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('cart',array('actions'=>'Approved'));
		if ($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function fetchPendingOrders($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('cart_details',array(
			'status'=>'Pending'
		));
		if ($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function fetchApprovedOrders($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('cart_details',array(
			'status'=>'Approved'
		));
		if ($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function fetchAllBanner($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('banner');//'category',array('status'=>1)
		if ($query->num_rows()>0){//($query->num_rows()>0)
			$status = 'TRUE';
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;

	}
 
	public function fetchAllCategories($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('category',array('status'=>1));//'category',array('status'=>1)
		if ($query->num_rows()>0){//($query->num_rows()>0)
			$status = 'TRUE';
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}
 

	public function fetchAllProducts($limit,$start){ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('produkto',array(
			'status'=>1,

		));
		if ($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function fetchSaleProducts($limit,$start){ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('produkto',array(
			'status'=>1,
			'sale'=>1

		));
		if ($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function fetchSalecategorizedProducts($cid,$limit,$start){ 
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('produkto',array(
			'categories_id'=>$cid,
			'status'=>1,
			'sale'=>1

		));
		if ($query->num_rows()>0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}


	public function fetchBasedProducts($cpid){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('produkto',array(
			'categories_id'=>$cpid,
		));
		if ($query->num_rows()>0){//($query->num_rows()>0)
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}

	public function checkCategoryById($cid){
		return $this->db->get_where('category',array('cat_id'=>$cid))->result_array();

	}
	public function checkProductById($pid){
		return $this->db->get_where('produkto',array('id'=>$pid))->result_array();

	}



	public function checkQuantity($product_id){
		$this->db->select_sum('qty');
	    $this->db->from('produkto');
	    $this->db->where(array(
	    	'id'=>$product_id
	    ));
	    $query = $this->db->get();
	    return $query->row()->qty;
	}

	public function upQty($product_id,$totalQuan){
     $this->db->where('id',$product_id);
      return $this->db->update('produkto',array(
      	'qty'=>$totalQuan
      ));
	

	}

	public function getNameCiD($cid){
		 $this->db->select('category');
		 $this->db->from('category');
		  $this->db->where(array(
	    	'cat_id'=>$cid
	    ));
	    $query = $this->db->get();
	    return $query->row()->category;

	}

	// public function getNameforMsg($uid){
	// 	 $this->db->select('name');
	// 	 $this->db->from('user_info');
	// 	  $this->db->where(array(
	//     	'id'=>$uid
	//     ));
	//     $query = $this->db->get();
	//     return $query->row()->name;

	// }

	public function checkAdminforMsg($uid){
		 return $this->db->get_where('direct_messages',array('to'=>$uid))->result_array();
	}

	public function getAdminforMsg($uid){
		 $this->db->select('from');
		 $this->db->from('direct_messages');
		 $this->db->where('to',$uid);
	     $query = $this->db->get();
	    return $query->row()->from;
	}

	public function getAvailAdminforMsg(){
		 $this->db->select('id');
		 $this->db->from('admin_users');
	    $query = $this->db->get();
	    return $query->row()->id;

	}

	public function checkProductByCategory($cid,$limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('produkto',array(
			'categories_id'=>$cid,
			'status'=>1,
			'sale'=>0
		));
		if ($query->num_rows()>0){//($query->num_rows()>0)
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;


	}
	public function checkBannerById($bid){
		return $this->db->get_where('banner',array('banner_id'=>$bid))->result_array();

	}
	
	public function updateProd($data,$pid){
	$this->db->where(
		'id',$pid
		);
	$this->db->update('produkto',array(
		'name'=>$data['name'],
		'price'=>$data['price'],
		'qty'=>$data['qty'],
		'categories_id'=>$data['categories_id'],
		'description'=>$data['description'],
		'last_price'=>0,
		'sale'=>0
	));
	}


	public function updateProd_sale($data,$pid,$last_price){
	$this->db->where(
		'id',$pid
		);
	return $this->db->update('produkto',array(
		'name'=>$data['name'],
		'price'=>$data['price'],
		'qty'=>$data['qty'],
		'categories_id'=>$data['categories_id'],
		'description'=>$data['description'],
		'last_price'=>$last_price,
		'sale'=>1

	));
	}


	public function updateBan($data,$bid){

	$this->db->where('banner_id',$bid);

	return $this->db->update('banner',$data);
	}


	public function updateCategory($data,$cid){

	$this->db->where('cat_id',$cid);
	return $this->db->update('category',$data);
	}

	public function deleteUserCart($id){
		$this->db->where('cart_details_id',$id);
		return $this->db->delete('cart');
	}

	public function deleteUser($id){
		$this->db->where('id',$id);
		return $this->db->delete('user_info');
	}

	public function deleteBan($banner_id){
		$this->db->where('banner_id',$banner_id);
		return $this->db->delete('banner');
	}

	public function deleteCat($cat_id){
		$this->db->where('cat_id',$cat_id);
		return $this->db->delete('category');
	}
	public function deleteProd($id){
		$this->db->where('id',$id);
		return $this->db->delete('produkto');
	}

	//for activation lods
	public function ActBan($banner_id){
		$this->db->where('banner_id',$banner_id);
		return $this->db->update('banner',array(
			'status'=> 1
		));
	}

	public function ActCat($cat_id){
		$this->db->where('cat_id',$cat_id);
		return $this->db->update('category',array(
			'status'=> 1
		));
	}
	public function ActProd($id){
		$this->db->where('id',$id);
		return $this->db->update('produkto',array(
			'status'=> 1
		));
	}

	public function ActUser($id){
		$this->db->where('id',$id);
		return $this->db->update('user_info',array(
			'status'=> 1
		));
	}
	//for activation lods

	//for deactivation lods
	public function DeactBan($banner_id){
		$this->db->where('banner_id',$banner_id);
		return $this->db->update('banner',array(
			'status'=> 0
		));
	}

	public function DeactCat($cat_id){
		$this->db->where('cat_id',$cat_id);
		return $this->db->update('category',array(
			'status'=> 0
		));
	}
	public function DeactProd($id){
		$this->db->where('id',$id);
		return $this->db->update('produkto',array(
			'status'=> 0
		));
	}

	public function DeactUser($id){
		$this->db->where('id',$id);
		return $this->db->update('user_info',array(
			'status'=> 0
		));
	}

	//for deactivation lods

	public function approve($id){
		$this->db->where('id',$id);
		return $this->db->update('cart_details',array(
			'status'=> 'Approved'
		));
	}

	public function approveAll_UserOrd(){
		$this->db->where(array(
			'user_id'=>$this->session->userdata('id'),
			'status'=>'Pending',
		));
		return $this->db->update('cart_details',array(
			'status'=> 'Approved'
		));
	}

	public function approveUserCartOrd($cart_id){
		$this->db->where('cart_id',$cart_id);
		return $this->db->update('cart',array(
			'actions'=> 'Approved'
		));
	}

	public function activateCartOrd($cart_details_id){
		$this->db->where('cart_details_id',$cart_details_id);
		return $this->db->update('cart',array(
			'actions'=> 'Approved'
		));
	}

	public function activate_UserOrd($cart_details_id){
		$this->db->where(array(
			'id'=>$cart_details_id,
			'status'=>'Pending',
			'user_id'=>$this->session->userdata('id')
		));
		return $this->db->update('cart_details',array(
			'status'=> 'Approved'
		));
	}

	public function cancelOrd($id){
		$this->db->where('id',$id);
		return $this->db->update('cart_details',array(
			'status'=> 'Cancelled'
		));
	}

	public function Disapprove_UserOrd($cart_details_id){
		$this->db->where(array(
			'actions'=>'Approved',
			'cart_details_id'=>$cart_details_id,
		));
		return $this->db->update('cart',array(
			'actions'=> 'Pending'
		));
	}

	public function Disapprove_from_cart_details($cart_details_id){
		$this->db->where(array(
			'status'=>'Approved',
			'id'=>$cart_details_id,
		));
		return $this->db->update('cart_details',array(
			'status'=> 'Pending'
		));
	}

	public function Change_status_of_deleteCart($id){
		$this->db->where('id',$id);
		return $this->db->update('cart_details',array(
			'status'=> 'Cancelled'
		));
	}
}	

