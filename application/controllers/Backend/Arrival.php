<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class ProductController extends MY_Controller 
		{ 
            public function __construct()
            {
                parent::__construct();
                    $this->load->model(array('Backend/AdminLoginModel'));
                    $this->load->model(array('Backend/CommonModel'));
            }
        }