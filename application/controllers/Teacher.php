<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_Model');
		//$this->load->helper('myFlashdata');
	}

	public function index()
	{
		$this->load->view('admin/teacher/add-teacher');
	}


	public function insert() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[10]');
		if($this->form_validation->run()) {
		$data = array(
			'name'=>$this->input->post('name'),
			'gender'=>$this->input->post('gender'),
			'email'=>$this->input->post('email'),
			'dob'=>$this->input->post('dob'),
			'blood_group'=>$this->input->post('blood_group'),
			'phone'=>$this->input->post('phone'),
			'father_name'=>$this->input->post('father_name'),
			'father_cell'=>$this->input->post('father_cell'),
			'present_address'=>$this->input->post('present_address'),
			'parmanent_address'=>$this->input->post('parmanent_address'),
			'religion'=>$this->input->post('religion'),
			'nationality'=>$this->input->post('nationality'),
			'created_at'=>date('Y-m-d h:i:s')
			);

		$insert_id = $this->Common_Model->insert_Row(TEACHER,$data);
		if($insert_id) { 
			$this->session->set_flashdata('success', 'Data save successfully!');
			redirect('teacher/index');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('teacher/index');
			}
		}
		else{
		$this->index();
	}

	}


	 public function view()
	 {
	 	$this->load->library('pagination');
	 	$config['base_url'] = base_url('teacher/view');
	 	$config['total_rows'] = $this->Common_Model->get_count(TEACHER);
	 	$config['per_page'] = 2;
	 	$this->pagination->initialize($config);
	 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	 	$data["links"] = $this->pagination->create_links();
	 	$data['getValue']= $this->Common_Model->getAllRows(TEACHER, '*','', $config["per_page"], $page);
	 	$this->load->view('admin/teacher/teacher-list', $data);
	}

	public function delete($id) {
		$con = array('id' => $id);
		$response = $this->Common_Model->deleteRow(TEACHER, $con);
		if($response) {
		$this->session->set_flashdata('success', 'Deleted successfully!');
		redirect('teacher/view');
		}
		else {
		$this->session->set_flashdata('error', 'Something went wrong!');
		redirect('teacher/view');
		}
	}

	


	public function edit($id) 
	 {
	 	$con = array('id'=>$id);
	 	$data['getValue'] = $this->Common_Model->getSingleRecords(TEACHER, $con, '*');
	 	$this->load->view('admin/teacher/edit-teacher', $data);
	 }
	
	public function update() 
	{
		$id = $this->uri->segment('3');
		$con = array('id'=>$id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|max_length[10]');
		if($this->form_validation->run()) {
		$data = array(
			'name'=>$this->input->post('name'),
			'gender'=>$this->input->post('gender'),
			'email'=>$this->input->post('email'),
			'dob'=>$this->input->post('dob'),
			'blood_group'=>$this->input->post('blood_group'),
			'phone'=>$this->input->post('phone'),
			'father_name'=>$this->input->post('father_name'),
			'father_cell'=>$this->input->post('father_cell'),
			'present_address'=>$this->input->post('present_address'),
			'parmanent_address'=>$this->input->post('parmanent_address'),
			'religion'=>$this->input->post('religion'),
			'nationality'=>$this->input->post('nationality'),
			'updated_at'=>date('Y-m-d h:i:s')
			);

		$updated_id = $this->Common_Model->update_Row(TEACHER, $con, $data);
		if($updated_id) { 
			$this->session->set_flashdata('success', 'Data update successfully!');
			redirect('teacher/edit/'.$id);
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('teacher/edit/'.$id);
			}
		}
		else{
		$this->edit($id);
		}

	}
	
	

}
