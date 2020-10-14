<?php
Class FrontModel extends CI_Model
		{
		    function mainSearch(){
            	   $searchtext1  = $this->input->post('searchtext');
            	   $searchtext = preg_replace('/[^A-Za-z0-9\-]/', '', $searchtext1);
            	   $product_category  = $this->input->post('product_category');
            	   $product_category = preg_replace('/[^A-Za-z0-9\-]/', '', $product_category);
            	   if(!empty($product_category) && !empty($searchtext)){
                   $sql = "SELECT * FROM `tbl_product` WHERE status = 'Active' AND ( product_full_description LIKE  '%$searchtext%' OR search_keywords LIKE '%$searchtext%' OR product_name LIKE '%$searchtext%' OR cat_id = $product_category )";
           			}if(empty($product_category) && !empty($searchtext)){
           				$sql = "SELECT * FROM `tbl_product` WHERE status = 'Active' AND ( product_full_description LIKE  '%$searchtext%' OR search_keywords LIKE '%$searchtext%' OR product_name LIKE '%$searchtext%')";
           			}
                    $query = $this->db->query($sql);
                    return $query->result_array(); 
            	}

            public function checkloggedin()
				{
					if($this->session->userdata('customerId') && $this->session->userdata('customername'))
						{
							$token			=	$this->session->userdata('customerId');
							$customername		=	$this->session->userdata('customername');
								if(trim($customername !="") && trim($token !="") )
									{
										$temp = array();
											$temp['customerId']		=	base64_decode($token);
											$temp['customername']	=	$customername;
										return $temp;
									} else {
										return 0;
									}
						} else {
							return 0;
						}
				}
			public function getData15($table,$id,$idname,$idname2,$text){
			        $this->db->select('*');
			        $this->db->from($table);
					$this->db->where($idname,$id);
					$this->db->where($idname2,$text);
			        $query = $this->db->get();
			        $result = $query->result_array();
			        return $result;
			    }
		}