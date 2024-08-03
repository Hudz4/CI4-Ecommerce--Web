<?php 
	class Home extends CI_Controller{

		public function index()
		{
			$config['base_url'] = site_url ('admin/allcategories');
			$totalRows_cat = $this->modAdmin->getAllCategories();
			$config['total_rows'] = $totalRows_cat;
			$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page']=4,'');


			$totalRows_product = $this->modAdmin->getAllProducts();
			$product['total_rows'] = $totalRows_product;
			$data['product1'] = $this->modAdmin->fetchAllProducts($product['per_page']=12,'');

			$totalRows_saleProd = $this->modAdmin->getAllSaleProducts();
			$saleprod['total_rows'] = $totalRows_saleProd;
			$saleprod['per_page'] = 6;
			$data['sale_product'] = $this->modAdmin->fetchSaleProducts($saleprod['per_page'],'');
			$data['banner'] = $this->modAdmin->getBannerForHOme();
			$this->load->view('header/header');
			$this->load->view('header/css');

			//logged in crontoller
			if ($this->session->userdata('id')) {
		        $data['name'] = $this->session->userdata('name'); 
		        $data['results']=$this->modUser->getName($data);
		        $data['count'] =$this->modCart->orderCount($data);
		        $this->load->view('header/navbar',$data);
			    } else{
			        $this->load->view('header/navbar',$data); //change this for users interface
			    }
			$this->load->view('home',$data);
			$this->load->view('header/footer');
			$this->load->view('htmlclose');	

		}

		public function allproduct(){
			$totalRows_cat = $this->modAdmin->getAllCategories();
			$config['total_rows'] = $totalRows_cat;
			$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page']=4,'');

			$product['base_url'] = site_url ('home/allproduct');
			$totalRows_product = $this->modAdmin->getAllProducts();
			$product['total_rows'] = $totalRows_product;
			$product['per_page'] = 28;
			$product['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($product);
			$page_allprod = ($this->uri->segment(3))? $this->uri->segment(3):0;
			$data['product1'] = $this->modAdmin->fetchAllProducts($product['per_page'],$page_allprod);
			$data['link_products'] = $this->pagination->create_links();


			$this->load->view('header/header');
			$this->load->view('header/css');

			//logged in crontoller
			if ($this->session->userdata('id')) {
		        $data['name'] = $this->session->userdata('name'); 
		        $data['results']=$this->modUser->getName($data);
		        $data['count'] =$this->modCart->orderCount($data);
		        $this->load->view('header/navbar',$data);
			    } else{
			        $this->load->view('header/navbar',$data); //change this for users interface
			    }
			$this->load->view('allprod',$data);
			$this->load->view('header/footer');
			$this->load->view('htmlclose');

		}

		public function flash_sale(){

			$totalRows_cat = $this->modAdmin->getAllCategories();
			$config['total_rows'] = $totalRows_cat;
			$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page']=4,'');

			$saleprod['base_url'] = site_url ('home/flash_sale');
			$totalRows_saleProd = $this->modAdmin->getAllSaleProducts();
			$saleprod['total_rows'] = $totalRows_saleProd;
			$saleprod['per_page'] = 18;
			$saleprod['uri_segment'] = 3;
			$this->load->library('pagination');
			$this->pagination->initialize($saleprod);
			$page_sale = ($this->uri->segment(3))? $this->uri->segment(3):0;
			$data['sale_product'] = $this->modAdmin->fetchSaleProducts($saleprod['per_page'],$page_sale);
			$data['link_sale'] = $this->pagination->create_links();

			$this->load->view('header/header');
			$this->load->view('header/css');
			if ($this->session->userdata('id')) {
		        $data['name'] = $this->session->userdata('name'); 
		        $data['results']=$this->modUser->getName($data);
		        $data['count'] =$this->modCart->orderCount($data);
		        $this->load->view('header/navbar',$data);
			    } else{
			        $this->load->view('header/navbar',$data); //change this for users interface
			    }
			$this->load->view('flash_sale',$data);
			$this->load->view('header/footer');
			$this->load->view('htmlclose');

		}

		public function Signin()
		{
			$this->load->view('header/header');
			$this->load->view('header/css');
			$this->load->view('login');
			$this->load->view('header/footer');
			$this->load->view('htmlclose');	
		}

		public function adminchat()
		{

			$data = array();
			$data['uid']=$this->session->userdata('id');
			$data['query'] = $this->chatmodel->getSingleMsg();
			
			if($data['query']){
				$this->load->view('header/header');
				$this->load->view('chatAdmin',$data);
			}else{
				echo "not";
			}

		}
 


		public function adminchat_updateMsg()
		{
			$adminName = $this->input->post('uid',true);
			$name = $this->session->userdata('name');
			$Aid = $this->modAdmin->checkAdminforMsg($adminName);
			$html_redirect = $this->input->post('html_redirect');

			date_default_timezone_set('Asia/Manila');
			$current = date('Y-m-d H:i:s');	
			$message = $this->input->post('content',true);
			if(!empty($Aid)){
				$uid = $this->modAdmin->getAdminforMsg($adminName);
				$addDAta = $this->chatmodel->insertSingleMsg($uid,$adminName,$name,$message,$current);
				$this->adminchat($uid);
				if($html_redirect === "true")
				{
				$this->chat($uid);
				}else{
					$_SESSION['message']='failed';
				 
				}
			}else{
				$uid = $this->modAdmin->getAvailAdminforMsg();
				$addDAta = $this->chatmodel->insertSingleMsg($uid,$adminName,$name,$message,$current);
				$this->adminchat($uid);
				print_r($uid);
			}
		}


		public function profile()
		{
			$config ['base_url'] = site_url ('admin/allcategories');
			$totalRows = $this->modAdmin->getAllProducts();


			$config['total_rows'] = $totalRows;
			$config['per_page'] = 10;
			$this->load->library('pagination');
			$this->pagination->initialize($config);
			$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page']=4,'');
			$data['usertable'] = $this->modUser->fetchUserOrder($config['total_rows'],'');
			$data['shipping'] = $this->modUser->fetchUserShippingInfo();
			if(empty($data['shipping'])){
				$_SESSION['message']='Your Shipping id is empty, please create new account';
			}

			$this->load->view('header/header');
			$this->load->view('header/css');

			if ($this->session->userdata('id')) {
		        $data['name'] = $this->session->userdata('name'); 
		        $data['results']=$this->modUser->getName($data);
		        $data['count'] =$this->modCart->orderCount($data);
		        $this->load->view('header/navbar',$data);
			    } else{
			        $this->load->view('header/navbar',$data); //change this for users interface
			    }

			$this->load->view('css/extracss'); 
			$this->load->view('profile',$data);
			$this->load->view('header/footer');
			$this->load->view('htmlclose');	

		}

		public function updateprofile()
		{
			if($this->session->userdata('id')){
				$data_address = array(
	              'shipping_email'    => $this->input->post('email'),
	              'shipping_street'    => $this->input->post('street'),
	              'shipping_city'       => $this->input->post('city'),
	              'shipping_region'       => $this->input->post('region'),
	              'shipping_country'       => $this->input->post('country'),
	              'shipping_phone'       => $this->input->post('phone'),
	              'shipping_zipcode'    => $this->input->post('zipcode')
	            );

				if(!empty($data_address)){
					$editprof = $this->modUser->update_shipping($data_address); 
					$_SESSION['message'] = 'Profile updated succesfulley!';
					setFLashData('home/profile');
				}else{
					$_SESSION['message'] = 'Some of the fields are empty!';
					setFLashData('home/profile');
				}

	
			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('home/Signin');
			}

		}

		public function updateAcc()
		{
			$this->form_validation->set_rules('path', 'Image', 'trim|required');
	        $this->load->library('form_validation');
	        if($this->form_validation->run() == FALSE) {
	           setFLashData('admin/profile');
	        } else {
				if($this->session->userdata('id')){
					$data_user = array(
		              'username' => $this->input->post('username'),
		              'name' => $this->input->post('name'),
		              'email' => $this->input->post('email'),
		              'password'=> $this->input->post('password'),
		 
		            );
					$display_image = $this->input->post('image',TRUE);
		            $display_text = $this->input->post('path',TRUE);

		            $x = $this->input->post('x');
		            $y = $this->input->post('y');
		            $x2 = $this->input->post('x2');
		            $y2 = $this->input->post('y2');
		 
		            $w = $this->input->post('w');
		            $h = $this->input->post('h');
		 
					$oldImg = $this->input->post('oldImg',TRUE);

					if (!empty($data_user['name'])){
							if (isset($_FILES['image']) && is_uploaded_file($_FILES['image']['tmp_name'])){
								$config['upload_path'] = realpath(APPPATH.'../assets/images/users/');
					            $config['allowed_types'] = 'jpg|gif|jpeg';
					            $config['max_width'] = 10000;
					            $config['max_height'] = 10000;
					            $config['max_size']= 100000;
					            $this->load->library('upload');
					            $this->upload->initialize($config);
								if(!$this->upload->do_upload('image')) {
					                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
					                redirect(site_url('admin/profile'), 'refresh');
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
					 
					                    $what = getimagesize(realpath(APPPATH.'../assets/images/users/'. $file_name));
					                    switch(strtolower($what['mime'])) {
					                        // case 'image/png':
					                        //     $img_r = imagecreatefrompng(realpath(APPPATH.'../assets/images/banners/' . $file_name));
					 
					                        //     imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                        //     # png
					                        //     imagepng($dst_r, $full_path, $quality);
					                        //     break;
					                       
					                        case 'image/jpeg':
					                            $img_r = imagecreatefromjpeg(realpath(APPPATH.'../assets/images/users/' . $file_name));
					 
					                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                            # Generates a jpeg.
					                            imagejpeg($dst_r, $full_path, $quality);
					                            break;
					                       
					                        case 'image/gif':
					                            $img_r = imagecreatefromgif(realpath(APPPATH.'../assets/images/users/' . $file_name));
					 
					                            imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
					                           
					                            # Generates a gif.
					                            imagegif($dst_r, $full_path, $quality);
					                            break;
					 
					                        default: die();
					                    }

					                    $data_user['image'] = $file_name;
					                }

					            }

							}
							$_SESSION['message']= $data_user['image'];

							$editacc = $this->modUser->update_account($data_user); 
							$_SESSION['message'] = 'Account updated succesfulley!';
							setFLashData('home/profile');

					}
				//empty name
				}else{
					$_SESSION['message'] = 'Login!!';
					setFLashData('admin/login');
				}

			}
		}

		public function deleteOrd(){
			if($this->session->userdata('id')){
				if($this->input->is_ajax_request()){
					$this->input->post('id',true);
					$id = $this->input->post('text',true);
					if(!empty($id) && isset($id)){
						$id = $this->encryption->decrypt($id);
						$checkMd = $this->modCart->deleteCancelledItem($id);
						if($checkMd){
							$_SESSION['message'] = 'Deleted succesfulley!';
				 
						}else{
							$_SESSION['message'] = 'Something went wrong!';
							setFLashData('home/profile');
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
						setFLashData('home/profile');
					}

				}else{
					$_SESSION['message'] = 'Something went wrong!!';
					setFLashData('home/profile');
				}
			}else{
				$_SESSION['message']='Please Log in';
				setFLashData('admin/Signin');
			}

		}	


		public function Signout()
		{
			if($this->session->userdata('id')){
				$this->session->set_userdata ('id','');
				$_SESSION['message']='Signed out succesfulley';
				redirect('home');	
			}else{
				$_SESSION['message']='Please Log in now';
				redirect ('home');
			}
		}


		public function Signup(){

			$this->load->view('header/header');
			$this->load->view('header/css');
			$this->load->view('Signup');
			$this->load->view('header/footer');
			$this->load->view('htmlclose');	
		}

		public function add_to_cart(){

			if($this->session->userdata('id')){
				$data['name']=$this->input->post('name',TRUE);
				$data['price']=$this->input->post('price',TRUE) ;
				$data['image']=$this->input->post('image',TRUE);
				$stock=$this->input->post('stock',TRUE);
				$qty =$this->input->post('qty',TRUE);
				$data['total']=$qty * $data['price'];
				$product_id =$this->input->post('product_id',TRUE);

				$checkquant=$this->modAdmin->checkQuantity($product_id);

				if($checkquant > 0){
					if($qty > $checkquant){
						$_SESSION['message']='Please reduce quantity';
						setFLashData('home');

					}else{
						$addDAta = $this->modCart->add_and_checkCart($data,$product_id,$qty);
						if($check){
							$_SESSION['message']='Something went wrong';
							setFLashData('home');
						}else{
							$totalQuan = $checkquant - $qty;
							$reduceQty = $this->modAdmin->upQty($product_id,$totalQuan);
							$_SESSION['message']='Product is added to your cart';
							setFLashData('home');
						}

					}
				}else{
					$_SESSION['message']='Out of stock';
					setFLashData(' ');
				}

			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('home/Signin');
			}

		}

		public function allcheckout(){ //proceed all checkoud lods

			if($this->session->userdata('id')){
				$product_id 	 = $this->input->post('pid',true);
				$order_total 	 = $this->input->post('total',true);
				$cart_details_id = $this->input->post('cart_details_id',true);
				$get_shipping    = $this->modCart->get_shipAdd();
				$payment         = $this->input->post('payment',true);
				$user_id         = $this->session->userdata('id');

				$result = array(); //for insert_batch huhu
                foreach($this->input->post('pid') as $key => $val){
                     $result[] = array (
                      'product_id'   =>$val,
                      'order_total'   => $_POST['total'][$key],
                      'cart_details_id'   =>$this->input->post('cart_details_id')[$key],
                      'shipping_id'   => $get_shipping,
                      'payment_id'		=>  $this->input->post('payment')[$key],
                      'user_id'			=>	$user_id
                     );
                }
				//print_r($cart_details_idforstat);
			      $checkout = $this->modCart->checkoutall($result);

 					$stat = array();
	                foreach($this->input->post('pid') as $key => $val){
	                     $stat[] = array(
	                     	'product_id'=>$val,
	                       'id'=>$this->input->post('cart_details_id')[$key],
	                      'status'=>'Pending'
	                  );
	                }
	                print_r($stat);
					if($checkout){
						$_SESSION['message']='Something went wrong';
						setFLashData('home/cart');
					 }else{
					 	$change_stat = $this->modCart->changestatus($stat);
					 	$_SESSION['message']='Product will now be proccesed';
					 	setFLashData('home/cart');
					 }


			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('home/Signin');
			}

		}

		public function cart(){

			if($this->session->userdata('id')){
				$config ['base_url'] = site_url ('home/cart');
				$pid = $this->input->post('pid',true);
				$data = array('total' => $this->modCart->total($pid));
				$totalRows = $this->modAdmin->getAllCategories();
				$totalRows = $this->modAdmin->getAllusercart();


				$config['total_rows'] = $totalRows;
				$config['per_page'] = 3;
				$config['uri_segment'] = 3;
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page']=4,'');
				$data['usercart'] = $this->modCart->fetchUsersCart($config['per_page']= 3,$page);
				$data['grandtotal']=$this->modCart->get_user_total();
				//var_dump($data['grandtotal']);
				$data['paymOpt']=$this->modAdmin->getPayment();
				$data['link'] = $this->pagination->create_links();

				$this->load->view('header/header');
				$this->load->view('header/css');
				if ($this->session->userdata('id')) {
			        $data['name'] = $this->session->userdata('name'); 
			        $data['results']=$this->modUser->getName($data);
			        $data['count'] =$this->modCart->orderCount($data);
			        $this->load->view('header/navbar',$data);
				    } else{
				        $this->load->view('header/navbar',$data); //change this for users interface
				    }
				 if(empty($data['usercart'])){
					$this->load->view('emptycart');
				}else{
					$this->load->view('cart',$data);
				}
				$this->load->view('header/footer');
				$this->load->view('htmlclose');
			
			}else{
				$_SESSION['message']='Please log in!';
				setFLashData('login');
			}	


		}
		///
		public function pendingItems(){

			if($this->session->userdata('id')){
				$config ['base_url'] = site_url ('home/cart');
				$pid = $this->input->post('pid',true);
				$data = array('total' => $this->modCart->total($pid));
				$totalRows = $this->modCart->getAllusercart( );
				$totalRows = $this->modAdmin->getAllCategories();


				$config['total_rows'] = $totalRows;
				$config['per_page'] = 10;
				$config['uri_segment'] = 3;
				$this->load->library('pagination');
				$this->pagination->initialize($config);
				$page = ($this->uri->segment(3))? $this->uri->segment(3):0;
				$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page']=4,$page);
				$data['usercart'] = $this->modCart->fetchUsersCart($config['per_page']=3,$page);
				$data['paymOpt']=$this->modAdmin->getPayment();
				$data['link'] = $this->pagination->create_links();

				$this->load->view('header/header');
				$this->load->view('header/css');
				if ($this->session->userdata('id')) {
			        $data['name'] = $this->session->userdata('name'); 
			        $data['results']=$this->modUser->getName($data);
			        $data['count'] =$this->modCart->orderCount($data);
			        $this->load->view('header/navbar',$data);
				    } else{
				        $this->load->view('header/navbar',$data); //change this for users interface
				    }
				 if(empty($data['usercart'])){
					$this->load->view('emptycart');
				}else{
					$this->load->view('cart',$data);
				}
				$this->load->view('header/footer');
				$this->load->view('htmlclose');
			
			}else{
				$_SESSION['message']='Please log in!';
				setFLashData('login');
			}	


		}
		///
		public function cateprod($cid)
		{
			if (!empty($cid) && isset($cid)) {
					$totalRows = $this->modAdmin->getAllProducts();
					$config['total_rows'] = $totalRows;
					$config['per_page'] = 20;
					$config['uri_segment'] = 4;
					$this->load->library('pagination');
					$this->pagination->initialize($config);
					$page = ($this->uri->segment(4))? $this->uri->segment(4):0;
					$data['product']=$this->modAdmin->checkProductByCategory($cid,$config['per_page'],$page);
					$data['sale_product'] = $this->modAdmin->fetchSalecategorizedProducts($cid,$config['total_rows']=20,'');
					//$data['link'] = $this->pagination->create_links();
					$data['catname']=$this->modAdmin->getNameCiD($cid);
					if (count($data['product']) ) {
						$totalRows = $this->modAdmin->getAllCategories();
						$config['total_rows'] = $totalRows;
						$config['per_page'] = 4;
						$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page'],'');
						$this->load->view('header/header');
						$this->load->view('header/css');
						$data['name'] = $this->session->userdata('name'); 
				        	$data['results']=$this->modUser->getName($data);
				        	$data['count'] =$this->modCart->orderCount($data);
						$this->load->view('header/navbar',$data);
						$this->load->view('categories',$data);
					}else{
						setFLashData('home/Signin');
					}

			}else{

				setFLashData('home');
			}
			$this->load->view('header/footer');
			$this->load->view('htmlclose');
		}

		public function order(){
			if($this->session->userdata('id')){


			
			}else{
				$_SESSION['message']='Please log in!';
				setFLashData('login');
			}	


		}

		public function cartOption()
		{	
			$uid=$this->session->userdata('id');
			$cart_details_id = $this->input->post('cart_details_id',TRUE);
			 if(isset($_POST["updatequantity"])) {
				$qty = $this->input->post('qid',TRUE);
				$total=$this->input->post('total',TRUE);
				$addDAta = $this->modCart->updateOrderProd($total,$qty,$cart_details_id);
				$_SESSION['message'] = 'Product updated succesfulley!';
				setFLashData('home/cart');
			  }

			  if(isset($_POST["delete"])){
			    if($this->input->is_ajax_request()){
						$this->input->post('id',true);
						$id = $this->input->post('text',true);
						if(!empty($id) && isset($id)){
							$id = $this->encryption->decrypt($id);
							$checkMd = $this->modCart->deleteSingleitem($id);
							if($checkMd){
								$_SESSION['message'] = 'Deleted succesfulley!';
								setFLashData('home/cart');
							}else{
								$_SESSION['message'] = 'Something went wrong!';
								setFLashData('home/cart');
							}

						}else{
							$_SESSION['message'] = 'Not exist!';
							setFLashData('home/cart');
						}

					}else{
						$_SESSION['message'] = 'Something went wrong!!';
						setFLashData('home/cart');
					}
			  }

			  if(isset($_POST["singleCheckout"])){
			    $product_id = $this->input->post('pid',true);
				$get_shipping=$this->modCart->get_shipAdd();

				$data = array(
					'payment_id'=>$this->input->post('payment'),
					'order_total'=>$this->input->post('total'),
					'shipping_id'=>$get_shipping,
					'product_id'=>$product_id,
					'cart_details_id'=>$cart_details_id,
					'user_id'=>$uid
				);



				if(!empty($data['order_total']) && !empty($data['payment_id' ])){
					$checkout = $this->modCart->single_checkout($data);
					if($checkout){
					 	$_SESSION['message']='Something went wrong';
					 	setFLashData('home/cart');
					 }else{
					 	$changestat = $this->modCart->changeSinglestatus($cart_details_id);
					 	$_SESSION['message']='Product will be proccesed';
					 	setFLashData('home/cart');
					 }
				}else{
					$_SESSION['message']='Empty';
					setFLashData('home/cart');
				}
			  }
		}

		public function updatequantity()
		{
			if($this->session->userdata('id')){
				$pid = $this->input->post('pid',TRUE);
				$qty = $this->input->post('qid',TRUE);
				$total=$this->input->post('total',TRUE);
				$addDAta = $this->modCart->updateOrderProd($total,$qty,$pid);
				$_SESSION['message'] = 'Product updated succesfulley!';
				setFLashData('home/cart');
	
				
			}else{
				$_SESSION['message']='Please Sign in';
				setFLashData('home/Signin');
			}

		}


		public function deleteitem()
		{
			if ($this->session->userdata('id')){
				if($this->input->is_ajax_request()){
					$this->input->post('id',true);
					$id = $this->input->post('text',true);
					if(!empty($id) && isset($id)){
						$id = $this->encryption->decrypt($id);
						$checkMd = $this->modCart->deleteSingleitem($id);
						if($checkMd){
							$_SESSION['message'] = 'Deleted succesfulley!';
							setFLashData('home/cart');
						}else{
							$_SESSION['message'] = 'Something went wrong!';
							setFLashData('home/cart');
						}

					}else{
						$_SESSION['message'] = 'Not exist!';
						setFLashData('home/cart');
					}

				}else{
					$_SESSION['message'] = 'Something went wrong!!';
					setFLashData('home/cart');
				}




			}else{
				setFLashData('admin/login');
				echo "Please log in!";
			}
		}



}
