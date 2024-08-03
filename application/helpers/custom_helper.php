<?php

function setFlashData( $url){
	$ci = get_instance();
	redirect($url);
	}

function adminLoggedin(){
	$CI = get_instance();
	$CI->load->library('session');
		if($CI->session->userdata('id')){
			return TRUE;
		}else{
			return FALSE;
		}
	}
 ?>
