<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategory extends CI_Controller {
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
		$data['categoryList'] 			= $this->M_cloud->tbObyResult('category_manage', 'catid desc');
		$data['subCategoryList'] 		= $this->m_join->subCategory_M('sub_category_manage', 'subcatid desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/subcategoryPage', $data);
	}
		
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['catid']	    		= $this->input->post('catid');
		$data['subcatname']	    	= $this->input->post('subcatname');
		$data['subcattitle']	    = $this->input->post('subcattitle');
		$data['status']	    		= $this->input->post('status');
		$data['subcatposition']	    = $this->input->post('subcatposition');
		$data['subcatdetails']	    = $this->input->post('subcatdetails');
		$subcatimage		    	= $this->input->post('subcatimage');
		
		
		if(!empty($subcatimage)){
			$data['subcatimage'] = $subcatimage;
		}
	
		  if(!empty($id)){
				$where = array('subcatid' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('sub_category_manage', $where);
			
				 if(!empty($productListEditInfo->subcatimage) && file_exists('uploads/'.$productListEditInfo->subcatimage) && !empty($subcatimage)) {					
						unlink('uploads/'.$productListEditInfo->subcatimage);
					}
				$this->M_cloud->updateAll('sub_category_manage', $data, array('subcatid' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}
			else{
			 
			$this->M_cloud->save('sub_category_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/subcategory');
	}
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('subcatid' => $id);	
		$result 	= $this->M_cloud->tbWhRow('sub_category_manage', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where = array('subcatid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('sub_category_manage', $where);
		if(!empty($result->subcatimage) && file_exists('uploads/'.$result->subcatimage)) {					
			unlink('uploads/'.$result->subcatimage);	
		}

		$this->M_cloud->destroyAll('sub_category_manage', $where);
		
		redirect('adminpanel/subcategory');
	}
}

?>