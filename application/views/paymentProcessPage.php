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
			<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Payment Process
		</div>
		
		<div class="row" style="padding:15px 0px 10px 0px;">
			
		  <ul class="nav nav-justified paymenu">
			<li class="active"><a data-toggle="tab" href="#home">Cash On Delivery</a></li>
			<li><a data-toggle="tab" href="#menu1">Bank Payment</a></li>
			<li><a data-toggle="tab" href="#menu2">BKash Payment</a></li>
		  </ul>
		  
		  <div class="tab-content">
			<div id="home" class="tab-pane fade in active">
			  <div style="padding:20px 0px 10px 0px; font-size:16px;">Payment Information :</div>
			  <div>You can place your order without making payment now. Payment will be collected during the delivery of the product. To process your order we need your valid contact information.</div>
			  <form class="form-horizontal" action="<?php echo site_url("myAccount/orderConfirm"); ?>" method="post" enctype="multipart/form-data">
			  	<input type="hidden" name="paymenttype" id="paymenttype" value="Cash on delivery" />
			  <div align="right" style="padding-bottom:30px;">
					<button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;">CONFIRM ORDER</button>
			  </div>
			  </form>
			</div>
			
			<div id="menu1" class="tab-pane fade">
			<div class="col-md-8">
			  <div style="padding:20px 0px 10px 0px; font-size:16px;">Fill up this form by your bank payment details :</div>
			  <form class="form-horizontal" action="<?php echo site_url("myAccount/orderConfirm"); ?>" method="post" enctype="multipart/form-data">
			  <input type="hidden" name="paymenttype" id="paymenttype" value="Bank" />
				<div>
					<div class="row">
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Receipt Number</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" name="receiptnumber" id="receiptnumber" placeholder="Receipt Number">
					</div>
					</div>
					
					<div class="row">
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Bank Account Number</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" name="bankaccountnumber" id="bankaccountnumber" placeholder="Bank Account Number" required>
					</div>
					</div>
					
					<div class="row">
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Bank Account Name</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" name="bankaccountname" id="bankaccountname" placeholder="Bank Account Name" required>
					</div>
					</div>
					
					<div class="row">
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Bank Name</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" name="bankname" id="bankname" placeholder="Bank Name">
					</div>
					</div>
					
					<div class="row">
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Amount</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					  <input type="text" class="form-control input-sm" name="amount" id="amount" placeholder="Amount" required>
					</div>
					</div>
					
					<div class="row">
					<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Payment Date</span>
					<div class="col-md-8" style="padding-bottom:10px;">
					<input id="paymentdate" name="paymentdate" class="form-control input-sm" type="text" placeholder="DD-MM-YYYY" required>
					</div>
					</div>
				</div>
				<div align="right" style="padding-bottom:30px;">
					<button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;">CONFIRM ORDER</button>
			    </div>
			  </form>
			  </div>
			  <div class="col-md-4">
				<div style="padding:20px 0px 10px 0px; font-size:16px;">Our Bank Information :</div>
				<div style="text-align:justify; font-size:13px; color:#666666;"><?php echo $bankinfoList->paymentInfo; ?></div>
			  </div>
			</div>
			
			<div id="menu2" class="tab-pane fade">
				<div class="col-md-8">
				<div style="padding:20px 0px 10px 0px; font-size:16px;">Fill up this form by your Bkash payment details :</div>
					<form class="form-horizontal" action="<?php echo site_url("myAccount/orderConfirm"); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" name="paymenttype" id="paymenttype" value="Bkash" />
					<div>
						<div class="row">
						<span class="col-md-4 control-label" style="text-align:left; color:#666666;">BKash Phone Number</span>
						<div class="col-md-8" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="bankaccountnumber" id="bankaccountnumber" placeholder="BKash Phone Number" required>
						</div>
						</div>
						
						<div class="row">
						<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Amount</span>
						<div class="col-md-8" style="padding-bottom:10px;">
						  <input type="text" class="form-control input-sm" name="amount" id="amount" placeholder="Amount" required>
						</div>
						</div>
						
						<div class="row">
						<span class="col-md-4 control-label" style="text-align:left; color:#666666;">Payment Date</span>
						<div class="col-md-8" style="padding-bottom:10px;">
						<input id="paymentdate" class="form-control input-sm" type="text" placeholder="DD-MM-YYYY" name="paymentdate" required>
						</div>
						</div>
					</div>
					<div align="right" style="padding-bottom:30px;">
						<button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;">CONFIRM ORDER</button>
					</div>
					</form>
				</div>
				<div class="col-md-4">
				<div style="padding:20px 0px 10px 0px; font-size:16px;">Our Bkash Information :</div>
				<div style="text-align:justify; font-size:13px; color:#666666;"><?php echo $bkashList->paymentInfo; ?></div>
			  </div>
			</div>
		  </div>

		</div>
		
		<!--- footer start --->
		<?php $this->load->view("footer"); ?>
	  </div>
	</div>
</body>
</html>
 