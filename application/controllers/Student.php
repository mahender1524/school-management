<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_Model');
		//$this->load->helper('myFlashdata');
	}

	public function index()
	{
		$this->load->view('admin/student/add-student');
	}

	public function insert() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run()) {
			$data = array(
			'name'=>$this->input->post('name'),
			'is_active'=>$this->input->post('is_active'),
			'created_at'=>date('Y-m-d h:i:s')
			);

		$insert_id = $this->Common_Model->insert_Row(GROUP,$data);
		if($insert_id) { 
			$this->session->set_flashdata('success', 'Group has been added successfully!');
			redirect('group/index');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('group/index');
			}
		}
		else{
			$this->index();
		}

	}


	public function view()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('Group/view');
		$config['total_rows'] = $this->Common_Model->get_count(GROUP);
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['group']= $this->Common_Model->getAllRows(GROUP, '*','', $config["per_page"], $page);
		$this->load->view('admin/group/group-list', $data);
	}

	public function delete($id) {
		$con = array('id' => $id);
		$response = $this->Common_Model->deleteRow(GROUP, $con);
		if($response) {
			$this->session->set_flashdata('success', 'Deleted successfully!');
			redirect('group/view');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('group/view');
			}
		}

	public function edit($id) 
	{
		$con = array('id'=>$id);
		$data['get_group'] = $this->Common_Model->getSingleRecords(GROUP, $con, '*');
		$this->load->view('admin/group/edit-group', $data);
	}
	
	public function update() 
	{
		$id = $this->uri->segment('3');
		$con = array('id'=>$id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run()) {
			$data = array(
			'name'=>$this->input->post('name'),
			'is_active'=>$this->input->post('is_active'),
			'updated_at'=>date('Y-m-d h:i:s')
			);

		$updated_id = $this->Common_Model->update_Row(GROUP, $con, $data);
		if($updated_id) { 
			$this->session->set_flashdata('success', 'Group has been updated successfully!');
			redirect('group/edit/'.$id);
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('group/edit/'.$id);
			}
		}
		else{
			$this->edit($id);
		}

	}
	

}
