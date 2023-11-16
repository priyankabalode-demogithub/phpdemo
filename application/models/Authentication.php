<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Model {
    function __construct()
    {
    
        parent::__construct();
        
        if($this->session->has_userdata('authenticated')){
            if($this->session->userdata('authenticated')=='1'){
                // echo "you are user";
            }
        }
        else{
            $this->session->set_flashdata('status','login first');
            // redirect(base_url('welcome/login'));
            redirect(base_url('admin/index'));

            
        }
    }
   
	
  
}
