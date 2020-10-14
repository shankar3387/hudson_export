<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class BrandController extends MY_Controller 
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
			        		$seo['title']			=	"Brand List - Admin";
			        		$seo['metatitle']		=	".";
			        		$seo['metadescription']	=	"!";
			        		$seo['images']			=	"";
			        		$data['data']['seo']	=	$seo;					
							$data['layout'] = $this->adminLayout($data);
							$data['Brand']	=	$this->CommonModel->getdataoftable('tbl_brands');
							$this->load->view("BACKEND/brand/index" ,$data);
				}
				public function UpdateBrandstatus(){
							$updata = array();	
							$event_id = $this->input->post('event_id');
							$eventStatus = $this->input->post('eventStatus');
							$updata['status'] 	    =	$eventStatus;
							$out= 	$this->CommonModel->updatedataontable("tbl_brands",$updata,$event_id);
							echo json_encode($out);
				}
				public function SaveBrand(){
					if($this->input->post('tbl_brand_name')) {
					   $is_uniqueusername =  '|is_unique[tbl_brands.tbl_brand_name]';
					} else {
					   $is_uniqueusername =  '';
					}
					$this->form_validation->set_rules('tbl_brand_name', 'Brand Name', 'required|trim'.$is_uniqueusername);
					if($this->form_validation->run())
					{
						$insta = array();
						if((!empty($_FILES['icon']['name']))){
                        $check    = uploadimgfile("icon",$folder="images",$prefix="brnd_");
                        $link        = $check['data']['name'];
                        $insta['icon']         =    $link;
                    	}else{
                    	  $this->session->set_flashdata('errors',"Brand Icon field is required!");
			              redirect("Brand");  
                    	}
						$insta['tbl_brand_name'] = $this->input->post("tbl_brand_name");
						$insta['status'] = 'Active';
						$insta['created_at'] = date('Y-m-d h:i:s');
						$insta['updated_at'] = date('Y-m-d h:i:s');
						$out= 	$this->CommonModel->insertdataontable("tbl_brands",$insta);
						 if($out['status'] == '1'){
							 $this->session->set_flashdata('message',$out['mess']);
							 redirect('Brand', 'refresh');
						 }
					}else{
						$str = '';
						$items = array('tbl_brand_name');
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
						   redirect("Brand");
						}
					}
				}
				public function getupdateBrandData(){
							$id 	   =  $this->input->post('id');
            				echo $this->CommonModel->getData('tbl_brands',$id);
				}
				public function EditBrand(){
							$this->form_validation->set_rules('tbl_brand_name', 'Brand Name', 'required');
							if($this->form_validation->run())
							{
								$insta = array();
								$id = $this->input->post("edit_id");
								if((!empty($_FILES['icon']['name']))){
                                    $check    = uploadimgfile("icon",$folder="images",$prefix="brnd_");
                                    $link        = $check['data']['name'];
                                    $insta['icon']         =    $link;
                                	}
								$insta['tbl_brand_name'] = $this->input->post("tbl_brand_name");
								$insta['updated_at'] = date('Y-m-d h:i:s');
								$out= 	$this->CommonModel->updatedataontable('tbl_brands',$insta,$id);
								 if($out['status'] == '1'){
									 $this->session->set_flashdata('message',$out['mess']);
									 redirect('Brand', 'refresh');
								 }
							}else{
								$str = '';
								$items = array('tbl_brand_name');
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
								   redirect("Brand");
								}
							}
				}
				
		}
?>