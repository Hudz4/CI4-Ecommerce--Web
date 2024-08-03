<?php 

class Login extends CI_Controller{

	public function index(){
 		$this->load->view('header/header');
		$this->load->view('header/css');
		$this->load->view('login');
		$this->load->view('header/footer');
		$this->load->view('htmlclose');

	}
	public function checkuser()
	{
		$data_user['username']=$this->input->post('username',true);
		$data_user['password']=$this->input->post('password',true);

		if(!empty($data_user['username'])&& !empty($data_user['password'])){
			$userdata=$this->modUser->checkUser($data_user);
				if(count($userdata) == 1){
					$userdata = $this->modUser->checkUserStat($data_user);
					if(count($userdata) == 1){
						$forSession = array(
						'id'=>$userdata[0]['id'],
						'username'=>$userdata[0]['username'],
						'name'=>$userdata[0]['name'],
						'password'=>$userdata[0]['password'],

						);
						$this->session->set_userdata($forSession);
						if($this->session->userdata('id')){
							redirect ('home');
							$_SESSION['message']='Welcome';
						}else{
						$_SESSION['message']='Something went wrong...';
						}
					}else{
						$_SESSION['message']='You have been blocked by admin!';
						setFLashData('home/Signin');
					}

				}else{
					$_SESSION['message']='Wrong credentials!';
					setFLashData('login');
				}

		}else{
			$_SESSION['message']='Empty';
			setFLashData('login');
		}
	}

	public function newUser(){
		$this->load->view('header/header');
		$this->load->view('header/css');
		$this->load->view('Signup');
		$this->load->view('header/footer');
		$this->load->view('htmlclose');
	}

	public function adduser(){
			$data['username'] = $this->input->post('username',TRUE);
			$data['name'] = $this->input->post('name',TRUE);
			$data['email'] = $this->input->post('email',TRUE);
			$data['password'] = $this->input->post('password',TRUE);
			$data['password']= hash('md5', $data['password']);
			if (!empty($data['name']) && !empty($data['email'])){
				$path = realpath(APPPATH.'../assets/images/users/');
				$config['upload_path'] = $path;
				$config['max_size'] = 100000;
				$config ['allowed_types'] ='jpeg|gif|jpg|png';

				$this->load->library('upload',$config);
				$this->upload->initialize($config);
				if (!$this->upload->do_upload('profile')){
					$_SESSION['message'] = $this->upload->display_errors();
					setFLashData('login/newUser');
				}else{
					$fileName = $this->upload->data();
					$_SESSION['message'] = $this->upload->data();
					$data['image'] = $fileName['file_name'];
				}
				$addDAta = $this->modUser->checkUser($data);
				if ($addDAta -> num_rows() > 0){
						$_SESSION['message'] = 'User already existed!';
						setFLashData('login/newUser');
				}else{
					$addDAta = $this->modUser->addUser($data);
					if ($addDAta){
						$_SESSION['message'] = 'Registered succesfulley!';
						setFLashData('login/newUser');
					}else{
						$_SESSION['message'] = 'Failed!';
						setFLashData('login/newUser');
					
					}
					
				}

			}else{
				$_SESSION['message'] = 'Failed!';
				setFLashData('login/newUser');
			}

		}

		

}