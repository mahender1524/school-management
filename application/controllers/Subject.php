<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {

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
		$data['class'] = $this->Common_Model->getDropval(CLASSES ,$cols, $con);
		$data['group'] = $this->Common_Model->getDropval(GROUP ,$cols, $con);
		$this->load->view('admin/subject/add-subject', $data);
	}

	public function insert() 
	{	 
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run()) {
			 
		$data = array(
			'name'=>$this->input->post('name'),
			'subject_code'=>$this->input->post('subject_code'),
			'class_id'=>$this->input->post('class_id'),
			'group_id'=>$this->input->post('group_id'),
			'marks_value'=>$this->input->post('marks_value'),
			'created_at'=>date('Y-m-d h:i:s')
			);

		$insert_id = $this->Common_Model->insert_Row(SUBJECT,$data);
		if($insert_id) { 
			$this->session->set_flashdata('success', 'Data has been added successfully!');
			redirect('subject/index');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('subject/index');
			}
		}
		else{
		$this->index();
	  }

	}


	public function view()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('subject/view');
		$config['total_rows'] = $this->Common_Model->get_count(SUBJECT);
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
		$data['get_subject']= $this->Common_Model->get_group_by_subject($config['per_page'], $page);
		//echo '<pre>'; print_r($data['group']);die;
		$this->load->view('admin/subject/show-subject', $data);
	}

	public function delete($id) {
		$con = array('id' => $id);
		$response = $this->Common_Model->deleteRow(SUBJECT, $con);
		if($response) {
			$this->session->set_flashdata('success', 'Deleted successfully!');
			redirect('subject/view');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('subject/view');
			}
		}

	public function edit($id) 
	{
		$con = array('id'=>$id);
		$data['getvalue'] = $this->Common_Model->getSingleRecords(SUBJECT, $con, '*');
		$cols = 'id,name';
		$con = array('is_active'=>'1', 'is_deleted'=>'0');
		$data['class'] = $this->Common_Model->getDropval(CLASSES ,$cols, $con);
		$data['group'] = $this->Common_Model->getDropval(GROUP ,$cols, $con);
		$this->load->view('admin/subject/edit-subject', $data);
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
			'subject_code'=>$this->input->post('subject_code'),
			'class_id'=>$this->input->post('class_id'),
			'group_id'=>$this->input->post('group_id'),
			'marks_value'=>$this->input->post('marks_value'),
			'updated_at'=>date('Y-m-d h:i:s')
			);

		$updated_id = $this->Common_Model->update_Row(SUBJECT, $con, $data);
		if($updated_id) { 
			$this->session->set_flashdata('success', 'Updated successfully!');
			redirect('subject/edit/'.$id);
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('subject/edit/'.$id);
			}
		}
		else{
			$this->edit($id);
		}

	}
	

}
