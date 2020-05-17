<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Common_Model');
		//$this->load->helper('myFlashdata');
	}

	public function index()
	{
		$cols = 'id,name';
		$con = array('is_active'=>'1', 'is_deleted'=>'0');
		$data['group_name'] = $this->Common_Model->getDropval(GROUP ,$cols, $con);
		$this->load->view('admin/class/add-class', $data);
	}

	public function insert() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('group_id', 'Group Name', 'required');
		if($this->form_validation->run()) {
			$data = array(
			'name'=>$this->input->post('name'),
			'group_id'=>$this->input->post('group_id'),
			'is_active'=>$this->input->post('is_active'),
			'created_at'=>date('Y-m-d h:i:s')
			);

		$insert_id = $this->Common_Model->insert_Row(CLASSES,$data);
		if($insert_id) { 
			$this->session->set_flashdata('success', 'Data save successfully!');
			redirect('classes/index');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('classes/index');
			}
		}
		else{
			$this->index();
		}

	}


	// public function view()
	// {
	// 	$this->load->library('pagination');
	// 	$config['base_url'] = base_url('Classes/view');
	// 	$config['total_rows'] = $this->Common_Model->get_count(CLASSES);
	// 	$config['per_page'] = 2;
	// 	$this->pagination->initialize($config);
	// 	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	// 	$data["links"] = $this->pagination->create_links();
	// 	$data['group']= $this->Common_Model->getAllRows(CLASSES, '*','', $config["per_page"], $page);
	// 	$this->load->view('admin/class/class-list', $data);
	// }

	public function view()
	 {
	$this->load->library('pagination');
	$config['base_url'] = base_url('classes/view');
	$config['total_rows'] = $this->Common_Model->get_count(CLASSES);
	$config['per_page'] = 2;
	$this->pagination->initialize($config);
	$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
	$data["links"] = $this->pagination->create_links();
	$cols = 't1.name,t1.id, t1.group_id, t1.is_active, t1.created_at,  t2.name as group_name';
	$from = CLASSES;
	$joinTable = GROUP;
	$f_key = "group_id";
	$local_key = "id";
	$data['group']= $this->Common_Model->getRecordJoin($cols,$from, $joinTable,$f_key,$local_key,$config["per_page"], $page);	
	$this->load->view('admin/class/class-list', $data);
	}

	public function delete($id) {
		$con = array('id' => $id);
		$response = $this->Common_Model->deleteRow(CLASSES, $con);
		if($response) {
			$this->session->set_flashdata('success', 'Deleted successfully!');
			redirect('classes/view');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('classes/view');
			}
		}

	public function edit($id) 
	{	
		$cols = 'id,name';
		$con = array('is_active'=>'1', 'is_deleted'=>'0');
		$data['group_name'] = $this->Common_Model->getDropval(GROUP ,$cols, $con);
		$con = array('id'=>$id);
		$data['getValue'] = $this->Common_Model->getSingleRecords(CLASSES, $con, '*');
		$this->load->view('admin/class/edit-class', $data);
	}
	
	

	public function update() 
	{
		$id = $this->uri->segment('3');
		$con = array('id'=>$id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('group_id', 'Group Name', 'required');
		if($this->form_validation->run()) {
			$data = array(
			'name'=>$this->input->post('name'),
			'group_id'=>$this->input->post('group_id'),
			'is_active'=>$this->input->post('is_active'),
			'updated_at'=>date('Y-m-d h:i:s')
			);

		$updated_id = $this->Common_Model->update_Row(CLASSES, $con, $data);
		if($updated_id) { 
			$this->session->set_flashdata('success', 'Data updated successfully!');
			redirect('classes/edit/'.$id);
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('classes/edit/'.$id);
			}
		}
		else{
			$this->index($id);
		}

	}
	

}
