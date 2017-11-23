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
		$this->load->library('upload');

		if(@$_POST['merchant_change_status'] and @$_POST['merchant_id']){
			@$reason = $_POST['reason'];
			@$merchant_change_status = $_POST['merchant_change_status'];
			$merchant_id = $_POST['merchant_id'];

			if($result = $this->merchant_model->change_status($merchant_id, $merchant_change_status, $reason )){
				$this->session->set_flashdata( 'notification', 'Merchant status was updated' );
			}
		}
		if(@$_POST['terminal_id'] and @$_POST['merchant_id']){
			@$terminal_id = $_POST['terminal_id'];
			$merchant_id = $_POST['merchant_id'];

			if($result = $this->merchant_model->change_terminal_id($merchant_id, $terminal_id)){
				$this->session->set_flashdata( 'notification', 'Merchant\\\'s Terminal ID was update' );
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
		$user = $this->session->userdata('user');
		$inputer_id = ($user->user_type == 'Inputer')? $user->id : 0;
		$data['merchants'] = $this->merchant_model->all(false, $inputer_id);

		$this->load->view('merchant/index', $data);
	}

	public function create(){
		if($_POST) {
			//var_dump($_POST); die();
			//$this->form_validation->set_rules( 'company_name', 'Company Name', 'trim|required' );
			$this->form_validation->set_rules('rc_no', 'RC Number', 'callback_rc_no_check');

			if ( $this->form_validation->run() !== false ) {
				$result_id = $this->merchant_model->create( $_POST );
				if ( $result_id ) {
					$this->upload_passport($result_id);
					$this->upload_documents($result_id);
					$this->session->set_flashdata( 'notification', 'Merchant Record was created' );
					redirect( 'merchant' );
					return;
				}

			}
		}
		$data['banks'] = $this->bank_model->all();
		$this->load->view('merchant/create', $data);
	}
	public function rc_no_check($value)
	{
		@$merchant_name = $_POST['company_name'];
		if ($value and  $this->merchant_model->unique_merchant($merchant_name, $value))
		{
			$this->form_validation->set_message('rc_no_check', 'The company name and RC Number must be unique');
			return FALSE;
		}

			return true;

	}
	public function upload_passport($merchant_id)
	{
		$config['file_name']            = $merchant_id.'.jpg';
		$config['upload_path']          = './merchants/passport/';

		$config['allowed_types']        = 'gif|jpg|png|JPG|JPEG|PNG';
		$config['max_size']             = 300;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;
		$config['overwrite']     = true;

		//$this->load->library('upload', $config);
		$this->upload->initialize($config);
		if ( $this->upload->do_upload('passport')){

			//$data = array('upload_data' => $this->upload->data());
		}else{
			//print_r(   $error = array('error' => $this->upload->display_errors())); die();
		}

	}
	public function upload_documents($merchant_id){
		if (!is_dir('./merchants/documents/'.$merchant_id)){
			mkdir('./merchants/documents/'.$merchant_id, 0777, true);
		}
		$config = array();
		$config['upload_path'] = './merchants/documents/'.$merchant_id;
		$config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg';
		$config['max_size']      = '0';
		$config['overwrite']     = true;
		//$this->load->library('upload');

		$files = $_FILES;

		$cpt = count($_FILES['doc']['name']);
		for($i=0; $i<$cpt; $i++)
		{
			$_FILES['userfile']['name']     = $files['doc']['name'][$i];
			$_FILES['userfile']['type']     = $files['doc']['type'][$i];
			$_FILES['userfile']['tmp_name'] = $files['doc']['tmp_name'][$i];
			$_FILES['userfile']['error']    = $files['doc']['error'][$i];
			$_FILES['userfile']['size']     = $files['doc']['size'][$i];
			$config['file_name']            = "{$i}";
			$this->upload->initialize($config);

			if(!$this->upload->do_upload()){
				//print $_FILES['userfile']['type'] ;
				//print_r(   $error = array('error' => $this->upload->display_errors())); die();
			};
		}
	}

	public function edit($id){
		$data['merchant'] = $this->merchant_model->get($id, 2); // edit only rejected
		if(empty($data['merchant'])) {
			redirect('merchant');
			die();
		}
		if($_POST) {
			//var_dump($_POST); die();
			$this->upload_passport($id);
			$this->form_validation->set_rules( 'company_name', 'Company Name', 'trim|required' );

			if( @$_POST['company_name'] and $_POST['company_name'] != $_POST['old_company_name']
			   or ( @$_POST['rc_no'] and $_POST['rc_no'] != $_POST['old_rc_no']) ){
				$this->form_validation->set_rules('rc_no', 'RC Number', 'callback_rc_no_check');
			}

			if ( $this->form_validation->run() !== false ) {
				$result = $this->merchant_model->update($id, $_POST );
				if ( $result ) {
					$this->upload_documents($id);
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
