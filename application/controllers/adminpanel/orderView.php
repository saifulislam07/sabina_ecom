<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderView extends CI_Controller {
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
	
	public function index()
	{
		$adminId   	 					= $this->session->userdata('adminId');
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$data['adminuserinfo']	 		= $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		
		$data['ordertViewlist'] = $this->M_join->orderViewPending_M('order_details');
		$this->load->view('adminpanel/orderViewPage', $data);
	}
	
	public function paidOrderView()
	{
		$adminId   	 					= $this->session->userdata('adminId');
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$data['adminuserinfo']	 		= $this->M_cloud->tbWhRow('admin_manage', array('adminId' => $adminId));
		
		$data['ordertViewlist'] = $this->M_join->orderViewPaid_M('order_details');
		$this->load->view('adminpanel/orderViewPage', $data);
	}
	
	public function delete($invoiceno)
	{
		$where = array('invoiceno' => $invoiceno);
		$result 	= $this->M_cloud->tbWhRow('order_details', $where);
		
		$this->M_cloud->destroyAll('order_details', $where);
		$this->M_cloud->destroyAll('customer_payment_information', $where);
		redirect('adminpanel/orderView');
	}
	
}
?>