<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class ColorController extends MY_Controller 
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
			        		$seo['title']			=	"Color List - Admin";
			        		$seo['metatitle']		=	".";
			        		$seo['metadescription']	=	"!";
			        		$seo['images']			=	"";
			        		$data['data']['seo']	=	$seo;					
							$data['layout'] = $this->adminLayout($data);
							$data['color']	=	$this->CommonModel->getdataoftable('tbl_color');
							$this->load->view("BACKEND/color/index" ,$data);
				}
				public function UpdateColorstatus(){
							$updata = array();	
							$event_id = $this->input->post('event_id');
							$eventStatus = $this->input->post('eventStatus');
							$updata['status'] 	    =	$eventStatus;
							$out= 	$this->CommonModel->updatedataontable("tbl_color",$updata,$event_id);
							echo json_encode($out);
				}
				public function SaveColor(){
					if($this->input->post('color_name')) {
					   $is_uniqueusername =  '|is_unique[tbl_color.color_name]';
					} else {
					   $is_uniqueusername =  '';
					}
					$this->form_validation->set_rules('color_name', 'Color Name', 'required|trim'.$is_uniqueusername);
					if($this->form_validation->run())
					{
						$insta = array();
						$insta['color_name'] = $this->input->post("color_name");
						$insta['status'] = 'Active';
						$insta['created_at'] = date('Y-m-d h:i:s');
						$insta['updated_at'] = date('Y-m-d h:i:s');
						$out= 	$this->CommonModel->insertdataontable("tbl_color",$insta);
						 if($out['status'] == '1'){
							 $this->session->set_flashdata('message',$out['mess']);
							 redirect('Colors', 'refresh');
						 }
					}else{
						$str = '';
						$items = array('color_name');
						foreach($items as $key)
						{
							if(!empty(form_error("$key")))
							{
								$str.= form_error("$key")."<br/>";
							}
						}
						if(!empty($str))
						{
						   $this->session->set_flashdata('errors',$str);
						   redirect("Colors");
						}
					}
				}
				public function getupdateColorData(){
							$id 	   =  $this->input->post('id');
            				echo $this->CommonModel->getData('tbl_color',$id);
				}
				public function EditColor(){
							$this->form_validation->set_rules('color_name', 'Color Name', 'required');
							if($this->form_validation->run())
							{
								$insta = array();
								$id = $this->input->post("edit_id");
								$insta['color_name'] = $this->input->post("color_name");
								$insta['updated_at'] = date('Y-m-d h:i:s');
								$out= 	$this->CommonModel->updatedataontable('tbl_color',$insta,$id);
								 if($out['status'] == '1'){
									 $this->session->set_flashdata('message',$out['mess']);
									 redirect('Colors', 'refresh');
								 }
							}else{
								$str = '';
								$items = array('color_name');
								foreach($items as $key)
								{
									if(!empty(form_error("$key")))
									{
										$str.= form_error("$key")."<br/>";
									}
								}
								if(!empty($str))
								{
								   $this->session->set_flashdata('errors',$str);
								   redirect("Colors");
								}
							}
				}
				
		}
?>