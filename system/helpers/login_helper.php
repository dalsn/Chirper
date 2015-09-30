<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

  	function is_loggedin() {
  		$CI =& get_instance();
		$value = $CI->session->userdata('is_logged_in');
	    
	    if ($value === 1){
	    	return TRUE;
	    }else {
	    	return FALSE;
	    }
	}