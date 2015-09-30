<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Register extends MY_Controller {

		function __construct() {
			parent::__construct();
		}

		public function index(){
			if($this->loggedin()){
				$user = $this->session->userdata('poster_id');
				redirect("profile/view/".$user);
			}
			$this->signup();
		}

		function signup() {
			$data['message'] = $this->session->userdata('msg');
			$this->session->unset_userdata('msg');
			$this->load->view('head');
			$this->load->view('register', $data);
			$this->load->view('foot');
		}

		function doAdd() {
			if (isset($_POST)) {
				$username = $this->input->post('username');
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$repassword = $this->input->post('repassword');

				if ($password !== $repassword) {
					$data['error'] = array('username' => $username, 
											'email' => $email, 
											'msg' => 'Passwords do not match');

					$this->load->view('head');
					$this->load->view('register', $data);
					$this->load->view('foot');
				}
				//Txn Mgt
				// $this->em->getConnection()->beginTransaction();

				try{
					$this->db->trans_start(); //start transaction

					$pwinfo = $this->hash_it($repassword);
					$password = $this->model_password->addPwInfo($pwinfo);

					$userinfo = array('username' => $username, 
										'email' => $email, 
										'password' => $password['passwordID']);

					$poster = $this->model_poster->addPoster($userinfo);

					if ($poster) {
						$data['poster'] = $poster;
						$this->session->set_userdata('poster_id', $poster['posterID']);
						$data['message'] = 'Poster added';
						$this->load->view('head');
						$this->load->view('createprofile', $data);
						$this->load->view('foot');

						 //complete transaction
					} else {
						$msg = array("msg" => "This username/email is already taken");
						$this->session->set_userdata($msg);
						$this->signup();
					}

				} catch (Exception $e) {
				    	echo $e->getMessage();
				}
			} else {
				$this->index();
			}
		}

	}