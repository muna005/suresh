<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adminmodel extends CI_Model{
    function __construct() {
        $this->userTbl = 'gstadmin';
        $this->empTable='employee';
    }
    //admin login
    
    function login($where){
        $this->db->where($where); // $where is an array of condtions .
        $query =$this->db->get('admin');
        $rows=$query->num_rows();
        if($rows>0)
        {
          return $query->result_array();   
           
        }   
        else
        {
            return false;
        }
        
    }
    
}
?>