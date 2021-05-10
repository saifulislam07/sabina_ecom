<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Temp extends CI_Controller {
	 static $helper   = array('url');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud', 'M_join'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->library(array('cart'));
		$this->load->library('form_validation');
		 $this->load->library('email');
		//$this->load->library('pagination');
		$this->load->library('upload');
		//$this->load->library('cart');
		//isAuthenticate();
		
	}
	
	public function index()
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where2                    		= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where2, 'contid asc');
		
		$where3                    		= array('status' =>'Active', 'type' =>'Lingerie');	  
		$data['sliderList']				= $this->M_cloud->tbWhObyResult('slide_manage', $where3, 'slId desc');
		$where4                    		= array('status' =>'Active', 'catid' =>'2');	  
		$data['allcategoryList']		= $this->M_cloud->tbWhRow('category_manage', $where4);
		$where5                    		= array('status' =>'Active', 'subcatposition' =>'Lingerie 1');	  
		$data['Lingerie1List']			= $this->M_cloud->tbWhRow('sub_category_manage', $where5);
		$where6                    		= array('status' =>'Active', 'subcatposition' =>'Lingerie 2');	  
		$data['Lingerie2List']			= $this->M_cloud->tbWhRow('sub_category_manage', $where6);
		$where7                    		= array('status' =>'Active', 'catid' =>'2');	  
		$data['subcatList']				= $this->M_cloud->tbWhObyResult('sub_category_manage', $where7, 'subcatid desc');
		
		$this->load->view('lingeriePage', $data);
	}

//==================================== cosmetics State ===========================================//	
public function cosmetics($onset)
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where2                    		= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where2, 'contid asc');
		
		$where3                    		= array('status' =>'Active', 'catid' =>'3');	  
		$data['subcatList']				= $this->M_cloud->tbWhObyResult('sub_category_manage', $where3, 'subcatid desc');
		$where4                    		= array('status' =>'Active', 'subcatposition' =>'Cosmetics 1');	  
		$data['cosmetics1List']			= $this->M_cloud->tbWhRow('sub_category_manage', $where4);
		$where5                    		= array('status' =>'Active', 'subcatposition' =>'Cosmetics 2');	  
		$data['cosmetics2List']			= $this->M_cloud->tbWhRow('sub_category_manage', $where5);
		$where6                    		= array('status' =>'Active', 'subcatposition' =>'Cosmetics 3');	  
		$data['cosmetics3List']			= $this->M_cloud->tbWhRow('sub_category_manage', $where6);
		$where7                    		= array('status' =>'Active', 'subcatposition' =>'Cosmetics 4');	  
		$data['cosmetics4List']			= $this->M_cloud->tbWhRow('sub_category_manage', $where7);
		$where8                    		= array('status' =>'Active', 'subcatid' =>$data['cosmetics1List']->subcatid);	  
		$data['pstn1proList']			= $this->M_cloud->tbOn2WhObyResult('products_manage', $where8, $onset, 'proid desc');
		$where9                    		= array('status' =>'Active', 'subcatid' =>$data['cosmetics3List']->subcatid);	  
		$data['pstn3proList']			= $this->M_cloud->tbOn2WhObyResult('products_manage', $where9, $onset, 'proid desc');
				
		$this->load->view('cosmeticsPage', $data);
	}
	
//==================================== shoes State ===========================================//	
public function shoes()
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where2                    		= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where2, 'contid asc');
		
		$where3                    		= array('status' =>'Active', 'type' =>'Shoes');	  
		$data['sliderList']				= $this->M_cloud->tbWhObyResult('slide_manage', $where3, 'slId desc');
		$where4                    		= array('status' =>'Active', 'subcatposition' =>'Shoes 1');	  
		$data['shoes1List']				= $this->M_cloud->tbWhRow('sub_category_manage', $where4);
		$where5                    		= array('status' =>'Active', 'subcatposition' =>'Shoes 2');	  
		$data['shoes2List']				= $this->M_cloud->tbWhRow('sub_category_manage', $where5);
		$where6                    		= array('status' =>'Active', 'subcatposition' =>'Shoes 3');	  
		$data['shoes3List']				= $this->M_cloud->tbWhRow('sub_category_manage', $where6);
		$data['shoesVideoList'] 		= $this->M_cloud->tbObyRow('shoes_video', 'embedcode desc');
		$where7                    		= array('status' =>'Active', 'catid' =>'4');	  
		$data['allshoesList']			= $this->M_cloud->tbWhObyResult('products_manage', $where7, 'proid desc');
		
		$this->load->view('shoesPage', $data);
	}

}
?>