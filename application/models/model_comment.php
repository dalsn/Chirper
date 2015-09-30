<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_Comment extends CI_Model {

		function __construct() {

			parent::__construct();
		}

		function add($post_id, $song_id, $c){
			$poster_id = $this->session->userdata('poster_id');
			$data = array(
							"commenter" => $poster_id,
							"post_id" => $post_id,
							"song_id" => $song_id,
							"comment" => $c,
							"timestamp" => time()
					);
			try{
				$this->db->insert('comments',$data);
			} catch (Exception $e) {
				throw $e;
			}
		}

		function getComment($id) {
			$this->db->where("commentID", $id);
			$result = $this->db->get("comments")->row_array();

			if (count($result) > 0) {
				return $result;
			} else {
				return FALSE;
			}
		}

		function delete($id){
			$sql = 'DELETE FROM comments WHERE commentID = ?';
			try{
				$this->db->query($sql, array($id));
			} catch (Exception $e){
				throw $e;
			}
			
		}

		function getComments($data) {

			$this->db->select("*");
			$this->db->from("comments");
			if ($data)
				$this->db->where($data);
			$this->db->join('song', 'song.songID = comments.song_id');

			$this->db->order_by("timestamp", "asc");
			$result = $this->db->get()->result_array();
			if (count($result) > 0) {
				return $result;
			} else {
				return NULL;
			}
		}

	}