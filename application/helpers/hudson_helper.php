<?php 
date_default_timezone_set('Asia/Kolkata');
function sendmsg($url) {
    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
function get_client_ip()
{
  $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
      $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
      $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
      $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
      $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
      $ipaddress = 'UNKNOWN';
  return $ipaddress;
}
function customerName($id,$table){
     $cd = get_instance();
	 $sql = "SELECT * FROM $table WHERE id = '$id'";
      $query = $cd->db->query($sql);
      $row = $query->result_array();
      if(!empty($row))
        {  
          return $row[0];
        } else {
          return "";
        }
 }
function getanyname($table,$idname,$id)
    {
     $cd = get_instance();
	 $sql = "SELECT $idname FROM $table WHERE id = '$id'";
      $query = $cd->db->query($sql);
      $row = $query->result_array();
      if(!empty($row))
        {  
            $name = $row[0][$idname] ;   
          return $name;
        } else {
          return "";
        }
	}
function getanydata($table,$idname,$id,$id2=null,$idname2=null,$idname3=null,$id3=null)
    {
     $cd = get_instance();
     $cd->db->select('*');
	 $cd->db->from($table);
	 $cd->db->where($idname,$id);
	 if(!empty($id2)){
	 $cd->db->where($idname2,$id2);
	 }
	 if(!empty($idname3)){
		$cd->db->where($idname3,$id3);
	}
	 $cd->db->order_by('id','ASC');
     $query = $cd->db->get();
     //echo $cd->db->last_query(); //exit;
     return $query->result_array();
	}
	function getrangedata($table,$idname,$id,$todate,$fromdate)
    {
     $cd = get_instance();
     $cd->db->select('*');
	 $cd->db->from($table);
	 $cd->db->where($idname,$id);
	 $cd->db->where('report_date >=', $todate);
	 $cd->db->where('report_date <=', $fromdate);
	 $cd->db->order_by('id','ASC');
     $query = $cd->db->get();
     return $query->result_array();
	}
 function frontpagination($url,$totalCount)
  {
	  $CI = &get_instance();
 $CI->load->library('pagination');
 $config['query_string_segment'] = true;
 $config['base_url'] = base_url($url);
 $config['total_rows'] =$totalCount;
 $config['per_page'] = 40;
 $config['use_page_numbers'] = TRUE;
 $config['full_tag_open'] = '<ul class="pagination">';
 $config['full_tag_close'] = '</ul>';
 $config['prev_link'] = '&laquo;';
 $config['prev_tag_open'] = '<li>';
 $config['prev_tag_close'] = '</li>';
 $config['next_tag_open'] = '<li>';
 $config['next_tag_close'] = '</li>';
 $config['cur_tag_open'] = '<li><a href="#" class="active">';
 $config['cur_tag_close'] = '</a></li>';
 $config['num_tag_open'] = '<li>';
 $config['num_tag_close'] = '</li>';
 $config['next_link'] = '&raquo;';
 $config['attributes'] = array('class' => 'page-link');
 $CI->pagination->initialize($config);
	return $CI->pagination->create_links();
  }
function pagination($url,$totalCount)
	{
		 $CI = &get_instance();
		 $CI->load->library('pagination');
		 $config['query_string_segment'] = true;
		 $config['base_url'] = base_url($url);
		 $config['total_rows'] =$totalCount;
		 $config['per_page'] = 10;
		 $config['use_page_numbers'] = TRUE;
		 $config['full_tag_open'] = '<ul class="pagination">';
		 $config['full_tag_close'] = '</ul>';
		 $config['prev_link'] = '&laquo;';
		 $config['prev_tag_open'] = '<li>';
		 $config['prev_tag_close'] = '</li>';
		 $config['next_tag_open'] = '<li>';
		 $config['next_tag_close'] = '</li>';
		 $config['cur_tag_open'] = '<li><a href="#" class="active">';
		 $config['cur_tag_close'] = '</a></li>';
		 $config['num_tag_open'] = '<li>';
		 $config['num_tag_close'] = '</li>';
		 $config['next_link'] = '&raquo;';
		 $config['attributes'] = array('class' => 'page-link');
		 $CI->pagination->initialize($config);
		 return $CI->pagination->create_links();
	}

 function get_total_count($table,$limit)
    {
		$CI = &get_instance();
        $CI->db->select('*');
        $CI->db->from($table);
        $query =  $CI->db->get();
		if(!empty($query->result_array()))
		{
			return  count($query->result_array());
		}
		else{
			return $limit;
		}
        
    }
 function uploadimgfile1($index,$folder="other",$prefix="other",$indexvalue=null)
  {
   $target_dir  = FCPATH;  // try to put full physical path
    // identity accstatement address advtimg other
   $uploadOk = 1;
    $senddata = array();
     $senddata['data'] = "NILL";
	   $notallowed = array("php","js","css","html");  // defined here the extesion not to upload
	    $shownotallowed = "PHP, JS, CSS, HTML fie is not allowed to upload.";
	    if(!empty($indexvalue) || $indexvalue == 0){
	      $extension = explode(".",basename($_FILES[$index]["name"][$indexvalue]));
	  }else {
	      $extension = explode(".",basename($_FILES[$index]["name"]));
	  }
	       $extension = end($extension);
	       if(!empty($indexvalue) || $indexvalue == 0){
	       $realfilnename = basename($_FILES[$index]["name"][$indexvalue]);
	   		}else{
	       $realfilnename = basename($_FILES[$index]["name"]);
	   }
	        $datetofolder = date("Y/M/d");
	         $datetofolder = strtolower($datetofolder);       
	         $checkdirectory = $target_dir."$folder/$datetofolder";        
	        if (!file_exists($checkdirectory))
	         {
	          mkdir($checkdirectory, 0777, true);
	         }
	  $filnename   = "$folder/$datetofolder/$prefix".md5(time().rand()).".$extension";
	    $target_file = $target_dir . $filnename;
	    if (in_array($extension, $notallowed))
	     {
	      $uploadOk = 0;
	      $senddata['status']  = 0;
	      $senddata['message'] = $shownotallowed;
	       return $senddata;
	     }
	       // Check file size
	    if ($_FILES[$index]["size"][$indexvalue] > 10485760)
	     {
	      $uploadOk = 0;
	      $senddata['status']  = 0;
	      $senddata['message'] = "Maximum File Upload size is 10MB.";
	       return $senddata;
	        // echo "Sorry, your file is too large.";
	         // $uploadOk = 0;
	     }
	     
	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0)
	     {
	      $senddata['status']  = 0;
	      $senddata['message'] = "<b>Sorry!</b> There was an error uploading your file.2";
	       return $senddata;
	        // echo "Sorry, your file was not uploaded.";
	       // if everything is ok, try to upload file
	     } else {
	     	if(!empty($indexvalue) || $indexvalue == 0){
	      		if (move_uploaded_file($_FILES[$index]["tmp_name"][$indexvalue], $target_file)){
	      			// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		         $senddata['status']  = 1;
		          $tempdata = array();
		          $tempdata['name']   = $filnename;
		          $tempdata['realname']  = $realfilnename;
		         $senddata['data']  = $tempdata;
		         $senddata['message'] = "File Uploaded successfully.";
		          return $senddata;
		       } else {
		        // echo "Sorry, there was an error uploading your file.";
		         $senddata['status']  = 0;
		         $senddata['message'] = "<b>Sorry!</b> There was an error uploading your file. Allowed formats are jpg,png,jpeg,pdf,doc,xml .";
		          return $senddata;
		       }
	      	}else{
	      		if (move_uploaded_file($_FILES[$index]["tmp_name"], $target_file)){
	      			// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	         $senddata['status']  = 1;
	          $tempdata = array();
	          $tempdata['name']   = $filnename;
	          $tempdata['realname']  = $realfilnename;
	         $senddata['data']  = $tempdata;
	         $senddata['message'] = "File Uploaded successfully.";
	          return $senddata;
	       } else {
	        // echo "Sorry, there was an error uploading your file.";
	         $senddata['status']  = 0;
	         $senddata['message'] = "<b>Sorry!</b> There was an error uploading your file. Allowed formats are jpg,png,jpeg,pdf,doc,xml .";
	          return $senddata;
	       }
	      	}
     }
  }
 function uploadimgfile($index,$folder="other",$prefix="other")
  {
   $target_dir  = FCPATH;  // try to put full physical path
    // identity accstatement address advtimg other
   $uploadOk = 1;
    $senddata = array();
     $senddata['data'] = "NILL";
	   $notallowed = array("php","js","css","html");  // defined here the extesion not to upload
	    $shownotallowed = "PHP, JS, CSS, HTML fie is not allowed to upload.";
	      $extension = explode(".",basename($_FILES[$index]["name"]));
	       $extension = end($extension);	       
	       $realfilnename = basename($_FILES[$index]["name"]);
	        $datetofolder = date("Y/M/d");
	         $datetofolder = strtolower($datetofolder);       
	         $checkdirectory = $target_dir."$folder/$datetofolder";        
	        if (!file_exists($checkdirectory))
	         {
	          mkdir($checkdirectory, 0777, true);
	         }
	  $filnename   = "$folder/$datetofolder/$prefix".md5(time().rand()).".$extension";
	    $target_file = $target_dir . $filnename;
	    if (in_array($extension, $notallowed))
	     {
	      $uploadOk = 0;
	      $senddata['status']  = 0;
	      $senddata['message'] = $shownotallowed;
	       return $senddata;
	     }
	       // Check file size
	    if ($_FILES[$index]["size"] > 10485760)
	     {
	      $uploadOk = 0;
	      $senddata['status']  = 0;
	      $senddata['message'] = "Maximum File Upload size is 10MB.";
	       return $senddata;
	        // echo "Sorry, your file is too large.";
	         // $uploadOk = 0;
	     }
	     
	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0)
	     {
	      $senddata['status']  = 0;
	      $senddata['message'] = "<b>Sorry!</b> There was an error uploading your file.2";
	       return $senddata;
	        // echo "Sorry, your file was not uploaded.";
	       // if everything is ok, try to upload file
	     } else {     
	      		if (move_uploaded_file($_FILES[$index]["tmp_name"], $target_file)){
	      			// echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
	         $senddata['status']  = 1;
	          $tempdata = array();
	          $tempdata['name']   = $filnename;
	          $tempdata['realname']  = $realfilnename;
	         $senddata['data']  = $tempdata;
	         $senddata['message'] = "File Uploaded successfully.";
	          return $senddata;
	       } else {
	        // echo "Sorry, there was an error uploading your file.";
	         $senddata['status']  = 0;
	         $senddata['message'] = "<b>Sorry!</b> There was an error uploading your file. Allowed formats are jpg,png,jpeg,pdf,doc,xml .";
	          return $senddata;
	       }
     }
  }
 function sendehtmlmail($from,$to,$subject,$message)
    {
        //echo $from."<br>".$to."<br>".$subject."<br>".$message;
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <'.$from.'>' . "\r\n";
        //$headers .= 'Cc: myboss@example.com' . "\r\n";
        $attach = 'https://www.sjainventures.com/images/logo.png';
        $result = mail($to,$subject,$message,$attach,$headers);
        //print_r($result);
        return $result;
    }
?>