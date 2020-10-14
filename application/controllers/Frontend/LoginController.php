<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends MY_Controller {
	 
	 public function __construct()
				{
					parent::__construct();
						$this->load->model(array('Frontend/LoginModel'));
						$this->load->model(array('Frontend/FrontModel'));
						$this->load->model(array('Backend/CommonModel'));
				}
	 
	public function index()
	{   $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
		$this->load->view('FRONTEND/myaccount/login',$data);
	}
	public function Myaccount()
	{   
		$checklogin	=	$this->FrontModel->checkloggedin();
		    if(!$checklogin)
			{
			    header("Location: ".base_url('Login'));
			}else{
				$data = array();
				$data['layouts'] = $this->frontLayout($data);
				$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
					$this->load->view('FRONTEND/myaccount/index',$data);
			}
	}
	public function dologin()
	{
	    $res = $this->LoginModel->dologin();
		if($res['status'] == 1){
		    $user_id = base64_decode($this->session->userdata('customerId'));
		    if(!empty($this->session->userdata('tbl_quantity'))){
		        $added_date = date('Y-m-d H:s:i');
		        $prdid = $this->session->userdata('product_id');
		        $admin_id = $this->session->userdata('admin_id');
		        $color_id = $this->session->userdata('color_id');
		        $size = $this->session->userdata('size');
		        $price = $this->session->userdata('tbl_product_price');
		        $tbl_quantity = $this->session->userdata('tbl_quantity');

                $getcartdata = $this->FrontModel->getData15('tbl_cart',$user_id,'tbl_user_id','tbl_product_id',$prdid);
           
    			 if(count($getcartdata) > 0 ){
    			     $presentqty = $getcartdata[0]['tbl_quantity'];
    			     $preprice = $getcartdata[0]['tbl_product_price'];
    			     $insdata = array();
    					$insdata['tbl_product_id']     = $prdid;
    					$insdata['tbl_quantity']     = $tbl_quantity;
    					$insdata['seller_id']     = $admin_id;
    					if(!empty($color_id)){
    					$insdata['color_id'] = $color_id;
    					}else{
    					    $insdata['color_id'] = 0;
    					}
    					if(!empty($size)){
    					$insdata['size'] = $size;
    					}else{
    					    $insdata['size'] = 0;
    					}
    					$insdata['tbl_added_date']     = $added_date;
    					$insdata['tbl_product_price']     =  $price;
    					$insdata['total_price']     =  $tbl_quantity * $price;
    					$this->db->where('tbl_user_id', $user_id);
    					$this->db->where('tbl_product_id', $prdid);
    					$check = $this->db->update('tbl_cart',$insdata);
    					unset($_SESSION['product_id']);
        	            unset($_SESSION['tbl_quantity']);
        	            unset($_SESSION['tbl_product_price']);
        	            unset($_SESSION['color_id']);
        	            unset($_SESSION['size']);
        	          redirect('cart');
    			 } else {
    			        $insdata = array();
        				$insdata['tbl_product_id'] = $prdid;
        				$insdata['tbl_user_id'] = $user_id;
        				$insdata['seller_id'] = $admin_id;
        				if(!empty($color_id)){
    					$insdata['color_id'] = $color_id;
    					}else{
    					    $insdata['color_id'] = 0;
    					}
    					if(!empty($size)){
    					$insdata['size'] = $size;
    					}else{
    					    $insdata['size'] = 0;
    					}
    					
        				$insdata['tbl_quantity']     = $tbl_quantity;
        				$insdata['tbl_added_date']     = $added_date;
        				$insdata['tbl_product_price']     = $price;
        				$insdata['total_price']     =  $tbl_quantity * $price;
    			     $check = $this->CommonModel->insertdataontable('tbl_cart',$insdata);
        	         unset($_SESSION['product_id']);
        	         unset($_SESSION['tbl_quantity']);
        	         unset($_SESSION['tbl_product_price']);
        	         unset($_SESSION['color_id']);
        	         unset($_SESSION['size']);
        	         redirect('cart');
    			 }
		    }else if(!empty($this->session->userdata('wishlistprdid'))){
		        $prdid = $this->session->userdata('wishlistprdid');
		        $insdata = array();
				$insdata['tbl_user_id'] = $user_id;
				$insdata['tbl_product_id'] = $prdid;
                $getcartdata = $this->FrontModel->getData15('tbl_wishlist',$user_id,'tbl_user_id','tbl_product_id',$prdid);
           
    			 if(count($getcartdata) > 0 ){
    					$this->db->where('tbl_user_id', $user_id);
    					$this->db->where('tbl_product_id', $prdid);
    					$check = $this->db->update('tbl_wishlist',$insdata);
        			  redirect('WishList');
    			 } else {
    			     $check = $this->CommonModel->insertdataontable('tbl_wishlist',$insdata);
        			 redirect('WishList');
    			 }
		    }else{
		         redirect(base_url());
		    }
		}else{
		    $this->session->set_flashdata('Loginmessage',$res['message']);
			redirect('Login');
		}
	}
	public function logout(){
	    $this->session->sess_destroy();
		header("Location: ".base_url('Login'));
	}
	public function dosignup()
	{
	    $res = $this->LoginModel->dosignup();
		if($res['status'] == 1){
		    redirect(base_url(), 'refresh');
		}else{
		    $this->session->set_flashdata('Signupmessage',$res['message']);
			redirect('Login');
		}
	}
	public function LostPassword()
	{   $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
		$this->load->view('FRONTEND/myaccount/lostpassword',$data);
	}
	public function ForgotPassword()
	{
		if(isset($_POST['frg_email']))
			{
				$frg_email = $_POST['frg_email'];
			} else {

				$this->session->set_flashdata('message',"<b>Error!</b> Something went wrong, Please try again later");
		        redirect('LostPassword', 'refresh');
			}
		
		if (!filter_var($frg_email, FILTER_VALIDATE_EMAIL))
			{
				$this->session->set_flashdata('message',"<b>Error!</b> Email <b>$frg_email</b> is not valid.");
			    redirect('LostPassword', 'refresh');
			}
			// send the email 
		$sql	=	"
						SELECT
							*
						FROM
							`tbl_customer` 
						WHERE
							`tbl_customer`.`email` 	=	'$frg_email'
					";
		$query = $this->db->query($sql);
		$result	= $query->result();
			if(count($result)>0)
				{
					$tbl_name = $result[0]->full_name;
					$tbl_id = $result[0]->id;
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
								$this->db->where('id',$tbl_id);
		                        $res = $this->db->update('tbl_customer', $uarray);
								//echo $res;		 exit;
						// update on database
						$to = $frg_email;
						$subject = "Reset Password on Panel";
						// Always set content-type when sending HTML email
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						// More headers
							$headers .= 'From: <shalinishanu11@gmail.com>' . "\r\n";
							$loginlink	= base_url('Login'); 
						
							$message = "Hello $tbl_name, 
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
		            redirect('LostPassword', 'refresh');
					
				} else {
				    $this->session->set_flashdata('message',"<b>Oops!</b> Email <b>$frg_email</b> is not registered with us.");
		            redirect('LostPassword', 'refresh');
				}
	}
}
