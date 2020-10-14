<?php
class Excel_export_model extends CI_Model
{
	function fetch_data($empid,$todate,$fromdate)
	{   	$this->db->select('*');
			$this->db->from('report_detail');
			$this->db->where('report_date >=', $todate);
			$this->db->where('report_date <=', $fromdate);
			$this->db->where('emp_id',$empid);
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			//echo $this->db->last_query(); exit;
			return $result = $query->result();
	}
	function fetch_data1($empId){
			$this->db->select('*');
			$this->db->from('report_detail');
			$this->db->where('emp_id',$empId);
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			return $result = $query->result();
	}
	
}
