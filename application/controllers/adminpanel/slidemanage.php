<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slidemanage extends CI_Controller {
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
		$adminId   	 = $this->session->userdata('adminId');
		$data['success']     = $this->session->userdata('msg');
		$data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$data['adminuserinfo']	 = $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		$data['slide'] = $this->M_cloud->tbObyResult('slide_manage', 'slId desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/slidemanagePage', $data);
	}
	
	
	
	public function store()
	{
	
		$id = $this->input->post('id');
	
		$data['type']	    	= $this->input->post('type');
		$data['sltitle']	    = $this->input->post('sltitle');
		$data['status']	    	= $this->input->post('status');
		
		$slideimage		        = $this->input->post('slideimage');
		
		
		if(!empty($slideimage)){
			$data['slideimage'] = $slideimage;
		}
	
	
		  if(!empty($id)){
				$where = array('slId' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('slide_manage', $where);
			
				 if(!empty($productListEditInfo->slideimage) && file_exists('uploads/'.$productListEditInfo->slideimage) && !empty($slideimage)) {					
						unlink('uploads/'.$productListEditInfo->slideimage);
					}
				$this->M_cloud->updateAll('slide_manage', $data, array('slId' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}
			else{
			 
			$this->M_cloud->save('slide_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		
		redirect('adminpanel/slidemanage');
		
	}
	
	
	
	
	
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('slId' => $id);	
		$result 	= $this->M_cloud->tbWhRow('slide_manage', $where);
		echo json_encode($result);
	}
	
	
	
	
	
	
	
	
	
	public function delete($comid)
	{
	
		$where = array('slId' => $comid);
		$result 	= $this->M_cloud->tbWhRow('slide_manage', $where);
		if(!empty($result->slideimage) && file_exists('uploads/'.$result->slideimage)) {					
			unlink('uploads/'.$result->slideimage);	
		}

		$this->M_cloud->destroyAll('slide_manage', $where);
		
		redirect('adminpanel/slidemanage');
	}
	
	
	
	
	
}


?>