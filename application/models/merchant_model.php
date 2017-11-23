<?php

class Merchant_Model extends CI_Model
{
	

	function get($id,$status = false)
	{
		$this->db->select("merchants.*, CONCAT_WS(' ',users.first_name, users.last_name ) AS register_by,
				(select CONCAT_WS(' ',users.first_name, users.last_name )  from  users where id = validated_user) AS approved_by")
		->from('merchants')
		->join('users', 'users.id = merchants.user_id', 'left')
		->where('merchants.id', $id);
		if($status !== false){
			$this->db->where('merchant_status', "{$status}");
		}
		return $this->db->get()->row();
	}

	function unique_merchant($name, $rc_no){
		$this->db->select("*")
			->from('merchants')
			->where('company_name', $name)
			->where('rc_no', $rc_no);
		return $this->db->get()->row();
	}

	function all($status = false, $inputer_id = 0)
	{
		$user = $this->session->userdata('user');
		$this->db->select("merchants.*, CONCAT_WS(' ',users.first_name, users.last_name ) AS register_by,
				(select CONCAT_WS(' ',users.first_name, users.last_name )  from  users where id = validated_user) AS approved_by ")
		         ->from('merchants')
		         ->join('users', 'users.id = merchants.user_id', 'left');
		if($status !== false){
			$this->db->where('merchant_status', "{$status}");
		}
		if($inputer_id){
			$this->db->where('users.id', $inputer_id);
		}
		return $this->db->get()->result();
	}


	public function create($data)
	{
		$user = $this->session->userdata('user');
		@$data['date_of_reg'] = date('Y-m-d h:i:s');
		@$data['merchant_status'] = '0';
		@$data['method_of_deliv'] = serialize($data['method_of_deliv']);
		@$data['documents'] = serialize($data['documents']);
		@$data['if_cust_pre_reg'] = serialize($data['if_cust_pre_reg']);
		@$data['user_id'] = $user->id;
		$result = $this->db->insert('merchants', $data)? $this->db->insert_id(): false;
		return $result;
	}
	public function update($id, $data)
	{
		$user = $this->session->userdata('user');
		@$data['date_of_reg'] = date('Y-m-d h:i:s');
		@$data['merchant_status'] = '0';
		@$data['method_of_deliv'] = serialize($data['method_of_deliv']);
		@$data['documents'] = serialize($data['documents']);
		@$data['if_cust_pre_reg'] = serialize($data['if_cust_pre_reg']);
		@$data['user_id'] = $user->id;

		$this->db->where('id', $id);
		return $this->db->update('merchants', $data);
	}

	public function change_status($id, $status = 1, $reason)
	{
		$user = $this->session->userdata('user');

		$this->db->set('merchant_status', $status);
		$this->db->set('reason', $reason);
		$this->db->set('date_validated', date('Y-m-d h:i:s'));
		$this->db->set('validated_user', $user->id);

		if($status ==  1){
			$this->db->set('merchant_code', strtoupper(base_convert(rand(1000000, 9999999),10, 36)));
		}
		$this->db->where('id', $id);
		return $this->db->update('merchants');
	}

	public function change_terminal_id($id, $terminal_id)
	{
		$user = $this->session->userdata('user');

		$this->db->set('terminal_id', $terminal_id);
		$this->db->where('id', $id);
		return $this->db->update('merchants');
	}
	
}
