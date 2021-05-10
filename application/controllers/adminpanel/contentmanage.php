<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contentmanage extends CI_Controller {
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
		$data['conentmanaeList'] 		= $this->M_cloud->tbObyResult('content_manage', 'contid desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/contentmanagePage', $data);
	}
		
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['menuname']	    = $this->input->post('menuname');
		$data['conttitle']	    = $this->input->post('conttitle');
		$data['status']	    	= $this->input->post('status');
		$data['contdetails']	= $this->input->post('contdetails');
		$contimage		        = $this->input->post('contimage');
		
		
		if(!empty($contimage)){
			$data['contimage'] = $contimage;
		}
	
		  if(!empty($id)){
				$where = array('contid' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('content_manage', $where);
			
				 if(!empty($productListEditInfo->contimage) && file_exists('uploads/'.$productListEditInfo->contimage) && !empty($contimage)) {					
						unlink('uploads/'.$productListEditInfo->contimage);
					}
				$this->M_cloud->updateAll('content_manage', $data, array('contid' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}
			else{
			 
			$this->M_cloud->save('content_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/contentmanage');
	}
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('contid' => $id);	
		$result 	= $this->M_cloud->tbWhRow('content_manage', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where = array('contid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('content_manage', $where);
		if(!empty($result->contimage) && file_exists('uploads/'.$result->contimage)) {					
			unlink('uploads/'.$result->contimage);	
		}

		$this->M_cloud->destroyAll('content_manage', $where);
		
		redirect('adminpanel/contentmanage');
	}
}

?>