<?php
Class CategoryModel extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }
    public function getdataoftablenotworking($table,$page,$limit)
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
			$this->db->limit($limit,$offset);
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			return $result = $query->result_array();
    }
    public function getdataoftable($table,$page,$limit)
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
			$this->db->limit($limit,$offset);
			$this->db->order_by('id','DESC');
			$query = $this->db->get();
			return $result = $query->result_array();
    }
}
?>