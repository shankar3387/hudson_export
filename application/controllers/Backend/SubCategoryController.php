<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class SubCategoryController extends MY_Controller 
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
			        		$seo['title']			=	"Category List - Admin";
			        		$seo['metatitle']		=	".";
			        		$seo['metadescription']	=	"!";
			        		$seo['images']			=	"";
			        		$data['data']['seo']	=	$seo;					
							$data['layout'] = $this->adminLayout($data);
							$data['Category']	=	$this->CommonModel->getdataoftable('tbl_category');
							$data['Subcategory']	=	$this->CommonModel->getdataoftable('tbl_subcategory');
							$this->load->view("BACKEND/subcategory/index" ,$data);
				}
				public function UpdateCategorystatus(){
							$updata = array();	
							$event_id = $this->input->post('event_id');
							$eventStatus = $this->input->post('eventStatus');
							$updata['status'] 	    =	$eventStatus;
							$out= 	$this->CommonModel->updatedataontable("tbl_subcategory",$updata,$event_id);
							echo json_encode($out);
				}
				public function SaveCategory(){
					if($this->input->post('subcategory_name')) {
					   $is_uniqueusername =  '|is_unique[tbl_subcategory.subcategory_name]';
					} else {
					   $is_uniqueusername =  '';
					}
					$this->form_validation->set_rules('category_id', 'Category Name', 'required|trim');
					$this->form_validation->set_rules('subcategory_name', 'SubCategory Name', 'required|trim'.$is_uniqueusername);
					if($this->form_validation->run())
					{
						$insta = array();
						$insta['category_id'] = $this->input->post("category_id");
						$insta['subcategory_name'] = $this->input->post("subcategory_name");
						$insta['status'] = 'Active';
						$insta['created_at'] = date('Y-m-d h:i:s');
						$insta['created_by'] = base64_decode($this->session->userdata('adminId'));
						$insta['updated_by'] = 0;
						$insta['updated_at'] = date('Y-m-d h:i:s');
						$out= 	$this->CommonModel->insertdataontable("tbl_subcategory",$insta);
						 if($out['status'] == '1'){
							 $this->session->set_flashdata('message',$out['mess']);
							 redirect('SubCategory', 'refresh');
						 }
					}else{
						$str = '';
						$items = array('subcategory_name','category_id');
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
						   redirect("SubCategory");
						}
					}
				}
				public function getupdateCategoryData(){
							$id 	   =  $this->input->post('id');
            				echo $this->CommonModel->getData('tbl_subcategory',$id);
				}
				public function EditCategory(){
							$this->form_validation->set_rules('subcategory_name', 'SubCategory Name', 'required');
							$this->form_validation->set_rules('category_id', 'Category Name', 'required');
							if($this->form_validation->run())
							{
								$insta = array();
								$id = $this->input->post("edit_id");
								$insta['category_id'] = $this->input->post("category_id");
								$insta['subcategory_name'] = $this->input->post("subcategory_name");
								$insta['updated_by'] = base64_decode($this->session->userdata('adminId'));
								$insta['updated_at'] = date('Y-m-d h:i:s');
								$out= 	$this->CommonModel->updatedataontable('tbl_subcategory',$insta,$id);
								 if($out['status'] == '1'){
									 $this->session->set_flashdata('message',$out['mess']);
									 redirect('SubCategory', 'refresh');
								 }
							}else{
								$str = '';
								$items = array('category_id','subcategory_name');
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
								   redirect("SubCategory");
								}
							}
				}
				
		}
?>