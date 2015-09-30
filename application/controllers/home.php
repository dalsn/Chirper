<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Home extends MY_Controller {

		function __construct() {

			parent::__construct();
		}

		function index() {
				$this->displayPosts();
		}

		private function displayPosts(){
			$posts = null;
			try{
				$posts = $this->model_post->getPosts(array());
				$data['posts'] = $posts;
				$data['message'] = $this->session->userdata('msg');
				$this->session->unset_userdata('msg');
				$this->load->view('head');
				$this->load->view('home', $data);
				$this->load->view('foot');
			} catch(Exception $e){
				echo $e->getMessage();
			}
		}

		function song($id=null){
			try{
				$posts = $this->model_post->getPosts(array('song_id' => $id));
				$data['posts'] = $posts;
				$data['message'] = $this->session->userdata('msg');
				$this->session->unset_userdata('msg');
				$this->load->view('head');
				$this->load->view('home', $data);
				$this->load->view('foot');
			} catch(Exception $e){
				echo $e->getMessage();
			}
		}

		function artist($artist=null){
			$where = "song_id = 0";
			if (null !== $artist){
				$artist = strtolower(preg_replace( array('/%20/'), array(' '), $artist));
				$result = $this->model_song->getId($artist);
				// print_r($result);
				if (!empty($result))
					for ($i = 0; $i < count($result); $i++){
						$where .= " OR song_id = ".$result[$i]['songID'];
					}
				// echo $where;
			}
			try{
				$posts = $this->model_post->getPosts($where);
				$data['posts'] = $posts;
				$data['message'] = $this->session->userdata('msg');
				$this->session->unset_userdata('msg');
				$this->load->view('head');
				$this->load->view('home', $data);
				$this->load->view('foot');
			} catch(Exception $e){
				echo $e->getMessage();
			}
		}

	}