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
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Contact Us
	</div>
    
    <div class="row partpadding1">
      <div class="col-md-6">
	  	<div style="padding:10px 0px 0px 0px; color:#999999; font-size:20px;">CONTACT INFORMATION</div>
		<div class="przoom6"><?php echo $baseinformation->addres; ?></div>
		<div class="przoom6"><?php echo $baseinformation->phone; ?></div>
		<div class="przoom6"><?php echo $baseinformation->eamil; ?></div>
		<div class="przoom6"><?php echo $baseinformation->website; ?></div>
		
	  </div>
	  <div class="col-md-6" style="background-color:#f9f9f9; padding:15px;">
	  	<div style="color:#999999; font-size:20px;">CONTACT US</div>
		<div style="color:#CCCCCC; padding-bottom:20px;">PLEASE LEAVE YOUR FEEDBACK.</div>
	  		<div>
                <form  action="<?php echo site_url("home/contactAction"); ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group"> Name
                    <input type="text" class="form-control" name="name" id="name"  placeholder="Name" required>
                  </div>
                  <div class="form-group"> Email
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="form-group"> Phone No
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Phone No">
                  </div>
                  <div class="form-group"> Subject
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                  </div>
                  <div class="form-group"> Message
                    <textarea name="comments" id="comments" cols="45" rows="5" class="form-control" placeholder="Comments" required> </textarea>
                  </div>
                  <button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;"><span>SUBMIT</span></button>
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
