<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_Poster extends CI_Model {

		function __construct() {

			parent::__construct();
			$this->load->model('model_comment');
			$this->load->model('model_post');
		}

		function addPoster($info){
			$data = array (
							"username" => $info['username'],
							"email" => $info['email'],
							"password_id" => $info['password'],
							"img_file" => "avatar.png"
							);

			$this->db->where("username", $info['username']);
			$this->db->or_where("email", $info['email']);
			$poster = $this->db->get("poster")->row_array();

			if ($poster){
				return null;
			}

			try{
				$this->db->insert('poster', $data);
			} catch(Exception $e){
				throw $e;
			}

			$this->db->where(array("email" => $info['email'], 
									"password_id" => $info['password']));
			
			$result = $this->db->get("poster")->result_array();

			if (count($result) == 1)
				$this->db->trans_complete();
				return $result[0];
		}

		function getPoster($id){

			$this->db->where("posterID", $id);
			$this->db->or_where("username", $id);
			$this->db->or_where("email", $id);

			try{
				$result = $this->db->get("poster")->row_array();
			} catch(Exception $e){
				throw $e;
			}

			if (count($result) > 0) {
				$result['password'] = $this->model_password->getPassword($result['password_id']);
				return $result;
			} else {
				return FALSE;
			}
		}

		function getPosts($id) {
			$data = array("poster_id" => $id);
			$result = $this->model_post->getPosts($data);
			if (count($result) > 0) {
				return $result;
			} else {
				return NULL;
			}
		}

		function update($id, $data) {
			$this->db->set($data);
			$this->db->where("posterID", $id);
			try{
				$this->db->update('poster');
				return true;
			} catch(Exception $e){
				throw $e;
			}
		}

		function getComments($id) {
			$data = array("commenter" => $id);
			$comments = $this->model_comment->getComments($data);
			if (count($comments) > 0) {
				return $comments;	
			}else {
				return NULL;
			}
		}

	}