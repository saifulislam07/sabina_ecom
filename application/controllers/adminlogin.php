<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlogin extends CI_Controller {
	 static $helper   = array('url', 'admin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation');
		//$this->load->library('pagination');
		//$this->load->library('upload');
		//isAuthenticate();
	}
	
	public function index()
	{
		$data['invalidUser'] = $this->session->userdata('invalidUser');
		$this->session->set_userdata(array('invalidUser' => ""));
		
		$data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$this->load->view('adminLoginPage', $data);
	}
	
	public function adminLoginAction()
	{
		adminLogin();
	}
	
	public function adminLogoutAction()
	{
		adminLogout();
	}
}
?>