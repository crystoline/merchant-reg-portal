<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->load->model('merchant_model');

		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	}
	private function checkLogin(){
		if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/user/login');
			die();
		}
	}

	public function index()
	{
		$data['users'] = $this->merchant_model->list();
		$this->load->view('merchant/index', $data);
	}

	public function create(){
		$this->load->view('merchant/create');
	}
	
	public function view(){
		$this->load->view('merchant/index');
	} 
}
