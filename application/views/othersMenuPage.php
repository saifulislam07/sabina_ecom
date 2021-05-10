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
			<!--- sub category start --->
			<div class="row mntitle1">
				<div class="col-md-6 padding0">
					<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; <?php echo $otherMenuDetailsList->menuname; ?>
				</div>
				<div class="col-md-6 padding0">
					
				</div>
			</div>
			
			<div class="row prview1">
				<?php if(!$otherMenuDetailsList->contimage == '') { ?>
				<div style="padding:10px 0px;"><img class="img-responsive" src="<?php echo base_url("uploads/".$otherMenuDetailsList->contimage); ?>" title="<?php echo $otherMenuDetailsList->menuname; ?>" alt="<?php echo $otherMenuDetailsList->menuname; ?>"/></div>
				<?php } ?>
				<div style="color:#666666; font-size:16px; padding-bottom:10px;"><?php echo $otherMenuDetailsList->conttitle; ?></div>
				<div style="color:#999999; font-weight:normal; text-align:justify;"><?php echo $otherMenuDetailsList->contdetails; ?></div>
				
			</div>
			
			<!--- footer start --->
			<?php $this->load->view("footer"); ?>
		</div>
	</div>
</body>
</html>

