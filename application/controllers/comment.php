<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Comment extends MY_Controller {

		function __construct() {

			parent::__construct();
		}

		public function index() {
			
		}

		public function add($post_id){
			$data['post'] = $this->model_post->getPost($post_id);
			$data['song'] = $this->model_song->getSong($data['post']['song_id']);
			$data['message'] = $this->session->userdata('msg');
			$this->session->unset_userdata('msg');
			$this->load->view('head');
			$this->load->view('newcomment', $data);
			$this->load->view('foot');
		}

		public function do_add($post_id, $song_id){
			$c = trim($this->input->post('comment'));
			$this->model_comment->add($post_id, $song_id, $c);
			$msg = array("msg" => "Comment successfully added");
			$this->session->set_userdata($msg);
			$this->view($post_id);
		}

		public function delete($id){
			if($this->loggedin()){
				try {
					$this->model_comment->delete($id);
					$msg = array("msg" => "Comment successfully deleted");
					$this->session->set_userdata($msg);

					$this->view($this->session->userdata('post_id'));
				} catch (Exception $e) {
					echo $e->getMessage();
				}
			} else {
				null;
			}
		}

		public function view($id){
			$this->session->set_userdata('post_id', $id);
			$comments = $this->model_post->getComments($id);
			$commenters = array();
			if (!empty($comments)){
				foreach ($comments as $comment){
					$commenter = $this->model_poster->getPoster($comment['commenter']);
					array_push($commenters, $commenter);
				}
			}
			$post = $this->model_post->getPost($id);
			$data = array(
						'comments' => $comments,
						'post' => $post,
						'commenters' => $commenters
						);
			$data['message'] = $this->session->userdata('msg');
			$this->session->unset_userdata('msg');

			$this->load->view('head');
			$this->load->view('comments', $data);
			$this->load->view('foot');
			
		}

	}