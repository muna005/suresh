<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Adminmodel');
    }
	public function index()
	{
	     if(@$this->session->userdata(isUserLoggedIn)) {
	        redirect('userlist');    
	     }
	     else {
		    $this->load->view('admin/index');
	     }
	}
	public function adminLogin(){
	   if(@$this->session->userdata(isUserLoggedIn)) {
	    redirect('userlist');    
	   }
	   else {
    	   if($this->input->post('username')){
    	              
                        $where= array(
                            'username'=>$this->input->post('username'),
                            'password' =>$this->input->post('password'),
                            'status' => '1'
                        );
                        print_r($where);
                        $checkLogin = $this->Adminmodel->login($where);
                        if($checkLogin){
                            $this->session->set_userdata('isUserLoggedIn',TRUE);
                            $this->session->set_userdata('userId',$checkLogin['id']);
                            redirect('userlist');
                        }else{
                            
                            $this->session->set_flashdata('error_mesg','Wrong email or password, please try again.');
                        }
                   
                } 
                 $this->load->view('admin/index');
    	}
	}
	
	public function userList()
	{
	     if(@$this->session->userdata(isUserLoggedIn)) {
	         	$this->load->view('admin/view-user');
	    }
	    else{
	        redirect('admin');    
	     }
	}
	public function productDetail()
	{
		$this->load->view('admin/view-product');
	}
	public function addProduct(){
    	$this->load->view('admin/add-product');
	}
	public function addQuery(){
    	$this->load->view('admin/add-query');
	}
	public function viewQuery(){
    	$this->load->view('admin/view-query');
	}
	public function addArticle(){
    	$this->load->view('admin/add-article');
	}
	public function viewArticle(){
    	$this->load->view('admin/view-article');
	}
	public function addService(){
	    $this->load->view('admin/add-service');
	}
	public function viewService(){
	    $this->load->view('admin/view-service');
	}
	public function viewUserlist(){
	    $this->load->view('admin/view-user');
	}
	public function addGallery(){
        $this->load->view('admin/add-gallery');
	}
	public function viewGallery(){
        $this->load->view('admin/view-gallery');
	}
	public function viewOrder(){
        $this->load->view('admin/view-order');
	}
	
	public function logout(){
	    $this->session->unset_userdata('isUserLoggedIn');
	    $this->session->unset_userdata('userId');
	    redirect("admin");
	}
	
	
}
