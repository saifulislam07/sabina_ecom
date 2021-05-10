<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistrationView extends CI_Controller {
	 static $helper   = array('url', 'admin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'm_join'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		//$this->load->library('pagination');
		//$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		$adminId   	 					= $this->session->userdata('adminId');
		$data['success']     			= $this->session->userdata('msg');
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$data['adminuserinfo']	 		= $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		$data['registrationViewlist'] 	= $this->M_cloud->tbObyResult('registration_manage', 'regid desc');
		$this->load->view('adminpanel/registrationViewPage', $data);
	}
	
	public function delete($comid)
	{
		$where = array('regid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('registration_manage', $where);
		
		$this->M_cloud->destroyAll('registration_manage', $where);
		
		redirect('adminpanel/registrationView');
	}
}

?>