<?php

class Blog extends CI_Controller {
	function index() {
		$this->load->model('blog_model');
		$data['rows'] = $this->blog_model->get_last_ten_posts();
		//passes blog information to main_content
		$data['main_content'] = 'blog_show';
		//template page loaded, main_content passed to it
		$this->load->view('include/template', $data);
	}

	function show_blog_post() {
		$this->load->model('blog_model');
		$data['rows'] = $this->blog_model->show_post();
		$data['main_content'] = 'show_post';
		$this->load-view('include/template', $data);
	}

	function new_post() {
		$data['main_content'] = 'blog_post_form';
		$this->load->view('include/template', $data);
	}
}