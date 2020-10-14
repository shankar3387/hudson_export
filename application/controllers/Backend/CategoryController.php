<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class CategoryController extends MY_Controller 
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
							$this->load->view("BACKEND/category/index" ,$data);
				}
				public function UpdateCategorystatus(){
							$updata = array();	
							$event_id = $this->input->post('event_id');
							$eventStatus = $this->input->post('eventStatus');
							$updata['status'] 	    =	$eventStatus;
							$out= 	$this->CommonModel->updatedataontable("tbl_category",$updata,$event_id);
							echo json_encode($out);
				}
				public function SaveCategory(){
					if($this->input->post('category_name')) {
					   $is_uniqueusername =  '|is_unique[tbl_category.category_name]';
					} else {
					   $is_uniqueusername =  '';
					}
					$this->form_validation->set_rules('category_name', 'Category Name', 'required|trim'.$is_uniqueusername);
					if($this->form_validation->run())
					{
						$insta = array();
						if((!empty($_FILES['cat_img']['name']))){
                        $check    = uploadimgfile("cat_img",$folder="images",$prefix="cat_");
                        $link        = $check['data']['name'];
                        $insta['img']         =    $link;
                    	}else{
                    	  $this->session->set_flashdata('errors',"Category Image field is required!");
			              redirect("Category");  
                    	}
						$insta['category_name'] = $this->input->post("category_name");
						$insta['status'] = 'Active';
						$insta['created_at'] = date('Y-m-d h:i:s');
						$insta['created_by'] = base64_decode($this->session->userdata('adminId'));
						$insta['updated_by'] = 0;
						$insta['updated_at'] = date('Y-m-d h:i:s');
						$out= 	$this->CommonModel->insertdataontable("tbl_category",$insta);
						 if($out['status'] == '1'){
							 $this->session->set_flashdata('message',$out['mess']);
							 redirect('Category', 'refresh');
						 }
					}else{
						$str = '';
						$items = array('category_name');
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
						   redirect("Category");
						}
					}
				}
				public function getupdateCategoryData(){
							$id 	   =  $this->input->post('id');
            				echo $this->CommonModel->getData('tbl_category',$id);
				}
				public function EditCategory(){
							$this->form_validation->set_rules('category_name', 'Category Name', 'required');
							if($this->form_validation->run())
							{
								$insta = array();
								$id = $this->input->post("edit_id");
								if((!empty($_FILES['cat_img']['name']))){
                                    $check    = uploadimgfile("cat_img",$folder="images",$prefix="cat_");
                                    $link        = $check['data']['name'];
                                    $insta['img']         =    $link;
                                	}
								$insta['category_name'] = $this->input->post("category_name");
								$insta['updated_by'] = base64_decode($this->session->userdata('adminId'));
								$insta['updated_at'] = date('Y-m-d h:i:s');
								$out= 	$this->CommonModel->updatedataontable('tbl_category',$insta,$id);
								 if($out['status'] == '1'){
									 $this->session->set_flashdata('message',$out['mess']);
									 redirect('Category', 'refresh');
								 }
							}else{
								$str = '';
								$items = array('category_name');
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
								   redirect("Category");
								}
							}
				}
				
		}
?>