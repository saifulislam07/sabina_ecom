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
		<div class="fixednavbar">
			<!--- slider start --->
			<div class="row">
				<div id="slider">
				  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" >
					<!-- Indicators -->
					<!-- Wrapper for slides -->
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
			<!--- All Categories start --->
			<div class="row partpadding1">
				<div class="titlebar1">All Categories</div>
				<div class="weekhl2">
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<figure class="snip0016">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$allcategoryList->catimage); ?>" title="<?php echo $allcategoryList->catname; ?>" alt="<?php echo $allcategoryList->catname; ?>"/>
							<figcaption>
								<h2><?php echo $allcategoryList->catname; ?></h2>
								<p><?php echo $allcategoryList->catdetails; ?></p>
								<a href="<?php echo base_url("home/category/" . $allcategoryList->catid); ?>"></a>
							</figcaption>			
						</figure>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
			<!--- Position 1 start --->
			<div class="container partpadding1">
				<div class="titlebar1">Top Categories</div>
					<div>
						<a href="<?php echo base_url("home/subCategory/" . $Lingerie1List->subcatid); ?>" class="b-link-stroke b-animate-go">
							<img class="img-responsive" src="<?php echo base_url("uploads/".$Lingerie1List->subcatimage); ?>" title="<?php echo $Lingerie1List->subcatname; ?>" alt="<?php echo $Lingerie1List->subcatname; ?>"/>
							<div class="b-wrapper1">
								<p class="b-animate b-from-right"><?php echo $Lingerie1List->subcatname; ?></p>
								<label class="b-animate b-from-right"></label>
								<h3 class="b-animate b-from-left">All Products ></h3>
							</div>
						</a>
					</div>
			</div>
			<!--- Position 2 start --->
			<div class="row partpadding1">
				<div class="titlebar1"><?php echo $Lingerie2List->subcatname; ?></div>
				<div>
					<figure class="snip0015">
						<img class="img-responsive" src="<?php echo base_url("uploads/".$Lingerie2List->subcatimage); ?>" title="<?php echo $Lingerie2List->subcatname; ?>" alt="<?php echo $Lingerie2List->subcatname; ?>">
						<figcaption>
							<h2>All Products</h2><a href="<?php echo site_url("home/subCategory/" . $Lingerie2List->subcatid); ?>"></a>
						</figcaption>			
					</figure>
				</div>
				
			</div>
			<!--- Sub Categories start --->
			<div class="row">
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
					  <div class="item <?php  echo $active; ?>"><a href="<?php echo base_url("home/subCategory/" . $v->subcatid); ?>"><img src="<?php echo base_url("uploads/".$v->subcatimage); ?>" alt="<?php echo $v->subcatname; ?>" title="<?php echo $v->subcatname; ?>" class="center-block img-responsive"></a>
						<div class="carousel-caption">
						  <p><?php echo $v->subcatname; ?></p>
						</div>
					  </div>
					  <?php $i++; } ?>
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
					</div>
				</div>
			</div>
			<!--- footer start --->
			<div class="container">
			<?php $this->load->view("footer"); ?>
			</div>
		</div>
	</div>
</body>
</html>
