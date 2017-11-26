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
    //get all records from user table
    function getAllrecords(){
        $count = $this->db->count_all_results('user');
        if($count > 0) {
            $query  = $this->db->get("user"); 
            $result = $query->result();
            return $result ;
        }
        else{
           return '0' ;  
        }

    }
    // for insert record
    function insertArticle($data){
        $result=$this->db->insert('article',$data);
        if($result){
            return true ;
        }
        else{
            return false ;
        }

    }
    function getArticle($article_id=null){
        if($article_id==null || $article_id=='') {
            $count = $this->db->count_all_results('article');
            if($count > 0) {
                $query  = $this->db->get("article"); 
                $result = $query->result();
                return $result ;
            }
            else{
            return 0 ;  
            }
        }
        else
        {
           
            $this->db->where('id',$article_id);
            $this->db->from('article');
            $count = $this->db->count_all_results();
            if($count>0){
                $this->db->where('id',$article_id);
                $query = $this->db->get("article");
                $result = $query->result();
                return $result ;
            }
            else{
                return 0;
            }
        }

    }

    public function updateArticle($id,$data){
        $this->db->where('id',$id);
        $query = $this->db->update('article',$data);
        if($query){
            $result=self::getArticle($id);
            return $result;
        }
        else
        return 0;

    }
    
}
?>