<?php

class Membership_model extends CI_Model {
	function validate() {
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$query = $this->db->get('members');

		if($query->num_rows == 1) {
			return true;
		}
	}

	function create_member() {
		$new_member_insert_data = array(
			'first_name' => $this->input->post('first_name'),
			'last_name' => $this->input->post('last_name'),
			'email_address' => $this->input->post('email_address'),
			'username' => $this->input->post('username'),
			//convert password to md5 string for security
			'password' => md5($this->input->post('password')),
		);

		//insert array data into members table
		$insert = $this->db->insert('members', $new_member_insert_data);
		return $insert;
	}
}