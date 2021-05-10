<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $baseinformation->title; ?></title>
<style>
.meg {
color:#FF0000;
}
.meg1 {
color:#FF0000;
}
</style>


</head>
<body>
<div class="container-fluid">
  <div class="navbar-fixed-top">
    <?php $this->load->view("header"); ?>
  </div>
  <div class="container fixednavbar">
  	<div class="row mntitle1">
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Forgotten Password
	</div>
    
    <div class="row partpadding1">
      <div class="col-md-6">
	  	<div style="padding:10px 0px 0px 0px; color:#999999; font-size:20px;">LOGIN YOUR ACCOUNT</div>
		<div style="color:#CCCCCC; padding-bottom:20px;">If you already have an account with us, please go to the login page to login.</div>
		<div><a href="<?php echo site_url("home/login"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">LOGIN</a></div>
	  </div>
	  <div class="col-md-6" style="background-color:#f9f9f9; padding:15px;">
	  	<div style="color:#999999; font-size:20px;">FORGOT YOUR PASSWORD</div>
		<div style="color:#CCCCCC; padding-bottom:20px;">Submit the email address associated with your account. You will receive the password through mail.</div>
	  	<div>
		   <form action="<?php echo site_url("home/forgottenPasswordAction"); ?>" method="post" enctype="multipart/form-data">
			<div class="group">      
			  <input type="email" class="inputMaterial" name="email" id="email" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Email Address</label>
			  <span class="red"><?php if(!empty($fgtpassalt)){echo $fgtpassalt; } ?></span>
			</div>
			<span class="meg red"></span>
			<div><button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;"><span>SUBMIT</span></button></div>
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
 

<script>
<!----------------------- check email in database start --------------------------->
$("#email").on('keyup', function(){
		var email = $(this).val();
		var cruneturl  = "<?php echo site_url('home/checkfgtpassemail'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{email:email},
			success:function(data){
				if(data == 1){
				$(".red").text("Your email address is Wrong!");
				$(".abc").attr('disabled', 'disabled');
				return false;
				} else {
				$(".red").text("");
				$(".abc").removeAttr('disabled', 'disabled');
				}
			}
		});
	});
	
</script>
