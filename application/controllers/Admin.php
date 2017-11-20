<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->load->view('admin/index.php');
	}
	public function productDetail()
	{
		$this->load->view('admin/view-product.php');
	}
}
