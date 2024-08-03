<?php

class Chat extends CI_Controller{
	

	public function index()
	{	
		$this->load->view('header/header');
		$this->load->view('chatView');
 
	}
	

	public function update()
	{

		$name = $this->session->userdata('name');
		$message = $this->input->post('content');
		$html_redirect = $this->input->post('html_redirect');

		date_default_timezone_set('Asia/Manila');
		$current = date('Y-m-d H:i:s');		
		$this->chatmodel->insertMsg($name, $message, $current);
		setFLashData('chat');
		if($html_redirect === "true")
		{
			setFLashData('chat');
		}else{
			$_SESSION['message']='failed';
			setFLashData('chat');

		}
	}

	public function backend()
	{	
				
		header("Content-type: text/xml");
		header("Cache-Control: no-cache");

		$query = $this->chatmodel->getMsg();

		if($query->num_rows()==0){
			$status_code = 2;
		}else{
			$status_code = 1;
		}
		

		echo "<?xml version=\"1.0\"?>\n";
		echo "<response>\n";
		echo "\t<status>$status_code</status>\n";
		echo "\t<time>".time()."</time>\n";
		

		if($query->num_rows()>0){
			foreach($query->result() as $row){
				
				
				$escmsg = htmlspecialchars(stripslashes($row->msg));
				echo "\t<message>\n";
				echo "\t\t<id>$row->id</id>\n";
				echo "\t\t<author>$row->user</author>\n";
				echo "\t\t<time>$row->time</time>\n";
				echo "\t\t<text>$escmsg</text>\n";
				echo "\t</message>\n";
			}
		}
		echo "</response>";
				
	}
	
	
}
?>