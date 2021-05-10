<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authors extends CI_Controller {
	 static $helper   = array('url', 'authentication_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_superadmin', 'M_cloud'));
		$this->load->helper('url');
		$this->load->library('session');
		//$this->load->library('form_validation'); 
		//$this->load->library('pagination');
		//$this->load->library('upload');
		isAuthenticate();
	}
	
	public function index()
	{
		$data['adminID']   	 	  = $this->session->userdata('adminID');
		$data['usertype']    	  = $this->session->userdata('usertype');
		$data['success']     	  = $this->session->userdata('msg');
		
		$data['baseinformation'] = $this->M_cloud->basicall('basic_manage', 'bsId desc');
		$data['authorsList'] = $this->M_cloud->findAll('authors_manage', 'auId desc');
		
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/authorsPage', $data);
	}
	
	
	
	public function store()
	{
	
		$id = $this->input->post('id');
	
		$data['auType']	    	= $this->input->post('auType');
		$data['auName']	    	= $this->input->post('auName');
		$data['auDesignation']	= $this->input->post('auDesignation');
		$data['status']	    	= $this->input->post('status');
		
		  if(!empty($id)){
				$where = array('auId' => $id);
			    $productListEditInfo 	     = $this->M_cloud->find('authors_manage', $where);
				$this->M_cloud->updateAll('authors_manage', $data, array('auId' => $id));
				$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
			} else {
			 
			$this->M_cloud->save('authors_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
			}
		
		redirect('adminpanel/authors');
		
	}
	
	
	
	
	
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where      = array('auId' => $id);	
		$result 	= $this->M_cloud->find('authors_manage', $where);
		echo json_encode($result);
	}
	
	
	
	
	
	
	
	
	
	public function delete($comid)
	{
		$where = array('auId' => $comid);
		$result 	= $this->M_cloud->find('authors_manage', $where);
		$this->M_cloud->destroyAll('authors_manage', $where);
		
		redirect('adminpanel/authors');
	}
	
	
	
	
	
}


?>