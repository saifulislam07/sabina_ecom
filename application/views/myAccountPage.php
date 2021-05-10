<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $baseinformation->title; ?></title>

</head>
<body>
<div class="container-fluid">
  <div class="navbar-fixed-top">
    <?php $this->load->view("header"); ?>
  </div>
  <div class="container fixednavbar">
  	<div class="row mntitle1">
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; My Account
	</div>
    
    <div class="row usrmnu1">
      <div class="col-md-3 padding0">
	  	<div class="usrmnu2">MY ACCOUNT</div>
		<div><a href="<?php echo site_url("myAccount"); ?>" class="usrmnu3">Account Information</a></div>
		<div><a href="<?php echo site_url("myAccount/orderHistory"); ?>" class="usrmnu3">Order History</a></div>
		<div><a href="<?php echo site_url("myAccount/passwordUpdate"); ?>" class="usrmnu3">Password Update</a></div>
		<div><a href="<?php echo site_url("userlogin/userLogoutAction"); ?>" class="usrmnu3">Log Out</a></div>
	  </div>
	  <div class="col-md-9 usrmnu4">
	  	<div class="usrmnu2">PERSONAL DETAILS</div>
	  	<div class="row usrmnu5">
		   <form action="<?php echo site_url("myAccount/userinfoUpdateAction"); ?>" method="post" enctype="multipart/form-data">
			   <div class="group">
			   		<label>Your Email <small style="color:#FF0000;">(You can't edit the email address.)</small></label>   
				  <input type="text" class="inputMaterial readonly" value="<?php echo $userinfo->email; ?>" readonly="text">
				</div>
			<div class="group">      
			  <input type="text" class="inputMaterial" name="name" id="name" value="<?php echo $userinfo->name; ?>" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Your Name</label>
			</div>
			<div class="group">      
			  <input type="text" class="inputMaterial" name="phone" id="phone" value="<?php echo $userinfo->phone; ?>" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Phone Number</label>
			</div>
			<div class="group">      
			  <input type="text" class="inputMaterial" name="address" id="address" value="<?php echo $userinfo->address; ?>" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Your Address</label>
			</div>
			<span class="meg"></span>
			<div><button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;"><span>UPDATE</span></button></div>
		  </form>
		</div>
		
		<div class="usrmnu6">BILLING/SHIPPING ADDRESSES</div>
	  	<div class="row usrmnu5">
		   <form action="<?php echo site_url("myAccount/userspinfoUpdateAction"); ?>" method="post" enctype="multipart/form-data">
			<div class="group">      
			  <input type="text" class="inputMaterial" name="spname" id="spname" value="<?php echo $userinfo->spname; ?>" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Your Name</label>
			</div>
			<div class="group">      
			  <input type="email" class="inputMaterial" name="spemail" id="spemail" value="<?php echo $userinfo->spemail; ?>" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Your Email</label>
			</div>
			<div class="group">      
			  <input type="text" class="inputMaterial" name="spphone" id="spphone" value="<?php echo $userinfo->spphone; ?>" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Phone Number</label>
			</div>
			<div class="group">      
			  <input type="text" class="inputMaterial" name="spaddress" id="spaddress" value="<?php echo $userinfo->spaddress; ?>" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Your Address</label>
			</div>
			<span class="meg"></span>
			<div><button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;"><span>UPDATE</span></button></div>
		  </form>
		</div>
	  </div>
    </div>
	
    <!--- footer start --->
    <?php $this->load->view("footer"); ?>
  </div>
</div>
</body>
</html>
