<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderViewDetails extends CI_Controller {
	 static $helper   = array('url', 'admin_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		//$this->load->library('pagination');
		//$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index($invoiceno, $regid)
	{
		$adminId   	 					= $this->session->userdata('adminId');
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$data['adminuserinfo']	 		= $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		
		$where1                    		= array('invoiceno' =>$invoiceno);	  
		$data['ordDtlList']				= $this->M_cloud->tbWhObyResult('order_details', $where1, 'invoiceno desc');
		$where2                    		= array('regid' =>$regid);	  
		$data['ordDtladrsList']			= $this->M_cloud->tbWhRow('registration_manage', $where2);
		$where3                    		= array('invoiceno' =>$invoiceno);	  
		$data['ordPmtInfoList']			= $this->M_cloud->tbWhRow('customer_payment_information', $where3);
		
		$this->load->view('adminpanel/orderViewDetailsPage', $data);
	}
	
	public function confirmPaid($invoiceno)
	{
	$data['orderstatus']  = "Paid";
	$this->db->update('order_details', $data, array('invoiceno' => $invoiceno));
	redirect('adminpanel/orderView/paidOrderView');
	}
	
}
?>