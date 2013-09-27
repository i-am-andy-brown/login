<?php

class Blog_model extends CI_Model {
	//function {

	//}

	function get_all_posts() {
		//selects everything and whacks it in variable $query
		$query = $this->db->get('blog_post_table');
		//make sure results exist before...
		if($query->num_rows() > 0) {
			foreach ($query->result() as $rows)
			{
				//making an array
				$data[] = $rows;
			}
		} 
		return $data;
	}

	function get_last_ten_posts() {
        $query = $this->db->get('blog_post_table', 10);
        return $query->result();
    }

	function new_post() {
		$new_post_insert_data = array(
			'blog_title' => $this->input->post('blog_title'),
			'blog_date' => $this->input->post('blog_date'),
			'blog_post' => $this->input->post('blog_post'),
		);

		//insert array data into members table
		$insert = $this->db->insert('blog_post_table', $new_post_insert_data);
		return $insert;
	}
}