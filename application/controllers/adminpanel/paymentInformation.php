<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaymentInformation extends CI_Controller {
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
		$data['paymentInformationList'] = $this->M_cloud->tbObyResult('payment_information', 'payinId desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/paymentInformationPage', $data);
	}
		
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['payinType']	    = $this->input->post('payinType');
		$data['paymentInfo']	= $this->input->post('paymentInfo');
		$data['status']	    	= $this->input->post('status');
		
		  if(!empty($id)){
				$where = array('payinId' => $id);
			    $productListEditInfo 	     = $this->M_cloud->tbWhRow('payment_information', $where);
			
				$this->M_cloud->updateAll('payment_information', $data, array('payinId' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			}else{
				$this->M_cloud->save('payment_information', $data);
				$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		redirect('adminpanel/paymentInformation');
	}
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('payinId' => $id);	
		$result 	= $this->M_cloud->tbWhRow('payment_information', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where = array('payinId' => $comid);
		$result 	= $this->M_cloud->tbWhRow('payment_information', $where);
		$this->M_cloud->destroyAll('payment_information', $where);
		
		redirect('adminpanel/paymentInformation');
	}
}

?>