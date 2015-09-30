<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Posts extends MY_Controller {

		function __construct() {

			parent::__construct();
		}

		function index() {
			if ($this->loggedin()){
				// redirect('login');
				$this->load->view('head');
				$this->load->view('newpost');
				$this->load->view('foot');
			} else {
				$this->session->set_userdata("not_loggedin", "You need to login to add posts");
				redirect('login');
			}
		}

		function do_add() {
			$song_name = strtolower(trim($this->input->post('song')));
			$artist_name = strtolower(trim($this->input->post('artist')));
			$post = $this->input->post('post');

			$song = $this->model_song->getSong(null, $song_name, $artist_name);
			$poster = $this->model_poster->getPoster($this->session->userdata('poster_id'));

			if (!empty($song) && !empty($poster)) {
				$post = $this->model_post->add($poster, $song, $post);
			} else {
				$msg = array("msg" => "unable to find poster or song");
				$this->session->set_userdata($msg);
				redirect('home');
			}
			
			
			if ($post) {
				$msg = array("msg" => "Post successfully added");
				$this->session->set_userdata($msg);
				redirect('home');
			} else {
				$msg = array("msg" => "unable to add post at this time");
				$this->session->set_userdata($msg);
				redirect('home');
			}
		}

		function delete($id) {
			if($this->loggedin()){
				try {
					$this->model_post->delete($id);
					$msg = array("msg" => "Post successfully deleted");
					$this->session->set_userdata($msg);

					redirect('profile');
				} catch (Exception $e) {
					echo $e->getMessage();
				}
			} else {
				null;
			}
			
		}

	}