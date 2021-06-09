<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	public function get_all_courses()
	{
		$this->db->order_by("title", "desc");
		$query = $this->db->get("courses");
		return $query;
	}
	
	public function get_course_by_id($id)
	{
		$row = $this->db->query("SELECT * FROM courses WHERE id = $id");
		return $row->result();
	}
	
	public function add_course($data)
	{
		$this->db->insert("courses", $data);
	}

	public function delete_course($id){
		$this->db->delete('courses', array('id' => $id));
	}
}
