<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends MY_Controller {

		function __construct() {

			parent::__construct();
		}

		function index() {
			if ($this->loggedin()){
				$this->success();
			} else {
				$data['message'] = $this->session->userdata('not_loggedin') ? $this->session->userdata('not_loggedin') : " ";
				$this->session->sess_destroy();
				$this->load->view('head');
				$this->load->view('login', $data);
				$this->load->view('foot');
			}
		}

		function submit() {
			$button = $this->input->post('submit');
			switch ($button) {
				case "login": 
					$this->login();
					break;
				default:
					$this->index();
			}
		}

		function login() {
			$username = trim($this->input->post('username'));
			$password = $this->input->post('password');

			if (empty($username) || empty($password)){
				$data['message'] = "Please provide both username and password";
				$this->load->view('head');
				$this->load->view('login', $data);
				$this->load->view('foot');
			} else {

				$poster = $this->model_poster->getPoster($username);
				
				if (!empty($poster)){
					$salt1 = $poster['password']['salt1'];
					$salt2 = $poster['password']['salt2'];
					$pwhash = $poster['password']['pwhash'];
					$newhash = $this->createhash($salt1, $salt2, $password);

					if ($newhash !== $pwhash) {
						$data['message'] = "Invalid login details";
						$this->load->view('head');
						$this->load->view('login', $data);
						$this->load->view('foot');
					} else {
						// echo 'Successful login!';

						$this->session->set_userdata('poster_id', $poster['posterID']);
						$this->session->set_userdata('poster_img', $poster['img_file']);
						$this->success();
					}
				} else {
					$data['message'] = "Poster does not exist";
					$this->load->view('head');
					$this->load->view('login', $data);
					$this->load->view('foot');
				}
			}
		}

		private function success(){
			redirect('home');
			// $this->load->view('head');
			// $this->load->view('newpost');
		}
	}