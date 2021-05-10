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
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Order History
	</div>
    
    <div class="row usrmnu1">
		<div class="col-md-3 padding0">
	  	<div class="usrmnu2">MY ACCOUNT</div>
		<div><a href="<?php echo site_url("myAccount"); ?>" class="usrmnu3">Account Information</a></div>
		<div><a href="<?php echo site_url("myAccount/orderHistory"); ?>" class="usrmnu3">Order History</a></div>
		<div><a href="<?php echo site_url("myAccount/passwordUpdate"); ?>" class="usrmnu3">Password Update</a></div>
		<div><a href="<?php echo site_url("userlogin/userLogoutAction"); ?>" class="usrmnu3">Log Out</a></div>
	  </div>
	  <div class="col-md-9">
	  	<div class="usrmnu2">ORDER HISTORY</div>
		<?php 
		if($orderdateList) { ?>
			<div class="row" style="background-color:#eeeeee; padding:10px 0px; margin:0px 1px; border-left:solid 1px #eeeeee; font-weight:bold;">
				<div class="col-md-7">Product</div>
				<div class="col-md-2">Order Date</div>
				<div class="col-md-1 padding0" align="right">Quantity</div>
				<div class="col-md-1" align="right">Price</div>
				<div class="col-md-1" align="right">Total</div>
			</div>
			<?php
				foreach($orderdateList as $v)
				{
				$invoiceno = $v->invoiceno;
			?>
			<?php
				$total = 0;
				$where4             = array('invoiceno' =>$invoiceno);	  
				$orderHistoryList	= $this->M_cloud->tbWhObyResult('order_details', $where4, 'invoiceno desc');
				foreach($orderHistoryList as $items)
				{
				$total = $total + $items->subtotal;
			?>
			<div class="row" style="border:solid 1px #eeeeee; padding:10px 0px; margin:0px 1px;  font-weight:normal;">
				<div class="col-md-7 padding0">
					<div class="col-md-2">
						<img  class="img-responsive" src="<?php echo base_url("uploads/".$items->proimage); ?>" title="<?php echo $items->proname; ?>" alt="<?php echo $items->proname; ?>" />
					</div>
					<div class="col-md-10">
						<div style="font-size:15px;"><?php echo $items->proname; ?></div>
						<div>Product Code : <?php echo $items->procode; ?></div>
						<div>Product Size : <?php echo $items->prosize; ?></div>
					</div>
				</div>
				<div class="col-md-2"><?php echo $items->orddtldate; ?></div>
				<div class="col-md-1 padding0" align="right"><?php echo $items->qty; ?></div>
				<div class="col-md-1" align="right"><?php echo $items->price; ?></div>
				<div class="col-md-1" align="right"><?php echo $items->subtotal; ?></div>
			</div>
			<?php } ?>
			
			<div class="row" style="background-color:#f9f9f9; padding:10px 0px; margin:0px 1px; text-align:right; font-weight:bold;">
				<div class="col-md-11">Subtotal :</div>
				<div class="col-md-1"><?php echo $total; ?></div>
			</div>
			<div class="row" style="background-color:#f3f3f3; padding:10px 0px; margin:0px 1px; text-align:right; font-weight:bold;">
				<div class="col-md-11">Estimated Shipping Cost :</div>
				<div class="col-md-1">100</div>
			</div>
			<?php $grandtotal = $total + 100; ?>
			<div class="row" style="background-color:#eeeeee; padding:10px 0px; margin:0px 1px 30px 1px; text-align:right; font-weight:bold;">
				<div class="col-md-11">Grand Total :</div>
				<div class="col-md-1"><?php echo $grandtotal; ?></div>
			</div>
			<?php } ?>
		<?php } else { ?>
			<div class="partpadding1 red" align="center">YOUR ORDER HISTORY IS EMPTY.</div>
		<?php } ?>
	  </div>
    </div>
	
    <!--- footer start --->
    <?php $this->load->view("footer"); ?>
  </div>
</div>
</body>
</html>
 