<?php 
 
class Model_login extends CI_Model{	

	public function cek_user($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}