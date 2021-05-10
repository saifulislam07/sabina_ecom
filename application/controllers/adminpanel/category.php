<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
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
		$data['categoryList'] 			= $this->M_cloud->tbObyResult('category_manage', 'catid desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/categoryPage', $data);
	}
		
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['catname']	    = $this->input->post('catname');
		$data['status']	    	= $this->input->post('status');
		$data['catdetails']	    = $this->input->post('catdetails');
		$catimage		        = $this->input->post('catimage');
		
		
		if(!empty($catimage)){
			$data['catimage'] = $catimage;
		}
	
		  if(!empty($id)){
				$where = array('catid' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('category_manage', $where);
			
				 if(!empty($productListEditInfo->catimage) && file_exists('uploads/'.$productListEditInfo->catimage) && !empty($catimage)) {					
						unlink('uploads/'.$productListEditInfo->catimage);
					}
				$this->M_cloud->updateAll('category_manage', $data, array('catid' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}
			else{
			 
			$this->M_cloud->save('category_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/category');
	}
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('catid' => $id);	
		$result 	= $this->M_cloud->tbWhRow('category_manage', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where = array('catid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('category_manage', $where);
		if(!empty($result->catimage) && file_exists('uploads/'.$result->catimage)) {					
			unlink('uploads/'.$result->catimage);	
		}

		$this->M_cloud->destroyAll('category_manage', $where);
		
		redirect('adminpanel/category');
	}
}

?>