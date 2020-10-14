<?php

Class LoginModel extends CI_Model
{
    
    function __construct()
    {
        parent::__construct();
        
    }
    
    public function checkpostinput($index)
	{
			$return = $this->input->post($index);
			$return = $this->security->xss_clean($return);
		    return trim($return); 
	}
    public function dologin(){
        $data = array();
	    $data['refresh'] = 0;
		$mobile 	   =  preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('mobile'));//$this->checkpostinput('mobile');
		$password  =  preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('password'));//$this->checkpostinput('password');
	
	if($mobile=="")
		{
			$data['status']		=	0;
			$data['message']	=	"Mobile is not correct";
			return $data;
		}
	if($password=='')
		{
			$data['status']		=	0;
			$data['message']	=	"password is not correct";
			return $data; 
		}
	if(trim($mobile != "") && trim($password != ""))				
		{
				$password = md5($password);
				$this->db->select('*');
				$this->db->from('tbl_customer');
				$this->db->where('mobile_no',$mobile);
				$this->db->where('password',$password);
				$query	=	$this->db->get();
				//echo $this->db->last_query(); exit;
				$result =	$query->result();
				//print_r($result); exit;
			if(!empty($result))
				{
					$token 		= base64_encode($result[0]->id); 
					$name 	= $result[0]->full_name;
					$mobile	= $result[0]->mobile_no;
					$status	= $result[0]->status;
					//$admin_id	= $result[0]->admin_id;
					if($status == 'Active'){
						/* setting session data */
						$session = array(
											'customerId' 	=>	$token,
											'customername'	=>	$name,
											'mobile_no' 	=>	$mobile
											//'admin_id' 	    =>	$admin_id
										);
							$this->session->set_userdata($session);
							$data['refresh']	=	1;
						/* setting session data */
					$data['status']		=	1;
					$data['message']	= 	" Login Succesfully.";
					return $data;
			}} else {
					$data['status']		=	0;
					$data['message']	=	"Wrong Email or Password.";
					return $data;
				}
				
		} else {
				$data['status']		=	0;
				$data['message']	=	"Please check the entered details.";
			return $data;
		}
				/*$data['status']		=	0;
				$data['message']	=	"Something went Wrong.";
			return $data;*/
    }
    
    public function dosignup(){
        $data = array();
	    $data['refresh'] = 0;
		$mobile 	   =  preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('mobile'));//$this->checkpostinput('mobile');
		$password  =  preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('password'));//$this->checkpostinput('password');
		$name  =  preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('name'));//$this->checkpostinput('firstname');
		$email  =  preg_replace('/[^A-Za-z0-9\@._-]/', '', $this->input->post('email'));//$this->checkpostinput('email');
	
	if(trim($mobile != "") && trim($password != "") && trim($name != "")&& trim($email != ""))	
		{
				$password = md5($password);
				$this->db->select('*');
				$this->db->from('tbl_customer');
				$this->db->where('mobile_no',$mobile);
				$query	=	$this->db->get();
				$result =	$query->result();

			if(!empty($result))
				{
				    $data['status']		=	0;
					$data['message']	=	"Customer already exist with this number ".$mobile;
					return $data;
				} else {
				    $min = 100;
                    //The max / highest number.
                    $max = 100000;
                    //Generate a random number using the rand function.
                    $randomnumber = rand($min, $max);
                    //$url = 'http://sms.indiatext.in/api/mt/SendSMS?user=mohitsoni&password=hackshade&senderid=HSDOTP&channel=Trans&DCS=0&flashsms=0&number='.$mobile.'&text=Your%20OTP%20verification%20code%20is%20'.$randomnumber;
                    $otp = $randomnumber;
                    //$mystring = sendmsg($url);
					$insdata = array();
					$insdata['full_name'] = $name;
					$insdata['mobile_no'] = $mobile;
					$insdata['email']     = $email;
					$insdata['address_1'] = "null";
					$insdata['password'] = $password;
					$insdata['ip'] = get_client_ip();
					$insdata['last_updated_ip'] = get_client_ip();
					$insdata['status'] = "Active";
					$insdata['otp_code'] = $otp;
					$insdata['created_at'] = date("Y-m-d H:i:s");
					$insdata['last_activity'] 		=	date("Y-m-d H:i:s");
					$res= $this->db->insert("tbl_customer",$insdata);
					$insertId = $this->db->insert_id();
				    if($res == 1){
				    $token 	= base64_encode($insertId);
					$name 	= $name;
					$mobile	= $mobile;
						/* setting session data */
				    $session = array(
						'customerId' 	=>	$token,
						'customername'	=>	$name,
						'otp'	        =>	$otp,
						'mobile_no' 	=>	$mobile
					);
					$this->session->set_userdata($session);
					$data['refresh']	=	1;
					$data['status']		=	1;
					$data['message']	= 	"Account Created Successfully.";
					return $data;
				}}
				
		} else {
				$data['status']		=	0;
				$data['message']	=	"Please check the entered details.";
			return $data;
		}
    }
    public function verifytp(){
        $data = array();
	    $data['refresh'] = 0;
        $real_otp = $this->session->userdata('otp');
        $enter_otp =  preg_replace('/[^A-Za-z0-9\-]/', '', $this->input->post('enter_otp'));//$this->checkpostinput('enter_otp');
        //echo $enter_otp; exit;
        if($real_otp == $enter_otp){
            $data['refresh']	=	1;
			$data['status']		=	1;
			$data['message']	= 	"OTP Verified Successfully.";
			return $data;
        }else{
            $data['status']		=	0;
			$data['message']	= 	"OTP Not Match.";
			return $data;
        }
        
    }
}
?>