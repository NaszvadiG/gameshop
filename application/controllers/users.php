<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function register()	{
		//check validation
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[20]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[50]');
		$this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			//	load products view
			$data['main_content'] = 'register';
 			$this->load->view('layouts/main', $data);
		} else {
			if ($this->User_model->register()) {
				$this->session->set_flashdata('registered', 'You are now registered and can log in.');
				redirect('products');
			}
		}
	}

	/*
	*	check username and password then login
	*/
	public function login($id) {
		//check validation
		//$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[20]');
		//$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[50]');
		
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//match with database
		$user_id = $this->User_model->login($username, $password);

		if ($user_id) {
			$data = array(
				'user_id' 	=> $user_id,
				'username' 	=> $username,
				'logged_in' => true
			);

			//set user data to session
			$this->session->set_userdata($data);

			//set message
			$this->session->set_flashdata('login_true', 'You are logged in.');
			redirect('products');
		} else {
			//set error message
			$this->session->set_flashdata('login_false', 'Sorry the login info was not correct.');
			redirect('products');
		}
	}

	public function logout()	{
		//unset userdata
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		
		redirect('products');
	}

}