<?php

class User_Model extends CI_Model{
	

	public function all($user_type='') {
		$this->db->from('users');
		if($user_type){
			$this->db->where('user_type', $user_type);
		}
		return $this->db->get()->result();
	}

	public function create($data){
		@$data['password'] = sha1($data['password']);
		$data['status']     = '1';
		@$data['date_registered'] = date('Y-m-d h:i:s');
		return $this->db->insert('users', $data);
	}

	public function validate_user( $email, $password , $login = true) {
		// Build a query to retrieve the user's details
		// based on the received username and password
		$this->db->from('users');
		$this->db->where('email', $email );
		$this->db->where('status', '1');
		$this->db->where( 'password', sha1($password) );
		$login = $this->db->get()->result();
		
		// The results of the query are stored in $login.
		// If a value exists, then the user account exists and is validated
		if ( is_array($login) && count($login) == 1 ) {

			$details = $login[0];
			if($login){
				$this->session->set_userdata(array('user' => $details, 'isLoggedIn' => true));
			}
			return $details;
		}

		return false;
	}

	public function change_password($id, $password){
		$this->db->where('id', $id);
		return $this->db->update('users', array('password' => sha1($password)));
	}

	public function change_status($id, $status = 1)
	{
		$this->db->where('id', $id);
		return $this->db->update('users', array('status' => "{$status}"));
	}

	
}
