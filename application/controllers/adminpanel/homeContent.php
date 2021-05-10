<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeContent extends CI_Controller {
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
		$data['homeConentList'] 		= $this->M_cloud->tbObyResult('home_content', 'hmcontid desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/homeContentPage', $data);
	}
		
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['hmconttitle']	    = $this->input->post('hmconttitle');
		$data['status']	    		= $this->input->post('status');
		$data['hmcontdetails']		= $this->input->post('hmcontdetails');
		
		
		  if(!empty($id)){
				$where = array('hmcontid' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('home_content', $where);
			
				$this->M_cloud->updateAll('home_content', $data, array('hmcontid' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}else{
				$this->M_cloud->save('home_content', $data);
				$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/homeContent');
	}
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('hmcontid' => $id);	
		$result 	= $this->M_cloud->tbWhRow('home_content', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where = array('hmcontid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('home_content', $where);
		$this->M_cloud->destroyAll('home_content', $where);
		
		redirect('adminpanel/homeContent');
	}
}

?>