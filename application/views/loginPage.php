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
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Login
	</div>
    
    <div class="row partpadding1">
      <div class="col-md-6">
	  	<div style="padding:10px 0px 0px 0px; color:#999999; font-size:20px;">CREATE A NEW ACCOUNT</div>
		<div style="color:#CCCCCC; padding-bottom:20px;">If you have't an account with us, please go to the register page to Registration.</div>
		<div><a href="<?php echo site_url("home/registration"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">REGISTER</a></div>
	  </div>
	  <div class="col-md-6" style="background-color:#f9f9f9; padding:15px;">
	  	<div style="color:#999999; font-size:20px;">ACCOUNT LOGIN</div>
		<div style="color:#CCCCCC; padding-bottom:20px;">I'm already registered.</div>
	  	<div>
		   <form action="<?php echo site_url("userlogin/userLoginAction"); ?>" method="post" enctype="multipart/form-data">
			<div class="group">      
			  <input class="inputMaterial" type="email" name="email" id="email" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Email Address</label>
			</div>
			<div class="group input-group">      
			  <input class="inputMaterial pwd" type="password" name="password" id="password" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Password</label>
			  <span class="input-group-btn" style="border-bottom:solid 1px #CCCCCC;">
				  <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
			  </span>
			</div>
			<div style="color:red; font-weight:900;"><?php if(!empty($invalidUser)){echo $invalidUser; } ?></div>
			<div><button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;"><span>Login</span></button></div>
		  </form>
		</div>
		<div style="padding-top:10px;">
			<a href="<?php echo site_url("home/forgottenPassword"); ?>" class="ft3">Forgot your password?</a>
		</div>
	  </div>
    </div>
	
    <!--- footer start --->
    <?php $this->load->view("footer"); ?>
  </div>
</div>
</body>
</html>
 

<script>
<!--- Password view eys start --->
	 $(".reveal").mousedown(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'text'));
	})
	.mouseup(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
	})
	.mouseout(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
	});
<!--- Password view eys end --->
</script>
