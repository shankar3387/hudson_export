<?php
Class Report extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    public function getdataoftable($table,$page,$limit,$empId,$date = null)
    {
		 if(($page==1&&$limit==10)||($page==1))
			{
			  $page=1;
			  $limit=10;
			  $offset=0;
			}
			else
			{
			  $offset=($page*$limit)-$limit;
			}
			$this->db->select('*');
			$this->db->from($table);
			if (!empty($date)) {
			$this->db->where('report_date',date('Y-m-d',strtotime($date)));
			}
			$this->db->where('emp_id',$empId);
			$this->db->group_by("report_date");
			$this->db->limit($limit,$offset);
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			//echo $this->db->last_query(); exit;
			return $result = $query->result_array();
    }
    public function getdata($table,$page,$limit,$empId,$todate,$fromdate)
    {
		 if(($page==1&&$limit==10)||($page==1))
			{
			  $page=1;
			  $limit=10;
			  $offset=0;
			}
			else
			{
			  $offset=($page*$limit)-$limit;
			}
			$this->db->select('*');
			$this->db->from($table);
			$this->db->where('report_date >=', $todate);
			$this->db->where('report_date <=', $fromdate);
			$this->db->where('emp_id',$empId);
			$this->db->group_by("report_date");
			$this->db->limit($limit,$offset);
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			//echo $this->db->last_query(); exit;
			return $result = $query->result_array();
    }
    public function reportview($table,$empId,$date){
    		$this->db->select('*');
			$this->db->from($table);
			$this->db->where('report_date',date('Y-m-d',strtotime($date)));
			$this->db->where('emp_id',$empId);
			$this->db->order_by('id','ASC');
			$query = $this->db->get();
			return $query->result_array();
    }
}
?>