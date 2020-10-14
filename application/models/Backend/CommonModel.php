<?php
Class CommonModel extends CI_Model
		{			
			public function insertdataontable($table,$data1)
				{
					$query	=	$this->db->insert($table,$data1);
					$insertId = $this->db->insert_id();
					$data =  array();
					if($query == 1){
					    $data['status'] = 1;
					    $data['insertid'] = $insertId;
					    $data['mess'] = "Data inserted successfully.";
					}
						return $data;
				}
			public function updatedataontable($table,$data1,$id)
				{
						$this->db->where('id', $id);
						$update = $this->db->update($table,$data1);
						if($update == 1){
						    $data['status'] = 1;
	            		    $data['mess'] = "Data Updated successfully.";
						}
							return $data;
				}
			public function getdataoftable($table)
				{	
						$this->db->select('*');
							$this->db->from($table);
							    $this->db->order_by('id', 'DESC');
									$query	=	$this->db->get();
										return $result =	$query->result_array();
				}
			public function checkloggedin()
				{
					if($this->session->userdata('adminId') && $this->session->userdata('username'))
						{
							$token			=	$this->session->userdata('adminId');
							$username		=	$this->session->userdata('username');
							$admin_type		=	$this->session->userdata('admin_type');
								if(trim($username !="") && trim($admin_type !="") )
									{
										$temp = array();
											$temp['adminId']	=	base64_decode($token);
											$temp['username']	=	$username;
											$temp['admin_type']	=	$admin_type;
										return $temp;
									} else {
										return 0;
									}
						} else {
							return 0;
						}
				}
			public function getData($table,$id)
				{
			        $this->db->select('*');
			        $this->db->from($table);
					$this->db->where('id',$id);
			        $query = $this->db->get();
			        $result = $query->result_array();
			        return json_encode($result[0]);
			    }
			public function getNotdata($table,$id,$idname,$id2){
					$this->db->select('*');
			        $this->db->from($table);
					$this->db->where('id != ',$id);
					$this->db->where($idname,$id2);
			        $query = $this->db->get();
			        //echo $this->db->last_query(); exit;
			        return $result = $query->result_array();
			}
			public function getsinglerow($table,$id,$idname){
					$this->db->select('*');
					$this->db->from($table);
					$this->db->where($idname,$id);
					$this->db->order_by('id','DESC');
					$query = $this->db->get();
					$result = $query->result_array();
					return $result;
				}

				public function getProductDetails($id)
				{
					$this->db->select('tsm.size,tc.color_name');
					$this->db->from('tbl_stock_management as tsm');
					$this->db->join('tbl_color as tc','tc.id=tsm.color_id');
					$this->db->where('tsm.product_id',$id);
					$result = $this->db->get()->result_array();
					return $result;
				}
		}
?>