<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfileUpdate extends CI_Controller {
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
		isAuthenticate();
	}
	
	public function index()
	{
		$adminId   	 					= $this->session->userdata('adminId');
		$data['success']     			= $this->session->userdata('msg');
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$data['adminuserinfo']	 		= $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		
		$data['amnfgtpassalt'] = $this->session->userdata('amnfgtpassalt');
		$this->session->set_userdata(array('amnfgtpassalt' => ''));
				
		$this->load->view('adminpanel/profilePage', $data);
	}
	
	public function profileEdit()
	{
	$adminId   	 			= $this->session->userdata('adminId');
	$data['adminUsername']  = $this->input->post('adminUsername');
	$this->db->update('admin_manage', $data, array('adminId' => $adminId));
	
	redirect('adminpanel/profileUpdate');
	}
	
	
	
	
	public function changepass()
	{
		$data['adminPassword'] 	= md5($this->input->post('adminPassword'));
		$adminId   	 			= $this->session->userdata('adminId');
		
		$this->db->update('admin_manage', $data, array('adminId' => $adminId));
		
		redirect('adminlogin/adminLogoutAction');
	}
	
	public function checkpass()
	{
		$oldpass 	= md5($this->input->post('oldpass'));
		$adminId 	= $this->session->userdata('adminId');
		$result 	= $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId, 'adminPassword' => $oldpass));
		if($result){
			echo true;
		} else {
			echo false;
		}
	
	}
	
	public function forgottenPasswordAction()
	{
		$adminEmail   = $this->input->post('adminEmail');
		$result   = $this->M_cloud->tbWhRow('admin_manage', array('adminEmail' => $adminEmail));
		
		if($result){
			$adminPassword  = time()+1;
			$data['adminPassword']  = md5($adminPassword);
			$this->db->update('admin_manage', $data, array('adminEmail' => $adminEmail));
			
				$senderEmail 	 = 'info@sabinasecret.com';
				$senderName 	 = 'Sabina Secret';
				$subject 		 = 'Forgotten Password';
				
				$message   = $adminPassword;
				$this->email->from($senderEmail, $senderName);
				$this->email->to($adminEmail);	
				$this->email->subject($subject);
				$this->email->message ('Your new password is '.$message);
				$this->email->send();
			redirect('adminlogin/adminLogoutAction');
		
		} else {
		
		$this->session->set_userdata(array('amnfgtpassalt' => 'Your email address is Wrong!'));
		redirect('adminlogin/adminLogoutAction');
		}
	}
	public function checkfgtpassemail()
	{
		$adminEmail = $this->input->post('adminEmail');
		$result = $this->M_cloud->tbWhRow('admin_manage', array('adminEmail' => $adminEmail));
		if($result){
			echo false;
		} else {
			echo true;
		}
	}
	
	
	
}


?>