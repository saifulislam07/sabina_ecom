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
					<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; <?php echo $brandsNameList->bndname; ?>
				</div>
				<div class="col-md-6 padding0">
					
				</div>
			</div>
			
			<div class="row prview1">
				<?php foreach($productsList as $v) { ?>
				<div class="col-md-3">
				<div class="row prview2">
					<a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="proimg"><img class="img-responsive" src="<?php echo base_url("uploads/".$v->proimage); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a><?php if($v->discount) { ?><span class="badge2"><?php echo $v->discount; ?>%</span><?php } else {?><?php } ?><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="proimg hover"><img class="img-responsive" src="<?php echo base_url("uploads/".$v->proimage1); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a>
					<div class="prview3"><?php echo $v->proname; ?></div>
					<div>
						<div class="col-md-9 prview4"><?php echo $v->proprice; ?> TK &nbsp;&nbsp;<?php if(!$v->prooldprice == '0') { ?><span class="prview5"><?php echo $v->prooldprice; ?> TK</span><?php } ?></div>
						<div class="col-md-3 prview6"><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="prview7"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></div>
					</div>
				</div>
				</div>
				<?php } ?>
			</div>
			
			<!--- footer start --->
			<?php $this->load->view("footer"); ?>
		</div>
	</div>
</body>
</html>

