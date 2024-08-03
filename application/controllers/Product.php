<?php 
	class Product extends CI_Controller{

		public function details($pid)
		{

			$config ['base_url'] = site_url ('product/details');
			$totalRows = $this->modAdmin->getAllCategories();

			$config['total_rows'] = $totalRows;
			$config['per_page'] = 4;
			$data['category1'] = $this->modAdmin->fetchAllCategories($config['per_page'],'');
			$data['link'] = $this->pagination->create_links();


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

			if (!empty($pid) && isset($pid)) {
				$data['detail']=$this->modAdmin->checkProductById($pid);
				$cpid=$this->modAdmin->getProdCat($pid);
				if (count($data['detail'])==1) {
					$data['categoryOpt']=$this->modAdmin->get_name($cpid);
					$data['quantity']=$this->modCart->checkOrderProduct($pid);
					$this->load->view('details',$data);
				}else{
					setFLashData('product');
					echo "not found";
				}
			}else{
				setFLashData('product');


			}
			$this->load->view('header/footer');
			$this->load->view('htmlclose');

		}


		
}