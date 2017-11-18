<?php

class Bank_Model extends CI_Model{
	

	public function all() {
		$this->db->from('banks');
		return $this->db->get()->result();
	}
	
	
	
}
