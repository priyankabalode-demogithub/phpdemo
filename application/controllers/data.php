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

        echo $auth_userDetails=[
            'email'=>$result->email,
            'password'=>$result->password,
        ];
        $this->session->set_userdata('authenticated','1');
        $this->session->set_userdata('auth_user',$auth_userDetails);
        $this->session->set_flashdata('status','valid');
        redirect(base_url('welcome/home'));