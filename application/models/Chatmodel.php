<?php


class Chatmodel extends CI_Model
{
	public function __construct()
	{
		parent::__construct(); 
	}
		
	public function getMsg($limit = 10)
	{
		return $this->db
		    ->select('*')
		    ->from('messages')
		    //->where('staff_id', get_staff_user_id())
		    ->order_by('id', 'desc')
		    ->limit($limit)
		    ->get();

		// $sql = "SELECT * FROM messages ORDER BY id DESC LIMIT $limit";		
		// return $this->db->query($sql);
	}

	public function getSingleMsg()
	{
		return $this->db
		    ->select('*')
		    ->from('direct_messages')
		    ->order_by('id', 'desc')
		    ->limit(10)
		    ->get();

		// $sql = "SELECT * FROM messages ORDER BY id DESC LIMIT $limit";		
		// return $this->db->query($sql);
	}



	
	public function insertMsg($name, $message, $current)
	{
		// $sql = "INSERT INTO messages SET user='$name', msg='$message', time='$current'";
		// return $this->db->query($sql);

		$this->db->set(array(
			'user'=>$name,
			'msg'=>$message,
			'time'=>$current
		));
		return $this->db->insert('messages');

	}

	public function insertSingleMsg($uid,$adminName,$name,$message,$current)
	{
		// $sql = "INSERT INTO messages SET user='$name', msg='$message', time='$current'";
		// return $this->db->query($sql);
		$this->db->set(array(
			'from'=>$adminName,
			'to'=>$uid,
			'user'=>$name,
			'msg'=>$message,
			'time'=>$current
		));
		return $this->db->insert('direct_messages');

	}


}

