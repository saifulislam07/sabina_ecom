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
			<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Delivery Address
		</div>
		
		<form class="form-horizontal" action="<?php echo site_url("myAccount/deliveryAddressSave"); ?>" method="post" enctype="multipart/form-data"> 
		<div class="row" style="padding:15px 0px 10px 0px;">
			<div class="col-md-6">
			<div class="usrmnu2"><i class="fa fa-user" aria-hidden="true"></i> BILLING ADDRESS</div>
				<div style="padding-top:30px;">
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Your Name</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" readonly id="name" value="<?php echo $userinfo->name; ?>">
					</div>
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Email Address</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="email" class="form-control input-sm" readonly id="email" value="<?php echo $userinfo->email; ?>" >
					</div>
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Mobile Number</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" readonly id="phone" value="<?php echo $userinfo->phone; ?>">
					</div>
					
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Address</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <textarea class="form-control" rows="2" readonly id="address"><?php echo $userinfo->address; ?></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-6">
			<div class="usrmnu2"><i class="fa fa-truck" aria-hidden="true"></i> SHIPPING ADDRESS</div>
				<div>
					<div class="checkbox" style="padding-left:15px;">
						<label><input type="checkbox" id="willbsame">Shipping address will be same.</label>
					</div>
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Your Name</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" name="spname" id="spname" value="<?php echo $userinfo->spname; ?>" placeholder="Your Name *" required>
					</div>
					
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Email Address</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="email" class="form-control input-sm" name="spemail" id="spemail" value="<?php echo $userinfo->spemail; ?>" placeholder="Email Address *" required>
					</div>
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Mobile Number</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" name="spphone" id="spphone" value="<?php echo $userinfo->spphone; ?>" placeholder="Phone Number *" required>
					</div>
					
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Address</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <textarea class="form-control" rows="2" name="spaddress" id="spaddress" value="" placeholder="Shipping Address"><?php echo $userinfo->spaddress; ?></textarea>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="padding:0px 30px 50px 0px; text-align:right;">
			<button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;">SAVE & CONTINUE</button>
			</div>
		</form>
		
		<!--- footer start --->
		<?php $this->load->view("footer"); ?>
	  </div>
	</div>
</body>
</html>
 

<script>
<!---------------------- will be same start ------------------------->
$(document).ready(function() {	 
  $('#willbsame').on('click', function ()
	{
		if ($(this).is(':checked') ) {
            $('#spname').val($('#name').val());
			$('#spemail').val($('#email').val());
			$('#spphone').val($('#phone').val());
			$('#spaddress').val($('#address').val());
        } else {
			$('#spname').val('');
			$('#spemail').val('');
			$('#spphone').val('');
			$('#spaddress').val('');
        }
 	});
});
</script>
