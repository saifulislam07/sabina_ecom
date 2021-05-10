<div class="row ft1">
	<div class="col-md-3 padding0">
		<div  class="ft2">CUSTOMER SERVICES</div>
		<div><a href="<?php echo site_url("home/contact"); ?>" class="ft3">Contact Us</a></div>
		<?php
		$regid  = $this->session->userdata('regid');
		if(!empty($regid)) { ?>
		<div><a href="<?php echo site_url("myAccount"); ?>" class="ft3">My Account</a></div>
		<div><a href="<?php echo site_url("home/cartDetails"); ?>" class="ft3">My Bag <?php if(!empty($rows)) { ?><span class="cartitems"><?php echo $rows; ?></span><?php } ?> Items</a></div>
		<div><a href="<?php echo site_url("myAccount/orderHistory"); ?>" class="ft3">Order History</a></div>
		<div><a href="<?php echo site_url("userlogin/userLogoutAction"); ?>" class="ft3">Log Out</a></div>
		<?php } else { ?>
		<div><a href="<?php echo site_url("home/registration"); ?>" class="ft3">Registration</a></div>
		<div><a href="<?php echo site_url("home/login"); ?>" class="ft3">Login</a></div>
		<div><a href="<?php echo site_url("home/forgottenPassword"); ?>" class="ft3">Forgotten Password</a></div>
		<?php } ?>
	</div>
	<div class="col-md-3 padding0">
		<div  class="ft2">ABOUT SABINA SECRET</div>
		<?php foreach($otherMenuList as $v) { ?>
		<div><a href="<?php echo site_url("home/othersMenu/" . $v->contid); ?>" class="ft3"><?php echo $v->menuname; ?></a></div>
		 <?php } ?>
		</div>
	<div class="col-md-3 padding0">
		<div class="ft2">MEET US ON</div>
		<div class="ft4"><a href="#" class="ft3"><i class="fa fa-facebook fb" aria-hidden="true"></i> Facebook</a></div>
		<div class="ft4"><a href="#" class="ft3"><i class="fa fa-twitter tw" aria-hidden="true"></i> Twitter</a></div>
		<div class="ft4"><a href="#" class="ft3"><i class="fa fa-google-plus gp" aria-hidden="true"></i> Google Plus</a></div>
		<div class="ft4"><a href="#" class="ft3"><i class="fa fa-skype sp" aria-hidden="true"></i> Skype</a></div>
	</div>
	<div class="col-md-3 padding0">
		<div  class="ft2">PAYMENT</div>
		<div>
			<div class="col-md-4 col-xs-4 ft5"><img class="img-responsive" src="<?php echo base_url("uploads/pm2.png"); ?>" title="Sabina Secret" alt="Sabina Secret"/></div>
			<div class="col-md-4 col-xs-4 ft5"><img class="img-responsive" src="<?php echo base_url("uploads/pm3.png"); ?>" title="Sabina Secret" alt="Sabina Secret"/></div>
			<div class="col-md-4 col-xs-4 ft5"><img class="img-responsive" src="<?php echo base_url("uploads/pm5.png"); ?>" title="Sabina Secret" alt="Sabina Secret"/></div>
		</div>
		<div>
			<div class="col-md-4 col-xs-4 ft5"><img class="img-responsive" src="<?php echo base_url("uploads/pm6.png"); ?>" title="Sabina Secret" alt="Sabina Secret"/></div>
			<div class="col-md-4 col-xs-4 ft5"><img class="img-responsive" src="<?php echo base_url("uploads/pm1.png"); ?>" title="Sabina Secret" alt="Sabina Secret"/></div>
			<div class="col-md-4 col-xs-4 ft5"><img class="img-responsive" src="<?php echo base_url("uploads/pm4.png"); ?>" title="Sabina Secret" alt="Sabina Secret"/></div>
		</div>
	</div>
</div>
		
<div class="row ft6">
	<div class="ft7" align="center">
		&copy; Copyright 2017 Sabina Secret. All right reserved.
	</div>
	<div class="ft7" align="center">
		<a class="ft3" href="http://sawebsoft.com">Design & Development by S A WEBSOFT.</a>
	</div>
</div>