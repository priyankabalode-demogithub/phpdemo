<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home_model extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }
 public function insert_batch($data){
    $this->db->insert_batch('users',$data);
    if($this->db->affected_rows()>0){
        return 1;
    }
    else{
        return 0;
    }
 }

 public function user_list(){
    $this->db->select('*');
		$this->db->from('users');
		$query=$this->db->get();
		return $query->result();
 }
}