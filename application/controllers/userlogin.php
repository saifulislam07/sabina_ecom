<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userlogin extends CI_Controller {
	 static $helper   = array('url', 'user_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud'));
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->library(array('cart'));
		//$this->load->helper('text');
		//$this->load->library('form_validation');
		//$this->load->library('email');
		//$this->load->library('pagination');
		//$this->load->library('upload');
		//isAuthenticate();
	}
	
	public function index()
	{	
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where13                    	= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');
		
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		$this->load->view('loginPage', $data);
	}
	
	public function userLoginAction()
	{
		userLogin();
	}
	
	public function userLogoutAction()
	{
		userLogout();
	}
}
?>