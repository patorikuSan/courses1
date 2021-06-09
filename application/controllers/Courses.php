<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->output->enable_profiler(TRUE);
		$this->load->model("course");
	}

	public function index(){	
		$data["courses"] = $this->course->get_all_courses();
		$this->load->view("add_course", $data);
	}

	public function add_course()
	{
		$data = array(
			"title" => $this->input->post("name"),
			"description" => $this->input->post("desc")
		);
		if(empty($data["title"])){
			$this->session->set_userdata("error", "Course title required");
		} elseif(isset($data["title"])){
			if(!preg_match("/.{4,}/i", $data["title"])){
				$this->session->set_userdata("error", "title should be at least 4 characters");
			} else {
				$this->session->unset_userdata("error");
				$this->course->add_course($data);
			}
		}
		redirect("courses1");
	}

	public function destroy($id) {
		$this->session->unset_userdata("error");
		$data["courses"] =$this->course->get_course_by_id($id);
		$data["id"] = $id;
		$this->load->view("destroy", $data);
	}

	public function delete($id)
	{
		$this->course->delete_course($id);
		redirect("courses1");
	}
		
	// }


}
