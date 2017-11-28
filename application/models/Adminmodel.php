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
    function userLogin($where){
        $username = $where['0'];
        $password = $where['1'];
        $where = "password='$password' AND username='$username' OR email='$username'";
        $this->db->where($where); // $where is an array of condtions .
        $query =$this->db->get('user');
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
    // for user register
    public function regUser($data){
        $result = $this->db->insert('user',$data);
        if($result){
            $id = $this->db->insert_id();
            return $id ;
        }
        else{
            return false;
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
                $query  = $this->db->get("article");
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
            $result = self::getArticle($id);
            return $result;
        }
        else
        return 0;

    }
    public function delArticle($id){
     $this->db->where('id',$id);   
     $query = $this->db->delete('article');
     if($query){
         return true ;
     }
     else{
         return false ;
     } 

    }
    public function changeArticle($id){
        $this->db->select('status');
        $this->db->where('id',$id);
        $query = $this->db->get('article');
        $result = $query->row();
        if($result->status==0){
            $this->db->set('status','1');   
        }
        if($result->status==1){
            $this->db->set('status','0');   
        }
        $this->db->where('id',$id);
        $result = $this->db->update('article');
        if($result){
            return true;
        }
        else{
            return false ;
        }
    }
    // for product
    public function add_product($data){
        $result = $this->db->insert('product',$data);
        if($result){
            return true;
        }
        else{
            return false;
        }

    }
    public function prouctExist($pname){
        $this->db->select('id');
        $this->db->where('product_name',$pname);
        $result = $this->db->count_all_results('product');
        if($result>0)
        {
            return true ;
        }
        else{
            return false ;
        }
    }
    public function viewProduct($productid=null){
        if($productid==null || $productid=='')  {     
            $query  = $this->db->get('product');
            $count  = $this->db->count_all_results('product');
            if($count > 0){
                $result = $query->result();
                if($result){
                    return $result ;
                }
            }
            else{
                return 0;
            }
        }
        else{
            $this->db->where('id',$productid);
            $query  = $this->db->get('product');
            $count  = $this->db->count_all_results('product');
            if($count > 0){
                $result = $query->result();
                if($result){
                    return $result ;
                }
            }
            else{
                return 0;
            }   
        }

    }
    public function update_product($id,$data){
        $this->db->where('id',$id);
        $result = $this->db->update('product',$data);
        if($result){
           return true ;
        }
        else{
            return false;
        }

    }
    public function delProduct($id){
        $this->db->where('id',$id);
        $result = $this->db->delete('product');
        if($result){
            return true ;
        }
        else {
            return false ;
        }
    }
    public function delUser($id){
        $this->db->where('id',$id);
        $result = $this->db->delete('user');
        if($result){
            return true;
        }
        else{
            return false;
        }
    }
    // for query model
    public function getAllquery(){
        $query = $this->db->get('query_detail');
       $result = $query->result();
       if($result){
           return $result ;
       }
       else
       {
           return false ;
       }
    }
    // for services
    public function insertService($data){
        $result = $this->db->insert('service',$data);
        if($result){
            return true ;
        }
        else{
            return false;
        }
    }
    public function getAllSrvice($id=null){
        if($id==null || $id=='')
        {
            $count=$this->db->count_all_results('service');
            if($count > 0){
            $query=$this->db->get('service');
                $result = $query->result();
                if($result){
                    return $result ;
                }
                else{
                    return false ;
                }
            }
            else{
                return 0;
            }
        }
        else{
            $this->db->where('id',$id);
            $query=$this->db->get('service');
            $result = $query->result();
            if($result){
                return $result ;
            }
            else{
                return false ;
            }
        } 
    }
    public function delService($id){
        $this->db->where('id',$id);
        $result = $this->db->delete('service');
        if($result){
            return true ;
        }
        else{
            return false;
        }

    }
    public function update_service($id,$data){
        $this->db->where('id',$id);
        $result = $this->db->update('service',$data);
        if($result){
            return true ;
        }
        else{
            return false; 
        }

    }
    public function insertGallery($data){
        $result = $this->db->insert('gallery',$data); 
        if($result){
            return true ;
        }
        else{
            return false; 
        }

    }
    public function  viewGal(){
        $query = $this->db->get('gallery');
        $result = $query->result();
        if($result){
            return $result ;
        }
        else{
            return false ;
        }

    }
    public function delGallery($id){
       
            $this->db->select('*');
            $this->db->where('id',$id);
            $query = $this->db->get('gallery');
            $row  = $query->row_array();
            $file         = $row['media'];
            $gallery_type = $row['gallery_type'];
            $url= FCPATH;
            if($gallery_type==1){

                unlink($url."/uploads/image/".$file);
            }
            if($gallery_type==2){
                unlink($url."/uploads/video/".$file);               
            }
            $this->db->where('id',$id);
            $result = $this->db->delete('gallery');
            if($result){
                return true ;
            }
            else{
                return false;
            }
    }
}
?>