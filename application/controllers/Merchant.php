<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Merchant extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->checkLogin();
		$this->load->model('merchant_model');
		$this->load->model('bank_model');

		$this->load->helper(array('form'));
		$this->load->library('form_validation');

		if(@$_POST['merchant_change_status'] and @$_POST['merchant_id']){
			@$reason = $_POST['reason'];
			@$merchant_change_status = $_POST['merchant_change_status'];
			$merchant_id = $_POST['merchant_id'];

			if($result = $this->merchant_model->change_status($merchant_id, $merchant_change_status, $reason )){
				$this->session->set_flashdata( 'notification', 'Merchant status was update' );
			}
		}
	}
	private function checkLogin(){
		if( !$this->session->userdata('isLoggedIn') ) {
			redirect('/user/login');
			die();
		}
	}

	public function index()
	{
		$data['user'] = $this->session->userdata('user');
		$data['merchants'] = $this->merchant_model->list();

		$this->load->view('merchant/index', $data);
	}

	public function create(){
		if($_POST) {
			//var_dump($_POST); die();
			$this->form_validation->set_rules( 'company_name', 'Company Name', 'trim|required' );

			if ( $this->form_validation->run() !== false ) {
				$result = $this->merchant_model->create( $_POST );
				if ( $result ) {
					$this->session->set_flashdata( 'notification', 'Merchant Record was created' );
					redirect( 'merchant' );
					return;
				}

			}
		}
		$data['banks'] = $this->bank_model->all();
		$this->load->view('merchant/create', $data);
	}

	public function edit($id){
		$data['merchant'] = $this->merchant_model->get($id);
		if(empty($data['merchant'])) {
			redirect('merchant');
			die();
		}
		if($_POST) {
			//var_dump($_POST); die();
			$this->form_validation->set_rules( 'company_name', 'Company Name', 'trim|required' );

			if ( $this->form_validation->run() !== false ) {
				$result = $this->merchant_model->update($id, $_POST );
				if ( $result ) {
					$this->session->set_flashdata( 'notification', 'Merchant Record was update' );
					redirect( 'merchant' );
					return;
				}

			}
		}
		$data['banks'] = $this->bank_model->all();
		$this->load->view('merchant/edit', $data);
	}
	public function view($id){
		$data['banks'] = $this->bank_model->all();
		$data['merchant'] = $this->merchant_model->get($id);
		if(empty($data['merchant'])) {
			redirect('merchant');
			die();
		}
		$this->load->view('merchant/show', $data);
	} 
}
