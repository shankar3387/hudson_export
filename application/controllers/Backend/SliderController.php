<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class SliderController extends MY_Controller 
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
							$data['slider']	=	$this->CommonModel->getdataoftable('tbl_slider');
							$this->load->view("BACKEND/slider/index" ,$data);
				}
				public function UpdateSliderstatus(){
							$updata = array();	
							$event_id = $this->input->post('event_id');
							$eventStatus = $this->input->post('eventStatus');
							$updata['status'] 	    =	$eventStatus;
							$out= 	$this->CommonModel->updatedataontable("tbl_slider",$updata,$event_id);
							echo json_encode($out);
				}
				public function SaveSlider(){
					
					    $insta = array();
				        if((!empty($_FILES['tbl_slider_link']['name']))){
                        $check    = uploadimgfile("tbl_slider_link",$folder="images",$prefix="slide_");
                        $link        = $check['data']['name'];
                        $insta['tbl_slider_link']         =    $link;
                	    $insta['status'] = 'Active';
						$insta['created_at'] = date('Y-m-d h:i:s');
						$insta['updated_at'] = date('Y-m-d h:i:s');
						$out= 	$this->CommonModel->insertdataontable("tbl_slider",$insta);
						 if($out['status'] == '1'){
							 $this->session->set_flashdata('message',$out['mess']);
							 redirect('Sliderimage', 'refresh');
						 }
                    	}else{
                    	  $this->session->set_flashdata('errors',"Slider Image field is required!");
			              redirect("Sliderimage");  
                    	}
				}
				public function getupdateSliderData(){
							$id 	   =  $this->input->post('id');
            				echo $this->CommonModel->getData('tbl_slider',$id);
				}
				public function UpdateSlider(){
						
								$insta = array();
								$id = $this->input->post("edit_id");
								if((!empty($_FILES['tbl_slider_link']['name']))){
                                $check    = uploadimgfile("tbl_slider_link",$folder="images",$prefix="slide_");
                                $link        = $check['data']['name'];
                                $insta['tbl_slider_link']         =    $link;
                                //$insta['h1'] = "h1";
                        	    //$insta['h2'] = "h2";
                        	    //$insta['p_tag'] = "p_tag";
        						$insta['updated_at'] = date('Y-m-d h:i:s');
        						$out= 	$this->CommonModel->updatedataontable('tbl_slider',$insta,$id);
        						 if($out['status'] == '1'){
        							 $this->session->set_flashdata('message',$out['mess']);
        							 redirect('Sliderimage', 'refresh');
        						 }
                            	}else{
                            	  $this->session->set_flashdata('errors',"Slider Image field is required!");
        			              redirect("Sliderimage");  
                            	}
                            	
				}
				
		}
?>