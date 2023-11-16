<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
    {
    
        parent::__construct();
        $this->load->model('Authentication');
        // $this->load->model('My_model');
        
    }
  
    
    public function index()
    {
        // $data['title']="Dashboard";
       
        $this->load->model('my_model');
		$data['permisions'] = $this->my_model->getPermission();
        $this->load->view('dashboard',$data);
       
        // $this->data['users'] = $this->my_model->getusers();
       
    }
    
    
}
