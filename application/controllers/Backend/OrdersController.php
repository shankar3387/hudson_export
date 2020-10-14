<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class OrdersController extends MY_Controller 
		{
			public function __construct()
				{
					parent::__construct();
						$this->load->model(array('Backend/CommonModel'));
						$this->load->model(array('Backend/AdminLoginModel'));
				}
				public function index($page = 1)
				{
							$checklogin	=	$this->AdminLoginModel->checkloggedin();
    	        		    if(!$checklogin)
        	        			{
        	        				header("Location: ".base_url('Admin?token=Invalid'));	
        	        			}
							$data = array();
			        	    $seo  = array();
			        	    $seo['url']				=	site_url("AdminUser");
			        		$seo['title']			=	"Order List - Admin";
			        		$seo['metatitle']		=	".";
			        		$seo['metadescription']	=	"!";
			        		$seo['images']			=	"";
			        		$data['data']['seo']	=	$seo;					
							$data['layout'] = $this->adminLayout($data);
							$admin_id = base64_decode($this->session->userdata('adminId'));
							$data['order']	=	$this->CommonModel->getsinglerow('tbl_order',$admin_id,'seller_id');
							$this->load->view("BACKEND/order/index" ,$data);
				}
				public function UpdateCategorystatus(){
							$updata = array();	
							$event_id = $this->input->post('event_id');
							$eventStatus = $this->input->post('eventStatus');
							$updata['status'] 	    =	$eventStatus;
							$out= 	$this->CommonModel->updatedataontable("tbl_category",$updata,$event_id);
							echo json_encode($out);
				}
				
		}
?>