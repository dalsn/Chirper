<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_Post extends CI_Model {

		function __construct() {

			parent::__construct();
			$this->load->model('model_comment');

		}

		function add($poster, $song, $p){
			$data = array(
							"poster_id" => $poster['posterID'],
							"comment" => $p,
							"song_id" => $song['songID'],
							"timestamp" => time()
						);
			try{
				$this->db->insert('post',$data);
				return true;
			} catch (Exception $e) {
				throw $e;
			}
		}

		function getPost($id) {

			$this->db->select("*");
			$this->db->from("post");

			$this->db->where("postID", $id);

			$this->db->join('poster', 'post.poster_id = poster.posterID');
			$this->db->join('song', 'post.song_id = song.songID');

			$result = $this->db->get()->row_array();

			if (count($result) > 0) {
				return $result;
			} else {
				return FALSE;
			}
		}

		function delete($id){
			$sql = 'DELETE FROM post WHERE postID = ?';
			try{
				$this->db->query($sql, array($id));
			} catch (Exception $e){
				throw $e;
			}
		}

		function getPosts($data) {

			$this->db->select("*");
			$this->db->from("post");
			if (!empty($data))
				$this->db->where($data);
			$this->db->join('poster', 'post.poster_id = poster.posterID');
			$this->db->join('song', 'post.song_id = song.songID');			

			$this->db->order_by("timestamp", "desc");
			$result = $this->db->get()->result_array();

			if (count($result) > 0) {
				return $result;
			} else {
				return NULL;
			}
		}

		function getComments($id) {
			$data = array("post_id" => $id);
			$comments = $this->model_comment->getComments($data);
			if (count($comments) > 0) {
				return $comments;	
			}else {
				return NULL;
			}
		}

		function countComments($id) {
			$data = array("post_id" => $id);
			$comments = $this->model_comment->getComments($data);
			$count = count($comments);
			if (count($comments) > 0) {
				return $count;	
			}else {
				return 0;
			}
		}

	}