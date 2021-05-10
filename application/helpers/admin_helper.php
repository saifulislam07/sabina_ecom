<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('adminLogin')) 
{
	function adminLogin()
	{
		$_CI = &get_instance();
		
		$adminUsername		= $_CI->input->post('adminUsername');
		$adminPassword		= $_CI->input->post('adminPassword');
		$pass_md5			= md5($adminPassword);
		
		$UserDetails	= $_CI->M_cloud->tbWhRow('admin_manage', array('adminUsername' => $adminUsername));
	
		if( !empty($UserDetails) && $UserDetails->adminPassword == $pass_md5){
			
			$adminId = $UserDetails->adminId;
			$adminUsername = $UserDetails->adminUsername;
			setUserData($adminId, $adminUsername);
			redirect('adminpanel/dashborad');
		 
		} else {
			$_CI->session->set_userdata(array('invalidUser' => 'Username and password is wrong!'));
			redirect('adminlogin');
		}		
	}
}


// TO SET DATA IN UserName SESSION FIELD

if ( ! function_exists('setUserData'))
{
	function setUserData($adminId, $adminUsername)
	{
		$_CI = &get_instance();
		$userData	= array(
			'adminId' => $adminId, 'adminUsername' => $adminUsername
		);
		$_CI->session->set_userdata($userData);
	}
}


if ( ! function_exists('getUserName'))
{
	function getUserName()
	{
		$_CI = &get_instance();
		return $_CI->session->userdata('adminUsername');
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
		return getUserName() != NULL;
	}
}

if ( ! function_exists('isAuthenticate'))
{
	function isAuthenticate()
	{
		if(!isActiveUser()) {
			redirect('adminlogin');	
		} else {
			return true;	
		}
	}
}

if ( ! function_exists('adminLogout'))
{
	function adminLogout()
	{
		$_CI = &get_instance();
		invalidUserData();
		if(!isActiveUser()){
			redirect('adminlogin');
		}
	}
}

// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */