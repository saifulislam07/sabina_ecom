<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('userLogin')) 
{
	function userLogin()
	{
		$_CI = &get_instance();
		$_CI->load->library(array('cart'));
		
		$email			= $_CI->input->post('email');
		$password		= $_CI->input->post('password');
		$pass_md5		= md5($password);
		
		// Registration from direct login
		if(empty($email))
		{
			$email		 	 = $_CI->session->userdata('email');
			$pass_md5		 = $_CI->session->userdata('password');
		}
		
		$UserDetails	= $_CI->M_cloud->tbWhRow('registration_manage', array('email' => $email));
	
		if( !empty($UserDetails) && $UserDetails->password == $pass_md5){
			
			$regid = $UserDetails->regid;
			$email = $UserDetails->email;
			setUserData($regid, $email);
			
			$rows = count($_CI->cart->contents());
			if(!empty($rows)){
				redirect('myAccount/deliveryAddress');
			}else {
				redirect('myAccount');
			}
		 
		} else {
			$_CI->session->set_userdata(array('invalidUser' => 'Your email or password is wrong!'));
			redirect('userlogin');
		}		
	}
}


// TO SET DATA IN Useremail SESSION FIELD

if ( ! function_exists('setUserData'))
{
	function setUserData($regid, $email)
	{
		$_CI = &get_instance();
		$userData	= array(
			'regid' => $regid, 'email' => $email
		);
		$_CI->session->set_userdata($userData);
	}
}


if ( ! function_exists('getUseremail'))
{
	function getUseremail()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('email');
	}
}

if ( ! function_exists('invalidUserData'))
{
	function invalidUserData()
	{
		setUserData(NULL,NULL);
	}
}

if ( ! function_exists('isActiveUser'))
{
	function isActiveUser()
	{
		return getUseremail() != NULL;
	}
}

if ( ! function_exists('isAuthenticate'))
{
	function isAuthenticate()
	{
		if(!isActiveUser()) {
			redirect('userlogin');	
		} else {
			return true;	
		}
	}
}

if ( ! function_exists('userLogout'))
{
	function userLogout()
	{
		$_CI = &get_instance();
		invalidUserData();
		if(!isActiveUser()){
			redirect('userlogin');
		}
	}
}

// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */