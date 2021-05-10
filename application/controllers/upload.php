<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

	static $model 	 = array();
	static $helper   = array('form');
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model(self::$model);
		$this->load->helper(self::$helper);
		$this->load->library('upload');
	}
	
	public function index($type = 0)
	{	
		$output = array();

		if($type == 'comlogo') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'slideimage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		
		}
		else if($type == 'catimage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'subcatimage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'contimage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'proimage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'proimage1') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'proimage2') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'proimage3') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'proimage4') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		else if($type == 'bndimage') {
		$config = array('upload_path' => './uploads/');
		$fileLocation = "uploads/";
		}
		
		
		
		
		
		else  {
			$config = array('upload_path' => './uploads/', 'max_size' => '10000');
			$fileLocation = "uploads/";
		}

		$config['allowed_types'] = 'PDF|pdf|gif|jpg|jpeg|png';
		$config['file_name'] 	 = time();

		$this->upload->initialize($config);

		if($this->upload->do_upload('attachment')) {
			$uploadData = $this->upload->data();
			$output['status'] = 'success';
			$output['fileLocation'] = $fileLocation.$uploadData['file_name'];
			$output['fileName'] 	= $uploadData['file_name'];
		} else {
			$output['status'] = 'failed';
			$output['message'] = $this->upload->display_errors('', '');
		}

		echo json_encode($output);
	}


	public function remove($type = 0)
	{	
		$fileName = $this->input->post('attachment');
		
		if($type == 'comlogo') {
			$fileLink = 'uploads/'.$fileName;
		}
		
		else if($type == 'slideimage') {
			$fileLink = 'uploads/'.$fileName;
		}
		else if($type == 'catimage') {
			$fileLink = 'uploads/'.$fileName;
		}
		else if($type == 'subcatimage') {
			$fileLink = 'uploads/'.$fileName;
		}
			else if($type == 'contimage') {
			$fileLink = 'uploads/'.$fileName;
		}
			else if($type == 'proimage') {
			$fileLink = 'uploads/'.$fileName;
		}
			else if($type == 'proimage1') {
			$fileLink = 'uploads/'.$fileName;
		}
		
			else if($type == 'proimage2') {
			$fileLink = 'uploads/'.$fileName;
		}
		
			else if($type == 'proimage3') {
			$fileLink = 'uploads/'.$fileName;
		}
		
			else if($type == 'proimage4') {
			$fileLink = 'uploads/'.$fileName;
		}
		
		else if($type == 'bndimage') {
			$fileLink = 'uploads/'.$fileName;
		}
		
		unlink($fileLink);
	}
}