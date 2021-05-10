<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class shoesVideo extends CI_Controller {
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
		$data['shoesVideoList'] 		= $this->M_cloud->tbObyResult('shoes_video', 'svid desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/shoesVideoPage', $data);
	}
		
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['embedcode']	    = $this->input->post('embedcode');
		$data['status']	    		= $this->input->post('status');
		
		  if(!empty($id)){
				$where = array('svid' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('shoes_video', $where);
			
				$this->M_cloud->updateAll('shoes_video', $data, array('svid' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}else{
				$this->M_cloud->save('shoes_video', $data);
				$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/shoesVideo');
	}
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('svid' => $id);	
		$result 	= $this->M_cloud->tbWhRow('shoes_video', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where = array('svid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('shoes_video', $where);
		$this->M_cloud->destroyAll('shoes_video', $where);
		
		redirect('adminpanel/shoesVideo');
	}
}

?>