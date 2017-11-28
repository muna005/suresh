<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require(APPPATH . '/libraries/REST_Controller.php');

/**
 * Description of RestPostController
 * @author http://roytuts.com
 */
class Myservice  extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Adminmodel');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
       
    }
    public function loginUser_post(){
        $input =json_decode(file_get_contents('php://input'), true);   
        $data = array($input['username'],$input['password']);
        $result = $this->Adminmodel->userLogin($data);
        if($result)
        {
            $json_data['status']='Success';
            $json_data['responseCode']=array('100');
            $json_data['message']=array("login success");
            $userlist=$result; 
            $json_data['userDetail']=$userlist[0];
            $this->set_response($json_data,REST_Controller::HTTP_OK); 
        }
        else
        {
            $json_data['status']='Fail';
            $json_data['responseCode']=array('101');
            $json_data['message']=array("login fail");
            $this->set_response($json_data,REST_Controller::HTTP_OK); 
        }
    }
    public function viewUser_get(){
        $result = $this->Adminmodel->getAllrecords();
        if($result)
        {
        $json_data['status']='Success';
        $json_data['responseCode']=array('1000');
        $json_data['message']=array("Users Detail  Retrieved Successfully.");
        $userlist=$result; 
        $json_data['userDetail']=$userlist;
        $this->set_response($json_data,REST_Controller::HTTP_OK); 
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'error' => 'Record could not be found'
            ],REST_Controller::HTTP_OK); 
        }
    }
    public function viewArticle_get(){
        $result = $this->Adminmodel->getArticle();
        if($result)
        {
        $json_data['status']='Success';
        $json_data['responseCode']=array('1000');
        $json_data['message']=array("article detail retrieved Successfully.");
        $article=$result; 
        $json_data['articleList']=$article;
        $this->set_response($json_data,REST_Controller::HTTP_OK); 
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'error' => 'Record could not be found'
            ],REST_Controller::HTTP_OK); 
        }
    }

    public function viewService_get(){
        $result = $this->Adminmodel->getAllSrvice();
        if($result)
        {
        $json_data['status']='Success';
        $json_data['responseCode']=array('1000');
        $json_data['message']=array("service detail retrieved Successfully.");
        $service=$result; 
        $json_data['serviceList']=$service;
        $this->set_response($json_data,REST_Controller::HTTP_OK); 
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'error' => 'Record could not be found'
            ],REST_Controller::HTTP_OK); 
        }
    }
    public function registerUser_post(){
        $input         = json_decode(file_get_contents('php://input'), true);  
        $fname         = $input['fname'] ;
        $lname         = $input['lname'] ;
        $username      = $input['username'] ;
        $email         = $input['email'] ;
        $mobile        = $input['mobile'];
        $password      = $input['password'];
        $gender        = $input['gender'];
        $date_of_birth = $input['date_of_birth'];
        $date_join     = date('Y-m-d H:i:s');
        $data = array(
            'fname'         => $fname ,
            'lname'         => $lname ,
            'username'      => $username ,
            'email'         => $email ,
            'mobile'        => $mobile ,
            'password'      => $password ,
            'gender'        => $gender ,
            'date_of_birth' => $date_of_birth,
            'date_join'     => $date_join,
            'status'        => 0
        );
        if($fname!='' && $lname!='' && $username!='' && $email!='' && $mobile!='' && $password!='' && $gender!='' && $date_of_birth!=''){
           
            $result = $this->Adminmodel->regUser($data);
            if($result){
                // *************  for for mail need to send in server  ************
                /* 
                     $this->load->library('email');
                    $to = $email ;
                    $from = "sudhakarnayak05@gmail.com" ;
                    $subject ='welcome messages' ;
                    $message = 'Thanks for registering with us';
                    $this->email->from($from,'admin panel');
                    $this->email->to($to);
                    $this->email->subject($subject);
                    $this->email->message($message);
                    $this->email->send();
                */
                $userlist =array(
                    'id' => '132',
                    'username'=>$username,
                ) ;

                $json_data['status']='Success';
                $json_data['responseCode']=array('201');
                $json_data['message']=array("Data inserted Successfully."); 
                $json_data['userDetail']=$userlist;
                $this->set_response($json_data,REST_Controller::HTTP_OK);
            }else{
                $json_data['status']='fail';
                $json_data['responseCode']=array('202');
                $json_data['message']=array("Opp! registration Fail"); 
                $this->set_response($json_data,REST_Controller::HTTP_OK);
            }
        }
        else{
            $json_data['status']='fail';
            $json_data['responseCode']=array('203');
            $json_data['message']=array("Please Enter All The Mandatory Fields"); 
            $this->set_response($data,REST_Controller::HTTP_OK);
        }


    } 
}    
?>