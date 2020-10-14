<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {
	 
	 public function __construct()
				{
					parent::__construct();
						$this->load->model(array('Frontend/FrontModel'));
						$this->load->model(array('Backend/CommonModel'));
				}
	 
	public function index()
	{   $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
	$data['newArrival'] = $this->CommonModel->getsinglerow('tbl_new_arrival','Active','status');
	$data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
		$this->load->view('FRONTEND/index',$data);
	}
	public function Shop($id = null)
	{   $data = array();
	$data['layouts'] = $this->frontLayout($data);
	$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
	$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
	$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
	if(!empty($id)){
	$data['Product'] = $this->CommonModel->getsinglerow('tbl_product',$id,'cat_id');
	}else{
	$data['Product'] = $this->CommonModel->getsinglerow('tbl_product','Active','status');
	}
		$this->load->view('FRONTEND/shop',$data);
	}
	public function mainsearch(){
	    $data = array();
	    $data['layouts'] = $this->frontLayout($data);
	    $data['searchfor'] = $this->input->post('searchtext');
	    $data['categories'] = getanydata('tbl_category','status','Active');
	    $data['featureItem'] = getanydata('tbl_featured_product','status','Active');
	    $data['slider'] = getanydata('tbl_slider','status','Active');
	    $data['product'] = $this->FrontModel->mainSearch();
	    $data['count']= $count = count($data['product']);
	    $data["pagination"]=frontpagination('mainSearch/',$count);
	    $this->load->view('FRONTEND/searchResult',$data);
	}
	public function ProductGetData(){
	    $id 	   =  $this->input->post('id');
        echo $this->CommonModel->getData('tbl_product',$id);
	}
	public function productList($catId){
	    $data = array();
	    $seo  = array();
		$seo['title']			=	"Product - Product";
		$seo['metatitle']		=	".";
		$seo['metadescription']	=	"!";
		$seo['images']			=	"";
		$data['data']['seo']	=	$seo;
	    $data['featureItem'] = getanydata('tbl_featured_product','status','Active');
	    $data['CatId'] =  $catId;
	    $data['categories'] = getanydata('tbl_category','status','Active');
	    $data['slider'] = getanydata('tbl_slider','status','Active');
	    $data['CatProduct'] = getanydata('tbl_product','cat_id',$catId);
	    $data['count']= $count = count($data['CatProduct']);
	    $data["pagination"]=frontpagination('productList/'.$catId,$count);
	    $data['layouts'] = $this->frontLayout($data);
		$this->load->view('FRONTEND/product_category/index',$data);
	}
public function products($proId){
    $data = array();
    $seo  = array();
	$seo['title']			=	"Product - Product";
	$seo['metatitle']		=	".";
	$seo['metadescription']	=	"!";
	$seo['images']			=	"";
	$data['data']['seo']	=	$seo;
    $data['featureItem'] = getanydata('tbl_featured_product','status','Active');
    $data['proId'] =  $proId;
    $data['categories'] = getanydata('tbl_category','status','Active');
    $data['Product'] = getanydata('tbl_product','id',$proId);
    $cat_id = $data['Product'][0]['cat_id'];
	$data['relatedItem'] = getanydata('tbl_product','cat_id',$cat_id);
	$data['productmanagement'] = $this->CommonModel->getProductDetails($proId);
    $data['review'] = getanydata('tbl_product_reviews','status','Active',$proId,'tbl_product_id');
    $data['count']= $count = count($data['Product']);
    $data["pagination"]=frontpagination('Product/'.$proId,$count);
    $data['layouts'] = $this->frontLayout($data);
	$this->load->view('FRONTEND/product_category/productdetail',$data);
}
	public function BrandsList($brandId){
	    $data = array();
	    $seo  = array();
		$seo['title']			=	"Product - Product";
		$seo['metatitle']		=	".";
		$seo['metadescription']	=	"!";
		$seo['images']			=	"";
		$data['data']['seo']	=	$seo;
	    $data['featureItem'] = getanydata('tbl_featured_product','status','Active');
	    $data['brandId'] =  $brandId;
	    $data['categories'] = getanydata('tbl_category','status','Active');
	    $data['slider'] = getanydata('tbl_slider','status','Active');
	    $data['BrandProduct'] = getanydata('tbl_product','brand_id',$brandId);
	    $data['count']= $count = count($data['BrandProduct']);
	    $data["pagination"]=frontpagination('BrandsList/'.$brandId,$count);
	    $data['layouts'] = $this->frontLayout($data);
		$this->load->view('FRONTEND/brand',$data);
	}

	public function contactPage()
	{
		$data = array();
		$data['layouts'] = $this->frontLayout($data);
		$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
		$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
		$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
		$data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
		$this->load->view('FRONTEND/contact',$data);
	}

	public function aboutPage()
	{
		$data = array();
		$data['layouts'] = $this->frontLayout($data);
		$data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
		$data['slider'] = $this->CommonModel->getsinglerow('tbl_slider','Active','status');
		$data['brand'] = $this->CommonModel->getsinglerow('tbl_brands','Active','status');
		$data['featureItem'] = $this->CommonModel->getsinglerow('tbl_featured_product','Active','status');
		$this->load->view('FRONTEND/about',$data);
	}
}
