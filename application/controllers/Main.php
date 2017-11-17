<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	
	function __contruct(){
		if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/user/login');
			die();
		}

		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('main');
	}
}
