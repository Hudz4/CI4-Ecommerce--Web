<?php  

class ModUser extends CI_Model{

	public function checkUser($data_user){
		return $this->db->get_where('user_info',$data_user)->result_array();
	}

	public function checkUserStat($data_user){
		return $this->db->get_where('user_info',array(
			'username'=>$data_user['username'],
			'password'=>$data_user['password'],
			'status'=>1

		))->result_array();
	}


	public function addUser($data){
		return $this->db->insert('user_info',$data);
	}
	public function getName($data){
		$query = $this->db->get_where('user_info',array(
			'name'=>$data['name'],
	));
	    return $query->result();
	}

	public function fetchUserOrder($limit,$start){
		$this->db->limit($limit,$start);
		$query = $this->db->get_where('cart_details',array(
			'user_id'=>$this->session->userdata('id'),
			'status'=>0
	));
	    return $query->result();

	}

	public function fetchUserShippingInfo(){
		$query = $this->db->get_where('shipping',array(
			'user_id'=>$this->session->userdata('id')
	));
	    return $query->result();

	}

	public function insert_entry($data_user, $data_address) {

	    $this->db->insert('user_info', $data_user);

	    $data_address['user_id'] = $this->db->insert_id();

	    $this->db->insert('shipping', $data_address);
	}

	public function update_shipping($data_address) {

	    $this->db->where(array(
	    	   	'user_id'=>$this->session->userdata('id')

	    ));
		$q = $this->db->get('shipping');
		if($q->num_rows() > 0){
			$this->db->where('user_id',$this->session->userdata('id'));
			$this->db->update('shipping',$data_address);
		}else{
			$this->db->set('user_id',$this->session->userdata('id'));
			$this->db->insert('shipping',$data_address);
		}
	}

	public function update_account($data_user) {

	    $this->db->where(array(
	    	   	'id'=>$this->session->userdata('id')

	    ));
		$q = $this->db->get('user_info');
		if($q->num_rows() > 0){
			$this->db->where('id',$this->session->userdata('id'));
			$this->db->update('user_info',$data_user);
		}else{
			$this->db->set('id',$this->session->userdata('id'));
			$this->db->insert('user_info',$data_user);
		}
	}

}