<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Profile extends MY_Controller {

		function __construct() {

			parent::__construct();
		}

		function index() {
			$this->my_profile();
		}


		function my_profile() {
			$button = $this->input->post('submit');
			$poster_id = $this->session->userdata('poster_id');
			if ($button == "upload"){
				if($this->do_upload()){
					$file_data = $this->do_upload();
					$filename = $file_data['file_name'];
					$poster['img_file'] = $filename;
					try {
						$poster = $this->model_poster->update($poster_id, $poster);
					} catch (Exception $e){
						echo $e->getMessage();
					}
					$this->session->set_userdata('poster_img', $poster['img_file']);
					$this->session->set_userdata("msg", "Avatar successfully uploaded");
					$this->view($poster_id);
				} else {
					$this->session->set_userdata("msg", $this->upload->display_errors());
					$this->view($poster_id);
				}
					
			} elseif ($button == "save") {
				$username = $this->input->post('username');
				$username1 = $this->input->post('username1');
				$fullname = $this->input->post('fullname');
				$bio = $this->input->post('bio');
				$address = $this->input->post('address');
				$web = $this->input->post('website');

				if ($username1 !== $username) {
					$poster = $this->model_poster->getPoster($username);
					if ($poster){
						$msg = array("msg" => "This username is taken!");
						$this->session->set_userdata($msg);

						$poster_id = $this->session->userdata('poster_id');
						$this->view($poster_id);
						return null;
					} else {
						$poster['username'] = $username;
					}
				}

				$poster['posterName'] = $fullname;
				$poster['bio'] = $bio;
				$poster['address'] = $address;
				$poster['web'] = $web;

				try {
					$poster = $this->model_poster->update($poster_id, $poster);
				} catch (Exception $e){
					echo $e->getMessage();
				}
				
				$msg = array("msg" => "Profile updated!");
				$this->session->set_userdata($msg);

				$poster_id = $this->session->userdata('poster_id');
				$this->view($poster_id);
			
				
			} else {
				if($this->loggedin()){
					$poster_id = $this->session->userdata('poster_id');
					$this->view($poster_id);
				} else {

					$msg = array("msg" => "Please login here");
					$this->session->set_userdata($msg);
					redirect('login');
				}
				
			}
		}

		function view($poster_id){
			$posts = $this->model_poster->getPosts($poster_id);
			$data['posts'] = $posts;
			$poster = $this->model_poster->getPoster($poster_id);
			$data ['poster'] = $poster;
			$data ['message'] = $this->session->userdata('msg');
			$this->session->unset_userdata('msg');
			$this->load->view('head');
			$this->load->view('profile', $data);
			$this->load->view('foot');
		}

		private function do_upload() {
			// $config['upload_url'] = base_url().'uploads/'; 
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size']	= '200';
			$config['max_width']  = '240';
			$config['max_height']  = '240';
			$config['remove_spaces'] = TRUE;
			$config['encrypt_name'] = TRUE;
			$config['upload_path'] = "./imgs/posters/";
			$field_name = 'avatar';

			$this->load->library('upload', $config);
			//$this->upload->initialize($config);

			if ( ! $this->upload->do_upload($field_name))
			{
				 // $error = $this->upload->display_errors();
				 return false;
			}
			else
			{
				$file_data = $this->upload->data();
				return $file_data;
			}
		}

		function logout(){
			$this->session->sess_destroy();
			$this->load->view('head');
			$this->load->view('login');
			$this->load->view('foot');
		}

	}
			