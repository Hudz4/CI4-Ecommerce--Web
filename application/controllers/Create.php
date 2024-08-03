<?php 


class Create extends CI_Controller{

        public function adduser() {
            $this->form_validation->set_rules('path', 'Image', 'trim|required');
            $this->load->library('form_validation');
            if($this->form_validation->run() == FALSE) {
               setFLashData('login/newUser');
            } else {
                $data_user = array(
                  'username' => $this->input->post('username'),
                  'name' => $this->input->post('name'),
                  'email' => $this->input->post('email'),
                  'password'=> $this->input->post('password'),
     
                );

                $data_address = array(
                  'shipping_email'    => $this->input->post('email'),
                  'shipping_street'    => $this->input->post('street'),
                  'shipping_city'       => $this->input->post('city'),
                  'shipping_region'       => $this->input->post('region'),
                  'shipping_country'       => $this->input->post('country'),
                  'shipping_phone'       => $this->input->post('phone'),
                  'shipping_zipcode'    => $this->input->post('zipcode')
                ); 

                $display_image = $this->input->post('image');
                $display_text = $this->input->post('path');
               
                $x = $this->input->post('x');
                $y = $this->input->post('y');
                $x2 = $this->input->post('x2');
                $y2 = $this->input->post('y2');
     
                $w = $this->input->post('w');
                $h = $this->input->post('h');
     
                $this->load->library('upload');
               
          
                $config['upload_path'] = realpath(APPPATH.'../assets/images/users/');
                $config['allowed_types'] = 'jpg|gif|jpeg';
                $config['max_width'] = 10000;
                $config['max_height'] = 10000;
                $config['max_size']= 100000;
                $this->upload->initialize($config);
     
                if(!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('upload_error', $this->upload->display_errors());
                    redirect(site_url('login/newUser'), 'refresh');
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
     
                        $what = getimagesize(realpath(APPPATH.'../assets/images/users/'. $file_name));
                        switch(strtolower($what['mime'])) {
         
                            case 'image/png':
                                $img_r = imagecreatefrompng(realpath(APPPATH.'../assets/images/users/' . $file_name));
     
                                imagecopyresampled($dst_r, $img_r, 0, 0, $x, $y, $targ_w, $targ_h, $w, $h);
         
                                imagepng($dst_r, $full_path, $quality);
                                break;
                           
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
                        // var_dump($uploaded_image);
                    }
                    $addDAta = $this->modUser->checkUser($data_user);
                    if ($addDAta){
                        $_SESSION['message'] = 'User already existed!';
                        setFLashData('login/newUser');
                    }else{
                        $addDAta = $this->modUser->insert_entry($data_user, $data_address);
                        if ($addDAta){
                             $_SESSION['message'] = 'Failed';
                            setFLashData('login/newUser');
                        }else{
                             $_SESSION['message'] = 'Registered succesfulley!';
                            setFLashData('login/newUser');
                        
                        }
                        
                    }
                }
            }
        }
}