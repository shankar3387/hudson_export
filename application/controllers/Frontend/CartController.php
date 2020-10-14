<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartController extends MY_Controller {
	 
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
				$data['cart'] = $this->CommonModel->getsinglerow('tbl_cart',$user_id,'tbl_user_id');
        	    $this->load->view('FRONTEND/cart/index',$data);
			}
	}
    public function checkout(){
        $checklogin =   $this->FrontModel->checkloggedin();
        if(!$checklogin)
            {
                header("Location: ".base_url('Login'));
            }else{
                $data = array();
                $link = base_url();
                $data['layouts'] = $this->frontLayout($data);
                $user_id = base64_decode($this->session->userdata('customerId'));
                $data['categories'] = getanydata('tbl_category','status','Active');
                $data['country'] = getanydata('tbl_country','status','Active');
                $data['state'] = getanydata('state','status','Active');
                $data['brand'] = getanydata('tbl_brands','status','Active');
                $data['detail'] = $this->CommonModel->getsinglerow('tbl_cart',$user_id,'tbl_user_id');
        if($data['detail']){
            $total = 0; 
           // $amnt = 0;
            $pro_id = array();
            $admin_id = array();
            $color_id = array();
            $size = array();
            $quantity = array();
            $base_price = array();
            $totalamount = array();
            $delivrys = array();
            foreach($data['detail'] as $row){
                $delivery = 0;
                $pro = $row['tbl_product_id'];
                $res1 = getanydata('tbl_product_price','tbl_product_id',$pro);
                if(!empty($res1[0]['tbl_product_delivery_charges'])) {
                    $delivery += $res1[0]['tbl_product_delivery_charges']; 
                }
                //echo $delivery; exit;
                $total +=   $row['total_price']+$delivery;
                array_push($pro_id,$row['tbl_product_id']);
                array_push($admin_id,$row['seller_id']);
                array_push($quantity,$row['tbl_quantity']);
                array_push($base_price,$row['tbl_product_price']);
                array_push($color_id,$row['color_id']);
                array_push($size,$row['size']);
                array_push($totalamount,$total);
                array_push($delivrys,$delivery);
            }
//print_r($totalamount); exit;

            $session = array(
                        'pro_id'    =>  $pro_id,
                        'admin_id'  =>  $admin_id,
                        'quantity'  =>  $quantity,
                        'base_price'    =>  $base_price,
                        'color_id'  =>  $color_id,
                        'size'  =>  $size,
                        'delivery'  =>  $delivrys,
                        'totalamount'   =>  $totalamount
                    );
            $this->session->set_userdata($session);
            if(!empty($this->session->userdata('newamount'))){
               $total1 = $this->session->userdata('newamount'); 
            }else{
              $total1 = $total;  
            }
            $result1 = customerName($user_id,'tbl_customer');
            $amount =  $total1;
            $product_info = $pro;
            $customer_name = $result1['full_name'];
            $customer_emial = $result1['email'];
            $customer_mobile = $result1['mobile_no'];
            $customer_address = $result1['address_1'];
            
            //payumoney details
                // TEST DEMO
                    $MERCHANT_KEY = "gtKFFx"; //change  merchant with yours
                    $SALT = "eCwWELxi";  //change salt with yours8?
                
                /* Live DEMO*/
                /*$MERCHANT_KEY = "ltvOgFn0"; //change  merchant with yours
                $SALT = "VMZ1SjPnC9";  //change salt with yours */
        
                $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
                //optional udf values 
                $udf1 = '';
                $udf2 = '';
                $udf3 = '';
                $udf4 = '';
                $udf5 = '';
        
        $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $amount . '|' . $product_info . '|' . $customer_name . '|' . $customer_emial . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '||||||' . $SALT;
        $hash = strtolower(hash('sha512', $hashstring));
               
                $success = base_url() . 'Status';  
                $fail = base_url() . 'Status';
                $cancel = base_url() . 'Status';
                
                
                 $data['mkey'] = $MERCHANT_KEY;
                 $data['tid'] = $txnid;
                 $data['hash'] = $hash;
                 $data['amount'] = $amount;
                 $data['name'] = $customer_name;
                 $data['productinfo'] = $product_info;
                 $data['mailid'] = $customer_emial;
                 $data['phoneno']  =$customer_mobile;
                 $data['address']=  $customer_address;
                 $data['action'] = "https://test.payu.in"; //"https://secure.payu.in";// //for live change action 
                 $data['sucess'] = $success;
                 $data['failure']=  $fail;
                 $data['cancel'] = $cancel;
                 //echo "<pre>"; print_r($data); echo "<pre>"; //exit;
            $this->load->view('FRONTEND/cart/checkout',$data);
        }else{
          $this->load->view('FRONTEND/cart/checkout',$data);
        }

            }
    }
	public function wishlist(){
		$checklogin   =   $this->FrontModel->checkloggedin();
            if(!$checklogin)
            {
                header("Location: ".base_url('Login'));
            }else{
                $data =  array();
                $user_id = base64_decode($this->session->userdata('customerId'));
                $data['layouts'] = $this->frontLayout($data);
                $data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
                $data['wishlist'] = $this->CommonModel->getsinglerow('tbl_wishlist',$user_id,'tbl_user_id');
        		$this->load->view('FRONTEND/wishlist/index',$data);
            }
	}
    public function Removecart($cartid){
             $checklogin    =   $this->FrontModel->checkloggedin();
            if(!$checklogin)
            {
                header("Location: ".base_url('Login'));
            }else{
             $getcartdata = $this->CommonModel->getsinglerow('tbl_cart',$cartid,'id');
             $pro_id = $getcartdata[0]['tbl_product_id'];
             $getproduct = $this->CommonModel->getsinglerow('tbl_product',$pro_id,'id');
             $pro_name = $getproduct[0]['product_name'];
             $this->db->where('id', $cartid);
             $this->db->delete('tbl_cart');
             $this->session->set_flashdata('message',"Successfully removed ".$pro_name." from your cart!!!");
            redirect('cart', 'refresh');
        }
     }
     public function RemoveWish($wishid){
             $getcartdata = $this->CommonModel->getsinglerow('tbl_wishlist',$wishid,'id');
             $pro_id = $getcartdata[0]['tbl_product_id'];
             $getproduct = $this->CommonModel->getsinglerow('tbl_product',$pro_id,'id');
             $pro_name = $getproduct[0]['product_name']; 
             $this->db->where('id', $wishid);
             $this->db->delete('tbl_wishlist');
             $this->session->set_flashdata('message',"Successfully removed ".$pro_name." from your wishlist!!!");
            redirect('WishList', 'refresh');
     }
	public function checkqtyipstock(){
		 	$proid = $this->input->post('proid');
		    $qty = $this->input->post('qty');
		    $stock = getanydata('tbl_stock_management','product_id',$proid);
		    if(!empty($stock)){
		        $stock1 = $stock[0]['stock']; 
		        if($stock1 == $qty || $stock1 > $qty){
		            echo $stock1;
		        }else{
		           echo '0'; 
		        }
		    }else{
		        echo '0';
		    }
	}
	public function addcart()
    {
        $prdid = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('prdid'));
        $adminids = $this->CommonModel->getsinglerow('tbl_product',$prdid,'id');
        $admin_id = $adminids[0]['seller_id'];
        $tbl_quantity = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('prdqty'));
	    $price = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('price'));
	    $color_id = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('color_id'));
	    $size = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('size'));
        $total_price  = $tbl_quantity * $price;
        $checklogin	=	$this->FrontModel->checkloggedin();
		if(!$checklogin)
			{   
			    $session = array(
						'product_id' 	=>	$prdid,
						'admin_id' 	=>	$admin_id,
						'tbl_quantity' 	=>	$tbl_quantity,
						'color_id' 	=>	$color_id,
						'size' 	=>	$size,
						'tbl_product_price' 	=>	$price
					);
		        $this->session->set_userdata($session);
				$data1['success']=0;
                $data1['message']="Please login first.!!!";
                echo json_encode($data1);
			}else{
        		$user_id = base64_decode($this->session->userdata('customerId'));
        	
             	if($user_id)
                 {
                  	$added_date = date('Y-m-d H:s:i');
                    $getcartdata = $this->FrontModel->getData15('tbl_cart',$user_id,'tbl_user_id','tbl_product_id',$prdid);//DB::table('tbl_cart')->where('tbl_user_id',$user_id)->where('tbl_product_id',$productid)->get();
               
        			 if(count($getcartdata) > 0 ){
        			     $presentqty = $getcartdata[0]['tbl_quantity'];
        			     $preprice = $getcartdata[0]['tbl_product_price'];
        			     $insdata = array();
        					$insdata['tbl_quantity']     = $tbl_quantity;
        					$insdata['seller_id'] = $admin_id;
        					if(!empty($color_id)){
    					$insdata['color_id'] = $color_id;
    					}else{
    					    $insdata['color_id'] = 0;
    					}
    					if(!empty($size)){
    					$insdata['size'] = $size;
    					}else{
    					    $insdata['size'] = 0;
    					}
        					$insdata['tbl_added_date']     = $added_date;
        					$insdata['tbl_product_price']     =  $price;
        					$insdata['total_price']     = $total_price;
        					$this->db->where('tbl_user_id', $user_id);
        					$this->db->where('tbl_product_id', $prdid);
        					$check = $this->db->update('tbl_cart',$insdata);
            	          $data1['success']=1;
            			  $data1['message']="Added to your cart.!!!";
            			  //$data1['countqty']    =     $countqty;  
            			  //$data1['totalprice']    =     $totalprice;  
            			  echo json_encode($data1);
            			  //alert(json_encode($data1));
        			 } else {
        			    $insdata = array();
    					$insdata['tbl_user_id'] = $user_id;
    					$insdata['seller_id'] = $admin_id;
    					$insdata['tbl_product_id'] = $prdid;
    					if(!empty($color_id)){
    					$insdata['color_id'] = $color_id;
    					}else{
    					    $insdata['color_id'] = 0;
    					}
    					if(!empty($size)){
    					$insdata['size'] = $size;
    					}else{
    					    $insdata['size'] = 0;
    					}
    					$insdata['tbl_quantity']     = $tbl_quantity;
    					$insdata['tbl_added_date']     = $added_date;
    					$insdata['tbl_product_price']     = $price;
    					$insdata['total_price']     = $total_price;
        			     $check = $this->CommonModel->insertdataontable('tbl_cart',$insdata);
            	         $data1['success']=1;
            			 $data1['message']="Added to your cart.!!!";
            			 echo json_encode($data1);
        			 } 
        	        
                 }
                 else
                 {
                 	$data1['success']=0;
                 	$data1['message']="Please login first.!!!";
                 	echo json_encode($data1);
                 }
		 }
     }
     public function SaveOrder(){
        //echo "<pre>"; print_r($_POST); echo "</pre>"; exit;
        //echo "<pre>"; print_r($_SESSION); echo "</pre>"; exit;
        $this->form_validation->set_rules('billing_first_name', 'Billing First Name', 'required');
        $this->form_validation->set_rules('billing_last_name', 'Billing Last Name', 'required');
        $this->form_validation->set_rules('billing_phone', 'Phone', 'required');
        $this->form_validation->set_rules('billing_country', 'Billing Country', 'required');
        $this->form_validation->set_rules('billing_state', 'Billing state', 'required');
        $this->form_validation->set_rules('billing_city', 'Billing City', 'required');
        $this->form_validation->set_rules('billing_address_1', 'Billing Street address', 'required');
        $this->form_validation->set_rules('billing_postcode', 'Billing Post Code', 'required');
        $this->form_validation->set_rules('billing_email', 'Billing Email', 'required');
        if($this->input->post('ship_to_different_address') == '1'){
        $this->form_validation->set_rules('shipping_first_name', 'Shipping First Name', 'required');
        $this->form_validation->set_rules('shipping_last_name', 'shipping Last Name', 'required');
        $this->form_validation->set_rules('shipping_country', 'Shipping Country', 'required');
        $this->form_validation->set_rules('shipping_state', 'Shipping state', 'required');
        $this->form_validation->set_rules('shipping_city', 'Shipping City', 'required');
        $this->form_validation->set_rules('shipping_address_1', 'Shipping Street address', 'required');
        $this->form_validation->set_rules('shipping_postcode', 'shipping Post Code', 'required');
        }
        if($this->form_validation->run())
        {
        $billing_first_name = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('billing_first_name'));
        $billing_last_name = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('billing_last_name'));
        $billing_phone = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('billing_phone'));
        $billing_company = $this->input->post('billing_company');
        $billing_country = $this->input->post('billing_country');
        $billing_state = $this->input->post('billing_state');
        $billing_city = $this->input->post('billing_city');
        $billing_address_1 = $this->input->post('billing_address_1');
        $billing_address_2 = $this->input->post('billing_address_2');
        $billing_postcode = $this->input->post('billing_postcode');
        $billing_email = $this->input->post('billing_email');
        $ship_to_different_address = $this->input->post('ship_to_different_address');
        $shipping_first_name = $this->input->post('shipping_first_name');
        $shipping_last_name = $this->input->post('shipping_last_name');
        $shipping_company = $this->input->post('shipping_company');
        $shipping_country = $this->input->post('shipping_country');
        $shipping_state = $this->input->post('shipping_state');
        $shipping_city = $this->input->post('shipping_city');
        $shipping_address_1 = $this->input->post('shipping_address_1');
        $shipping_address_2 = $this->input->post('shipping_address_2');
        $shipping_postcode = $this->input->post('shipping_postcode');
        $order_comments = $this->input->post('order_comments');
        $payment_method = $this->input->post('payment_method');
        $firstname = $this->input->post('firstname');
        $amount = $this->input->post('amount');
        $txnid = $this->input->post('txnid');
        $posted_hash = $this->input->post('hash');
        $key = $this->input->post('key');
        $productinfo = $this->input->post('productinfo');
        $email = $this->input->post('email');
        $salt = "dxmk9SZZ9y"; //  Your salt
        $add = $this->input->post('additionalCharges');
        $status = 'success';
        If (isset($add)) {
            $additionalCharges = $this->input->post('additionalCharges');
            $retHashSeq = $additionalCharges . '|' . $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        } else {

            $retHashSeq = $salt . '|' . $status . '|||||||||||' . $email . '|' . $firstname . '|' . $productinfo . '|' . $amount . '|' . $txnid . '|' . $key;
        }
          $data['hash'] = hash("sha512", $retHashSeq);
          $data['amount'] = $amount;
          $data['txnid'] = $txnid;
          $data['posted_hash'] = $posted_hash;
              $pro_id =  $this->session->userdata('pro_id'); 
              $admin_id =  $this->session->userdata('admin_id'); 
              $color_id =  $this->session->userdata('color_id'); 
              $size =  $this->session->userdata('size'); 
              $quantity =  $this->session->userdata('quantity'); 
              $base_price =  $this->session->userdata('base_price'); 
              $totalamount =  $this->session->userdata('totalamount'); 
              $delivery =  $this->session->userdata('delivery'); 
              $cusId = base64_decode($this->session->userdata('customerId'));
              $insta1 = array();
              $insta2 = array();
              $cnt =  count($pro_id);
              for($i =0; $i<$cnt; $i++){
              $insta = array();
              $orderid = "Order_".rand(time(),0);
              $insta['tbl_display_order_id'] = $orderid;
              $insta['tbl_product_id'] = $pro_id[$i];
              $insta['seller_id'] = $admin_id[$i];
              $insta['color_id'] = $color_id[$i];
              $insta['size'] = $size[$i];
              $insta['tbl_order_quantity'] = $quantity[$i];
              $insta['tbl_product_base_price'] = $base_price[$i];
              $insta['tbl_total_amount'] = $quantity[$i]*$base_price[$i];
              $insta['tbl_user_id'] = $cusId;
              if($ship_to_different_address == '1'){
              $insta['tbl_delivery_address'] = $shipping_address_1." ".$shipping_address_2."<br>".$shipping_city."<br>".getanyname('state','name',$shipping_state)."<br>".$shipping_postcode." ".getanyname('tbl_country','name',$shipping_country);
              }else{
              $insta['tbl_delivery_address'] = $billing_address_1." ".$billing_address_2."<br>".$billing_city."<br>".getanyname('state','name',$billing_state)." ".$billing_postcode." ".getanyname('tbl_country','name',$billing_country);
             }
             if($ship_to_different_address == '1'){
              $insta['delivery_full_name'] = $shipping_first_name." ".$shipping_last_name;
              }else{
              $insta['delivery_full_name'] = $billing_first_name." ".$billing_last_name;
             }
             
             //print_r($insta['tbl_delivery_address'] = $billing_address_1." ".$billing_address_2." ".$billing_postcode." ".getanyname('tbl_country','name',$billing_country)." ".getanyname('state','name',$billing_state)." ".$billing_city); exit;
             if(!empty($delivery[$i])){
              $insta['tbl_product_delivery_charges'] = $delivery[$i];
          }else{
              $insta['tbl_product_delivery_charges'] = '0';
          }

              $insta['tbl_date_order'] = date('Y-m-d h:i:s');
              $insta['tbl_order_status'] = "Processing";
              $insta['tbl_order_payment_mode'] = $payment_method;
              $insta['tbl_order_payment_transaction_id'] = $data['txnid'];
              $insta['tbl_order_payment_status'] = "Pending";
              $insta['tbl_order_deleted'] = "0";
              $insta['customernote'] = $order_comments;
              $out1=    $this->CommonModel->insertdataontable('tbl_order',$insta);

                      if($out1['status'] == '1'){
                            if(!empty($color_id[$i]) && !empty($size[$i])){
                                $stock = getanydata('tbl_stock_management','size',$size[$i],$pro_id[$i],'product_id','color_id',$color_id[$i]);
                            }
                            elseif(!empty($color_id[$i])){
                                $stock = getanydata('tbl_stock_management','product_id',$pro_id[$i],$color_id[$i],'color_id');
                            }
                            elseif(!empty($size[$i])){
                                $stock = getanydata('tbl_stock_management','size',$size[$i],$pro_id[$i],'product_id');
                            }else{
                                $stock = getanydata('tbl_stock_management','product_id',$pro_id[$i]);
                            }
                            $stock1 = $stock[0]['stock'];
                            $id = $stock[0]['id'];
                            $currentqty = $stock1 - $quantity[$i];
                            $updata = array();
                            $updata['stock']     = $currentqty;
                            $this->db->where('id', $id);
                            $check = $this->db->update('tbl_stock_management',$updata);
                      }
              }
                if($out1['status'] == '1'){
                    
                    $this->db->where('tbl_user_id', $cusId);
                    $this->db->delete('tbl_cart');
                    $orders = getanydata('tbl_order','tbl_user_id',$cusId);
                    //print_r($orders); 
                    //echo count($orders); exit;
                    if(count($orders) == '1'){
                        $insta2['address_1'] = $billing_address_1;
                        $insta2['address_2'] = $billing_address_2;
                        $insta2['country'] = $billing_country;
                        $insta2['state'] = $billing_state;
                        $insta2['city'] = $billing_city;
                        $insta2['pincode'] = $billing_postcode;
                        $this->db->where('id', $cusId);
                        $check = $this->db->update('tbl_customer',$insta2);
                        //echo $check;
                        //print_r($insta2); exit;
                    }
                    //exit;
                    if($ship_to_different_address == '1'){
                        $insta1['tbl_user_id'] = $cusId;
                        $insta1['tbl_full_name'] = $shipping_first_name." ".$shipping_last_name;
                        $insta1['tbl_city'] = $shipping_city;
                        $insta1['tbl_address_line'] = $shipping_address_1;
                        $insta1['addres_line2'] = $shipping_address_2;
                        $insta1['tbl_zipcode'] = $shipping_postcode;
                        $insta1['tbl_state'] = $shipping_state;
                        $insta1['tbl_country'] = $shipping_country;
                        $insta1['delivery_address'] = 1;
                        $out=   $this->CommonModel->insertdataontable('tbl_customer_address',$insta1);
                    }
                    
                 if($out1['status'] == 1){
                            unset($_SESSION['pro_id']);
                            unset($_SESSION['color_id']);
                            unset($_SESSION['size']);
                            unset($_SESSION['quantity']);
                            unset($_SESSION['base_price']);
                            unset($_SESSION['totalamount']);
                            unset($_SESSION['address1']);
                            unset($_SESSION['state']);
                            unset($_SESSION['city']);
                            unset($_SESSION['postalcode']);
                            unset($_SESSION['usercomment']);
                            $this->session->set_flashdata('message',"Order Completed Succesfully!!)");
                            redirect('OrderHistory', 'refresh');        
                    }
                 }
        }else{
        $str = '';
        $items = array('billing_first_name','billing_last_name','billing_phone','billing_country','billing_state','billing_city','billing_address_1','billing_postcode','billing_email','shipping_first_name','shipping_last_name','shipping_country','shipping_state','shipping_city','shipping_address_1','shipping_postcode');
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
           redirect("Checkout");
        }
    }
}
public function OrderHistory(){
         $checklogin    =   $this->FrontModel->checkloggedin();
            if(!$checklogin)
            {
                header("Location: ".base_url('Login'));
            }else{
             $data = array();
             $user_id = base64_decode($this->session->userdata('customerId'));
             $data['layouts'] = $this->frontLayout($data);
             $data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
             $data['order'] = $this->CommonModel->getsinglerow('tbl_order',$user_id,'tbl_user_id');
             $this->load->view('FRONTEND/myaccount/order',$data);
        }
}
public function orderdetail($orderId){
        $checklogin    =   $this->FrontModel->checkloggedin();
            if(!$checklogin)
            {
                header("Location: ".base_url('Login'));
            }else{
             $data = array();
             $user_id = base64_decode($this->session->userdata('customerId'));
             $data['layouts'] = $this->frontLayout($data);
             $data['category'] = $this->CommonModel->getsinglerow('tbl_category','Active','status');
             $data['order'] = $this->CommonModel->getsinglerow('tbl_order',$orderId,'id');
             $this->load->view('FRONTEND/myaccount/orderDetail',$data);
        }
}

public function addToWishList(){
        $prdid = $this->input->post('prdid');
        $checklogin =   $this->FrontModel->checkloggedin();
        if(!$checklogin)
            {   
                $session = array(
                        'wishlistprdid'     =>  $prdid
                    );
                $this->session->set_userdata($session);
                $data1['success']=0;
                $data1['message']="Please login first.!!!";
                echo json_encode($data1);
            }else{
                $user_id = base64_decode($this->session->userdata('customerId'));
                if($user_id)
                 {
                    $insdata = array();
                    $insdata['tbl_user_id'] = $user_id;
                    $insdata['tbl_product_id'] = $prdid;
                    $getcartdata = getanydata('tbl_wishlist','tbl_user_id',$user_id,$prdid,'tbl_product_id');
               
                     if(count($getcartdata) > 0 ){
                            $this->db->where('tbl_user_id', $user_id);
                            $this->db->where('tbl_product_id', $prdid);
                            $check = $this->db->update('tbl_wishlist',$insdata);
                          $data1['success']=1;
                          $data1['message']="Added to your Wishlist.!!!";
                          echo json_encode($data1);
                     } else {
                         $check = $this->CommonModel->insertdataontable('tbl_wishlist',$insdata);
                         $data1['success']=1;
                         $data1['message']="Added to your Wishlist.!!!";
                         echo json_encode($data1);
                     } 
                 }
                 else
                 {
                    $data1['success']=0;
                    $data1['message']="Please login first.!!!";
                    echo json_encode($data1);
                 }
         }
 }


 public function Updatecart(){
         $cartid = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post("cartid"));
         $prdqty = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post("prdqty"));
         $page = preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post("page"));
         $user_id = base64_decode($this->session->userdata('customerId'));
         $getcartdata = $this->CommonModel->getsinglerow('tbl_cart',$cartid,'id');
         $pro_id = $getcartdata[0]['tbl_product_id'];
         $getproduct = $this->CommonModel->getsinglerow('tbl_product',$pro_id,'id');
         $presentqty = $getcartdata[0]['tbl_quantity'];
         $unitprice = $getcartdata[0]['tbl_product_price'];
         //$qty =$presentqty + $prdqty;
          $totalprice = $unitprice * $prdqty;
         $html = "";
         $insdata = array();
            $insdata['tbl_quantity']     = $prdqty;
            $insdata['total_price']     = $totalprice;
            $this->db->where('id', $cartid);
            $check = $this->db->update('tbl_cart',$insdata);
            if(!empty($check)){
                $detail = $this->CommonModel->getsinglerow('tbl_cart',$user_id,'tbl_user_id');
                $total =0;
                $showsubtotal1 =0;
                $showtotal = 0;
                $pro_id = array();
                $admin_id = array();
                $quantity = array();
                $base_price = array();
                $totalamount = array();
                $delivrys = array();
                foreach($detail as $row){
                    $delivery = 0;
                    $pro = $row['tbl_product_id'];
                    $res1 = getanydata('tbl_product_price','tbl_product_id',$pro);
                    if(!empty($res1[0]['tbl_product_delivery_charges'])) {
                        $delivery += $res1[0]['tbl_product_delivery_charges']; 
                    }
                    $total +=   $row['total_price']+$delivery;
                    array_push($pro_id,$row['tbl_product_id']);
                    array_push($admin_id,$row['seller_id']);
                    array_push($quantity,$row['tbl_quantity']);
                    array_push($base_price,$row['tbl_product_price']);
                    array_push($totalamount,$row['total_price']+$delivery);
                    array_push($delivrys,$delivery);
                    $showsubtotal1 += $row['total_price'];
                    $showtotal += $row['total_price']+$delivery;
                    
                }
                if($page == 'checkout'){
                        if($detail){
                            unset($_SESSION['admin_id']);
                            unset($_SESSION['pro_id']);
                            unset($_SESSION['quantity']);
                            unset($_SESSION['base_price']);
                            unset($_SESSION['totalamount']);
                            $session = array(
                                        'pro_id'    =>  $pro_id,
                                        'admin_id'  =>  $admin_id,
                                        'quantity'  =>  $quantity,
                                        'base_price'    =>  $base_price,
                                        'totalamount'   =>  $totalamount
                                    );
                            $this->session->set_userdata($session);
                        }
                }
                  $producturl = base_url('Product/').$getproduct[0]['id'];
                  $pro_id = $getproduct[0]['id'];
                  $delurl = base_url('Removecart/').$cartid;
                  $img = base_url().$getproduct[0]['product_pic'];
                  $pro_name = $getproduct[0]['product_name'];
                  $data1['success']=1;
                  $html .= "<th scope='row'><a style='color:red;' href='$delurl' onclick='return confirm('Are You Sure Want To Remove?');'><i class='fa fa-remove'></i></a></th><td><a href='$producturl'><img class='img1' src='$img' alt='roadster' width='50' height='50'></a></td><td><a href='$producturl'>$pro_name<a></td><td>
               <input type='hidden' value='$unitprice' id='pricevalue$pro_id' />
               <i class='fa fa-usd'></i>$unitprice
            </td><td class='text-left'><div class='input-group btn-block quantity'><input type='text' name='quantity' id='quantity' value='$prdqty' size='1' class='form-control' /><span class='input-group-btn'><button type='submit' data-toggle='tooltip' title='Update' onclick='updatecart($cartid)' class='btn btn-primary'><i class='fa fa-refresh'></i></button>
                        <a href='$delurl'  onclick='return confirm('Are You Sure Want To Remove?');'><button type='button' data-toggle='tooltip' title='Remove' class='btn btn-danger' onClick=''><i class='fa fa-times-circle'></i></button></a></span></div></td><td><i class='fa fa-usd'></i>$totalprice</td>";
                  $data1['message']="Added to your cart.!!!";
                  $data1['data']    =     $html;  
                  $data1['showtotal']    =     "<i class='fa fa-inr'></i>".$showsubtotal1;  
                  $data1['total']    =     "<i class='fa fa-inr'></i>".$showtotal;  
                  $data1['total1']    =     $showtotal;  
                  echo json_encode($data1);
            }else{
                    $data1['success']=0;
                    $data1['message']="Please login first.!!!";
                    echo json_encode($data1);
            }
     }

}
