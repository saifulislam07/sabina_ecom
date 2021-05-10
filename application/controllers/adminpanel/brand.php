<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class brand extends CI_Controller {
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
		$data['brandList'] 				= $this->M_cloud->tbObyResult('brands_manage', 'bndid desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/brandPage', $data);
	}
	
	
	
	public function store()
	{
	
		$id = $this->input->post('id');
	
		$data['bndname']	    = $this->input->post('bndname');
		$data['status']	    	= $this->input->post('status');
		$bndimage		        = $this->input->post('bndimage');
		
		
		if(!empty($bndimage)){
			$data['bndimage'] = $bndimage;
		}
	
		  if(!empty($id)){
				$where = array('bndid' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('brands_manage', $where);
			
				if(!empty($productListEditInfo->bndimage) && file_exists('uploads/'.$productListEditInfo->bndimage) && !empty($bndimage))
				{					
					unlink('uploads/'.$productListEditInfo->bndimage);
				}
				$this->M_cloud->updateAll('brands_manage', $data, array('bndid' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			} else {
				$this->M_cloud->save('brands_manage', $data);
				$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/brand');
	}
	
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where      = array('bndid' => $id);	
		$result 	= $this->M_cloud->tbWhRow('brands_manage', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where = array('bndid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('brands_manage', $where);
		if(!empty($result->bndimage) && file_exists('uploads/'.$result->bndimage))
		{					
			unlink('uploads/'.$result->bndimage);	
		}
		$this->M_cloud->destroyAll('brands_manage', $where);
		redirect('adminpanel/brand');
	}	
}
?>