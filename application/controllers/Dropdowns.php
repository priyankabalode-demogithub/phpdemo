<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdowns extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('dropdown');
    }
    
    public function index(){
        $data['countries'] = $this->dropdown->getCountryRows();
        $this->load->view('dropdowns/index', $data);
    }
    
    public function getStates(){
        $states = array();
        $country_id = $this->input->post('country_id');
        if($country_id){
            $con['conditions'] = array('country_id'=>$country_id);
            $states = $this->dropdown->getStateRows($con);
        }
        echo json_encode($states);
    }
    public function getCities(){
        $cities = array();
        $state_id = $this->input->post('state_id');
        if($state_id){
            $con['conditions'] = array('state_id'=>$state_id);
            $cities = $this->dropdown->getCityRows($con);
        }
        echo json_encode($cities);
    }

    function add()
    {
		
      
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $country = $this->input->post('country');
                $state = $this->input->post('state');
                $city = $this->input->post('city');
                
                $data = array(
                    'country' => $country,
                    'state' => $state,
                    'city'=>$city,
                   
                );
    
                $status =  $this->dropdown->insertData($data);
                
                // if ($status == true) {
                //     // $this->session->set_flashdata('success', 'successfully Added');
                //     redirect(base_url('welcome/index'));
                    
                // } else {
                //     // $this->session->set_flashdata('error', 'Error');
                //     $this->load->view('user/add_user');
                // }
            } else {
                $this->load->view('dropdowns/index');
            }
            

       
        
    }

}