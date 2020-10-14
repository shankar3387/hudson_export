<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends MY_Controller {
	 
	 public function __construct()
				{
					parent::__construct();
						$this->load->model(array('Frontend/FrontModel'));
						$this->load->model(array('Backend/CommonModel'));
				}
     
    public function aboutPage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/aboutfooter',$data);
    }


    public function googlepartnerpage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/googlepatner',$data);
    }
    public function helppage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/help',$data);
    }
    public function shippingpage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/shipping',$data);
    }
    public function cancelpage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/cancel',$data);
    }
    public function faqpage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/faq',$data);
    }
    public function privacypage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/privacy',$data);
    }
    public function Termsofusepage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/termsofuse',$data);
    }
    public function servicespage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/services',$data);
    }
    public function contactuspage()
    {
        $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
    $data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
    $this->load->view('FRONTEND/Footer/contactus',$data);
    }
}