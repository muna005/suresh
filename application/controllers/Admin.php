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
				$row = $this->Adminmodel->getAllrecords();				
				$data['result'] = $row ;	
	         	$this->load->view('admin/view-user',$data);
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
		$title    = $this->input->post('title');
		$detail   = $this->input->post('detail');
		$today_date = date('Y-m-d H:i:s') ;
		$author   = $this->input->post('author');
		$created_by = 'admin' ;
		$date = $this->input->post('exp_date');
		$exp_datetype = new DateTime($date);
		$exp_date = $exp_datetype->format('Y-m-d H:i:s') ;

		if($title!=''){
			$data = array(
					"title" => $title ,
					"article_desc" => $detail ,
					"created_by"   => $created_by ,
					"created_date" => $today_date ,
					"author"       => $author ,
					"exp_date"     => $exp_date
			);
			$result = $this->Adminmodel->insertArticle($data);
			if($result){
				$this->session->set_flashdata("msg","Article sussfully Inserted");
			}
			else{
			   $this->session->set_flashdata("msg","please enter correct data");
			}
		}
    	$this->load->view('admin/add-article');
	}
	public function viewArticle(){
		$result = $this->Adminmodel->getArticle();
		$data['result'] = $result!=0?$result:null ;
		$this->load->view('admin/view-article',$data);
		
	}
	public function editArticle(){
		echo $article_id = $this->uri->segment('3');
		echo $id = $this->input->post('id');
		if($article_id=='')
		{
			$article_id =$id ;
		}
		if($article_id!=''){
		$result = $this->Adminmodel->getArticle($article_id);
		$data['result'] = $result ;
		$title    = $this->input->post('title');
			if($title!=''){
				$detail   = $this->input->post('detail');
				$today_date = date('Y-m-d H:i:s') ;
				$author   = $this->input->post('author');
				$created_by = 'admin' ;
				$date = $this->input->post('exp_date');
				$exp_datetype = new DateTime($date);
				$exp_date = $exp_datetype->format('Y-m-d H:i:s') ;
				$data = array(
						"title" => $title ,
						"article_desc" => $detail ,
						"created_by"   => $created_by ,
						"created_date" => $today_date ,
						"author"       => $author ,
						"exp_date"     => $exp_date
				);
				$result = $this->Adminmodel->updateArticle($article_id,$data);
				if($result){
					$this->session->set_flashdata("msg","Article sussfully Updated");
				}
				else{
				$this->session->set_flashdata("msg","please enter correct data");
				}
				$url="admin/editArticle/".$article_id;
				redirect($url);
				
			}
			else
			{
			$this->load->view("admin/edit-article",$data);	
			}

	}
	else
	{
		$this->output->set_status_header('404'); 
        $data['content'] = 'error_404'; // View name 
        $this->load->view('admin',$data);//loading in my template 
	}
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
