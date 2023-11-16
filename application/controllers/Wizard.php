<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wizard extends CI_Controller {

	function __construct()
    {
    
        parent::__construct();
        $this->load->model('My_model');
		$this->load->library('form_validation');
        
    }
  
    
    public function demo1()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
          
                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                   
                        
                );
            
                $status =  $this->My_model->insertdemo1($data);
            
            if ($status == true) {
                redirect(base_url('wizard/demo2'));
                
            } else {
               
                $this->load->view('wizard/demo1');
            }
        } else {
            $this->load->view('wizard/demo1');
        }
       
    }
    public function demo2()
    {

       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $mobile = $this->input->post('mobile');
            $email = $this->input->post('email');
            
                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                   'mobile'=>$mobile,
                   'email'=>$email
                        
                );
            
                $status =  $this->My_model->insertdemo1($data);
            
           
        } else {
            $this->load->view('wizard/demo1');
        }
        
       
    }
    public function demo3()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $mobile = $this->input->post('mobile');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $city = $this->input->post('city');
            
                $data = array(
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                   'mobile'=>$mobile,
                   'email'=>$email,
                   'address'=>$address,
                   'city'=>$city
                        
                );
            
                $status =  $this->My_model->insertdemo2($data);
            
           
        } else {
            $this->load->view('wizard/demo1');
        }
        
        
       
    }
     function wizardList(){
        $this->load->model('my_model');
		$this->data['users'] = $this->my_model->getwizarduser();
        $this->load->view('wizard/wizard_list',$this->data);

    }
    function delete($id)
    {
        if(is_numeric($id))
        {
            $status =$this->My_model->deleteWizardUser($id);
            if ($status == true) {
                // $this->session->set_flashdata('deleted', 'successfully Deleted');
                redirect(base_url('wizard/wizardList'));
            } else {
                // $this->session->set_flashdata('error', 'Error');
                redirect(base_url('wizard/wizardList'));
            }
        }
    }

        function edit($id)
    {
        $data['user'] = $this->My_model->getWizard($id);
        $data['id']=$id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $mobile = $this->input->post('mobile');
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $city = $this->input->post('city');
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'mobile' => $mobile,
                'email' => $email,
                'address' => $address,
                'city' => $city,
            );

            $status =  $this->My_model->updateWizardUser($data, $id);
            if ($status == true) {
                // $this->session->set_flashdata('success', 'successfully Updated');
                redirect(base_url('wizard/wizardList'));
            } else {
                // $this->session->set_flashdata('error', 'Error');
                $this->load->view('wizard/edit_wizard');
            }
        }

        $this->load->view('wizard/edit_wizard',$data);
    }
    }
    
    

