<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyAccount extends CI_Controller {
	 static $helper   = array('url', 'user_helper');
	 public function __construct(){
		parent::__construct();
		$this->load->helper(self::$helper);
		$this->load->database();
		$this->load->model(array('M_cloud'));
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->library('session');
		$this->load->library('form_validation');
		$this->load->library(array('cart'));
		//$this->load->library('pagination');
		$this->load->library('upload');
		$this->load->library('email');
		$this->load->library('table');
		isAuthenticate();
		
	}
	
	public function index()
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where13                    	= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');
		
		$data['userinfo']	= $this->M_cloud->tbWhRow('registration_manage', array('regid' => $regid));
		$this->load->view('myAccountPage', $data);
	}
	
	public function deliveryAddress()
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where13                    	= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');
		
		$data['userinfo']	= $this->M_cloud->tbWhRow('registration_manage', array('regid' => $regid));
		
		if(!empty($data['rows'])) {
			$this->load->view('deliveryAddressPage', $data);
		} else {
			redirect('home/cartDetails');
		}
	}
	public function deliveryAddressSave()
	{
			$regid  			= $this->session->userdata('regid');
			
			$data['spname']  	= $this->input->post('spname');
			$data['spemail']  	= $this->input->post('spemail');
			$data['spphone']  	= $this->input->post('spphone');
			$data['spaddress']  = $this->input->post('spaddress');
			
			$this->db->update('registration_manage', $data, array('regid' => $regid));
			redirect('myAccount/paymentProcess');
	}
	
	public function paymentProcess()
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where2                    		= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where2, 'contid asc');
		
		$where3                    		= array('status' =>'Active', 'payinType' =>'Bank');	  
		$data['bankinfoList']			= $this->M_cloud->tbWhRow('payment_information', $where3);
		$where4                    		= array('status' =>'Active', 'payinType' =>'Bkash');	  
		$data['bkashList']				= $this->M_cloud->tbWhRow('payment_information', $where4);
		
		if(!empty($data['rows'])) {
			$this->load->view('paymentProcessPage', $data);
		} else {
			redirect('home/cartDetails');
		}
	}
	public function paymentProcessAction()
	{
		$data['regid'] 					= $this->session->userdata('regid');
		$data['orderdate'] 				= date('j-n-Y');
		$data['paymenttype'] 			= $this->input->post('paymenttype');
		$data['receiptnumber'] 			= $this->input->post('receiptnumber');
		$data['bankaccountnumber'] 		= $this->input->post('bankaccountnumber');
		$data['bankaccountname'] 		= $this->input->post('bankaccountname');
		$data['bankname'] 				= $this->input->post('bankname');
		$data['amount'] 				= $this->input->post('amount');
		$data['paymentdate'] 			= $this->input->post('paymentdate');
		
		$this->db->insert('customer_payment_information', $data);
		redirect('myAccount/orderConfirm');
	}
	public function orderConfirm()
	{
		$regid  						= $this->session->userdata('regid');
		
		$invoiceno   					= time();
		
		foreach ($this->cart->contents() as $items) {
			$data2['regid']   		= $regid;
			$data2['invoiceno']   	= $invoiceno;
			$data2['proid']   		= $items['proid'];
			$data2['proname']       = $items['name'];
			$data2['prosize']       = $items['prosize'];
			$data2['procode']       = $items['procode'];
			$data2['proimage']      = $items['proimage'];
			$data2['qty']        	= $items['qty'];
			$data2['price']         = $items['price'];
			$data2['subtotal']  	= $items['subtotal'];
			$data2['orderstatus']   = 'Pending';
			$data2['orddtldate']  	= date('j-n-Y');
			$this->db->insert('order_details', $data2);
			
			$where8                 = array('proid' =>$data2['proid']);	  
	  		$data3['qtyList']		= $this->M_cloud->tbWhRow('products_manage', $where8);
			$data4['quantity']  	= $data3['qtyList']->quantity - $data2['qty'];
	  		$this->db->update('products_manage', $data4, array('proid' => $data2['proid']));
		}
		
			$data5['invoiceno'] 			= $invoiceno;
			$data5['orderdate'] 			= date('j-n-Y');
			$data5['paymenttype'] 			= $this->input->post('paymenttype');
			$data5['receiptnumber'] 		= $this->input->post('receiptnumber');
			$data5['bankaccountnumber'] 	= $this->input->post('bankaccountnumber');
			$data5['bankaccountname'] 		= $this->input->post('bankaccountname');
			$data5['bankname'] 				= $this->input->post('bankname');
			$data5['amount'] 				= $this->input->post('amount');
			$data5['paymentdate'] 			= $this->input->post('paymentdate');
			$this->db->insert('customer_payment_information', $data5);
			
			
			
			$customerAddress = $this->M_cloud->tbWhRow('registration_manage', array('regid' => $regid));
			$cusEmail = $customerAddress->email;
				$senderEmail 	 = 'info@sabinasecret.com';
				$senderName 	 = 'Sabina Secret';
				$subject 		 = 'Customer Order Confirmation';
				
				$message = '<table width="800" align="center" cellpadding="0" cellspacing="0" style="background:#FFF">
  <tr>
    <td height="50" align="center" valign="middle" bgcolor="#000000"><span style="font-style: italic; font-size: 28px; color: #FFFFFF; text-align:center;">SABINA SECRET</span></td>
  </tr>
  <tr>
    <td height="40" bgcolor="#CCCCCC" style="color:#333333; font-size:16px; font-weight:bold;">&nbsp; ORDER CONFIRMATION</td>
  </tr>
  <tr>
    <td><table width="800" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="30" colspan="2" bgcolor="#f7f7f7">&nbsp; <strong>Billing Address</strong></td>
    <td height="30" colspan="2" bgcolor="#f7f7f7">&nbsp; <strong>Shipping Address</strong></td>
    </tr>
  <tr>
    <td width="70">&nbsp; Name</td>
    <td width="330">:&nbsp; ';
								$message .= $customerAddress->name;
								$message .= '</td>
    <td width="70">&nbsp; Name</td>
    <td width="330">:&nbsp; ';
								$message .= $customerAddress->spname;
								$message .= '</td>
  </tr>
  <tr>
    <td>&nbsp; Email</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->email;
								$message .= '</td>
    <td>&nbsp; Email</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->spemail;
								$message .= '</td>
  </tr>
  <tr>
    <td>&nbsp; Phone</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->phone;
								$message .= '</td>
    <td>&nbsp; Phone</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->spphone;
								$message .= '</td>
  </tr>
  <tr>
    <td>&nbsp; Address</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->address;
								$message .= '</td>
    <td>&nbsp; Address</td>
    <td>:&nbsp; ';
								$message .= $customerAddress->spaddress;
								$message .= '</td>
  </tr>
</table>
</td>
  </tr>
  <tr>   
    <td align="center" valign="top"><table width="800" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#dddddd" style="border-radius:0px; padding:0px; margin-top:5px">
        <tr>
          <td height="40" colspan="6" align="center" valign="middle" bgcolor="#dddddd" style="color:#003; font-size:18px; font-family:Comic Sans MS, cursive">Your Shopping Cart Details</td>
        </tr>
        <tr>
          <td height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Products Name</span></td>
          <td width="120" height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Code</span></td>
          <td width="100" height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Size</span></td>
          <td width="71" height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Qty</span></td>
          <td width="100" height="30" align="left" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">&nbsp;Unit Price</span></td>
          <td width="100" height="30" align="right" valign="middle" bgcolor="#f6f6f6"><span style="font-size:14px">Total &nbsp;</span></td>
        </tr>
        ';
        
        
        $grandtotal = $this->cart->total() + 100;
        $allcart = $this->cart->contents();
        foreach ($allcart as $items){ 
        $message .= '
        <tr>
          <td width="290" height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['name'];
          $message .= '</span></td>
          <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['procode'];
            $message .= '</span></td>
          <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['prosize'];
            $message .= '</span></td>
          <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['qty'];
            $message .= '</span></td>
          <td height="30" align="left" valign="middle" bgcolor="#FFFFFF">&nbsp;<span style="font-size:13px;">';
            $message .= $items['price'];
            $message .= '</span></td>
          <td height="30" align="right" valign="middle" bgcolor="#FFFFFF"><span style="font-size:13px;">';
            $message .= $items['subtotal'];
          $message .= '</span> &nbsp;</td>
        </tr>
        ';
        }
        
        $message .= '
      </table>
  </tr>
  <tr>
    <td align="center" valign="top"><table width="800" border="0" align="center" cellpadding="1" cellspacing="0">
        <tr>
          <td width="261" align="left" valign="middle">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;">Shipping Cost</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;">100 &nbsp;</td>
        </tr>
        <tr>
          <td width="261" align="left" valign="middle">&nbsp;</td>
          <td width="196" align="center" valign="middle">&nbsp;</td>
          <td width="59" align="center" valign="middle">&nbsp;</td>
          <td width="174" height="25" align="left" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;">Grand Total</td>
          <td width="100" align="right" valign="middle" style="border-top:2px solid #000000; font-size:13px; font-weight:bold;"> '.$grandtotal.'  &nbsp;</td>
        </tr>
        ';
        
        $message .= '
        <tr>
          <td align="left" valign="middle">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td align="center" valign="middle">&nbsp;</td>
          <td height="20" align="left" valign="middle">&nbsp;</td>
          <td align="right" valign="middle">&nbsp;</td>
        </tr>
      </table>
  </tr>
  <tr>
    <td height="50" align="center" valign="middle" bgcolor="#000000"><span style="font-style: italic; font-size: 14px; color: #FFFFFF; text-align:center;">www.sabinasecret.com</span></td>
  </tr>
</table>';
				
				$config = array(
				'mailtype' => 'html',
				'charset'  => 'utf-8',
				'priority' => '1'
				);
				$this->email->initialize($config);	
				$this->email->from($senderEmail, $senderName);
				$this->email->to($cusEmail);	
				$this->email->subject($subject);
				$this->email->message($message);
				$this->email->send();
			
			
		
		$this->cart->destroy();
		redirect('myAccount/orderHistory');
	}
	
	public function orderHistory()
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where13                    	= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');
		
		$data['orderdateList']			= $this->M_cloud->thWhGpbyResult('order_details', array('regid' => $regid), 'invoiceno desc');	
		$this->load->view('orderHistoryPage', $data);
	}
	
	
	public function userinfoUpdateAction()
	{
	$regid  = $this->session->userdata('regid');
	
	$data['name']		= $this->input->post('name');
	//$data['email']		= $this->input->post('email');
	$data['phone']		= $this->input->post('phone');
	$data['address']	= $this->input->post('address');
	$this->db->update('registration_manage', $data, array('regid' => $regid));
	redirect('myAccount');
	}
	public function userspinfoUpdateAction()
	{
	$regid  = $this->session->userdata('regid');
	
	$data['spname']		= $this->input->post('spname');
	$data['spemail']	= $this->input->post('spemail');
	$data['spphone']	= $this->input->post('spphone');
	$data['spaddress']	= $this->input->post('spaddress');
	$this->db->update('registration_manage', $data, array('regid' => $regid));
	redirect('myAccount');
	}
	
	public function passwordUpdate()
	{
		$regid  						= $this->session->userdata('regid');
		$data['rows'] 					= count($this->cart->contents());
		$data['baseinformation'] 		= $this->M_cloud->tbObyRow('basic_manage', 'bsId desc');
		$where1                    		= array('status' =>'Active');	  
		$data['menuList']				= $this->M_cloud->tbWhObyResult('category_manage', $where1, 'catid asc');
		$where13                    	= array('status' =>'Active');	  
		$data['otherMenuList']			= $this->M_cloud->tbWhObyResult('content_manage', $where13, 'contid asc');
		
		$this->load->view('passwordUpdatePage', $data);
	}
	public function userpasswordUpdateAction()
	{	
		$regid  			= $this->session->userdata('regid');
		$oldpass 			= md5($this->input->post('oldpass'));
		$data['password'] 	= md5($this->input->post('password'));
		
		$result 		= $this->M_cloud->tbWhRow('registration_manage', array('regid' => $regid, 'password' => $oldpass));
		if($result) {
			$this->db->update('registration_manage', $data, array('regid' => $regid));
			redirect('userlogin/userLogoutAction');
		} else {
			redirect('myAccount/passwordUpdate');
		}
	}
	public function checkpass()
	{
		$regid 			= $this->session->userdata('regid');
		
		$oldpass 		= md5($this->input->post('oldpass'));
		$result 		= $this->M_cloud->tbWhRow('registration_manage', array('regid' => $regid, 'password' => $oldpass));
		if($result){
			echo true;
		} else {
			echo false;
		}
	}
}

?>