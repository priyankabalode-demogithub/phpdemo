<?php 
class My_model extends CI_Model 
{
   /*  function getusers()
    {
        $query = $this->db->get('users');
        return $query->result_array();
    } */
    function insertUser($data)
    {
        $this->db->insert('users',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function addammount($data){
        $this->db->insert('user_amount',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function addpermission($id,$name){
        $this->db->select('*');
        $this->db->from('user_permission');
       
        $this->db->insert('user_permission',array('p_id'=>$id,'pname'=>$name));
    }

    function addsubpermission($id,$sname){
        $this->db->select('*');
        $this->db->from('sub_permission');
       
        $this->db->insert('sub_permission',array('p_id'=>$id,'sub_permission'=>$sname));
    }


    function loginUser($data){
        $this->db->select('*');
        $this->db->from('users');
        
        $loginPer='(is_admin=1 or is_admin=2)';
        $this->db->where($loginPer);

        
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        // $this->db->where('is_admin',1);
        // $this->db->where('is_admin',2);
        
        $this->db->limit(1);
        $query=$this->db->get();
        if($query->num_rows()==1){
            return $query->row();
        }else{
            return false;
        }

    
}
public function getPermission()
    {
        $query = $this->db->get('user_permission');
        return $query->result_array();
    }

    public function getsubPermission()
    {
    
        $query = $this->db->get('sub_permission');
        return $query->result_array();
    }
    // function getUsers()
    // {
    //     $this->db->select('*');
    //     $this->db->from('sub_permission');
    //     $this->db->join('users','users.id=sub_permission.p_id');
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    function getUsers()
    {
        
        $query = $this->db->get('users');
        return $query->result_array();
    }


    function getUser($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('users');
        return $query->row();

    }
    

    function updateUser($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('users',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function deleteUser($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('users');
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }


    function getSearchUsers($perPage,$start_index,$search_text=null,$is_count=0)
    {
        if($perPage !='' && $start_index != '')
        {
            $this->db->limit($perPage,$start_index);
        }

        if($search_text!=NULL)
        {
            $this->db->like('username',$search_text,'both');
            $this->db->or_like('email',$search_text,'both');
            $this->db->or_like('mobile',$search_text,'both');
            $this->db->or_like('address',$search_text,'both');
        }

        if($is_count==1)
        {
            $query = $this->db->get('users');
            return $query->num_rows();
        }
        else 
        {
            $query = $this->db->get('users');
            return $query->result_array();
        }
    }

    function getUserpermission($id){
        $this->db->select('user_permission.pname,sub_permission.sub_permission as sp_name');
            $this->db->from('user_permission');
            $this->db->join('sub_permission','user_permission.p_id=sub_permission.p_id');
            $this->db->where('user_permission.p_id',$id);
            $query = $this->db->get();
            return $query->result_array();

    }

    function insertdemo1($data){
       
        $this->db->insert('demo1',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function insertdemo2($data)
    {
        $this->db->insert('wizard',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }

    function getwizarduser(){
        $query = $this->db->get('wizard');
        return $query->result_array();
    }
    function deleteWizardUser($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('wizard');
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
    function getWizard($id)
    {
        $this->db->where('id',$id);
        $query=$this->db->get('wizard');
        return $query->row();

    }
    function updateWizardUser($data,$id)
    {
        $this->db->where('id',$id);
        $this->db->update('wizard',$data);
        if ($this->db->affected_rows() >= 0) {
            return true; 
        } else {
            return false; 
        }
    }
}