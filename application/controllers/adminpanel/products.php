<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
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
		//$data['subCategoryList'] 		= $this->M_cloud->tbObyResult('sub_category_manage', 'subcatid desc');
		$data['brandList'] 				= $this->M_cloud->tbObyResult('brands_manage', 'bndid desc');
		$data['productsList'] 			= $this->m_join->products_M('products_manage', 'proid desc');
		$this->session->set_userdata(array('msg' => ''));
		$this->load->view('adminpanel/productsPage', $data);
	}
	
	
	public function subName()
	{
		$catid = $this->input->post('id');
		
		$subCategoryList = $this->M_cloud->tbWhObyResult('sub_category_manage', array('catid' => $catid), 'subcatid asc');
		
		foreach($subCategoryList as $v)
		{
			echo '<option value="' . $v->subcatid . '">' . $v->subcatname . '</option>';
        }
	}
	
	
	public function subcatlistbycat()
	{
		$catid = $this->input->post('id');
		
		$subCategoryList = $this->M_cloud->tbWhObyResult('sub_category_manage', array('catid' => $catid), 'subcatid asc');
		
		echo
		"<select class='form-control' name='subcatid' id='subcatid' tabindex='2' required>
		  <option> --- Select Sub Category Name ---</option>";
		
		foreach($subCategoryList as $v)
		{
			echo '<option value="' . $v->subcatid . '">' . $v->subcatname . '</option>';
        }
		
		echo
		"</select>";
	}
	
		
	public function store()
	{
		$id = $this->input->post('id');
	
		$data['catid']	    		= $this->input->post('catid');
		$data['subcatid']	    	= $this->input->post('subcatid');
		$data['bndname']	    	= $this->input->post('bndname');
		$data['proname']	    	= $this->input->post('proname');
		$data['procode']	    	= $this->input->post('procode');
		$prosize	    			= $this->input->post('prosize');
		$data['prosize'] 			= preg_replace('/[^A-Za-z0-9\-]/', '-', $prosize);
		$colorname	    			= $this->input->post('colorname');
		$data['colorname'] 			= preg_replace('/[^A-Za-z0-9\-]/', '-', $colorname);
		$data['colorcode']	    	= $this->input->post('colorcode');
		$data['quantity']	    	= $this->input->post('quantity');
		$data['discount']	    	= $this->input->post('discount');
		$data['prooldprice']	    = $this->input->post('prooldprice');
		$data['proprice']	    	= $this->input->post('proprice');
		$data['embedcode']	    	= $this->input->post('embedcode');
		$data['status']	    		= $this->input->post('status');	
		$data['prodetails']	    	= $this->input->post('prodetails');
		$proimage		    		= $this->input->post('proimage');
		$proimage1		    		= $this->input->post('proimage1');
		$proimage2		    		= $this->input->post('proimage2');
		$proimage3		    		= $this->input->post('proimage3');
		$proimage4		    		= $this->input->post('proimage4');
		
		
		if(!empty($proimage)){
			$data['proimage'] = $proimage;
		}
		if(!empty($proimage1)){
			$data['proimage1'] = $proimage1;
		}
		if(!empty($proimage2)){
			$data['proimage2'] = $proimage2;
		}
		if(!empty($proimage3)){
			$data['proimage3'] = $proimage3;
		}
		if(!empty($proimage4)){
			$data['proimage4'] = $proimage4;
		}
		
		if(!empty($id)){
			$where = array('proid' => $id);
			$productListEditInfo 	     = $this->M_cloud->tbWhRow('products_manage', $where);
			
			if(!empty($productListEditInfo->proimage) && file_exists('uploads/'.$productListEditInfo->proimage) && !empty($proimage))
			{					
			unlink('uploads/'.$productListEditInfo->proimage);
			}
			if(!empty($productListEditInfo->proimage1) && file_exists('uploads/'.$productListEditInfo->proimage1) && !empty($proimage1))
			{					
			unlink('uploads/'.$productListEditInfo->proimage1);
			}
			if(!empty($productListEditInfo->proimage2) && file_exists('uploads/'.$productListEditInfo->proimage2) && !empty($proimage2))
			{					
			unlink('uploads/'.$productListEditInfo->proimage2);
			}
			if(!empty($productListEditInfo->proimage3) && file_exists('uploads/'.$productListEditInfo->proimage3) && !empty($proimage3))
			{					
			unlink('uploads/'.$productListEditInfo->proimage3);
			}
			if(!empty($productListEditInfo->proimage4) && file_exists('uploads/'.$productListEditInfo->proimage4) && !empty($proimage4))
			{					
			unlink('uploads/'.$productListEditInfo->proimage4);
			}
			$this->M_cloud->updateAll('products_manage', $data, array('proid' => $id));
			$this->session->set_userdata(array('msg' => 'Data has been updated successfully.'));
		}else{
			$this->M_cloud->save('products_manage', $data);
			$this->session->set_userdata(array('msg' => 'Data has been saved successfully.'));
		}
		redirect('adminpanel/products');
	}
	
	public function updated()
	{
		$id 		= $this->input->post('id');	
		$where   	= array('proid' => $id);	
		$result 	= $this->M_cloud->tbWhRow('products_manage', $where);
		echo json_encode($result);
	}
	
	public function delete($comid)
	{
		$where 		= array('proid' => $comid);
		$result 	= $this->M_cloud->tbWhRow('products_manage', $where);
		if(!empty($result->proimage) && file_exists('uploads/'.$result->proimage))
		{					
			unlink('uploads/'.$result->proimage);	
		}
		if(!empty($result->proimage1) && file_exists('uploads/'.$result->proimage1))
		{					
			unlink('uploads/'.$result->proimage1);	
		}
		if(!empty($result->proimage2) && file_exists('uploads/'.$result->proimage2))
		{					
			unlink('uploads/'.$result->proimage2);	
		}
		if(!empty($result->proimage3) && file_exists('uploads/'.$result->proimage3))
		{					
			unlink('uploads/'.$result->proimage3);	
		}
		if(!empty($result->proimage4) && file_exists('uploads/'.$result->proimage4))
		{					
			unlink('uploads/'.$result->proimage4);	
		}
		$this->M_cloud->destroyAll('products_manage', $where);
		redirect('adminpanel/products');
	}
}
?>