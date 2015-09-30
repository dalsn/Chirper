<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Model_Password extends CI_Model {

		function __construct() {

			parent::__construct();
		}

		function addPwInfo($pwinfo){
			$password = array
			(	"salt1"=>$pwinfo['salt1'],
				"salt2"=>$pwinfo['salt2'],
				"pwhash"=>$pwinfo['pwhash']
			);

			try{
				$this->db->insert('password',$password);
			} catch (Exception $e) {
				throw $e;
			}

			$this->db->where(array("salt1" => $pwinfo['salt1'], 
									"salt2" => $pwinfo['salt2']));
			$result = $this->db->get("password")->result_array();

			if (count($result) == 1)
				return $result[0];
		}

		function getPassword($id){
			$this->db->where("passwordID", $id);
			try{
				$result = $this->db->get("password")->row_array();
			} catch(Exception $e){
				throw $e;
			}

			if (count($result) > 0) {
				return $result;
			} else {
				return FALSE;
			}
		}

	}