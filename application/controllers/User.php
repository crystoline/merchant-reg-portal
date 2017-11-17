<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
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
		if( $this->session->userdata('isLoggedIn') ) {
			redirect('/main');
		} else {
			redirect('/user/login');
		}
	}
	public function list(){
		$this->checkLogin();
		$data['users'] = $this->user_model->list();
		$this->load->view('user/index', $data);
	} 
	public function create(){
		$this->checkLogin();
		;
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('first_name', 'Firstname', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Lastname', 'trim|required');
		$this->form_validation->set_rules('user_type', 'Account Type', 'trim|required');

		if ($this->form_validation->run() !== FALSE){
			$result = $this->user_model->create($_POST);
			if($result){
				$this->session->set_flashdata('notification', 'User account was created');
				redirect('user/list');
			}
			return ;
		}
		
		$this->load->view('user/create');
	}
	public function view(){
		$this->checkLogin();
		$this->load->view('user/index');
	} 

	public function login(){
		if($this->input->post('email')){
			// Create an instance of the user model
			
			
			// Grab the email and password from the form POST
			$email = $this->input->post('email');
			$pass  = $this->input->post('password');
	
			//Ensure values exist for email and pass, and validate the user's credentials
			if( $email && $pass && $this->user_model->validate_user($email,$pass)) {
				// If the user is valid, redirect to the main view
				redirect('/main');
			} else {
				// Otherwise show the login screen with an error message.
				$this->load->view('login');	
			}
		}else{
			$this->load->view('login');			
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('/user/login');
	}


	
}
