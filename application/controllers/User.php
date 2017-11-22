<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	private $user = null;
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->user = $this->session->userdata('user');

	}
	private function checkLogin(){

		if( !$this->session->userdata('isLoggedIn')  or $this->user->user_type != 'admin') {
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
	public function all(){
		$this->checkLogin();
		if(@$_POST['user_change_status'] and @$_POST['user_id']){
			$status = $_POST['user_change_status'];
			$user_id = $_POST['user_id'];

			if($result = $this->user_model->change_status($user_id, $status)){
				$this->session->set_flashdata( 'notification', 'User status was updated' );
			}
		}
		$data['users'] = $this->user_model->all();
		$this->load->view('user/index', $data);
	} 
	public function create(){
		$this->checkLogin();
		if($_POST) {
			$this->form_validation->set_rules( 'email', 'Email', 'trim|required|valid_email|is_unique[users.email]' );
			$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );
			$this->form_validation->set_rules( 'first_name', 'Firstname', 'trim|required' );
			$this->form_validation->set_rules( 'last_name', 'Lastname', 'trim|required' );
			$this->form_validation->set_rules( 'user_type', 'Account Type', 'trim|required' );

			if ( $this->form_validation->run() !== false ) {
				$result = $this->user_model->create( $_POST );
				if ( $result ) {
					$this->session->set_flashdata( 'notification', 'User account was created' );
					redirect( 'user/all' );

					$this->load->library('email', array('mailtype' => 'html'));
					$firstname = $_POST['first_name'];
					$url       = site_url();
					$email     =  $_POST['email'];
					$password     =  $_POST['password'];
					$reset_url = site_url('user/reset_password/'.base64_encode($email.'-'.$password ));

					$this->email->from('noreply@cahnearyou.com', 'Cash Near You');
					$this->email->to($email);
					$this->email->subject('Your Login Credential');

$msg = <<<MAIL
<html>
<body>
<p>Dear $firstname</p>,

<p>Your account was just created on $url,<br>
Login With:</p>

<code>
email: $email
password: $password
</code>

<p>
You can reset your password <a href="$reset_url">here</a></p>

<br><br>
Thanks;
</body>
</html>
MAIL;

					$this->email->message($msg);
					$this->email->send();
					return;
				}


			}
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

	public  function reset_password ($payload)
	{
		$payload = base64_decode($payload);
		$payload = explode('-', $payload);
		//$payload = array('crystoline@gmail.com', 'password'); //print_r($payload);
		if(count($payload) == 2 and $user = $this->user_model->validate_user($payload[0],$payload[1], false)){
			$this->session->sess_destroy();
			$data = array();
			if($this->input->post('password')){
				$this->form_validation->set_rules( 'password', 'Password', 'trim|required' );

				if ( $this->form_validation->run() !== false and $this->user_model->change_password($user->id,$this->input->post('password')) ) {
					$data['status'] = true;
				}

			}
			$this->load->view('reset-password', $data);

		}else{
			redirect('/user/login');
		}
	}

	
}
