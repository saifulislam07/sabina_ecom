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
</style>


</head>
<body>
<div class="container-fluid">
  <div class="navbar-fixed-top">
    <?php $this->load->view("header"); ?>
  </div>
  <div class="container fixednavbar">
  	<div class="row mntitle1">
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Registration
	</div>
    
    <div class="row partpadding1">
      <div class="col-md-6">
	  	<div style="padding:10px 0px 0px 0px; color:#999999; font-size:20px;">LOGIN YOUR ACCOUNT</div>
		<div style="color:#CCCCCC; padding-bottom:20px;">If you already have an account with us, please go to the login page to login.</div>
		<div><a href="<?php echo site_url("home/login"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">LOGIN</a></div>
	  </div>
	  <div class="col-md-6" style="background-color:#f9f9f9; padding:15px;">
	  	<div style="color:#999999; font-size:20px;">REGISTRATION</div>
		<div style="color:#CCCCCC; padding-bottom:20px;">Create your account.</div>
	  	<div>
		   <form action="<?php echo site_url("home/registrationAction"); ?>" method="post" enctype="multipart/form-data">
			<div class="group">      
			  <input type="text" class="inputMaterial" name="name" id="name" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Your Name</label>
			</div>
			<div class="group">      
			  <input type="email" class="inputMaterial" name="email" id="email" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Email Address</label>
			  <span class="red"><?php if(!empty($meg1)){echo $meg1; } ?></span>
			</div>
			
			<div class="group">      
			  <input type="text" class="inputMaterial" name="phone" id="phone" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Phone Number</label>
			</div>
			<div class="group input-group">      
			  <input type="password" class="inputMaterial pwd" name="password" id="password" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Password</label>
			  <span class="input-group-btn" style="border-bottom:solid 1px #CCCCCC;">
				  <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
			  </span>
			</div>
			<div class="group input-group">      
			  <input type="password" class="inputMaterial pwd2" id="confirmPassword" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Confirm Password</label>
			  <span class="input-group-btn" style="border-bottom:solid 1px #CCCCCC;">
				  <button class="btn btn-default reveal2" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
			  </span>
			</div>
			<span class="meg"></span>
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
<!--------------------- Password view eys start ------------------------>
	 $(".reveal").mousedown(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'text'));
	})
	.mouseup(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
	})
	.mouseout(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
	});
<!------------------------ Password view eys 2 start -------------------->
	$(".reveal2").mousedown(function() {
		$(".pwd2").replaceWith($('.pwd2').clone().attr('type', 'text'));
	})
	.mouseup(function() {
		$(".pwd2").replaceWith($('.pwd2').clone().attr('type', 'password'));
	})
	.mouseout(function() {
		$(".pwd2").replaceWith($('.pwd2').clone().attr('type', 'password'));
	});
<!----------------------- Password view eys end --------------------------->

<!----------------------- confirmPassword start --------------------------->
$("#confirmPassword").on('keyup', function(){
		var password = $("#password").val();
		var confirmPassword = $("#confirmPassword").val();
		
		if(confirmPassword == ""){
		$(".meg").text("");
			} else {
			
			if(password == confirmPassword){
				$(".meg").text("");
				$(".abc").removeAttr('disabled', 'disabled');
			} else {
				$(".meg").text("Password and confirm password do not match!");
				$(".abc").attr('disabled', 'disabled');
				return false;
			}
		}
	});
	
<!----------------------- check email in database start --------------------------->
$("#email").on('keyup', function(){
		var email = $(this).val();
		var cruneturl  = "<?php echo site_url('home/checkemail'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{email:email},
			success:function(data){
				if(data == 1){
				$(".red").text("Email already exists. please try again.");
				//$(".abc").attr('disabled', 'disabled');
				return false;
				} else {
				$(".red").text("");
				//$(".abc").removeAttr('disabled', 'disabled');
				}
			}
		});
	});
</script>
