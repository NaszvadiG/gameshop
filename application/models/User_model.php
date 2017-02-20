<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {

	/*
	*	register new user and save to database
	*/
	public function register() {
		//get user info
		$data = array(
			'first_name'=> $this->input->post('first_name'), 
			'last_name' => $this->input->post('last_name'), 
			'email' 	=> $this->input->post('email'), 
			'username' 	=> $this->input->post('username'), 
			'password' 	=> $this->bcrypt->hash_password($this->input->post('password'))
		);

		//save to database
		$insert = $this->db->insert('users', $data);
		return $insert;
	}

	/*
	*	check user's entry info
	*/
	public function login($username, $password) {

        $query = $this->db->get_where('users', ['username'=>$username]);
        $result = $query->result();

		//validate
		foreach ($result as $row) {
            if ($this->bcrypt->check_password($password, $row->password)) {
                return $row->id;
            } else {
                return false;
            }
        }
	}

}