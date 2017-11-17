<?php

class User_Model extends CI_Model{
	

	public function list() {
		$this->db->from('users');
		return $this->db->get()->result();
	}

	public function create($data){
		@$data['password'] = sha1($data['password']);
		@$data['date_registered'] = date('Y-m-d h:i:s');
		return $this->db->insert('users', $data);
	}

	public function validate_user( $email, $password ) {
		// Build a query to retrieve the user's details
		// based on the received username and password
		$this->db->from('users');
		$this->db->where('email', $email );
		$this->db->where( 'password', sha1($password) );
		$login = $this->db->get()->result();
		
		// The results of the query are stored in $login.
		// If a value exists, then the user account exists and is validated
		if ( is_array($login) && count($login) == 1 ) {

			$details = $login[0];
			$this->session->set_userdata(array('user' => $details, 'isLoggedIn' => true));
			return true;
		}

		return false;
	}

	
}
