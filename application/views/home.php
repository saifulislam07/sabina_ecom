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
			<!--- slider start --->
			<div class="row">
				<?php $this->load->view("slider"); ?>
			</div>
			<!--- This Week's Highlights start --->
			<div class="row partpadding1">
				<div class="row titlebar1">This Week's Highlights</div>
				<div class="row">
					<div class="col-md-5">
						<figure class="snip0016">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation1List->subcatimage); ?>" title="<?php echo $subcatPosation1List->subcatname; ?>" alt="<?php echo $subcatPosation1List->subcatname; ?>"/>
							<figcaption>
								<h2><?php echo $subcatPosation1List->subcatname; ?></h2>
								<p><?php echo $subcatPosation1List->subcattitle; ?></p>
								<a href="<?php echo base_url("home/subCategory/" . $subcatPosation1List->subcatid); ?>"></a>
							</figcaption>			
						</figure>
					</div>
					<div class="col-md-7">
						<figure class="snip0016">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation2List->subcatimage); ?>" title="<?php echo $subcatPosation2List->subcatname; ?>" alt="<?php echo $subcatPosation2List->subcatname; ?>" height="100%"/>
							<figcaption>
								<h2><?php echo $subcatPosation2List->subcatname; ?></h2>
								<p><?php echo $subcatPosation2List->subcattitle; ?></p>
								<a href="<?php echo base_url("home/subCategory/" . $subcatPosation2List->subcatid); ?>"></a>
							</figcaption>			
						</figure>
					</div>
				</div>
				<div class="row weekhl2">
					<div class="col-md-12">
						<figure class="snip0016">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation3List->subcatimage); ?>" title="<?php echo $subcatPosation3List->subcatname; ?>" alt="<?php echo $subcatPosation3List->subcatname; ?>"/>
							<figcaption>
								<h2><?php echo $subcatPosation3List->subcatname; ?></h2>
								<p><?php echo $subcatPosation3List->subcattitle; ?></p>
								<a href="<?php echo base_url("home/subCategory/" . $subcatPosation3List->subcatid); ?>"></a>
							</figcaption>			
						</figure>
					</div>
				</div>
			</div>
			<!--- Best Sellers start --->
			<div class="row partpadding1">
				<div class="row titlebar1">Best Sellers</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					  <div class="carousel carousel-showmanymoveone slide" id="itemslider">
						<div class="carousel-inner">
						  <?php
							  $i = 0; 
							  foreach($productSliderList as $v) {
							
							  if($i == 0){
							  $active = "active";
							  } else {
							  $active = "";
							  }
						  ?> 
						  <div class="item <?php  echo $active; ?>">
							<div class="col-xs-12 col-sm-6 col-md-3">
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
						<a class="left carousel-control" href="#itemslider" data-slide="prev"><img src="https://s12.postimg.org/uj3ffq90d/arrow_left.png" alt="Left" class="img-responsive"></a>
						<a class="right carousel-control" href="#itemslider" data-slide="next"><img src="https://s12.postimg.org/djuh0gxst/arrow_right.png" alt="Right" class="img-responsive"></a>
					  </div>
					  </div>
					</div>
				  </div>
			</div>
			<!--- Featured Brands start --->
			<div class="row partpadding1">
				<div class="row titlebar1">Featured Brands</div>
				
				<div class="row">
					<?php
						foreach($brandsList as $v)
						{	
					?>
					<div class="col-md-4 fbrand2">
						<figure class="snip0015">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$v->bndimage); ?>" title="<?php echo $v->bndname; ?>" alt="<?php echo $v->bndname; ?>">
							<figcaption>
								<h2>All Products</h2><a href="<?php echo site_url("home/brandsAllProducts/" . $v->bndname); ?>"></a>
							</figcaption>			
						</figure>
					</div>
					<?php } ?>
				</div>
				
			</div>
			<!--- Top Categories start --->
			<div class="row partpadding1">
				<div class="row titlebar1">Top Categories</div>
				<div class="row">
					<div class="col-md-4">
						<div>
							<a href="<?php echo base_url("home/subCategory/" . $subcatPosation4List->subcatid); ?>" class="b-link-stroke b-animate-go">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation4List->subcatimage); ?>" title="<?php echo $subcatPosation4List->subcatname; ?>" alt="<?php echo $subcatPosation4List->subcatname; ?>"/>
							<div class="b-wrapper1">
								<p class="b-animate b-from-right"><?php echo $subcatPosation4List->subcatname; ?></p>
								<label class="b-animate b-from-right"></label>
								<h3 class="b-animate b-from-left">All Products ></h3>
							</div>
							</a>
						</div>
						<div class="tc1">
							<a href="<?php echo base_url("home/subCategory/" . $subcatPosation7List->subcatid); ?>" class="b-link-stroke b-animate-go">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation7List->subcatimage); ?>" title="<?php echo $subcatPosation7List->subcatname; ?>" alt="<?php echo $subcatPosation7List->subcatname; ?>"/>
							<div class="b-wrapper1">
								<p class="b-animate b-from-right"><?php echo $subcatPosation7List->subcatname; ?></p>
								<label class="b-animate b-from-right"></label>
								<h3 class="b-animate b-from-left">All Products ></h3>
							</div>
							</a>
						</div>
					</div>
					<div class="col-md-4 tc2">
						<a href="<?php echo base_url("home/subCategory/" . $subcatPosation5List->subcatid); ?>" class="b-link-stroke b-animate-go">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation5List->subcatimage); ?>" title="<?php echo $subcatPosation5List->subcatname; ?>" alt="<?php echo $subcatPosation5List->subcatname; ?>"/>
							<div class="b-wrapper1">
								<p class="b-animate b-from-right"><?php echo $subcatPosation5List->subcatname; ?></p>
								<label class="b-animate b-from-right"></label>
								<h3 class="b-animate b-from-left">All Products ></h3>
							</div>
						</a>
					</div>
					<div class="col-md-4">
						<div>
							<a href="<?php echo base_url("home/subCategory/" . $subcatPosation6List->subcatid); ?>" class="b-link-stroke b-animate-go">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation6List->subcatimage); ?>" title="<?php echo $subcatPosation6List->subcatname; ?>" alt="<?php echo $subcatPosation6List->subcatname; ?>"/>
							<div class="b-wrapper1">
								<p class="b-animate b-from-right"><?php echo $subcatPosation6List->subcatname; ?></p>
								<label class="b-animate b-from-right"></label>
								<h3 class="b-animate b-from-left">All Products ></h3>
							</div>
							</a>
						</div>
						<div class="tc1">
							<a href="<?php echo base_url("home/subCategory/" . $subcatPosation8List->subcatid); ?>" class="b-link-stroke b-animate-go">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$subcatPosation8List->subcatimage); ?>" title="<?php echo $subcatPosation8List->subcatname; ?>" alt="<?php echo $subcatPosation8List->subcatname; ?>"/>
							<div class="b-wrapper1">
								<p class="b-animate b-from-right"><?php echo $subcatPosation8List->subcatname; ?></p>
								<label class="b-animate b-from-right"></label>
								<h3 class="b-animate b-from-left">All Products ></h3>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
			<!--- Content start --->
			<div class="row partpadding1">
				<div class="row">
					<?php
						foreach($homeContentList as $v)
						{	
					?>
					<div class="col-md-6">
						<div class="cont2">
							<?php echo $v->hmconttitle; ?>
						</div>
						<div class="cont3">
							<?php echo $v->hmcontdetails; ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<!--- footer start --->
			<?php $this->load->view("footer"); ?>
		</div>
	</div>
</body>
</html>

<script>
	<!--- products slider start --->
	$(document).ready(function(){
	
	$('#itemslider').carousel({ interval: 3000 });
	
	$('.carousel-showmanymoveone .item').each(function(){
	var itemToClone = $(this);
	
	for (var i=1;i<4;i++) {
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
