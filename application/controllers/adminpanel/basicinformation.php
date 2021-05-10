<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Basicinformation extends CI_Controller {
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
		
		$data['basicinfo'] = $this->M_cloud->tbObyResult('basic_manage', 'bsId desc');
		$data['baseinformation'] = $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$data['adminuserinfo']	 = $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/basicinformationpage', $data);
	}
	
	
	
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['title']	    		= $this->input->post('title');
		$data['companyName']	    = $this->input->post('companyName');
		$data['phone']	    		= $this->input->post('phone');
		$data['eamil']				= $this->input->post('eamil');
		$data['website']			= $this->input->post('website');
		$data['addres']	    		= $this->input->post('addres');
		$data['website']			= $this->input->post('website');
		$comlogo		    		= $this->input->post('comlogo');
		
		if(!empty($comlogo)){
			$data['comlogo'] = $comlogo;
		}
	
	
		  if(!empty($id)){
				$where = array('bsId' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('basic_manage', $where);
			
				 if(!empty($productListEditInfo->comlogo) && file_exists('uploads/'.$productListEditInfo->comlogo) && !empty($comlogo)) {					
						unlink('uploads/'.$productListEditInfo->comlogo);
					}
				$this->M_cloud->updateAll('basic_manage', $data, array('bsId' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}
			else{
			 
			$this->M_cloud->save('basic_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/basicinformation');
	}
	
	public function updated()
	{
		$id 							= $this->input->post('id');	
		$where   = array('bsId' => $id);	
		$result 	= $this->M_cloud->tbWhRow('basic_manage', $where);
		echo json_encode($result);
	}
	
	
	public function delete($comid)
	{
		$where = array('comid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('companymanage', $where);
		if(!empty($result->comlogo) && file_exists('uploads/'.$result->comlogo)) {					
			unlink('uploads/'.$result->comlogo);	
		}

		$this->M_cloud->destroyAll('companymanage', $where);
		
		redirect('companyManage');
	}		
}
?>