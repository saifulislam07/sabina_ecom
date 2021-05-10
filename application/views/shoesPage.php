<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $baseinformation->title; ?></title>
<link rel="stylesheet" href="<?php echo base_url("view_resource/css_2/productslider6.css"); ?>">

</head>
<body>
	<div class="container-fluid">
		<div class="navbar-fixed-top">
			<?php $this->load->view("header"); ?>
		</div>
		<div class="fixednavbar">
			<!--- Position 1 start --->
			<div class="row hdrli">
				<figure class="snip0016">
					<img class="img-responsive" src="<?php echo base_url("uploads/".$shoes1List->subcatimage); ?>" title="<?php echo $shoes1List->subcatname; ?>" alt="<?php echo $shoes1List->subcatname; ?>"/>
					<figcaption>
						<h2><?php echo $shoes1List->subcatname; ?></h2>
						<p><?php echo $shoes1List->subcattitle; ?></p>
						<a href="<?php echo base_url("home/subCategory/" . $shoes1List->subcatid); ?>"></a>
					</figcaption>			
				</figure>
			</div>
			<!--- slider start --->
			<div class="row paddingb20">
				<div id="slider">
				  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
					<div class="carousel-inner" role="listbox">
						 <?php
							$i = 0; 
							foreach($sliderList as $v) {
							
							if($i == 0){
							$active = "active";
							} else {
							$active = "";
							}
						?> 
					  <div class="item <?php  echo $active; ?>"> <img src="<?php echo base_url("uploads/".$v->slideimage); ?>" alt="slideimage" class="center-block img-responsive">
						<div class="carousel-caption">
						  <p><?php echo $v->sltitle; ?></p>
						</div>
					  </div>
					  <?php $i++; } ?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
					</div>
				</div>
			</div>
			<!--- Position 2 start --->
			<div class="row paddingb20">
				<a href="<?php echo base_url("home/subCategory/" . $shoes2List->subcatid); ?>" class="b-link-stroke b-animate-go">
					<img class="img-responsive" src="<?php echo base_url("uploads/".$shoes2List->subcatimage); ?>" title="<?php echo $shoes2List->subcatname; ?>" alt="<?php echo $shoes2List->subcatname; ?>"/>
					<div class="b-wrapper1">
						<p class="b-animate b-from-right"><?php echo $shoes2List->subcatname; ?></p>
						<label class="b-animate b-from-right"></label>
						<h3 class="b-animate b-from-left">All Products ></h3>
					</div>
				</a>
			</div>
			<!--- Position 3 start --->
			<div class="row paddingb20">
				<figure class="snip0015">
					<img class="img-responsive" src="<?php echo base_url("uploads/".$shoes3List->subcatimage); ?>" title="<?php echo $shoes3List->subcatname; ?>" alt="<?php echo $shoes3List->subcatname; ?>">
					<figcaption>
						<h2>All Products</h2><a href="<?php echo site_url("home/subCategory/" . $shoes3List->subcatid); ?>"></a>
					</figcaption>			
				</figure>
			</div>
			
			<div class="row">
				<iframe width="100%" height="600" src="<?php echo $shoesVideoList->embedcode; ?>?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
			</div>
			
			<div class="przoom9">
				<!--- <div class="przoom10">ALL SHOES ITEMS</div> --->
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					  <div class="carousel carousel-showmanymoveone6 slide" id="itemslider6">
						<div class="carousel-inner">
						  <?php
							  $i = 0; 
							  foreach($allshoesList as $v) {
							
							  if($i == 0){
							  $active = "active";
							  } else {
							  $active = "";
							  }
						  ?> 
						  <div class="item <?php  echo $active; ?>">
							<div class="col-xs-12 col-sm-6 col-md-2">
							  <a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>"><img class="img-responsive center-block" src="<?php echo base_url("uploads/".$v->proimage); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a>
							  <?php if($v->discount) { ?>
							  <span class="badge"><?php echo $v->discount; ?>%</span>
							  <?php } else {?>
							  <?php } ?>
							  <h4 class="text-center"><?php echo $v->proname; ?></h4>
							  <h5 class="text-center"><?php echo $v->proprice; ?> TK</h5>
							  <?php if(!$v->prooldprice == '0') { ?>
							  	<h6 class="text-center prview5"><?php echo $v->prooldprice; ?> TK</h6>
							  <?php }else{ ?>
							  	<h6 class="text-center"></h6>
							  <?php } ?>
							</div>
						  </div>
						  <?php $i++; } ?>
						</div>
				
						<div id="slider-control">
						<a class="left carousel-control" href="#itemslider6" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
						<a class="right carousel-control" href="#itemslider6" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
					  </div>
					  </div>
					</div>
				  </div>
			</div>
			
			<div class="container">
			<?php $this->load->view("footer"); ?>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	<!--- products slider start --->
	$(document).ready(function(){
	
	$('#itemslider6').carousel({ interval: 3000 });
	
	$('.carousel-showmanymoveone6 .item').each(function(){
	var itemToClone = $(this);
	
	for (var i=1;i<6;i++) {
	itemToClone = itemToClone.next();
	
	if (!itemToClone.length) {
	itemToClone = $(this).siblings(':first');
	}
	
	itemToClone.children(':first-child').clone()
	.addClass("cloneditem-"+(i))
	.appendTo($(this));
	}
	});
	});
	<!--- products slider end --->
</script>