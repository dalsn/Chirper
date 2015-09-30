<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_Song extends CI_Model {

		function __construct() {

			parent::__construct();
			$this->load->model('model_comment');
		}

		function add($song_name, $artist_name){
			$poster_id = $this->session->userdata('poster_id');
			$data = array(
							"songName" => $song_name,
							"artist" => $artist_name
							);
			try{
				$this->db->insert('song',$data);
			} catch (Exception $e) {
				throw $e;
			}
		}

		function delete($id){
			$sql = 'DELETE FROM song WHERE songID = ?';
			try{
				$this->db->query($sql, array($id));
			} catch (Exception $e){
				throw $e;
			}
			
		}

		function getSong($id=null, $song_name=null, $artist_name=null){
			if ($id) {
				$this->db->where("songID", $id);
			} else {
				$this->db->where(array("songName"=>$song_name, "artist"=>$artist_name));
			}
			
			try{
				$result = $this->db->get("song")->row_array();
			} catch(Exception $e){
				throw $e;
			}

			if (count($result) > 0) {
				return $result;
			} else {
				$this->add($song_name, $artist_name);
				$this->db->where(array("songName"=>$song_name, "artist"=>$artist_name));
				$result = $this->db->get("song")->row_array();
				return $result;
			}
			
		}

		function getComments($id) {
			$data = array("song_id" => $id);
			$comments = $this->model_comment->getComments($data);
			if (count($comments) > 0) {
				return $comments;	
			}else {
				return NULL;
			}
		}

		function getId($artist){
			$where = "artist like '$artist'";
			// echo $where;
			$this->db->select("songID");
			$this->db->from("song");
			$this->db->where($where);
			$result = $this->db->get()->result_array();
				return $result;
		}

	}