<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class ProductController extends MY_Controller 
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
	        		$seo['title']			=	"Report List - Employee";
	        		$seo['metatitle']		=	".";
	        		$seo['metadescription']	=	"!";
	        		$seo['images']			=	"";
	        		$data['data']['seo']	=	$seo;					
					$data['layout'] = $this->adminLayout($data);
					$data['product']	=	$this->CommonModel->getdataoftable('tbl_product');
					$data['category']	=	$this->CommonModel->getdataoftable('tbl_category');
					$this->load->view("BACKEND/product/index" ,$data);
				}
				public function Addproduct()
				{
					$checklogin	=	$this->AdminLoginModel->checkloggedin();
	        		if(!$checklogin)
	        			{
	        				header("Location: ".base_url('Admin?token=Invalid'));	
	        			}
					$data = array();
	        	    $seo  = array();
	        	    $seo['url']				=	site_url("AdminUser");
	        		$seo['title']			=	"Add Product - Product";
	        		$seo['metatitle']		=	".";
	        		$seo['metadescription']	=	"!";
	        		$seo['images']			=	"";
	        		$data['data']['seo']	=	$seo;					
					$data['layout'] = $this->adminLayout($data);
					$data['subcategory']	=	$this->CommonModel->getdataoftable('tbl_subcategory');
					$data['category']	=	$this->CommonModel->getdataoftable('tbl_category');
					$data['color']	=	$this->CommonModel->getdataoftable('tbl_color');
					$data['brand']	=	$this->CommonModel->getdataoftable('tbl_brands');
					$this->load->view("BACKEND/product/Addproduct" ,$data);
				}
				public function SubCateGet(){
                $catId = $this->input->post('cateId');
                $reult = getanydata('tbl_subcategory','category_id',$catId,'0','0');
                $data = "";
                $data .= "<option value=''>Please Select Sub Category</option>";
                foreach($reult as $row){
                    $id = $row['id'];
                    $value = $row['subcategory_name'];
                    $data .= "<option value='$id'>$value</option>";
                }
                
                echo $data;
				}
				public function UpdatePro($id)
				{
					$checklogin	=	$this->AdminLoginModel->checkloggedin();
	        		if(!$checklogin)
	        			{
	        				header("Location: ".base_url('Admin?token=Invalid'));	
	        			}
					$data = array();
	        	    $seo  = array();
	        	    $seo['url']				=	site_url("AdminUser");
	        		$seo['title']			=	"Add Product - Product";
	        		$seo['metatitle']		=	".";
	        		$seo['metadescription']	=	"!";
	        		$seo['images']			=	"";
	        		$data['data']['seo']	=	$seo;					
					$data['layout'] = $this->adminLayout($data);
					$data['subcategory']	=	$this->CommonModel->getdataoftable('tbl_subcategory');
					$data['proid']	=	$id;
					$data['category']	=	$this->CommonModel->getdataoftable('tbl_category');
					$data['color']	=	$this->CommonModel->getdataoftable('tbl_color');
					$data['brand']	=	$this->CommonModel->getdataoftable('tbl_brands');
					$data['productDetail']	=	$this->CommonModel->getsinglerow('tbl_product',$id,'id');
					$data['productImgDetail']	=	$this->CommonModel->getsinglerow('tbl_product_images',$id,'tbl_product_id');
					$data['productPriceDetail']	=	$this->CommonModel->getsinglerow('tbl_product_price',$id,'tbl_product_id');
					$data['productStockDetail']	=	$this->CommonModel->getsinglerow('tbl_stock_management',$id,'product_id');
					$this->load->view("BACKEND/product/editProduct" ,$data);
				}
				public function DeleteStock($id,$proid){
		    	    $this->db->where('id', $id);
		            $this->db->delete('tbl_stock_management');
		            $this->session->set_flashdata('message',"Stock Deleted Successfully!!");
		        	redirect('UpdatePro/'.$proid, 'refresh');
		    	}
		    	public function DeleteImg($id,$proid){
		    	    $this->db->where('id', $id);
		            $this->db->delete('tbl_product_images');
		            $this->session->set_flashdata('message',"Image Deleted Successfully!!");
		        	redirect('UpdatePro/'.$proid, 'refresh');
		    	}
				public function addProducts(){
	    		$this->form_validation->set_rules('cat_id', 'Category Name', 'required');
	    		//$this->form_validation->set_rules('subcat_id', 'SubCategory Name', 'required');
	    		//$this->form_validation->set_rules('brand_id', 'Brand Name', 'required');
				$this->form_validation->set_rules('product_name', 'Product Name', 'required');
				$this->form_validation->set_rules('product_code', 'Product Code', 'required');
				$this->form_validation->set_rules('base_price', 'Product Base Price', 'required');
				$this->form_validation->set_rules('search_keywords', 'Search Keyword', 'required');
				//$this->form_validation->set_rules('stock', 'Stock', 'required');
				$this->form_validation->set_rules('short_description', 'Product Short Description', 'required');
				$this->form_validation->set_rules('product_full_description', 'Product Full Description', 'required');
		        //print_r($_POST['stock']); exit;
		        if($this->form_validation->run())
    			{
    			$picimage = $_FILES['product_pic']['name'][0];
    			if(empty($picimage)){
    				$this->session->set_flashdata('errors',"Product Image Is required");
               	   redirect("Products");
    			}
    			$stock = $this->input->post("stock");
			    $cnt = count($stock);
			    if($cnt == 0){
			    	$this->session->set_flashdata('errors',"The Stock Field Is required");
               	   redirect("Products");
			    }
			    $admin_id = base64_decode($this->session->userdata('adminId'));
			    $discountable = '0';
			    $insta = array();
			    $cat_id = $this->input->post("cat_id");
			    $subcat_id = $this->input->post("subcat_id");
			    $brand_id = $this->input->post("brand_id");
			    $product_name = $this->input->post("product_name");
			    $product_code = $this->input->post("product_code");
			    $description = $this->input->post("product_full_description");
			    $search_keywords = $this->input->post("search_keywords");
			    $base_price = $this->input->post("base_price");
			    $offer_startr_date = date("Y-m-d",strtotime($this->input->post("offer_startr_date")));
			    $offer_end_date =  date("Y-m-d",strtotime($this->input->post("offer_end_date")));
			    $percent = $this->input->post("percent");
			    if(!empty($percent)){
			        $discountable = '1';
			    }
			    $price_after_discount = $this->input->post("price_after_discount");
			    $delivery_charges = $this->input->post("delivery_charges");
			    $Color = $this->input->post("Color");
			    $size = $this->input->post("size");
			    $stock = $this->input->post("stock");
			    $picimage = $_FILES['product_pic']['name'];
			    $cnt = count($stock);
			    $cnt1 = count($picimage);
			    $insta['cat_id'] = $cat_id;
			    $insta['subcat_id'] = $subcat_id;
			    $insta['seller_id'] = $admin_id;
			    $insta['brand_id'] = $brand_id;
			    $insta['product_name'] = $product_name;
			    $insta['product_code'] = $product_code;
			    $insta['product_price'] = $base_price;
			    $insta['product_pic'] = '0';
			    $insta['short_description'] = $this->input->post('short_description');
			    $insta['product_full_description'] = $description;
			    $insta['search_keywords'] = $search_keywords;
			    $insta['product_stock_availablity'] = '1';
			    $insta['status'] = 'Active';
			    $insta['created_at'] = date("Y-m-d h:i:s");
			    $insta['updated_at'] = date("Y-m-d h:i:s");
			    $out= 	$this->CommonModel->insertdataontable("tbl_product",$insta);
			    if($out['status'] == 1)
			    {
			        $product_id = $out['insertid'];
			        $insta1 = array();
			        $insta1['tbl_product_id'] = $product_id;
			        $insta1['tbl_product_base_price'] = $base_price;
			        $insta1['tbl_product_is_discountable'] = $discountable;
			        $insta1['tbl_product_discount_start_date'] = $offer_startr_date;
			        $insta1['tbl_product_discount_end_date'] = $offer_end_date;
			        $insta1['tbl_product_discount_percentage'] = $percent;
			        $insta1['tbl_product_price_after_discount'] = $price_after_discount;
			        $insta1['tbl_product_is_new'] = '1';
			        $insta1['tbl_product_delivery_charges'] = $delivery_charges;
			        $out1 = 	$this->CommonModel->insertdataontable("tbl_product_price",$insta1);
			        
			        $insta2 = array();
		            for($i = 0; $i<$cnt1; $i++){
		                $check    = uploadimgfile1('product_pic',$folder="images",$prefix="pro_",$i);
		                $link        = $check['data']['name'];
		                $insta2['tbl_product_500_500'] = $link;
		                $insta2['tbl_350_350'] = $link;
		                $insta2['tbl_66_66'] = $link;
		                $insta2['tbl_product_id'] = $product_id;
		                $insta2['admin_id'] = $admin_id;
		                $insta2['tbl_product_image_status'] = 'Active';
		                $insta2['tbl_product_images_deleted'] = '0';
		                $insta2['created_at'] = date("Y-m-d h:i:s");
		                $insta2['updated_at'] = date("Y-m-d h:i:s");
		                $out2 = 	$this->CommonModel->insertdataontable("tbl_product_images",$insta2);
		                if($i == 0){
		                $up = array();
		                $up['product_pic'] = $link;
		                $update = 	$this->CommonModel->updatedataontable("tbl_product",$up,$product_id);
		            	}
		            }
		            
		            $insta7 = array();
		            for($i = 0; $i<$cnt; $i++){
		                if(!empty($Color[$i])){
		                    $clr = $Color[$i];
		                }else{
		                   $clr = 0; 
		                }
		                if(!empty($size[$i])){
		                    $siz = $size[$i];
		                }else{
		                   $siz = 0; 
		                }
		                $insta7['product_id'] = $product_id;
		                $insta7['color_id'] = $clr;
		                $insta7['size'] = $siz;
		                $insta7['stock'] = $stock[$i];
		                $insta7['created_at'] = date("Y-m-d h:i:s");
		                $insta7['updated_at'] = date("Y-m-d h:i:s");
		                $out7 = 	$this->CommonModel->insertdataontable("tbl_stock_management",$insta7);
		            }
		             if($out7['status'] == 1){
		                    $this->session->set_flashdata('message',$out7['mess']);
		        		    redirect('product', 'refresh');
		            }
			    }
			}else{
			    $str = '';
                $items = array('cat_id','subcat_id','brand_id','product_code','product_name','base_price','search_keywords','product_full_description','short_description','stock');
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
               	   redirect("Products");
				}
			}
	}
	public function UpdateProducts(){
				$product_id = $this->input->post("pro_id");
	    		$this->form_validation->set_rules('cat_id', 'Category Name', 'required');
	    		//$this->form_validation->set_rules('subcat_id', 'SubCategory Name', 'required');
	    		//$this->form_validation->set_rules('brand_id', 'Brand Name', 'required');
				$this->form_validation->set_rules('product_name', 'Product Name', 'required');
				$this->form_validation->set_rules('product_code', 'Product Code', 'required');
				$this->form_validation->set_rules('base_price', 'Product Base Price', 'required');
				$this->form_validation->set_rules('search_keywords', 'Search Keyword', 'required');
				$this->form_validation->set_rules('short_description', 'Product Short Description', 'required');
				$this->form_validation->set_rules('product_full_description', 'Product Full Description', 'required');
				//$this->form_validation->set_rules('stock', 'Stock', 'required');
		        if($this->form_validation->run())
    			{
			    $admin_id = base64_decode($this->session->userdata('adminId'));
			    $discountable = '0';
			    $insta = array();
			    $cat_id = $this->input->post("cat_id");
			    $subcat_id = $this->input->post("subcat_id");
			    $brand_id = $this->input->post("brand_id");
			    $product_name = $this->input->post("product_name");
			    $product_code = $this->input->post("product_code");
			    $description = $this->input->post("product_full_description");
			    $search_keywords = $this->input->post("search_keywords");
			    $base_price = $this->input->post("base_price");
			    $offer_startr_date = date("Y-m-d",strtotime($this->input->post("offer_startr_date")));
			    $offer_end_date =  date("Y-m-d",strtotime($this->input->post("offer_end_date")));
			    $percent = $this->input->post("percent");
			    if(!empty($percent)){
			        $discountable = '1';
			    }
			    $price_after_discount = $this->input->post("price_after_discount");
			    $delivery_charges = $this->input->post("delivery_charges");
			    $Color = $this->input->post("Color");
			    $size = $this->input->post("size");
			    $stock = $this->input->post("stock");
			    $product_id = $this->input->post("pro_id");
			    $cnt = count($stock);
			    if(!empty($_FILES['product_pic']['name'])){
			    $picimage = $_FILES['product_pic']['name'];
			    $cnt1 = count($picimage); 
				}
			    $insta['cat_id'] = $cat_id;
			    $insta['subcat_id'] = $subcat_id;
			    $insta['seller_id'] = $admin_id;
			    $insta['brand_id'] = $brand_id;
			    $insta['product_name'] = $product_name;
			    $insta['product_code'] = $product_code;
			    $insta['product_price'] = $base_price;
			    $insta['short_description'] = $this->input->post('short_description');
			    $insta['product_full_description'] = $description;
			    $insta['search_keywords'] = $search_keywords;
			    $insta['product_stock_availablity'] = '1';
			    $insta['updated_at'] = date("Y-m-d h:i:s");
			    $out= 	$this->CommonModel->updatedataontable("tbl_product",$insta,$product_id);
			    if($out['status'] == 1)
			    {
			       
			        $insta1 = array();
			        $insta1['tbl_product_id'] = $product_id;
			        $insta1['tbl_product_base_price'] = $base_price;
			        $insta1['tbl_product_is_discountable'] = $discountable;
			        $insta1['tbl_product_discount_start_date'] = $offer_startr_date;
			        $insta1['tbl_product_discount_end_date'] = $offer_end_date;
			        $insta1['tbl_product_discount_percentage'] = $percent;
			        $insta1['tbl_product_price_after_discount'] = $price_after_discount;
			        $insta1['tbl_product_is_new'] = '1';
			        $insta1['tbl_product_delivery_charges'] = $delivery_charges;
			        $out1 = 	$this->CommonModel->insertdataontable("tbl_product_price",$insta1);
			        
			        $insta2 = array();
			        if(!empty($_FILES['product_pic']['name'])){
		            for($i = 0; $i<$cnt1; $i++){
		                $check    = uploadimgfile1('product_pic',$folder="images",$prefix="pro_",$i);
		                $link        = $check['data']['name'];
		                $insta2['tbl_product_500_500'] = $link;
		                $insta2['tbl_350_350'] = $link;
		                $insta2['tbl_66_66'] = $link;
		                $insta2['tbl_product_id'] = $product_id;
		                $insta2['admin_id'] = $admin_id;
		                $insta2['tbl_product_image_status'] = 'Active';
		                $insta2['tbl_product_images_deleted'] = '0';
		                $insta2['created_at'] = date("Y-m-d h:i:s");
		                $insta2['updated_at'] = date("Y-m-d h:i:s");
		                $out2 = 	$this->CommonModel->insertdataontable("tbl_product_images",$insta2);
		                if($i == 0){
		                $up = array();
		                $up['product_pic'] = $link;
		                $update = 	$this->CommonModel->updatedataontable("tbl_product",$up,$product_id);
		            	}
		            }
		        }
		            
		            $insta7 = array();
		            $this->db->where('product_id', $product_id);
            		$res3= $this->db->delete('tbl_stock_management');
		            for($i = 0; $i<$cnt; $i++){
		                if(!empty($Color[$i])){
		                    $clr = $Color[$i];
		                }else{
		                   $clr = 0; 
		                }
		                if(!empty($size[$i])){
		                    $siz = $size[$i];
		                }else{
		                   $siz = 0; 
		                }
		                $insta7['product_id'] = $product_id;
		                $insta7['color_id'] = $clr;
		                $insta7['size'] = $siz;
		                $insta7['stock'] = $stock[$i];
		                $insta7['created_at'] = date("Y-m-d h:i:s");
		                $insta7['updated_at'] = date("Y-m-d h:i:s");
		                $out7 = 	$this->CommonModel->insertdataontable("tbl_stock_management",$insta7);
		            }
		             if($out7['status'] == 1){
		                    $this->session->set_flashdata('message',$out7['mess']);
		        		    redirect('product', 'refresh');
		            }
			    }
			}else{
			    $str = '';
                $items = array('cat_id','subcat_id','brand_id','product_code','product_name','base_price','search_keywords','short_description','product_full_description','stock');
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
               	   redirect("UpdatePro/".$product_id);
				}
			}
	}


	public function UpdateProductstatus(){
	    $updata = array();	
		$event_id = $this->input->post('event_id');
		$eventStatus = $this->input->post('eventStatus');
		$updata['status'] 	    =	$eventStatus;
		$out= 	$this->CommonModel->updatedataontable("tbl_product",$updata,$event_id);
		echo json_encode($out);
	}
				/*Feature Product Section*/
				
				public function FeatureProduct()
				{   
				    $checklogin	=	$this->AdminLoginModel->checkloggedin();
	        		if(!$checklogin)
        			{
        				header("Location: ".base_url('Admin?token=Invalid'));	
        			}
					$data = array();
	        	    $seo  = array();
	        	    $seo['url']				=	site_url("AdminUser");
	        		$seo['title']			=	"Report List - Employee";
	        		$seo['metatitle']		=	".";
	        		$seo['metadescription']	=	"!";
	        		$seo['images']			=	"";
	        		$data['data']['seo']	=	$seo;					
					$data['layout'] = $this->adminLayout($data);
					$data['featureProduct']	=	$this->CommonModel->getdataoftable('tbl_featured_product');
					$data['product']	=	$this->CommonModel->getdataoftable('tbl_product');
					$data['category']	=	$this->CommonModel->getdataoftable('tbl_category');
					$this->load->view("BACKEND/product/FeatureProduct" ,$data);
				}
				
				public function getproduct(){
                $subcatId = $this->input->post('subcatId');
                $reult = getanydata('tbl_product','cat_id',$subcatId);
                $data = "";
                $data .= "<option value=''>Please Select Product</option>";
                foreach($reult as $row){
                    $id = $row['id'];
                    $value = $row['product_name'];
                    $data .= "<option value='$id'>$value</option>";
                }
                
                echo $data;
            }
            
            public function addFeatureProduct(){
            $insta = array();
            if((!empty($this->input->post('product'))) && (!empty($this->input->post('cat_id')))){
                $insta['product_id'] = $this->input->post('product');
                $insta['cat_id'] = $this->input->post('cat_id');
                $insta['status'] = "Active";
                $insta['created_at'] = date('Y-m-d h:i:s');
                $insta['updated_at'] = date('Y-m-d h:i:s');
                
                $out= 	$this->CommonModel->insertdataontable("tbl_featured_product",$insta);
            	 if($out['status'] == '1'){
            	     $this->session->set_flashdata('message',$out['mess']);
            		 redirect('FeatureProduct', 'refresh');
            	 }
            }else{
            	     $this->session->set_flashdata('error',"Please Enter Product Name or Category Name");
            		 redirect('FeatureProduct', 'refresh');
            	 }
        }
        
        public function getFeatureProduct(){
    	    $id 	   =  $this->input->post('id');
            echo $this->CommonModel->getData('tbl_featured_product',$id);
    	}
    	
    	public function updateFeatureProduct(){
            $insta = array();
            if((!empty($this->input->post('product'))) && (!empty($this->input->post('cat_id')))){
                $id = $this->input->post('edit_id');
                $insta['product_id'] = $this->input->post('product');
                $insta['cat_id'] = $this->input->post('cat_id');
                $insta['updated_at'] = date('Y-m-d h:i:s');
                $out= 	$this->CommonModel->updatedataontable('tbl_featured_product',$insta,$id);
            	 if($out['status'] == '1'){
            	     $this->session->set_flashdata('message',$out['mess']);
            		 redirect('FeatureProduct', 'refresh');
            	 }
            }else{
            	     $this->session->set_flashdata('error',"Please Enter Product Name or Category Name");
            		 redirect('FeatureProduct', 'refresh');
            	 }
        }
        
        public function FeatureProductystatus(){
				    $updata = array();	
					$event_id = $this->input->post('event_id');
					$eventStatus = $this->input->post('eventStatus');
					$updata['status'] 	    =	$eventStatus;
					$out= 	$this->CommonModel->updatedataontable("tbl_featured_product",$updata,$event_id);
					echo json_encode($out);
		}

		public function newArrival(){
				$checklogin	=	$this->AdminLoginModel->checkloggedin();
				if(!$checklogin)
					{
						header("Location: ".base_url('Admin?token=Invalid'));	
					}
				$data = array();
				$seo  = array();
				$seo['url']				=	site_url("AdminUser");
				$seo['title']			=	"Report List - Employee";
				$seo['metatitle']		=	".";
				$seo['metadescription']	=	"!";
				$seo['images']			=	"";
				$data['data']['seo']	=	$seo;					
				$data['layout'] = $this->adminLayout($data);
				$data['product']	=	$this->CommonModel->getdataoftable('tbl_product');
				$data['category']	=	$this->CommonModel->getdataoftable('tbl_category');
				$this->load->view("BACKEND/product/newArrival" ,$data);
			}
}
?>