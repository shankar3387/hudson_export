<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends MY_Controller {
	 
	 public function __construct()
				{
					parent::__construct();
						$this->load->model(array('Frontend/FrontModel'));
						$this->load->model(array('Backend/CommonModel'));
				}
	 
	public function index()
	{   

			$checklogin	=	$this->FrontModel->checkloggedin();
		    if(!$checklogin)
			{
			    header("Location: ".base_url('Login'));
			}else{
        	    $data = array();
        	    $user_id = base64_decode($this->session->userdata('customerId'));
	            $data['layouts'] = $this->frontLayout($data);
				$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
				$data['customer'] = $this->CommonModel->getsinglerow('tbl_customer',$user_id,'id');
        	    $this->load->view('FRONTEND/myaccount/AccountEdit',$data);
			}
	}
	public function UpdateDetail(){
		$cusId = base64_decode($this->session->userdata('customerId'));
	    $insta = array();
    	$insta['full_name'] = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('first_name'))." ".preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('last_name'));
    	$insta['email'] = preg_replace('/[^A-Za-z0-9\@._-]/', '', $this->input->post('email'));
    	$insta['mobile_no'] =  preg_replace('/[^0-9\-]/', '', $this->input->post('mobile_no'));
        $oldpassword = md5($this->input->post('oldpassword'));
        $newpassword = $this->input->post('newpassword');
        $newconfirm = $this->input->post('newconfirm');
            if(!empty($oldpassword) && !empty($newpassword) && !empty($newconfirm)){
                if($newpassword == $newconfirm){
                    $res = $this->CommonModel->getsinglerow('tbl_customer',$oldpassword,'password');
                    if(count($res) > 0){
                    	$insta['password'] = md5($newpassword);
                    	$out1= 	$this->CommonModel->updatedataontable('tbl_customer',$insta,$cusId);
                    	if($out1['status'] == '1'){
                    	     $this->session->set_flashdata('message',"Detail Change Successfully");
                    		 redirect('AccountDetail', 'refresh');
                            }
                    }else{
                        $this->session->set_flashdata('error',"Old Password Does Not Match");
    		            redirect('AccountDetail', 'refresh');
                }
                }else{
                        $this->session->set_flashdata('error',"Password And Confirm Password Does Not Match");
    		        redirect('AccountDetail', 'refresh');
                }
            }else{
                $out1= 	$this->CommonModel->updatedataontable('tbl_customer',$insta,$cusId);
            	if($out1['status'] == '1'){
            	     $this->session->set_flashdata('message',"Detail Change Successfully");
            		 redirect('AccountDetail', 'refresh');
                    }
            }
	}
    public function savereview(){
        //echo "<pre>"; print_r($_POST); echo "</pre>";
        $checklogin =   $this->FrontModel->checkloggedin();
            if(!$checklogin)
            {
                header("Location: ".base_url('Login'));
            }else{
                $product_id = $this->input->post('product_id');
                $this->form_validation->set_rules('author', 'Name', 'required');
                $this->form_validation->set_rules('comment', 'Your review', 'required');
                $this->form_validation->set_rules('rating', 'Rating', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                if($this->form_validation->run())
                {
                $cusId = base64_decode($this->session->userdata('customerId'));
                $tbl_product_review_name = $this->input->post('author');
                $tbl_product_review_description = $this->input->post('comment');
                $rating = $this->input->post('rating');
                $product_id = $this->input->post('product_id');
                $insta = array();
                $insta['tbl_product_id'] = $product_id;
                $insta['tbl_user_id'] = $cusId;
                $insta['seller_id'] = $this->input->post('seller_id');
                $insta['tbl_product_review_rating'] = $rating;
                $insta['tbl_product_review_name'] = $tbl_product_review_name;
                $insta['tbl_product_review_description'] = $tbl_product_review_description;
                $insta['email'] = $this->input->post('email');
                $insta['status'] = 'Inactive';
                $insta['created_at'] = date('Y-m-d h:i:s');
                $out = $this->CommonModel->insertdataontable('tbl_product_reviews',$insta);
                if($out['status'] == '1'){
                         $this->session->set_flashdata('message',"Review Submited Successfully!!");
                         redirect('Product/'.$product_id.'#tab-reviews', 'refresh');
                     }
                }else{
                    $str = '';
                    $items = array('author','comment','rating','email');
                    foreach($items as $key)
                    {
                        if(!empty(form_error("$key")))
                        {
                            $str.= form_error("$key")."<br/>";
                        }
                    }
                    if(!empty($str))
                    {
                       $this->session->set_flashdata('reviewerror',$str);
                       redirect("Product/".$product_id."#tab-reviews");
                    }
                }
                

            }
    }
    public function Saveenquiry(){
        //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
        $product_id = $this->input->post('product_id');
        $this->form_validation->set_rules('author', 'Name', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required|min_length[10]|max_length[10]|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('required_quantity', 'Required Quantity', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('message', 'Message', 'required');
        if($this->form_validation->run())
        {
        $cusId = base64_decode($this->session->userdata('customerId'));
        $insta = array();
        $insta['product_id'] = $this->input->post('product_id');
        $insta['seller_id'] = $this->input->post('seller_id');
        $insta['mobile'] = $this->input->post('mobile');
        $insta['name'] = $this->input->post('author');
        $insta['message'] = $this->input->post('message');
        $insta['required_quantity'] = $this->input->post('required_quantity');
        $insta['email'] = $this->input->post('email');
        $insta['created_at'] = date('Y-m-d h:i:s');
        $insta['updated_at'] = date('Y-m-d h:i:s');
        $out = $this->CommonModel->insertdataontable('tbl_enquiry',$insta);
        if($out['status'] == '1'){
                 $this->session->set_flashdata('message',"Enquiry Submited Successfully!!");
                 redirect('Product/'.$product_id.'#tab-contact', 'refresh');
             }
        }else{
            $str = '';
            $items = array('author','mobile','required_quantity','email','message');
            foreach($items as $key)
            {
                if(!empty(form_error("$key")))
                {
                    $str.= form_error("$key")."<br/>";
                }
            }
            if(!empty($str))
            {
               $this->session->set_flashdata('enquiryerror',$str);
               redirect("Product/".$product_id."#tab-contact");
            }
        }
    }
}
?>