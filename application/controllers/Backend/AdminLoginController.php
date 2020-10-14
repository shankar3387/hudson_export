<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class AdminLoginController extends MY_Controller 
		{
			public function __construct()
				{
					parent::__construct();
						$this->load->model(array('Backend/AdminLoginModel'));
						$this->load->model(array('Backend/CommonModel'));
				}
			public function index()
				{
					$this->load->view("BACKEND/login");
				}
			public function dologin()
				{
				    //print_r($_POST); exit;
					$res = $this->AdminLoginModel->dologin();
					if($res['status'] == 1){
					    redirect('Dashboard', 'refresh');
					}else{
					    $this->session->set_flashdata('message',$res['message']);
						redirect('Admin');
					}
				}
			public function AdminLogout()
				{
					$this->session->sess_destroy();
					header("Location: ".base_url('Admin'));
				}
			public function getdata()
			    {   $id 	   =  $this->AdminLoginModel->checkpostinput('id');
			        echo $this->CommonModel->getData('admin_user',$id);
			    }
			public function updateprofile()
				{
					$res = $this->AdminLoginModel->updateprofile();
					if($res['status'] == 1){
					    $this->session->set_flashdata('message',$res['message']);
					    redirect('Dashboard', 'refresh');
					}else{
					    $this->session->set_flashdata('message1',$res['message']);
						redirect('Dashboard', 'refresh');
					}
				}
			public function dashboard()
				{
					$checklogin	=	$this->AdminLoginModel->checkloggedin();
	        		if(!$checklogin)
	        			{
	        				header("Location: ".base_url('Admin?token=Invalid'));	
	        			}
	        	    $data = array();
	        	    $seo  = array();
	        	    $seo['url']				=	site_url("Dashboard");
	        		$seo['title']			=	"Dashboard - Admin";
	        		$seo['metatitle']		=	".";
	        		$seo['metadescription']	=	"!";
	        		$seo['images']			=	"";
	        		$data['data']['seo']	=	$seo;
	        		$data['layout'] = $this->adminLayout($data);
					$this->load->view("BACKEND/dashboard" ,$data);
				}
		    public function Accountsetting()
				{
					$checklogin	=	$this->AdminLoginModel->checkloggedin();
	        		if(!$checklogin)
	        			{
	        				header("Location: ".base_url('Admin?token=Invalid'));	
	        			}
	        	    $data = array();
	        	    $seo  = array();
	        	    $seo['url']				=	site_url("Dashboard");
	        		$seo['title']			=	"Dashboard - Admin";
	        		$seo['metatitle']		=	".";
	        		$seo['metadescription']	=	"!";
	        		$seo['images']			=	"";
	        		$data['data']['seo']	=	$seo;
	        		$data['layout'] = $this->adminLayout($data);
					$this->load->view("BACKEND/accountsetting" ,$data);
				}
			public function ForgotPassword()
				{
	        	   
					$this->load->view("BACKEND/forgotpassword");
				}
			public function PasswordReset()
        		{
						if(isset($_POST['frg_email']))
							{
								$frg_email = $_POST['frg_email'];
							} else {

								$this->session->set_flashdata('message',"<b>Error!</b> Something went wrong, Please try again later");
						        redirect('ForgotPassword', 'refresh');
							}
					
					if (!filter_var($frg_email, FILTER_VALIDATE_EMAIL))
						{
							$this->session->set_flashdata('message',"<b>Error!</b> Email <b>$frg_email</b> is not valid.");
						    redirect('ForgotPassword', 'refresh');
						}
						// send the email 
									$sql	=	"
													SELECT
														*
													FROM
														`tbl_admin_login` 
													WHERE
														`tbl_admin_login`.`email` 	=	'$frg_email'
												";
									$query = $this->db->query($sql);
									$result	= $query->result();
										if(count($result)>0)
											{
												$tbl_admin_name = $result[0]->name;
												$tbl_admin_id = $result[0]->id;
													// update on database
														$str = "";
															$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
															$max = count($characters) - 1;
															for ($i = 0; $i < 6; $i++) {
																$rand = mt_rand(0, $max);
																$str .= $characters[$rand];
															}
															$newpassword = $str;
													
														$uarray = array();
															$uarray['password'] = md5($newpassword);
															$this->db->where('id',$tbl_admin_id);
                                                            $res = $this->db->update('tbl_admin_login', $uarray);
															//echo $res;		 exit;
													// update on database
													$to = $frg_email;
													$subject = "Reset Password on Admin Panel";
													// Always set content-type when sending HTML email
														$headers = "MIME-Version: 1.0" . "\r\n";
														$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
													// More headers
														$headers .= 'From: <shalinishanu11@gmail.com>' . "\r\n";
														$loginlink	= base_url('Admin'); 
													
														$message = "Hello $tbl_admin_name, 
																		<br/><br/> 
																			Here is your new Crediential to Login to Portal:
																		<br/><br/> 
																		
																			<table>
																				<tr>
																					<th>
																						<b>Email:</b>
																					</th>
																					<th>
																						$frg_email
																					</th>
																				</tr>
																				<tr>
																					<th>
																						<b>Password:</b>
																					</th>
																					<th>
																						$str
																					</th>
																				</tr>
																			</table>
																			
																		<br/><br/> 
																		
																			Use the Following link to Login: <br/>
																				<a href='$loginlink'> $loginlink </a>
																			
																		
														";
													
												$emailtheme = file_get_contents(FCPATH."/email.theme");
												$message = str_replace("{{emailcontent}}",$message,$emailtheme); 
												$res = mail($to,$subject,$message,$headers);
												$this->session->set_flashdata('success',"<b>Success!</b> We have sent you an email on <b>$frg_email</b> with Password.");
						                        redirect('ForgotPassword', 'refresh');
												
											} else {
											    $this->session->set_flashdata('message',"<b>Oops!</b> Email <b>$frg_email</b> is not registered with us.");
						                        redirect('ForgotPassword', 'refresh');
											}
        		}
        		
        		public function EditPassword()
		        {
        			$adminId	=	!empty(($this->session->userdata('adminId')))?$this->session->userdata('adminId'):0;
        			$adminId = base64_decode($adminId);
        				if(empty($adminId))
        					{
        						$this->session->set_flashdata('errors',"<b>Error!</b> You are not logged in, Please refresh the page. <script> window.location.reload(); </script>");
						        redirect('AccountSetting', 'refresh');
        					}
        				
        					if(isset($_POST['curpassword'],$_POST['newpassword'],$_POST['confirmpassword']))
        						{
        							$curpassword 		=	md5($_POST['curpassword']);
        							$newpassword 		=	$_POST['newpassword'];
        							$confirmpassword 	=	$_POST['confirmpassword'];
        									if($newpassword!=$confirmpassword)
        										{
        											$this->session->set_flashdata('errors',"<b>Error!</b> Password and confirm Password must be same.");
						                            redirect('AccountSetting', 'refresh');
        										}
        									$sql	=	"
        													SELECT
        														`id`
        													FROM
        														`tbl_admin_login` 
        													WHERE
        														`tbl_admin_login`.`password` 	=	'$curpassword'
        													AND
        														`tbl_admin_login`.`id` 		=	'$schlId'
        												";
        											//	echo $sql; exit;
        									$query = $this->db->query($sql);
        									$result	= $query->result();
        									//print_r($result); exit;
        									if(count($result)>0)
        											{
        												$tbl_admin_id = $result[0]->id;
        												
        													// update on database
        														$uarray = array();
        															$uarray['password'] = md5($newpassword);
        															$this->db->where('id',$tbl_admin_id);
                                                                    $res = $this->db->update('tbl_admin_login', $uarray);
        													// update on database
        												    $this->session->set_flashdata('message',"<b>Success!</b> Password changed successfully.");
						                                    redirect('AccountSetting', 'refresh');
        											} else {
        													$this->session->set_flashdata('errors',"<b>Error!</b> Please check your current password.");
						                                    redirect('AccountSetting', 'refresh');
        											}	
        							}
        							$this->session->set_flashdata('errors',"<b>Error!</b> Please check your input. Something went wrong");
						            redirect('AccountSetting', 'refresh');
        		}
		}
?>