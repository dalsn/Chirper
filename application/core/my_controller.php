<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	function __construct() {
		parent::__construct();
        date_default_timezone_set('Europe/London');
        $this->load->helper('url'); //load url helper
		$this->load->helper('form'); //load form helper
		$this->load->library('input'); //load input library
        $this->load->library('session'); //load session library

		//load models
		$this->load->model('model_poster');
		$this->load->model('model_password');
        $this->load->model('model_song');
        $this->load->model('model_post');
        $this->load->model('model_comment');
	}

	protected function hash_it($pw) {

        // Generate two salts (both are numerical)
        $salt1 = mt_rand(1000,9999999999);
        $salt2 = mt_rand(100,999999999);

        // Append the salts to the data
        $salted_pw = "$salt1" . "$pw" . "$salt2";

        // Generate a salted hash
        $pwhash = sha1($salted_pw);

        $pwinfo = array( 'salt1' => $salt1, 'salt2' => $salt2, 'pwhash' => $pwhash);

        // Return the hash
        return $pwinfo;
    }

    protected function createhash($salt1, $salt2, $pw) {

        // Append the salts to the data
        $salted_pw = "$salt1" . "$pw" . "$salt2";

        // Generate a salted hash
        $pwhash = sha1($salted_pw);

        // Return the hash
        return $pwhash;
    }

    public function serialize($obj) {
        $item = base64_encode(serialize($obj));
        return $item;
    }

    public function unserialize($item) {
        $object = unserialize(base64_decode($item));
        return $object;
    }

    public function loggedin(){
        $poster_id = $this->session->userdata('poster_id');
        if ($poster_id){
            return true;
        } else { 
            return false;
        }
    }

    public function isPosterViewer($p, $u){
        if (!empty($u)){
            if ($p == $u) return true;
            return false;
        } else { 
            return false;
        }
    }

    public function canDelete($v, $c){
        if ($v == $c) return true;
            return false;
    }
}