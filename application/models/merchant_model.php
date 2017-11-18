<?php

class Merchant_Model extends CI_Model{
	

	function get($id) {
		$this->db->select("merchants.*, CONCAT_WS(' ',users.first_name, users.last_name ) AS register_by")
		->from('merchants')
		->join('users', 'users.id = merchants.user_id', 'left')
		->where('merchants.id', $id);
		return $this->db->get()->row();
	}
	function list() {
		$this->db->select("merchants.*, CONCAT_WS(' ',users.first_name, users.last_name ) AS register_by")
		         ->from('merchants')
		         ->join('users', 'users.id = merchants.user_id', 'left');
		return $this->db->get()->result();
	}


	public function create($data){
		$user = $this->session->userdata('user');
		@$data['date_of_reg'] = date('Y-m-d h:i:s');
		@$data['merchant_status'] = '0';
		@$data['method_of_deliv'] = serialize($data['method_of_deliv']);
		@$data['if_cust_pre_reg'] = serialize($data['if_cust_pre_reg']);
		@$data['user_id'] = $user->id;
		return $this->db->insert('merchants', $data);
	}
	public function update($id, $data){
		$user = $this->session->userdata('user');
		@$data['date_of_reg'] = date('Y-m-d h:i:s');
		@$data['merchant_status'] = '0';
		@$data['method_of_deliv'] = serialize($data['method_of_deliv']);
		@$data['if_cust_pre_reg'] = serialize($data['if_cust_pre_reg']);
		@$data['user_id'] = $user->id;

		$this->db->where('id', $id);
		return $this->db->update('merchants', $data);
	}

	public function change_status($id, $status = 1, $reason){
		$user = $this->session->userdata('user');

		$this->db->set('merchant_status', $status);
		$this->db->set('reason', $reason);
		$this->db->set('date_validated', date('Y-m-d h:i:s'));
		$this->db->set('validated_user', $user->id);
		$this->db->where('id', $id);
		return $this->db->update('merchants');
	}
	
	
}