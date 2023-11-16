<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        // if($this->session->has_userdata('authenticated')){
        //     $this->session->set_flashdata('status','login');
        // }else{
        //     $this->session->set_flashdata('status','login first');
        // }
        $this->load->model('My_model');
		$this->load->library('form_validation');
        // $this->load->model('Authentication');
    }

    function add()
    {
		$this->form_validation->set_rules('username','User name','trim|required|alpha');
        $this->form_validation->set_rules('email','Email','trim|required|is_unique[users.email]|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        $this->form_validation->set_rules('mobile','Mobile','required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('address','Address','required');

        $this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');
        $this->form_validation->set_message('required','{field} must be filled');
        if($this->form_validation->run())
        {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $this->input->post('username');
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $mobile = $this->input->post('mobile');
                $address = $this->input->post('address');
                $data = array(
                    'username' => $username,
                    'email' => $email,
                    'mobile' => $mobile,
                    'password'=>$password,
                    'address' => $address,
                );
    
                $status =  $this->My_model->insertUser($data);
                
                if ($status == true) {
                    // $this->session->set_flashdata('success', 'successfully Added');
                    redirect(base_url('welcome/index'));
                    
                } else {
                    // $this->session->set_flashdata('error', 'Error');
                    $this->load->view('user/add_user');
                }
            } else {
                $this->load->view('user/add_user');
            }
            

        }else{
            $this->load->view('user/add_user');
           

        }
        
    }
	public function index()
	{
        $this->load->model('Authentication');
		$this->load->model('my_model');
		$this->data['users'] = $this->my_model->getusers();
        
        // echo '<pre>';
       
        // print_r($this->data);
        
        

        // // $result['subpermisions'] = $this->my_model->getsubPermission();
        // // $this->load->view('welcome_message',$result);

		// $this->load->library('pagination');

		// $perPage=2;
		// $config['base_url'] = base_url();
		// $page=0;

		// if($this->input->get('page'))
		// {
		// 	$page = $this->input->get('page');
		// }

		// $start_index=0;
		// if($page != 0)
		// {
		// 	$start_index = $perPage * ($page - 1);
		// }

		// $total_rows = 0;
		
		// if($this->input->get('search_text') != null) {
		// 	$search_text = $this->input->get('search_text');
		// 	$this->data['users'] = $this->my_model->getSearchUsers($perPage,$start_index,$search_text,$is_count=0);
		// 	$total_rows = $this->my_model->getSearchUsers(null,null,$search_text,$is_count=1);
		// }
		// else 
		// {
		// 	$this->data['users'] = $this->my_model->getSearchUsers($perPage,$start_index,null,$is_count=0);
		// 	$total_rows = $this->my_model->getSearchUsers(null,null,null,$is_count=1);
		// }

		// $config['total_rows'] = $total_rows;

		// $config['per_page']= $perPage;
		// $config['enable_query_strings']= true;
		// $config['use_page_numbers']= true;
		// $config['page_query_string'] = true;
		// $config['query_string_segment'] = 'page';
		// $config['reuse_query_string']= true;
		// $config['full_tag_open']= '<ul  class="pagination">';
		// $config['full_tag_close']= '</ul'>
		// $config['first_link']= 'First';
		// $config['last_link']= 'Last';
		// $config['first_tag_open']=  '<li  class="page-item"><spann class="page-link">';
		// $config['first_tag_close'] = '</span></li>';
		// $config['prev_link']= '&laquo';
		// $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';

		// $config['prev_tag_close'] = '</span></li>';
		// $config['next_link']= '&raquo';
		// $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
		// $config['next_tag_close'] = '</span></li>';
		// $config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
		// $config['last_tag_close'] = '</span></li>';
		// $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		// $config['cur_tag_close'] = '</a></li>';
		// $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
		// $config['num_tag_close'] = '</span></li>'; 

		// $this->pagination->initialize($config);
		// $this->data['page'] =$page;
		// $this->data['links']= $this->pagination->create_links();
		$this->load->view('welcome_message',$this->data);

       
       
        
	}
	function edit($id)
    {
        $data['user'] = $this->My_model->getUser($id);
        $data['id']=$id;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $mobile = $this->input->post('mobile');
            $address = $this->input->post('address');
            $data = array(
                'username' => $username,
                'email' => $email,
                'mobile' => $mobile,
                'address' => $address,
            );

            $status =  $this->My_model->updateUser($data, $id);
            if ($status == true) {
                // $this->session->set_flashdata('success', 'successfully Updated');
                redirect(base_url('welcome'));
            } else {
                // $this->session->set_flashdata('error', 'Error');
                $this->load->view('user/edit_user');
            }
        }

        $this->load->view('user/edit_user',$data);
    }

    function delete($id)
    {
        if(is_numeric($id))
        {
            $status =$this->My_model->deleteUser($id);
            if ($status == true) {
                // $this->session->set_flashdata('deleted', 'successfully Deleted');
                redirect(base_url('welcome/index/'));
            } else {
                // $this->session->set_flashdata('error', 'Error');
                redirect(base_url('user/index/'));
            }
        }
    }
    function login(){
        $this->load->view('user/login');
    }
    function home()
    {
        
        $data = [
            
            'email' =>$this->security->xss_clean($this->input->post('email')),
            'password'=>$this->security->xss_clean($this->input->post('password')),
           
            
    ];
        $user=new  My_model;
       $result= $user->loginUser($data);
       

        if($result){
        //  echo  $result->username;
        //  echo  $result->email;
      
        
        $userdata=[
            'id'=>$result->id,
            'username'=>$result->username,
             'email'=>$result->email,
             'is_admin'=>$result->is_admin
            //  'authenticated'=>TRUE

        ];
        
        $this->session->set_userdata('authenticated','1');
        $this->session->set_userdata('auth_user',$userdata);
        $this->session->set_flashdata('status','valid');
        redirect(base_url('dashboard'));
        

        }
        else{
            $this->session->set_flashdata('status','Invalid Username and password');
            redirect(base_url('admin/index'));

        }
       
       
    }
    // function dashboard(){
    //     $this->load->view('dashboard');
    // }
    public function logout()
    {
        // $this->session->sess_destroy();
        $this->session->unset_userdata('authenticated');
        // redirect('welcome/login');
        redirect(base_url('admin/index'));
    }
    public function active(){
        echo "hello";
    }

    public function active_status_user($id){
        $data['is_admin'] = 2 ;
        $this->db->where('id', $id);
        $result = $this->db->update('users',$data);
        if ($result == 2) {
                      $this->session->set_flashdata('success', "Status has been change successfully");
                  $this->session->set_flashdata('success', 'Status has been change successfully');
                      
                  } else {
                    $this->session->set_flashdata('danger', 'Status not update successfully');
                     $this->session->set_flashdata('danger', 'Status not update successfully');
                      // echo"failed";
                  }
                  redirect('welcome');
              }

              public function deactiv_status_user($id){
                $data['is_admin'] = 0 ;
                $this->db->where('id',$id);
                $result = $this->db->update('users',$data);
                if ($result == 0) {
                             $this->session->set_flashdata('success', "Status has been change successfully");
                            $this->session->set_flashdata('success', 'Status has been change successfully');
                          } else {
                           $this->session->set_flashdata('danger', 'Status not update successfully');
                             $this->session->set_flashdata('danger', 'Status not update successfully');
                              // echo"failed";
                          }
                            redirect('welcome');
                      }
                      
                      
                      public function setpermission($id)
                      {
                       
                        $data['user'] = $this->My_model->getUser($id);
                        $data['p_id']=$id;
                        
                        $this->load->view('setpermission',$data);
                        
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $pname=$this->input->post('pname[]');
                        $sub_permission=$this->input->post('sub_permission[]');
                        
                       if(!$pname==null){
                        foreach($pname as $key=> $name){
                            $this->My_model->addpermission($id,$name);
                            
                        }
                    }
                    if(!$sub_permission==null){
                        foreach($sub_permission as $key=> $sname){
                            $this->My_model->addsubpermission($id,$sname);
                            
                        }
                       }
                        
                       
                      }
                    }

                    public function addamount($id){
                        $data['user'] = $this->My_model->getUser($id);
                        $data['p_id']=$id;
                        $this->load->view('welcome',$data);
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $amount = $this->input->post('amount');
                            $date = $this->input->post('date');
                            $data = array(
                                'amount' => $amount,
                                'date' => $date,
                            );
                
                            $status =  $this->My_model->addammount($data);
                            
                    }
                }

                   
                   
                    public function editpermission($id){
                        $data['userpermission']=$this->My_model->getUserpermission($id);
                        $this->load->view('editpermission',$data);
                    
                        
                        
                    }
}

