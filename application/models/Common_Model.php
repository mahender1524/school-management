<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_Model extends CI_Model {

	public function insert_Row($tbl, $cols) {
		$this->db->insert($tbl,$cols);
		return  $this->db->insert_id();
	
	}

	public function get_count($tbl) {
        return $this->db->count_all($tbl);
    }

    // limit using paginate
	public function getAllRows($tbl, $cols, $con='', $limit, $start) {
		$this->db->select($cols);
		$this->db->from($tbl);
		if($con !='') { 
		$this->db->where($con);
		}
		$this->db->limit($limit, $start);
		$q = $this->db->get();
		return $q->result();
		
	}

	public function getDropval($tbl, $cols, $con='') {
		$this->db->select($cols);
		$this->db->from($tbl);
		if($con !='') { 
		$this->db->where($con);
		}
		$q = $this->db->get();
		return $q->result();
		
	 }

	 public function getRecordJoin($cols,$from, $join_table, $foregin_key, $local_key, $offset, $limit) 
	 { 
		 return 
			 $this->db->select($cols)
			 ->limit($offset, $limit)
		     ->from($from.' as t1')
		     ->join($join_table.' as t2', 't1.'.$foregin_key.' = t2.'.$local_key)
		     ->get()->result();
    }


	public function deleteRow($tbl, $con) {
		$this->db->where($con);
		return $this->db->delete($tbl);
	}

	public function getSingleRecords($tbl, $con, $cols) {
		$this->db->select($cols);
		$this->db->from($tbl);
		$this->db->where($con);
		$q = $this->db->get();
		return $q->row();
	}

	public function update_Row($tbl, $con, $data) {
			$this->db->where($con);
			return $this->db->update($tbl, $data);
	}

	public function getName($id, $tbl, $cols) {
		$this->db->select($cols);
		$this->db->from($tbl);
		$this->db->where('id',$id);
		$q = $this->db->get();
		$data = $q->result();
		return $data[0]->name;
	}

	public function getResultByjoin() {
		$this->db->select('*');
    	$this->db->from('tbl_student s'); 
    	$this->db->join('tbl_section se', 'se.id = s.section_id');
    	// $this->db->join('tbl_classes c', 'c.id = s.class_id');
    	// $this->db->join('tbl_groups g', 'g.id=s.group_id');
    	$q = $this->db->get();
    	return $q->result();
    	//echo '<pre>';print_r($this->db->last_query());die;

	}

	public function get_group_by_subject($limit, $offset) 
	{
		$this->db->limit($limit, $offset);
		$this->db->select('t.id,t.subject_code, t.name, t.marks_value, t.group_id, t.class_id, t2.name as class_name, t3.name as group_name');
    $this->db->from('tbl_subjects t'); 
    $this->db->join('tbl_classes t2', 't2.id=t.class_id');
    $this->db->join('tbl_groups t3', 't3.id=t.group_id');
    $q = $this->db->get();
    return $q->result();
    //echo '<pre>';print_r($this->db->last_query());die;
	}
	


	
}
