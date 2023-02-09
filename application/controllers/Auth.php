<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Models','m');
	}
	
	public function index()
	{
		$this->load->view('admin/login');
	}
	
	// Show login page
	public function login()
	{
		$select = $this->db->select('*');
		$select = $this->db->where('username',$this->input->post('username'));
		$select = $this->db->where('password',$this->input->post('password'));
		$read = $this->m->Get_All('tbl_user',$select);
		$username="";
		$nama="";
		$akses="";
		$status_login="";
		foreach($read as $d){
			$username=$d->username;
			$nama=$d->nama;
			$akses=$d->akses;
			$status_login="login";
		}
		if ($status_login=="") {
			redirect ('Auth?msg=gagal');
		}else{
			$data = array(
				'username' => $username,
				'nama' => $nama,
				'akses' => $akses,
				'status_login' => $status_login,
			);
			$this->session->set_userdata($data);
			
			if ($this->session->userdata('akses')=='admin') {
				redirect('Admin');
			}elseif ($this->session->userdata('akses')=='kasir') {
				redirect('Kasir');
				}
			// $this->session->set_userdata($data);
			// redirect('Kasir');
		}
	}
	public function logout() {
		//$this->session->sess_destroy();
		//redirect('auth/login');
		session_destroy();
		redirect ('Auth?msg=logout');
		
	}



	/*
	// Logout from admin page
	public function logout() {

	// Removing session data
			$sess_array = array(
			'username' => ''
		);
			$this->session->unset_userdata($data);
			$data['message_display'] = 'Successfully Logout';
			$this->load->view('admin/login');
		}

	
	// Show registration page
	public function registration() {
	$this->load->view('admin/registration_form');
	}

	// Validate and store registration data in database
	public function new_user_registration() {

	// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'Email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run() == FALSE) {
		$this->load->view('registration_form');
	} else {
		$data = array(
		'user_name' => $this->input->post('username'),
		'user_email' => $this->input->post('email_value'),
		'user_password' => $this->input->post('password')
	);
		$result = $this->login_database->registration_insert($data);
		if ($result == TRUE) {
		$data['message_display'] = 'Registration Successfully !';
		$this->load->view('login_form', $data);
	} else {
		$data['message_display'] = 'Username already exist!';
		$this->load->view('registration_form', $data);
		}
		}
	}

	*/
}