<?php

class Login extends CI_Controller {
	function index() {
		//passes login form to main_content
		$data['main_content'] = 'login_form';
		//template page loaded, main_content passed to it
		$this->load->view('include/template', $data);
	}

	function validate() {
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();

		//if user data is valid
		if($query) {
			 $data = array(
			 	'username' => $this->input->post('username'),
			 	'is_logged_in' => true
			 );

			 //adds userdata to session
			 $this->session->set_userdata($data);
			 redirect('site/members_area');
		}

		else {
			//go back to login form if login attempt unsucessful
			$this->index();
		}
	}

	function signup() {
		$data['main_content'] = 'signup_form';
		$this->load->view('include/template', $data);
	}

	function create_member() {
		$this->load->library('form_validation');
		/*validate data
		field name, error message, validation*/
		$this->form_validation->set_rules('first_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email_address', 'Email Address', 'trim|required|vaild_email');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[4]|max_length[24]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

		//check if vadition occurred
		if($this->form_validation->run() == FALSE) {
			$this->load->view('signup_form');
		}
		else {
			$this->load->model('membership_model');
			if($query = $this->membership_model->create_member()) {
				$data['main_content'] = 'signup_successful';
				//template content
				$this->load->view('include/template', $data);	
			}
			else {
				//load signup form
				$this->load->view('signup_form');
			}
		}
	}
}