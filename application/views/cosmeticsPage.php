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
		<div class="fixednavbar2">
			<!--- Position 1 start --->
			<div class="row">
				<div class="col-md-12 padding0">
					<figure class="snip0016" style="margin:0px;">
						<img class="img-responsive" src="<?php echo base_url("uploads/".$cosmetics1List->subcatimage); ?>" title="<?php echo $cosmetics1List->subcatname; ?>" alt="<?php echo $cosmetics1List->subcatname; ?>"/>
						<figcaption>
							<h2><?php echo $cosmetics1List->subcatname; ?></h2>
							<p><?php echo $cosmetics1List->subcattitle; ?></p>
							<a href="<?php echo base_url("home/subCategory/" . $cosmetics1List->subcatid); ?>"></a>
						</figcaption>			
					</figure>
				</div>
			</div>
			<!--- last pro & slider start --->
			<div class="row">
			<?php foreach($pstn1proList as $v) { ?>
			<div class="col-md-3 padding0">
				<div><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>"><img src="<?php echo base_url("uploads/".$v->proimage); ?>" alt="<?php echo $v->proname; ?>" height="350"></a><?php if($v->discount) { ?><span class="badge2"><?php echo $v->discount; ?>%</span><?php } else {?><?php } ?></div>
				<div class="ctpr1"><?php echo $v->proname; ?></div>
				<div class="ctpr2">
					Price : <?php echo $v->proprice; ?>TK &nbsp; <?php if(!$v->prooldprice == '0') { ?><span class="ctpr3"><?php echo $v->prooldprice; ?> TK</span><?php } ?>
				</div>
				<div class="ctpr4"><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="ctpr5">SHOP NOW</a></div>
			</div>
			<?php } ?>
			<div class="col-md-6 padding0">
				<div id="slider">
				  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
					<div class="carousel-inner" role="listbox">
						 <?php
							$i = 0; 
							foreach($subcatList as $v) {
							
							if($i == 0){
							$active = "active";
							} else {
							$active = "";
							}
						?> 
					  <div class="item <?php  echo $active; ?>"><a href="<?php echo base_url("home/subCategory/" . $v->subcatid); ?>" class="b-link-stroke b-animate-go"><img src="<?php echo base_url("uploads/".$v->subcatimage); ?>" style="height:500px;" alt="slideimage" class="center-block">
					  <div class="b-wrapper1">
							<p class="b-animate b-from-right"><?php echo $v->subcatname; ?></p>
							<label class="b-animate b-from-right"></label>
							<h3 class="b-animate b-from-left">SHOP COLLECTIONS ></h3>
						</div>
					  </a>
						<div class="carousel-caption">
						  <!-- <p><?php echo $v->subcatname; ?></p> --->
						</div>
					  </div>
					  <?php $i++; } ?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
					</div>
				</div>
			</div>
			</div>
			<!--- Position 2 3 start --->
			<div class="row">
				<div class="col-md-6 padding0">
					<a href="<?php echo base_url("home/subCategory/" . $cosmetics2List->subcatid); ?>" class="b-link-stroke b-animate-go">
						<img class="img-responsive" src="<?php echo base_url("uploads/".$cosmetics2List->subcatimage); ?>" title="<?php echo $cosmetics2List->subcatname; ?>" alt="<?php echo $cosmetics2List->subcatname; ?>" style="height:600px;"/>
						<div class="b-wrapper1">
							<p class="b-animate b-from-right"><?php echo $cosmetics2List->subcatname; ?></p>
							<label class="b-animate b-from-right"></label>
							<h3 class="b-animate b-from-left">All Products ></h3>
						</div>
					</a>
				</div>
				<div class="col-md-6 padding0">
					<figure class="snip0015">
						<img class="img-responsive" src="<?php echo base_url("uploads/".$cosmetics3List->subcatimage); ?>" title="<?php echo $cosmetics3List->subcatname; ?>" alt="<?php echo $cosmetics3List->subcatname; ?>" style="height:600px;">
						<figcaption>
							<h2>All Products</h2><a href="<?php echo site_url("home/subCategory/" . $cosmetics3List->subcatid); ?>"></a>
						</figcaption>			
					</figure>
				</div>
			</div>
			
			
			<!--- Sub Categories start --->
			<div class="row">
				<div class="col-md-6 padding0">
					<figure class="snip0016" style="margin-top:-5px;">
						<img class="img-responsive" src="<?php echo base_url("uploads/".$cosmetics4List->subcatimage); ?>" title="<?php echo $cosmetics4List->subcatname; ?>" alt="<?php echo $cosmetics4List->subcatname; ?>" style="height:500px;"/>
						<figcaption>
							<h2><?php echo $cosmetics4List->subcatname; ?></h2>
							<p><?php echo $cosmetics4List->subcattitle; ?></p>
							<a href="<?php echo base_url("home/subCategory/" . $cosmetics4List->subcatid); ?>"></a>
						</figcaption>			
					</figure>
				</div>
				<?php foreach($pstn3proList as $v) { ?>
					<div class="col-md-3 padding0">
						<div><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>"><img src="<?php echo base_url("uploads/".$v->proimage); ?>" alt="<?php echo $v->proname; ?>" height="350"></a><?php if($v->discount) { ?><span class="badge2"><?php echo $v->discount; ?>%</span><?php } else {?><?php } ?></div>
						<div class="ctpr1"><?php echo $v->proname; ?></div>
						<div class="ctpr2">
							Price : <?php echo $v->proprice; ?>TK &nbsp; <?php if(!$v->prooldprice == '0') { ?><span class="ctpr3"><?php echo $v->prooldprice; ?> TK</span><?php } ?>
						</div>
						<div class="ctpr4"><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="ctpr5">SHOP NOW</a></div>
					</div>
				<?php } ?>
			</div>
			<!--- footer start --->
			<div class="container">
			<?php $this->load->view("footer"); ?>
			</div>
		</div>
	</div>
</body>
</html>
