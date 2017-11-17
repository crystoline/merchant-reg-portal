<?php

class Merchant_Model extends CI_Model{
	

	function list() {
		$this->db->from('merchants');
		return $this->db->get()->result();
	}
	
	
	
}
