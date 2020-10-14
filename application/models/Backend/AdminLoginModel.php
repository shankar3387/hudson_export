<?php
Class AdminLoginModel extends CI_Model
{ 
		    public function checkpostinput($index)
				{
						$return = $this->input->post($index);
						$return = $this->security->xss_clean($return);
					    return trim($return); 
				}
		    public function dologin() 
				{				
					$data = array();
						$data['refresh'] = 0;
							$mobile_no 	   =  $this->checkpostinput('mobile_no');
							$password2  =  $this->checkpostinput('password');
							$password = $password2;
						if($mobile_no=="")
							{
								$data['status']		=	0;
								$data['message']	=	"Username is not correct";
								return $data;
							}
						if($password=='')
							{
								$data['status']		=	0;
								$data['message']	=	"Password is not correct";
								return $data; 
							}
						if(trim($mobile_no != "") && trim($password != ""))				
							{
									$password = md5($password);
									$this->db->select('*');
									$this->db->from('tbl_admin_login');
									$this->db->where('mobile_no',$mobile_no);
									$this->db->where('password',$password);
									$this->db->where('verify_status','1');
									$this->db->where('status','Active');
									$query	=	$this->db->get();
									$result =	$query->result(); 
								if(!empty($result))
									{
										$token 		= base64_encode($result[0]->id); 
										$fullname 	= $result[0]->name;
										$mobile_no	= $result[0]->mobile_no;
										$status	= $result[0]->status;
										$admin_type	= $result[0]->role;
										if($status == 'Active'){
											/* setting session data */
											$session = array(
																'adminId' 		=>	$token,
																'fullname'		=>	$fullname,
																'admin_type'	=>	$admin_type,
																'mobile_no' 	=>	$mobile_no
															);
											$this->session->set_userdata($session);
											/* setting session data */
											$data['refresh']	=	1;
										$data['status']		=	1;
										$data['message']	= 	" Login Succesfully.";
										return $data;
								}} else {
										$data['status']		=	0;
										$data['message']	=	"You have entered an invalid username or password";
										return $data;
									}
							} else {
										$data['status']		=	0;
										$data['message']	=	"Please check the entered details.";
										return $data;
							}
										$data['status']		=	0;
										$data['message']	=	"Something went Wrong.";
										return $data;
				}
				public function updateprofile() 
				{	
					$data = array();
						$data['refresh'] = 0;
						
							$name 	   =  $this->checkpostinput('name');
							$mobile    =  $this->checkpostinput('mobile');
							$email 	   =  $this->checkpostinput('email');
							$admin_id  =  base64_decode($this->checkpostinput('admin_id'));
						    $insdata = array();
						    if((!empty($_FILES['img']['name']))){
                                    $check    = uploadimgfile("img",$folder="images",$prefix="pro_");
                                    $link        = $check['data']['name'];
                                    $orgname  = $check['data']['realname'];
                                    $insdata['img']         =    $link;
                            }
						if(trim($email != "") && trim($name != "") && trim($mobile != ""))				
							{
										$insdata['name'] = $name;
										$insdata['email'] = $email;
										$insdata['mobile_no'] = $mobile;
										$insdata['updated_by'] = $admin_id;
										$insdata['updated_at'] 		=	date("Y-m-d H:i:s");
										$this->db->where('id', $admin_id);
					                    $this->db->update('tbl_admin_login', $insdata); 
											/* setting session data */
										$data['refresh']	=	1;
										$data['status']		=	1;
										$data['message']	=	"Profile Updated Successfully.";
										return $data;
								
									
							} else {
									$data['status']		=	0;
									$data['message']	=	"Please check the entered details.";
								return $data;
							}
				}
				public function checkloggedin()
				{
					if($this->session->userdata('adminId') && $this->session->userdata('mobile_no'))
						{
							$token			=	$this->session->userdata('adminId');
							$mobile_no		=	$this->session->userdata('mobile_no');
							$admin_type		=	$this->session->userdata('admin_type');
								if(trim($mobile_no !="") && trim($admin_type !="") )
									{
										$temp = array();
											$temp['adminId']	=	base64_decode($token);
											$temp['mobile_no']	=	$mobile_no;
											$temp['admin_type']	=	$admin_type;
										return $temp;
									} else {
										return 0;
									}
						} else {
							return 0;
						}
				}
}
?>