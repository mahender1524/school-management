<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Section extends CI_Controller {

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
		$this->load->view('admin/section/add-section', $data);
	}

	public function insert() 
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run()) {
			$data = array(
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'class_id'=>$this->input->post('class_id'),
			'created_at'=>date('Y-m-d h:i:s')
			);

		$insert_id = $this->Common_Model->insert_Row(SECTION,$data);
		if($insert_id) { 
			$this->session->set_flashdata('success', 'Data save successfully!');
			redirect('section/index');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('section/index');
			}
		}
		else{
			$this->index();
		}

	}


	

	public function view()
	 {
	 	$this->load->library('pagination');
		$config['base_url'] = base_url('section/view');
		$config['total_rows'] = $this->Common_Model->get_count(SECTION);
		$config['per_page'] = 2;
		$this->pagination->initialize($config);
		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data["links"] = $this->pagination->create_links();
	 	$cols = 't1.id, t1.name, t1.description, t1.created_at, t2.name as class_name';
	 	$from = SECTION;
	 	$joinTable = CLASSES ;
	 	$f_key = "class_id";
	 	$local_key = "id";
		$data['getResult']= $this->Common_Model->getRecordJoin($cols,$from, $joinTable, $f_key, $local_key ,$config["per_page"], $page);
		//echo '<pre>'; print_r($data['getResult']);exit();	
		$this->load->view('admin/section/section-list', $data);
	}

	public function delete($id) {
		$con = array('id' => $id);
		$response = $this->Common_Model->deleteRow(SECTION, $con);
		if($response) {
			$this->session->set_flashdata('success', 'Deleted successfully!');
			redirect('section/view');
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('section/view');
			}
		}

	public function edit($id) 
	{	
		$cols = 'id,name';
		$con = array('is_active'=>'1', 'is_deleted'=>'0');
		$data['class'] = $this->Common_Model->getDropval(CLASSES ,$cols, $con);
		$con = array('id'=>$id);
		$data['getValue'] = $this->Common_Model->getSingleRecords(SECTION, $con, '*');
		$this->load->view('admin/section/edit-section', $data);
	}
	
	

	public function update() 
	{
		$id = $this->uri->segment('3');
		$con = array('id'=>$id);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		if($this->form_validation->run()) {
			$data = array(
			'name'=>$this->input->post('name'),
			'description'=>$this->input->post('description'),
			'class_id'=>$this->input->post('class_id'),
			'updated_at'=>date('Y-m-d h:i:s')
			);

		$updated_id = $this->Common_Model->update_Row(SECTION, $con, $data);
		if($updated_id) { 
			$this->session->set_flashdata('success', 'Data updated successfully!');
			redirect('section/edit/'.$id);
			}
		else {
			$this->session->set_flashdata('error', 'Something went wrong!');
			redirect('section/edit/'.$id);
			}
		}
		else{
			$this->index($id);
		}

	}
	

}
