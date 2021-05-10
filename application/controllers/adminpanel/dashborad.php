<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashborad extends CI_Controller {
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
		//$this->load->library('email');
		isAuthenticate();
	}
	
	public function index()
	{	
		$adminId   	 = $this->session->userdata('adminId');
		$data['adminuserinfo']	 = $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		$data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$this->load->view('adminpanel/dashboardPage', $data);
	}
}
?>