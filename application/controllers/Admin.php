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
		$article_id = $this->uri->segment('3');
		$id = $this->input->post('id');
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
// for delete Article
	public function deleteArticle(){
		$id=$this->uri->segment('3');
		if($id!=''){
			$result = $this->Adminmodel->delArticle($id);
			$url='article';
			if($result){
				$this->session->set_flashdata('msg','Article sucessfully detelete');
				redirect($url);
			}
			else{
				$this->session->set_flashdata('msg','Opps som error coming when you are delete Article');				
				redirect($url);
			}
		}
	}
	public function changeStatus($id){
		if($id!=''){
			$result = $this->Adminmodel->changeArticle($id);
			$url='article';
			
			if($result){
			  $this->session->set_flashdata('msg','article status changed');
			  redirect($url);
			}
			else{
				$this->session->set_flashdata('msg','Opps som error coming when you are delete Article');
				redirect($url);
			}
		}
	}
	//************users controllers list********** *//
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
	public function deleteUser(){
		$id     = $this->uri->segment('3');
		$result = $this->Adminmodel->delUser($id);
		if($result){
			$this->session->set_flashdata('msg','user deleted successfully');
		}
		else{
			$this->session->set_flashdata('msg','opps! some error coming ');
		}
		$url='userlist';
		redirect($url);
	}

	// ***********  product related controller here *******************

	public function productDetail()
	{
		$results=$this->Adminmodel->viewProduct();
		$data['result']=$results ;
		$this->load->view('admin/view-product',$data);
	}
	public function addProduct(){
		$product_name = $this->input->POST('product_name');
		if($product_name!=''){
			$product_code = $this->input->POST('product_code');
			$price		  = $this->input->POST('price');
			$product_desc = $this->input->POST('product_desc');
			$status		  =	$this->input->POST('status') ;
			$data = array(
			'product_name'=>$product_name ,
			'product_code'=>$product_code ,
			'price'       =>$price ,
			'product_desc'=>$product_desc,
			'created_by'  =>'admin',
			'status'      => '0'
			);
			$pname_exist = $this->Adminmodel->prouctExist($product_name);
			if($pname_exist)
			{
				$this->session->set_flashdata('msg','product name already exist');
			}
			else{
				$result=$this->Adminmodel->add_product($data);
				if($result)
				{
					$this->session->set_flashdata('msg',"data sucessfully inserted in product");
				}
				else{
					$this->session->set_flashdata('msg',"oops data not inserted") ;
				}
			}
			
		}		
		$this->load->view('admin/add-product');
	}
    public function editProduct(){
		$id=$this->uri->segment('3');
		if($id!='')
		{
			$result = $this->Adminmodel->viewProduct($id);
			$data['result'] = $result ;
			$this->load->view('admin/edit-product',$data);

		}
		else{
			redirect('admin');
		}
	}
	public function updateProduct(){
		$id=$this->input->post('id');
		if($id=='')
		{
			redirect('admin');
		}
        $product_name = $this->input->POST('product_name');
		if($product_name!=''){
				$product_code = $this->input->POST('product_code');
				$price		  = $this->input->POST('price');
				$product_desc = $this->input->POST('product_desc');
				$status		  =	$this->input->POST('status') ;
				$data = array(
				'product_name'=>$product_name ,
				'product_code'=>$product_code ,
				'price'       =>$price ,
				'product_desc'=>$product_desc
				);						
				$result=$this->Adminmodel->update_product($id,$data);
				if($result)
				{
					$this->session->set_flashdata('msg',"data sucessfully updated in product");
				}
				else{
					$this->session->set_flashdata('msg',"oops data not updated") ;
				}
			}
			$url='admin/editProduct/'.$id;
			redirect($url);
		}
	// for delete product
	public function deleteProduct($id){
		$id = $this->uri->segment('3');
		if($id!=''){
			$result = $this->Adminmodel->delProduct($id);
			if($result){
				$this->session->set_flashdata('msg',"product Deleted");
			}
			else{
				$this->session->set_flashdata('msg',"Opps! product not Deleted");
			}
			$url='product';
			redirect($url);
		}
	}
    //***************************  query related controllers **********************
	
	public function viewQuery(){
		$result = $this->Adminmodel->getAllquery();
		$data['result'] = $result ;
    	$this->load->view('admin/view-query',$data);
	}
	public function addService(){
		$service_name = $this->input->post('service_name') ;
		if($service_name !='') {
		$duration     = $this->input->post('duration');
		$price        = $this->input->post('price');
		$created_by   = 'admin';
		$data = array(
			'service_name' => $service_name ,
			'duration'	   => $duration ,
			'price'        => $price ,
			'created_by'   => $created_by	
		);
		$result = $this->Adminmodel->insertService($data);
		if($result){
			$this->session->set_flashdata('msg','service successfully added') ;			
		}
		else{
			$this->session->set_flashdata('msg','Opp! service not added') ;	
		}
		}
		
	    $this->load->view('admin/add-service');
	}
	public function viewService(){
		$result = $this->Adminmodel->getAllSrvice();
		$data['result'] = $result ; 
	    $this->load->view('admin/view-service',$data);
	}
	public function deleteService(){
		$id = $this->uri->segment('3');
		$result = $this->Adminmodel->delService($id);
		if($result){
			$this->session->set_flashdata('msg','service deleted sucessfully');
		}
		else{
			$this->session->set_flashdata('msg','opps service not deleted');
		}
		redirect('service');
	}
	public function editService(){
		$id=$this->uri->segment('3');
		$result = $this->Adminmodel->getAllSrvice($id);
		$data['result'] = $result ;
		$this->load->view('admin/edit-service',$data);
	}
	public function updateService(){
		$service_name = $this->input->post('service_name') ;
		$id = $this->input->post('id') ;
		if($id==''){
			redirect('admin');
		}
		if($service_name !='' && $id!='') {
			$duration     = $this->input->post('duration');
			$price        = $this->input->post('price');
			$created_by   = 'admin';
			$data = array(
				'service_name' => $service_name ,
				'duration'	   => $duration ,
				'price'        => $price ,
				'created_by'   => $created_by,
				'updated_by'   => $created_by
			);
			$result = $this->Adminmodel->update_service($id,$data);
			if($result){
				$this->session->set_flashdata('msg','service successfully updated') ;			
			}
			else{
				$this->session->set_flashdata('msg','Opp! service not updated') ;	
			}	
		}	
		redirect('admin/editService/'.$id);
	}
	
	public function addGallery(){

		$title = $this->input->post('title');
		$gallery_type = $this->input->post('gallery_type');
        if($title!=''){
            if($gallery_type==1){
				$config_media['upload_path'] = './uploads/image';
			}
			if($gallery_type==2){
				$config_media['upload_path'] = './uploads/video';
			}
			
			$config_media['allowed_types'] = 'gif|jpg|png|mp4|avi|flv|wmv|mpeg|mp3';	
			$config_media['max_size']	= '1000000000000000'; // whatever you need
			$this->load->library('upload',$config_media);
			$error = [];
			if ( ! $this->upload->do_upload('image'))
			{
				$error[] = array('error_image' => $this->upload->display_errors());	
			}
			else
			{
				$data[] = array('upload_image' => $this->upload->data());
			}		
			$image    = $data[0]['upload_image']['file_name'];
			$added_by = 'admin';
			$date     = date("Y-m-d H:i:s");
			$gallery_desc= $this->input->post('gallery_desc');
            if(count($error) >0){
				$this->session->set_flashdata('msg','opp! error in image uploads') ;
				redirect('admin/addGallery');

			}
			else{
				$data = array(
					  'title'        => $title ,
					  'gallery_type' => $gallery_type,
					  'media'        => $image,
					  'added_by'     => $added_by ,
					  'add_date'     => $date,
					  'gallery_desc' => $gallery_desc
				);
				$result = $this->Adminmodel->insertGallery($data);
				if($result){
					$this->session->set_flashdata('msg','gallery data inserted');
				}
				else{
					$this->session->set_flashdata('msg','opp! gallery not inserted') ;
				}
			}

			$this->load->view('admin/add-gallery');
		}
		else
		{
			$this->load->view('admin/add-gallery');	
		}
	}
	public function viewGallery(){
		$result = $this->Adminmodel->viewGal();
		$data['result'] = $result ;
        $this->load->view('admin/view-gallery',$data);
	}
	public function deleteGallery(){
		$id = $this->uri->segment('3');
		$result = $this->Adminmodel->delGallery($id);
		if($result){
			$this->session->set_flashdata('msg','Gallery sucessfully deleted');

		}
		else{
			$this->session->set_flashdata('msg','Opp! some error in gallery');
		}
		redirect('gallery');
	}
	public function editGallery(){
		$id = $this->uri->segment('3');
		if($id==''){
			redirect('admin');
		}
		$result = $this->Adminmodel->viewGal($id);
		$data['result'] = $result ;
		$this->load->view('admin/edit-gallery',$data);

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
