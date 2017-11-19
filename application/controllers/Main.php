<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	
	function __contruct(){
		parent::__construct();
		if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/user/login');
			die();
		}


		$this->load->helper(array('form'));
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->model('user_model');
		$this->load->model('merchant_model');

		$data['user_count'] = count($this->user_model->all());
		$data['merchants_count'] = count($this->merchant_model->all());
		$data['merchants_approved_count'] = count($this->merchant_model->all(1));
		$data['merchants_pending_count'] = count($this->merchant_model->all(0));

		$this->load->view('main', $data);
	}
}
