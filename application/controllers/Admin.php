<?php 
	class Admin extends CI_Controller{

 		public function index()
		{
			if($this->session->userdata('id')){

				$config ['base_url'] = site_url ('admin/index');
				$totalRows = $this->modAdmin->getAllorders();

				$config['total_rows'] = $totalRows;
				$config['per_page'] = 20;
				$config['uri_segment'] = 3;
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['shipping'] = $this->modAdmin->fetchOrders($config['per_page'],$page);
				$data['shipping_approved'] = $this->modAdmin->fetchApprovOrders($config['per_page'],$page);
				$data['link'] = $this->pagination->create_links();

				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('admin/Allshipping',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');


			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('admin/login');
			}
		}

		public function shipping_details($cartID)
		{
			if($this->session->userdata('id')){

				$data['cart_details'] = $this->modAdmin->getShip($cartID);
				$Shipping_user_id = $this->modAdmin->getUser_id($cartID);
				$data['shipping_info']= $this->modAdmin->getShipping_id($Shipping_user_id);
				$data['link'] = $this->pagination->create_links();

				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('admin/userShipping',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');


			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('admin/login');
			}
		}

		public function deleteCart()
		{
			if ($this->session->userdata('id')){
				if($this->input->is_ajax_request()){
					$this->input->post('id',true);
					$id = $this->input->post('text',true);
					if(!empty($id) && isset($id)){
						$id = $this->encryption->decrypt($id);
						$checkMd = $this->modAdmin->deleteUserCart($id);
						if($checkMd){
							$checkMd = $this->modAdmin->Change_status_of_deleteCart($id);
							$_SESSION['message'] = 'Deleted succesfulley!';
							setFLashData('admin');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
							setFLashData('admin');
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
						setFLashData('admin');
					}

				}else{
					$_SESSION['message'] = 'Something went wrong!!';
					setFLashData('admin');
				}




			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}


		public function approved_Orders()
		{
			if($this->session->userdata('id')){

				$config ['base_url'] = site_url ('admin/approved_Orders');
				$totalRows = $this->modAdmin->getAllorders();
				$config['total_rows'] = $totalRows;
				$config['per_page'] = 5;
				$config['uri_segment'] = 3;
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['shipping_approved'] = $this->modAdmin->fetchApprovOrders($config['per_page'],$page);
				$data['link'] = $this->pagination->create_links();

				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('admin/approved_cart',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');


			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('admin/login');
			}
		}


		public function login()
		{
			$this->load->view('admin/header/header');
			$this->load->view('admin/login');
			$this->load->view('admin/header/footer');
			$this->load->view('htmlclose');
	

		}
		public function checkAdmin()
		{
			$data['username']=$this->input->post('username',true);
			$data['password']=$this->input->post('password',true);

			if(!empty($data['username'])&& !empty($data['password'])){
				$admindata=$this->modAdmin->checkAdmin($data);
				if(count($admindata) == 1){
					$forSession = array(
						'id'=>$admindata[0]['id'],
						'username'=>$admindata[0]['username'],
						'password'=>$admindata[0]['password'],

					);
					$this->session->set_userdata($forSession);
					if($this->session->userdata('id')){
						redirect ('admin');
						echo 'logged in';
					}else{
					echo 'Session not created';
					}
				
					
				}else{
				$_SESSION['message']='Wrong admin credentials';
				setFLashData('admin/login');
				}


			}
		}

		public function logout()
		{
			
			if($this->session->userdata('id')){
				$this->session->set_userdata ('id','');
				$this->session->set_flashdata('error','Logged out succesfulley');
				redirect('admin/login');	
			}else{
				$this->session->set_flashdata('error','Please Log in now');
				redirect ('admin/login');
			}
		}
		public function users() //allusers
		{
			if($this->session->userdata('id')){
				$config ['base_url'] = site_url ('admin/users');
				$totalRows = $this->modAdmin->getAllUsers();

				$config['total_rows'] = $totalRows;
				$config['per_page'] = 10;
				$config['uri_segment'] = 3;

				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['users'] = $this->modAdmin->fetchAllUsers($config['per_page'],$page);
				$data['link'] = $this->pagination->create_links();

				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('css/extracss'); //for carousel
				$this->load->view('admin/users',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');
			
			}else{
				$_SESSION['message']='Please log in!';
				setFLashData('admin/login');
			}		
		}
		public function deleteuser()
		{
			if ($this->session->userdata('id')){
				if($this->input->is_ajax_request()){
					$this->input->post('id',true);
					$id = $this->input->post('text',true);
					if(!empty($id) && isset($id)){
						$id = $this->encryption->decrypt($id);
						$checkMd = $this->modAdmin->deleteUser($id);
						if($checkMd){
							$_SESSION['message'] = 'Deleted succesfulley!';
							setFLashData('admin/users');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
							setFLashData('admin/users');
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
						setFLashData('admin/users');
					}

				}else{
					$_SESSION['message'] = 'Something went wrong!!';
					setFLashData('admin/users');
				}




			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}


		public function banner() //allbanner
		{

			if($this->session->userdata('id')){
				$config ['base_url'] = site_url ('admin/banner');
				$totalRows = $this->modAdmin->getAllBanner();

				$config['total_rows'] = $totalRows;
				$config['per_page'] = 10;
				$config['uri_segment'] = 3;
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['banner1'] = $this->modAdmin->fetchAllBanner($config['per_page'],$page);
				$data['status']= $this->modAdmin->getAllBanner();
				$data['link'] = $this->pagination->create_links();


				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('css/extracss'); //for carousel
				$this->load->view('admin/banner',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');
			
			}else{
				$_SESSION['message']='error';
				setFLashData('admin/banner');
			}		
		}
		public function updateban()
		{
			$this->form_validation->set_rules('path', 'Image', 'trim|required');
	        $this->load->library('form_validation');
	        if($this->form_validation->run() == FALSE) {
	           setFLashData('admin/banner');
	        } else {
				if($this->session->userdata('id')){
					$bid =  $this->input->post('banner_id',TRUE);
					$data['bName'] = $this->input->post('name',TRUE);
					$display_image = $this->input->post('image',TRUE);
		            $display_text = $this->input->post('path',TRUE);

		            $x = $this->input->post('x');
		            $y = $this->input->post('y');
		            $x2 = $this->input->post('x2');
		            $y2 = $this->input->post('y2');
		 
		            $w = $this->input->post('w');
		            $h = $this->input->post('h');
		 
					$oldImg = $this->input->post('oldImg',TRUE);

					if (!empty($data['bName'])){
							if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
								$config['upload_path'] = realpath(APPPATH.'../assets/images/banners/');
					            $config['allowed_types'] = 'jpg|gif|jpeg';
					            $config['max_width'] = 10000;
					            $config['max_height'] = 10000;
					            $config['max_size']= 100000;
					            $this->load->library('upload');
					            $this->upload->initialize($config);
								if(!$this->upload->do_upload('image')) {
					                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
					                redirect(site_url('admin/banner'), 'refresh');
					            }else{
					                if($x == "" || ($w == 0 && $h == 0)) {
					                    $uploaded_image = array('upload_data' => $this->upload->data());
					                }else{
					                    $uploaded_image = array('upload_data' => $this->upload->data());
					                    $file_path = $uploaded_image['upload_data']['file_path'];
					                    $file_name = $uploaded_image['upload_data']['file_name'];
					                    $full_path = $uploaded_image['upload_data']['full_path'];
					 
					                    $quality = 100;
					 
					                    $targ_w = $w;
					                    $targ_h = $h;
					                   
					                    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
					 
					                    $what = getimagesize(realpath(APPPATH.'../assets/images/banners/'. $file_name));
					                    switch(strtolower($what['mime'])) {
					                        // case 'image/png':
					                        //     $img_r = imagecreatefrompng(realpath(APPPATH.'../assets/images/banners/' . $file_name));
					 
					                        //     imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                        //     # png
					                        //     imagepng($dst_r, $full_path, $quality);
					                        //     break;
					                       
					                        case 'image/jpeg':
					                            $img_r = imagecreatefromjpeg(realpath(APPPATH.'../assets/images/banners/' . $file_name));
					 
					                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                            # Generates a jpeg.
					                            imagejpeg($dst_r, $full_path, $quality);
					                            break;
					                       
					                        case 'image/gif':
					                            $img_r = imagecreatefromgif(realpath(APPPATH.'../assets/images/banners/' . $file_name));
					 
					                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                            # Generates a gif.
					                            imagegif($dst_r, $full_path, $quality);
					                            break;
					 
					                        default: die();
					                    }

					                    $data['image'] = $file_name;
					                }

					            }

							}

							$addDAta = $this->modAdmin->updateBan($data,$bid);
							if ($addDAta){
								if (!empty($data['image']) && isset($data['image'])){
									if(file_exists($path.'/'.$oldImg)){
										unlink($path.'/'.$oldImg);
									}
								}
								$_SESSION['message'] = 'Banner updated succesfulley!';
								setFLashData('admin/banner');
							}else{
								$_SESSION['message'] = 'Failed!';
								setFLashData('admin/newBanner');
							
							}

					}
				//empty name
				}else{
					$_SESSION['message'] = 'Login!!';
					setFLashData('admin/login');
				}

			}
		}	
		public function newBanner(){
			if($this->session->userdata('id')){
				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('admin/AddBanner');
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');
			}
		}
		public function addBan() {
	        $this->form_validation->set_rules('path', 'Image', 'trim|required');
	        $this->load->library('form_validation');
	        if($this->form_validation->run() == FALSE) {
	           setFLashData('admin/newBanner');
	        } else {
	            $name = $this->input->post('name');
	            $display_image = $this->input->post('image');
	            $display_text = $this->input->post('path');
	           
	            $x = $this->input->post('x');
	            $y = $this->input->post('y');
	            $x2 = $this->input->post('x2');
	            $y2 = $this->input->post('y2');
	 
	            $w = $this->input->post('w');
	            $h = $this->input->post('h');
	 
	            $this->load->library('upload');
	           
	      
	            $config['upload_path'] = realpath(APPPATH.'../assets/images/banners/');
	            $config['allowed_types'] = 'jpg|gif|jpeg';
	            $config['max_width'] = 10000;
	            $config['max_height'] = 10000;
	            $config['max_size']= 100000;
	            $this->upload->initialize($config);
	 
	            if(!$this->upload->do_upload('image')) {
	                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
	                redirect(site_url('admin/newBanner'), 'refresh');
	            } else {
	                // var_dump($_POST);
	               
	                if($x == "" || ($w == 0 && $h == 0)) {
	                    # If user didn't crop image.
	                    $uploaded_image = array('upload_data' => $this->upload->data());
	                    // var_dump($uploaded_image);
	                }else{
	                    # If user cropped image.
	                    $uploaded_image = array('upload_data' => $this->upload->data());
	                    $file_path = $uploaded_image['upload_data']['file_path'];
	                    $file_name = $uploaded_image['upload_data']['file_name'];
	                    $full_path = $uploaded_image['upload_data']['full_path'];
	 
	                    $quality = 100;
	 
	                    $targ_w = $w;
	                    $targ_h = $h;
	                    
	                    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
	 
	                    $what = getimagesize(realpath(APPPATH.'../assets/images/banners/'. $file_name));
	                    switch(strtolower($what['mime'])) {
	 	 
	                        case 'image/png':
	                            $img_r = imagecreatefrompng(realpath(APPPATH.'../assets/images/banners/' . $file_name));
	 
	                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
	     
	                            imagepng($dst_r, $full_path, $quality);
	                            break;
	                       
	                        case 'image/jpeg':
	                            $img_r = imagecreatefromjpeg(realpath(APPPATH.'../assets/images/banners/' . $file_name));
	 
	                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
	                           
	                            # Generates a jpeg.
	                            imagejpeg($dst_r, $full_path, $quality);
	                            break;
	                       
	                        case 'image/gif':
	                            $img_r = imagecreatefromgif(realpath(APPPATH.'../assets/images/banners/' . $file_name));
	 
	                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
	                           
	                            # Generates a gif.
	                            imagegif($dst_r, $full_path, $quality);
	                            break;
	 
	                        default: die();
	                    }

	                    $image = $file_name;
	                    // var_dump($uploaded_image);
	                }

	                $addDAta = $this->modAdmin->addEditeBanner($image,$name);
	                    if ($addDAta){
	                        $_SESSION['message']='Banner added succesfullehey';
	                        setFLashData('admin/banner');
	                    }else{
	                        $_SESSION['message']='No data';
	                        setFLashData('admin/newBanner');
	                    }
	            }
	        }
	    }

		public function editban($bid)
		{

			if($this->session->userdata('id')){

				if (!empty($bid) && isset($bid)) {

					$data['banner']=$this->modAdmin->checkBannerById($bid);
					if (count($data['banner'])==1) {
						$this->load->view('admin/header/header');
						$this->load->view('admin/header/css');
						$this->load->view('admin/header/navbar');
						$this->load->view('css/extracss'); //for carousel
						$this->load->view('admin/editban',$data);
						$this->load->view('admin/header/footer');
						$this->load->view('htmlclose');
					}else{
						setFLashData('admin/product');
						echo "not found";
					}
				}else{
					setFLashData('admin/product');


				}

			}else{

				setFLashData('admin/category');
			}
		}

		public function deleteban()
		{
			if ($this->session->userdata('id')){
				if($this->input->is_ajax_request()){
					$this->input->post('id',true);
					$banner_id = $this->input->post('text',true);
					if(!empty($banner_id) && isset($banner_id)){
						$banner_id = $this->encryption->decrypt($banner_id);
						$checkMd = $this->modAdmin->deleteBan($banner_id);
						if($checkMd){
							$_SESSION['message'] = 'Deleted succesfulley!';
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

				}else{
					setFLashData('admin/banner');
					echo "Something went wrong!";
				}




			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}

		public function category() //allcategories
		{

			if($this->session->userdata('id')){
				$config ['base_url'] = site_url ('admin/allcategories');
				$totalRows = $this->modAdmin->getAllCategories();

				$config['total_rows'] = $totalRows;
				$config['per_page'] = 10;
				$config['uri_segment'] = 3;
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page'],$page);
				$data['link'] = $this->pagination->create_links();


				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('css/extracss'); //for carousel
				$this->load->view('admin/category',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');
			
			}else{
				setFLashData('admin/login');
			}		
		}

		public function updatecategory()
		{
			if($this->session->userdata('id')){
				$data['category'] = $this->input->post('categoryName',TRUE);
				$cid = $this->input->post('cid',TRUE);
				if (!empty($data['category']) && isset($data['category'])){
					$addDAta = $this->modAdmin->updateCategory($data,$cid);
					if($addDAta){
						$_SESSION['message'] = "Category updated succesfulley";
						setFLashData('admin/category');
					}else{
						$_SESSION['message'] = "Failed";
						setFLashData('admin/category');

					}
				}
				}else{
					$_SESSION['message'] = "Please log in";
					setFLashData('admin/login');
				}
			}	
		
		public function newCategory(){
			if($this->session->userdata('id')){
				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('css/extracss'); //for carousel
				$this->load->view('admin/AddCategory');
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');
			}
		}
		public function addcategory()
		{
			if($this->session->userdata('id')){
				$data['category'] = $this->input->post('categoryName',TRUE);
				if (!empty($data['category'])){
					$addDAta = $this->modAdmin->addCategory($data);
				 		if ($addDAta){
				 			$_SESSION['message']='Something went wrong';
				 			setFLashData('admin/newCategory');
				 		}else{
				 			$_SESSION['message']='Added Category succesfulley';
				 			setFLashData('admin/category');
				 		}

				}else{
					$_SESSION['message']='Category is empty';
					setFLashData('admin/newCategory');
				}
			}else{
				$_SESSION['message']='Please login';
				setFLashData('admin/category');
			}	
		}


		public function editcategory($cid)
		{

			if($this->session->userdata('id')){

				if (!empty($cid) && isset($cid)) {

					$data['category']=$this->modAdmin->checkCategoryById($cid);
					if (count($data['category'])==1) {
						$this->load->view('admin/header/header');
						$this->load->view('admin/header/css');
						$this->load->view('admin/header/navbar');
						$this->load->view('css/extracss'); //for carousel
						$this->load->view('admin/editcategory',$data);
						$this->load->view('admin/header/footer');
						$this->load->view('htmlclose');
					}else{
						$_SESSION['message']='Not found!';
						setFLashData('admin/category');
					}
				}else{
					setFLashData('admin/category');


				}




			}else{

				setFLashData('admin/category');
			}

		}
		public function deletecat()
		{
			if ($this->session->userdata('id')){
				if($this->input->is_ajax_request()){
					$this->input->post('id',true);
					$cat_id = $this->input->post('text',true);
					if(!empty($cat_id) && isset($cat_id)){
						$cat_id = $this->encryption->decrypt($cat_id);
						$checkMd = $this->modAdmin->deleteCat($cat_id);
						if($checkMd){
							$_SESSION['message'] = 'Deleted succesfulley!';
							setFLashData('admin/category');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

				}else{
					setFLashData('admin/category');
					echo "Something went wrong!";
				}




			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}

		//Activation and deactivation lods

		public function actuser($id)
		{
			if ($this->session->userdata('id')){
					if(!empty($id) && isset($id)){
						$checkMd = $this->modAdmin->ActUser($id);
						if($checkMd){
							$_SESSION['message'] = 'Activated succesfulley!';
							setFLashData('admin/users');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}

		public function actban($banner_id)
		{
			if ($this->session->userdata('id')){
					if(!empty($banner_id) && isset($banner_id)){
						$checkMd = $this->modAdmin->ActBan($banner_id);
						if($checkMd){
							$_SESSION['message'] = 'Activated succesfulley!';
							setFLashData('admin/banner');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}

		public function actcat($cat_id)
		{
			if ($this->session->userdata('id')){
					if(!empty($cat_id) && isset($cat_id)){
						$checkMd = $this->modAdmin->ActCat($cat_id);
						if($checkMd){
							$_SESSION['message'] = 'Activated succesfulley!';
							setFLashData('admin/category');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				$_SESSION['message'] = 'Please log in';
				setFLashData('admin/login');
			}
		}

		public function actprod($id)
		{
			if ($this->session->userdata('id')){
					if(!empty($id) && isset($id)){
						$checkMd = $this->modAdmin->ActProd($id);
						if($checkMd){
							$_SESSION['message'] = 'Activated succesfulley!';
							setFLashData('admin/product');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				$_SESSION['message'] = 'Please log in';
				setFLashData('admin/login');
			}
		}


		public function deactban($banner_id)
		{
			if ($this->session->userdata('id')){
					if(!empty($banner_id) && isset($banner_id)){
						$checkMd = $this->modAdmin->DeactBan($banner_id);
						if($checkMd){
							$_SESSION['message'] = 'Deactivated succesfulley!';
							setFLashData('admin/banner');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				$_SESSION['message'] = 'Please log in';
				setFLashData('admin/login');
			}
		}

		public function deactcat($cat_id)
		{
			if ($this->session->userdata('id')){
					if(!empty($cat_id) && isset($cat_id)){
						$checkMd = $this->modAdmin->DeactCat($cat_id);
						if($checkMd){
							$_SESSION['message'] = 'Deactivated succesfulley!';
							setFLashData('admin/category');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				$_SESSION['message'] = 'Please log in';
				setFLashData('admin/login');
			}
		}

		public function deactprod($id)
		{
			if ($this->session->userdata('id')){
					if(!empty($id) && isset($id)){
						$checkMd = $this->modAdmin->DeactProd($id);
						if($checkMd){
							$_SESSION['message'] = 'Deactivated succesfulley!';
							setFLashData('admin/product');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				$_SESSION['message'] = 'Please log in';
				setFLashData('admin/login');
			}
		}

		public function deactuser($id)
		{
			if ($this->session->userdata('id')){
					if(!empty($id) && isset($id)){
						$checkMd = $this->modAdmin->DeactUser($id);
						if($checkMd){
							$_SESSION['message'] = 'Blocked succesfulley!';
							setFLashData('admin/users');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}



		//Activation and deactivation lods

		public function addProd() {
	        $this->form_validation->set_rules('path', 'Image', 'trim|required');
	        $this->load->library('form_validation');
	        if($this->form_validation->run() == FALSE) {
	           setFLashData('admin/newBanner');
	        } else {
	        	$data['name'] = $this->input->post('name',TRUE);
				$data['price'] = $this->input->post('price',TRUE);
				$data['qty'] = $this->input->post('qty',TRUE);
				$data['categories_id'] = $this->input->post('categories_id',TRUE);
				$data['description'] = $this->input->post('description',TRUE);
				$sale = $this->input->post('sale',TRUE);
				$last_price= $this->input->post('last_price',TRUE);

	            $display_image = $this->input->post('image');
	            $display_text = $this->input->post('path');
	           
	            $x = $this->input->post('x');
	            $y = $this->input->post('y');
	            $x2 = $this->input->post('x2');
	            $y2 = $this->input->post('y2');
	 
	            $w = $this->input->post('w');
	            $h = $this->input->post('h');
	 
	            $this->load->library('upload');
	           
	            # Upload Path, you need to create "upload" folder in your root directory of your project
	            $config['upload_path'] = realpath(APPPATH.'../assets/images/products/');
	            $config['allowed_types'] = 'jpg|gif|jpeg';
	            $config['max_width'] = 10000;
	            $config['max_height'] = 10000;
	            $config['max_size']= 100000;
	            # Initialize you Configuration.
	            $this->upload->initialize($config);
	 
	            if(!$this->upload->do_upload('image')) {
	                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
	                redirect(site_url('admin/product'), 'refresh');
	            } else {
	                // var_dump($_POST);
	               
	                if($x == "" || ($w == 0 && $h == 0)) {
	                    # If user didn't crop image.
	                    $uploaded_image = array('upload_data' => $this->upload->data());
	                    // var_dump($uploaded_image);
	                }else{
	                    # If user cropped image.
	                    $uploaded_image = array('upload_data' => $this->upload->data());
	                    $file_path = $uploaded_image['upload_data']['file_path'];
	                    $file_name = $uploaded_image['upload_data']['file_name'];
	                    $full_path = $uploaded_image['upload_data']['full_path'];
	 
	                    $quality = 100;
	 
	                    $targ_w = $w;
	                    $targ_h = $h;
	                   
	                    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
	 
	                    $what = getimagesize(realpath(APPPATH.'../assets/images/products/'. $file_name));
	                    switch(strtolower($what['mime'])) {
	                        case 'image/png':
	                            $img_r = imagecreatefrompng(realpath(APPPATH.'../assets/images/products/' . $file_name));
	 
	                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
	                           
	                            # Genetate a png
	                            imagepng($dst_r, $full_path, $quality);
	                            break;
	                       
	                        case 'image/jpeg':
	                            $img_r = imagecreatefromjpeg(realpath(APPPATH.'../assets/images/products/' . $file_name));
	 
	                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
	                           
	                            # Generates a jpeg.
	                            imagejpeg($dst_r, $full_path, $quality);
	                            break;
	                       
	                        case 'image/gif':
	                            $img_r = imagecreatefromgif(realpath(APPPATH.'../assets/images/products/' . $file_name));
	 
	                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
	                           
	                            # Generates a gif.
	                            imagegif($dst_r, $full_path, $quality);
	                            break;
	 
	                        default: die();
	                    }

	                    $data['image']= $file_name;
	                    // var_dump($uploaded_image);
	                }

	                $addDAta = $this->modAdmin->checkProduct($data);
					if ($addDAta -> num_rows() > 0){
							$_SESSION['message'] = 'Product already existed!';
							setFLashData('admin/NewProduct');
					}else{
						//$sale condition
						if(!empty($sale)){
							$addDAta = $this->modAdmin->addProduct_Sale($data,$last_price);
							if ($addDAta){
								$_SESSION['message'] = 'Discounted Product Added succesfulley!';
								setFLashData('admin/product');
							}else{
								$_SESSION['message'] = 'Failed!';
								setFLashData('admin/newProduct');

							}
					

						}else{
							$addDAta = $this->modAdmin->addProduct($data);
							if ($addDAta){
								$_SESSION['message'] = 'Product Added succesfulley!';
								setFLashData('admin/product');
							}else{
								$_SESSION['message'] = 'Failed!';
								setFLashData('admin/newProduct');

							}

						} //$sale condition
					}
	            }
	        }
	    }


	    public function updateProd()
		{
			$this->form_validation->set_rules('path', 'Image', 'trim|required');
	        $this->load->library('form_validation');
	        if($this->form_validation->run() == FALSE) {
	           setFLashData('admin/product');
	        } else {
				if($this->session->userdata('id')){
					$data['name'] = $this->input->post('name',TRUE);
					$data['price'] = $this->input->post('price',TRUE);
					$data['qty'] = $this->input->post('qty',TRUE);
					$data['categories_id'] = $this->input->post('categories_id',TRUE);
					$data['description'] = $this->input->post('description',TRUE);

					$sale = $this->input->post('sale',TRUE);
					$last_price= $this->input->post('last_price',TRUE);
					$pid= $this->input->post('pid',TRUE);
					$oldImg = $this->input->post('oldImg',TRUE);
					$display_image = $this->input->post('image',TRUE);
		            $display_text = $this->input->post('path',TRUE);

		            $x = $this->input->post('x');
		            $y = $this->input->post('y');
		            $x2 = $this->input->post('x2');
		            $y2 = $this->input->post('y2');
		 
		            $w = $this->input->post('w');
		            $h = $this->input->post('h');
		 
					$oldImg = $this->input->post('oldImg',TRUE);

					if (!empty($data['name'])){
							if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
								$config['upload_path'] = realpath(APPPATH.'../assets/images/products/');
					            $config['allowed_types'] = 'jpg|gif|jpeg';
					            $config['max_width'] = 10000;
					            $config['max_height'] = 10000;
					            $config['max_size']= 100000;
					            $this->load->library('upload');
					            $this->upload->initialize($config);
								if(!$this->upload->do_upload('image')) {
					                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
					                redirect(site_url('admin/product'), 'refresh');
					            }else{
					                if($x == "" || ($w == 0 && $h == 0)) {
					                    $uploaded_image = array('upload_data' => $this->upload->data());
					                }else{
					                    $uploaded_image = array('upload_data' => $this->upload->data());
					                    $file_path = $uploaded_image['upload_data']['file_path'];
					                    $file_name = $uploaded_image['upload_data']['file_name'];
					                    $full_path = $uploaded_image['upload_data']['full_path'];
					 
					                    $quality = 100;
					 
					                    $targ_w = $w;
					                    $targ_h = $h;
					                   
					                    $dst_r = ImageCreateTrueColor($targ_w, $targ_h);
					 
					                    $what = getimagesize(realpath(APPPATH.'../assets/images/products/'. $file_name));
					                    switch(strtolower($what['mime'])) {
					                        // case 'image/png':
					                        //     $img_r = imagecreatefrompng(realpath(APPPATH.'../assets/images/banners/' . $file_name));
					 
					                        //     imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                        //     # png
					                        //     imagepng($dst_r, $full_path, $quality);
					                        //     break;
					                       
					                        case 'image/jpeg':
					                            $img_r = imagecreatefromjpeg(realpath(APPPATH.'../assets/images/products/' . $file_name));
					 
					                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                            # Generates a jpeg.
					                            imagejpeg($dst_r, $full_path, $quality);
					                            break;
					                       
					                        case 'image/gif':
					                            $img_r = imagecreatefromgif(realpath(APPPATH.'../assets/images/products/' . $file_name));
					 
					                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                            # Generates a gif.
					                            imagegif($dst_r, $full_path, $quality);
					                            break;
					 
					                        default: die();
					                    }

					                    $data['image'] = $file_name;
					                }

					            }

							}
							//$sale condition
							if($sale == 1){
								$addDAta = $this->modAdmin->updateProd_sale($data,$pid,$last_price);
								if ($addDAta){
									if (!empty($data['image']) && isset($data['image'])){
										if(file_exists($path.'/'.$oldImg)){
											unlink($path.'/'.$oldImg);
										}
									}
									$_SESSION['message'] = 'Discounted product is updated succesfully!';
									setFLashData('admin/product');
								}else{
									$_SESSION['message'] = 'Discounted Failed!';
									setFLashData('admin/product');
								
								}

							}else{
								$addDAta = $this->modAdmin->updateProd($data,$pid);
								if ($addDAta0){
									$_SESSION['message'] = 'Failed!';
									setFLashData('admin/product');

								}else{
									if (!empty($data['image']) && isset($data['image'])){
										if(file_exists($path.'/'.$oldImg)){
											unlink($path.'/'.$oldImg);
										}
									}
									$_SESSION['message'] = 'Product is updated succesfully!';
									setFLashData('admin/product');
								
								}

							} //$sale condition

					}
				//empty name
				}else{
					$_SESSION['message'] = 'Please Log in';
					setFLashData('admin/login');
				}

			}
		}
	
		public function NewProduct(){
			if($this->session->userdata('id')){
				$data['categoryOpt']=$this->modAdmin->getCategories();
				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('css/extracss'); //for carousel
				$this->load->view('admin/AddProduct',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');
			}else{
				setFLashData('admin/login');
			}
		}

		public function product() //allproducts
		{
			if($this->session->userdata('id')){
				$config ['base_url'] = site_url ('admin/product');
				$totalRows = $this->modAdmin->getAllProducts();

				$config['total_rows'] = $totalRows;
				$config['per_page'] = 10;
				$config['uri_segment'] = 3;
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['product1'] = $this->modAdmin->fetchAllProducts($config['per_page'],$page);
				$data['link'] = $this->pagination->create_links();

				$this->load->view('admin/header/header');
				$this->load->view('admin/header/css');
				$this->load->view('admin/header/navbar');
				$this->load->view('css/extracss'); //for carousel
				$this->load->view('admin/product',$data);
				$this->load->view('admin/header/footer');
				$this->load->view('htmlclose');
			
			}else{
				$_SESSION['message']='Please log in!';
				setFLashData('admin/login');
			}		
		}

		public function addproduct(){
			if($this->session->userdata('id')){
				$data['name'] = $this->input->post('pName',TRUE);
				$data['price'] = $this->input->post('pPrice',TRUE);
				$data['qty'] = $this->input->post('pQ',TRUE);
				$data['categories_id'] = $this->input->post('pCat',TRUE);
				$data['description'] = $this->input->post('pDes',TRUE);
				$data['meta_keyword'] = $this->input->post('pSearch',TRUE);

				if (!empty($data['name']) && !empty($data['categories_id'])){
					$path = realpath(APPPATH.'../assets/images/products/');
					$config['upload_path'] = $path;
					$config['max_size'] = 100000;
					$config ['allowed_types'] ='jpeg|gif|jpg|png';

					$this->load->library('upload',$config);
					$this->upload->initialize($config);
					if (!$this->upload->do_upload('pImg')){
						$_SESSION['message'] = $this->upload->display_errors();
						setFLashData('admin/product');
					}else{
						$fileName = $this->upload->data();
						$_SESSION['message'] = $this->upload->data();
						$data['image'] = $fileName['file_name'];
					}
					$addDAta = $this->modAdmin->checkProduct($data);
					if ($addDAta -> num_rows() > 0){
							$_SESSION['message'] = 'Product already existed!';
							setFLashData('admin/NewProduct');
					}else{
						$addDAta = $this->modAdmin->addProduct($data);
						if ($addDAta){
							$_SESSION['message'] = 'Product Added succesfulley!';
							setFLashData('admin/product');
						}else{
							$_SESSION['message'] = 'Failed!';
							setFLashData('admin/newProduct');
						
						}
						
					}

				}else{
					$_SESSION['message'] = 'Failed!';
					setFLashData('admin/product');
				}
			}else{
				$_SESSION['message'] = 'Please Log in!';
				setFLashData('admin/login');
			}
		}

		public function editprod($pid)
		{
			if($this->session->userdata('id'))
			{
				if (!empty($pid) && isset($pid)) {
					$data['product']=$this->modAdmin->checkProductById($pid);
					if (count($data['product'])==1) {
						$data['categoryOpt']=$this->modAdmin->getCategories();
						$this->load->view('admin/header/header');
						$this->load->view('admin/header/css');
						$this->load->view('admin/header/navbar');
						$this->load->view('css/extracss'); //for carousel
						$this->load->view('admin/editprod',$data);
						$this->load->view('admin/header/footer');
						$this->load->view('htmlclose');
					}else{
						$_SESSION['message']='Not found';
						setFLashData('admin/product');
					}
				}else{
					$_SESSION['message']='Not found';
					setFLashData('admin/product');


				}

			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('admin/login');
			}
		}

		public function deleteprod()
		{
			if ($this->session->userdata('id')){
					$this->input->post('id',true);
					$id = $this->input->post('text',true);
					if(!empty($id) && isset($id)){
						$id = $this->encryption->decrypt($id);
						$checkMd = $this->modAdmin->deleteProd($id);
						if($checkMd){
							$_SESSION['message'] = 'Deleted succesfulley!';
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}

 
		public function activate_Ord($cart_details_id)
		{
			if ($this->session->userdata('id')){
					if(!empty($cart_details_id) && isset($cart_details_id)){
						$checkMd = $this->modAdmin->activate_UserOrd($cart_details_id);
						if($checkMd){
							$checkMd = $this->modAdmin->activateCartOrd($cart_details_id);
							$_SESSION['message'] = 'User Order has been approved!';
							setFLashData('admin/index');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}

		public function deactivate_Ord($cart_details_id)
		{
			if ($this->session->userdata('id')){
					if(!empty($cart_details_id) && isset($cart_details_id)){
						$checkMd = $this->modAdmin->Disapprove_UserOrd($cart_details_id);
						if($checkMd){
							$checkMd = $this->modAdmin->Disapprove_from_cart_details($cart_details_id);
							$_SESSION['message'] = 'User Order has been disapproved!';
							setFLashData('admin');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
					}

			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}

	public function chat($id)
	{

		$data = array();
		$data['user_id']=$id;
		$data['query'] = $this->chatmodel->getSingleMsg($id);
		
		if($data['query']){
			$this->load->view('header/header');
			$this->load->view('admin/chatUser',$data);
		}else{
			echo "not";
		}

	}

	public function chat_backend()
	{

		$id=$this->input->post('uid',true);
		if(!empty($id)){
			$this->chat($id);
		}else{
			echo 'uid is empty';
		}
	}
	


	public function updateMsg()
	{
		$uid = $this->input->post('uid',true);
		$name = $this->session->userdata('username');
		$adminName = $this->session->userdata('id');
		$html_redirect = $this->input->post('html_redirect');


		date_default_timezone_set('Asia/Manila');
		$current = date('Y-m-d H:i:s');	
		$message = $this->input->post('content',true);


		if(!empty($message)){
			$addDAta = $this->chatmodel->insertSingleMsg($uid,$adminName,$name,$message,$current);
			$this->chat($uid);
			if($html_redirect === "true")
			{
			$this->chat($uid);
			}else{
				$_SESSION['message']='failed';
			 
			}
		}else{
			$_SESSION['message']='failed';
			$this->chat($uid);
		}
	}
}

	 


