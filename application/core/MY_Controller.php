<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller 
		{ 
			//set the class variable.
				public $template  = array();
				public $data      = array();
			/*Loading the default libraries, helper, language */
				public function __construct()
					{
						parent::__construct();

						$this->load->helper(array('form','language','url'));
					}		
			/*	Seller Page Layout*/
			public function adminLayout( $data ) 
				{
					$this->template['header']   = $this->load->view('BACKEND/includes/header.php',   $data , true);
					$this->template['footer']   = $this->load->view('BACKEND/includes/footer.php',   $data , true);
					return $this->template ;
				}
			/*	 Layout */			
			public function frontLayout( $data ) 
				{
					$this->template['header']   = $this->load->view('FRONTEND/includes/header.php',   $data , true);
					$this->template['footer']   = $this->load->view('FRONTEND/includes/footer.php',   $data , true);
					return $this->template ;
				}
			/*	front Layout */
    }
?>