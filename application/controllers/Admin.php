<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
    {
    
        parent::__construct();
             
    }
  
    
    public function index()
    {
        $this->load->view('Admin/login');
    }
    public function add()
    {
        $this->load->model('Authentication');
        $this->load->model('my_model');
        $data['permisions'] = $this->my_model->getPermission();
        
        $this->load->view('Admin/add_user',$data);
        
    }

    public function userlist()
    {
        $this->load->model('Authentication');
        $this->load->model('my_model');
        $data['permisions'] = $this->my_model->getPermission();
        $this->load->view('Admin/user_list',$data);
    }
    public function news()
    {
        $this->load->model('Authentication');
        $this->load->model('my_model');
        $data['permisions'] = $this->my_model->getPermission();
        $this->load->view('Admin/news', $data);
    }
    public function add_blog()
    {
        $this->load->model('Authentication');
        $this->load->model('my_model');
        $data['permisions'] = $this->my_model->getPermission();
        $this->load->view('Admin/add_blog', $data);
    }
    public function blog_list()
    {
        $this->load->model('Authentication');
        $this->load->model('my_model');
        $data['permisions'] = $this->my_model->getPermission();
        $this->load->view('Admin/blog_list', $data);
    }
    public function contact()
    {
        $this->load->model('Authentication');
        $this->load->model('my_model');
        $data['permisions'] = $this->my_model->getPermission();
        $this->load->view('Admin/contact', $data);
    }
    
    
}
