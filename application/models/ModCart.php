<?php

/**
 * 
 */
class modCart extends CI_Model
{
	

	public function checkCart($ctid){
		return $this->db->get_where('cart_details',array(
			'product_id'=>$ctid,
		));

	}

	public function getCart($product_name,$user_id){
		return $this->db->get_where('cart_details',array(
			'name'=>$data['product_name'],
			'user_id'=>$data['user_id']

		));	
	}

	public function getAllProducts(){
		return $this->db->get_where('produkto',array('status'=>1))->num_rows();
	}

	public function addtoCart($data,$qty,$ctid){
		return $this->db->insert('cart_details',array(
			'user_id' => $this->session->userdata('id'),
			'name'=> $data['name'],
			'product_id'=> $data['id'],
			'price' =>$data['price'],
			'image'=> $data['image'],
			'quantity' => $qty

		));
	}


	public function total($pid)
	{
	   $this->db->where('user_id' , $this->session->userdata('id'));
	   $this->db->where('product_id', $pid);
	   $this->db->select('sum(price) * sum(quantity) as stockvalue', FALSE);
	   $query =  $this->db->get('cart_details');
	   return $query->row()->stockvalue;
	}

	public function get_user_total(){
		$this->db->select_sum('total');
	    $this->db->from('cart_details');
	    $this->db->where(array(
	    	'user_id'=>$this->session->userdata('id'),
	    	'status'=>'Active'
	    ));
	    $query = $this->db->get();
	    return $query->row()->total;
	}

	 

	public function orderCount($data){
		$this->db->select('*');
	    $this->db->from('produkto a'); 
	    $this->db->join('cart_details b', 'b.product_id=a.id', 'left');
	    $this->db->where(array(
	    	'b.status'=>'Active',
	    	'b.user_id'=>$this->session->userdata('id')
		));         
	    $query = $this->db->get(); 
	    return $query->num_rows();

	}

	//di ko sure

	public function usercart($data){
		$this->db->select('*');
	    $this->db->from('produkto a'); 
	    $this->db->where('b.user_id',$this->session->userdata('id'));         
	    $query = $this->db->get(); 
	    if ($query->num_rows()>0){//($query->num_rows()>0)
			$status = 'TRUE';
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			return $data;
		}
		return false;
	}
	//di ko sure

	public function getAllusercart( ){
		return $this->db->get_where('cart_details');
	}

	public function fetchUsersCart($limit,$start){
			$this->db->limit($limit,$start);
		 	$this->db->where(array(
			'user_id'=>$this->session->userdata('id'),
			'status' =>'Active'));
		 	$query = $this->db->get('cart_details');
		 	return $query;
		 }
		


 
 
	public function Cart_details($cart_details_id){
		return $this->db->get_where('cart_details',array(
			'status'=>'Active',
			'id'=>$cart_details_id,
			'user_id' => $this->session->userdata('id')

		))->result_array();
	}

	public function checkOrderProduct($pid){
		return $this->db->get_where('cart_details',array(
				'status'=>'Active',
				'product_id'=>$pid,
				'user_id' => $this->session->userdata('id')
		));

	}
 

	public function updateOrderProd($total,$qty,$cart_details_id)
	{
			$this->db->where(array(
	    	   	'user_id'=>$this->session->userdata('id')
	    	   ));
			$q = $this->db->get('cart_details');
			if($qty == 0){
		   		$this->db->where(array(
		   		'id'=>$cart_details_id
		   	));
				$this->db->delete('cart_details');
		   }else{
				$this->db->where(array(
					'id'=>$cart_details_id
				));
				$this->db->update('cart_details',array(
				'quantity' => $qty,
				'total'=> $total
			));

			}
	}

	public function deleteitem($qty,$pid)
	{
			$this->db->where(
	    	   	'id',$pid,
	    	   	'user_id',$this->session->userdata('id')
	    	   );

			$q = $this->db->get('cart_details');


			$this->db->where('id',$pid);
			$this->db->update('cart_details',array(
			'quantity' => $qty));
	}

	public function deleteSingleitem($id){
		$this->db->where(array(
			'id'=>$id,
			'user_id'=> $this->session->userdata('id')
	));
		return $this->db->delete('cart_details');
	}


	public function add_and_checkCart($data,$product_id,$qty)
    {
    	   $this->db->where(array(
    	   		'product_id'=>$product_id,
	    	   	'user_id'=>$this->session->userdata('id'),
	    	   	'status'=>'Active'
    	   ));	
		   $q = $this->db->get('cart_details');
	   		if ( $q->num_rows() > 0 ) 
			   {
			      $this->db->where(array(
			      	'user_id'=>$this->session->userdata('id'),
			      	'product_id'=>$product_id,
			      	'status'=>'Active'
			      ));
			      $this->db->update('cart_details',array(
			      	'quantity'=>$qty
			      ));
			   }else{
			      $this->db->set(array(
			      	'product_id'=>$product_id,
			      	'quantity'=>$qty,
			      	'user_id'=>$this->session->userdata('id'),
			      	'status'=>'Active'
			      ));
			      $this->db->insert('cart_details',$data);
			   }
		   
	} 

	public function deleteCancelledItem($id){
		$this->db->where('id',$id);
		return $this->db->delete('cart_details');
	}


	public function get_shipAdd(){
		$this->db->select('shipping_id');
	    $this->db->from('shipping');
	    $this->db->where(array(
	    	'user_id'=>$this->session->userdata('id')
	    ));
	    $query = $this->db->get();
	    return $query->row()->shipping_id;
	}


	public function upOrder_total($cart_total){
     $this->db->where('user_id',$this->session->userdata('id'));
      return $this->db->update('cart',array(
      	'order_total'=>$cart_total
      ));
	

	}

	public function single_checkout($data){
			$this->db->where(array(
    	   	'user_id'=>$this->session->userdata('id')
    	   ));
		   $q = $this->db->get('cart');
	   		if ($q->num_rows() < 0) 
			   {
			      $this->db->update('cart',$data);
				}else{
			      $this->db->insert('cart',$data);

				} 
			

	}

	public function checkoutall($result){
    	$this->db->insert_batch('cart',$result);
	}

	public function changeSinglestatus($cart_details_id){
		$this->db->where('id',$cart_details_id);
        return $this->db->update('cart_details',array(
      		'status'=>'Pending'
      ));
	}

	

	public function changestatus($stat)
	{
      $this->db->update_batch('cart_details',$stat,'id');

	}


}