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
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Password Update
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
	  	<div class="usrmnu2">PASSWORD UPDATE</div>
	  	<div class="row usrmnu5">
		   <form action="<?php echo site_url("myAccount/userpasswordUpdateAction"); ?>" method="post" enctype="multipart/form-data">
			<div class="group input-group">      
			  <input type="password" class="inputMaterial pwd" name="oldpass" id="oldpass" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">Old Password</label>
			  <span class="input-group-btn" style="border-bottom:solid 1px #CCCCCC;">
				  <button class="btn btn-default reveal" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
			  </span>
			</div>
			<span class="alermeg" style="color:red;"></span>
			<div class="group input-group">      
			  <input type="password" class="inputMaterial pwd2" id="confirmPassword" name="password" id="password" autocomplete="off" required>
			  <span class="bar"></span>
			  <label class="upfxt">New Password</label>
			  <span class="input-group-btn" style="border-bottom:solid 1px #CCCCCC;">
				  <button class="btn btn-default reveal2" type="button"><i class="glyphicon glyphicon-eye-open"></i></button>
			  </span>
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
 

<script>
<!---------------------- Password view eys start ------------------------->
	 $(".reveal").mousedown(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'text'));
	})
	.mouseup(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
	})
	.mouseout(function() {
		$(".pwd").replaceWith($('.pwd').clone().attr('type', 'password'));
	});

<!-------------------------- Password view eys 2 start ------------------------>
	$(".reveal2").mousedown(function() {
		$(".pwd2").replaceWith($('.pwd2').clone().attr('type', 'text'));
	})
	.mouseup(function() {
		$(".pwd2").replaceWith($('.pwd2').clone().attr('type', 'password'));
	})
	.mouseout(function() {
		$(".pwd2").replaceWith($('.pwd2').clone().attr('type', 'password'));
	});
<!------------------------- Password view eys end ------------------------->

<!------------------------- Old Password Check Start ------------------------->
$("#oldpass").on('keyup', function(){
		var oldpass = $(this).val();
		var cruneturl  = "<?php echo site_url('myAccount/checkpass'); ?>";
		$.ajax({
			url:cruneturl,
			type:"POST",
			data:{oldpass:oldpass},
			success:function(data){
				if(data == 1){
					$(".alermeg").text("");
					$(".abc").removeAttr('disabled', 'disabled');
				} else {
				$(".alermeg").text("Old password is wrong !");
				$(".abc").attr('disabled', 'disabled');
				}
			}
		});
	});
</script>
