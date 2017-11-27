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
        $data = array('username' =>$input['username'],
                      'password' =>$input['password']                    
                      
        );
        $result = $this->Adminmodel->login($data);
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
}    
?>