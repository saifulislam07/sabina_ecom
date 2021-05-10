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
					<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; <a href="<?php echo site_url("home/category/" . $catNameList->catid); ?>"><?php echo $catNameList->catname; ?></a> &nbsp;>&nbsp;  <a href="<?php echo site_url("home/subCategory/" . $subcatNameList->subcatid); ?>"><?php echo $subcatNameList->subcatname; ?></a> &nbsp;>&nbsp; <?php echo $productDetailsList->proname; ?>
				</div>
				<div class="col-md-6 padding0">
					
				</div>
			</div>
			
			<div class="row przoom1">
				<div class="col-md-1 padding0 przoom2">
					<?php
					if(!empty($productDetailsList->embedcode)){
					?>
					<div class="przoom4">
						<span style="position:absolute; cursor:pointer;"><img src="<?php echo base_url("uploads/player1.png"); ?>" class="img-responsive provideo" embedcode="<?php echo $productDetailsList->embedcode; ?>" /></span><img src="<?php echo base_url("uploads/".$productDetailsList->proimage); ?>" alt="<?php echo $productDetailsList->proname; ?>" title="Video" class="img-responsive" />
					</div>
					<?php } ?>
					<div class="przoom3">Other Colors</div>
					<?php foreach($othercolorsList as $v) { ?>
					<div class="przoom4">
						<a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>"><img src="<?php echo base_url("uploads/".$v->proimage); ?>" alt="<?php echo $v->proname; ?>" title="<?php echo $v->proname; ?>" class="img-responsive" /></a>
					</div>
					<?php } ?>
				</div>
				<div class="col-md-6" id="provideodiv">
					<div class="">
					<ul id="glasscase" class="gc-start">
					<li><img src="<?php echo base_url("uploads/".$productDetailsList->proimage); ?>" alt="<?php echo $productDetailsList->proname; ?>" data-gc-caption="<?php echo $productDetailsList->proname; ?>" /></li>
					<li><img src="<?php echo base_url("uploads/".$productDetailsList->proimage1); ?>" alt="<?php echo $productDetailsList->proname; ?>" data-gc-caption="<?php echo $productDetailsList->proname; ?>" /></li>
					<li><img src="<?php echo base_url("uploads/".$productDetailsList->proimage2); ?>" alt="<?php echo $productDetailsList->proname; ?>" data-gc-caption="<?php echo $productDetailsList->proname; ?>" /></li>
					<li><img src="<?php echo base_url("uploads/".$productDetailsList->proimage3); ?>" alt="<?php echo $productDetailsList->proname; ?>" data-gc-caption="<?php echo $productDetailsList->proname; ?>" /></li>
					<li><img src="<?php echo base_url("uploads/".$productDetailsList->proimage4); ?>" alt="<?php echo $productDetailsList->proname; ?>" data-gc-caption="<?php echo $productDetailsList->proname; ?>" /></li>
					
					</ul>
					</div>
				</div>
				<div class="col-md-5">
					<form action="<?php echo base_url('home/carts'); ?>" method="post" enctype="multipart/form-data">
					<input type="hidden" id="proid" name="proid" value="<?php echo $productDetailsList->proid; ?>" />
					<div class="przoom5"><?php echo $productDetailsList->proname; ?></div>
					<div class="przoom6">BRAND NAME &nbsp;&nbsp;&nbsp;&nbsp; : <?php echo $productDetailsList->bndname; ?></div>
					<div class="przoom6">PRODUCT CODE : <?php echo $productDetailsList->procode; ?></div>
					<div class="przoom6">AVAILABILITY &nbsp;&nbsp;&nbsp;&nbsp; : <?php if($productDetailsList->quantity == 0) { ?>Out Stock<?php } else { ?>In Stock<?php } ?></div>
					<div class="przoom6">REGULAR PRICE : <?php echo $productDetailsList->proprice; ?> TK</div>
					<?php if(!$productDetailsList->prooldprice == '0') { ?>
					<div class="przoom6">OLD PRICE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <span class="prview5"><?php echo $productDetailsList->prooldprice; ?> TK</span></div>
					<?php } ?>
					
					<div class="button-wrap">
					<span class="przoom7">SIZE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>
					<?php
						$i=1;
						$procode 			= $productDetailsList->procode;
						$colorname 			= $productDetailsList->colorname;
						$where5 			= array('status' =>'Active', 'procode' =>$procode, 'colorname' =>$colorname);	  
						$data['prsizeList']	= $this->M_cloud->thWhGpbyResult('products_manage', $where5, 'prosize');
						
						foreach($data['prsizeList'] as $v){
						$nm = $i++;
					?>
					<input class="hidden radio-label" type="radio" name="prosize" id="siz<?php echo $nm; ?>" value="<?php echo $v->prosize; ?>" <?php if($v->proid == $productDetailsList->proid){ echo 'checked'; } ?> required/>
					<label class="button-label loadlink" attrlink="<?php echo $v->proid; ?>" for="siz<?php echo $nm; ?>" title="Select Product Size"><?php echo str_replace('-', ' ', $v->prosize); ?></label>
					<?php } ?>
				  </div>
				  
					<?php if($productDetailsList->quantity == 0) { ?>
					<div style="padding-top:15px; font-size:17px; color:#FF0000;"> This size [<?php echo $productDetailsList->prosize; ?>] is out of stock. Call for pre order. Other sizes are avaialable.</div>
					<?php } else { ?>
					<div class="input-group number-spinner"><span class="przoom7">QUANTITY</span>
						<span class="input-group-btn data-dwn lbt">
							<button type="button" class="btn btn-default" data-dir="dwn"><span class="glyphicon glyphicon-minus"></span></button>
						</span>
							<input type="text" class="form-control text-center mxmifl" name="quantity" id="quantity" value="1" min="1" max="<?php echo $productDetailsList->quantity; ?>" style="width:90px; ">
						<span class="input-group-btn data-up rbt">
							<button type="button" class="btn btn-default" data-dir="up"><span class="glyphicon glyphicon-plus"></span></button>
						</span>
					</div>
					<div class="przoom8">
						<button type="submit" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000;">&nbsp;<span ><i class="fa fa-shopping-bag" aria-hidden="true" style="font-size:18px;"></i>&nbsp;&nbsp;&nbsp;Add To Cart</span></button>
					</div>
					<?php } ?>
					</form>
				</div>
				
			</div>
			
			<div class="row przoom9">
				<div class="przoom10">PRODUCT DETAILS</div>
				<div class="przoom11"><?php echo $productDetailsList->prodetails; ?></div>
			</div>
			
			<div class="row przoom9">
				<div class="przoom10">SIMILAR ITEMS</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
					  <div class="carousel carousel-showmanymoveone slide" id="itemslider">
						<div class="carousel-inner">
						  <?php
							  $i = 0; 
							  foreach($similarproList as $v) {
							
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
			
			<!--- footer start --->
			<?php $this->load->view("footer"); ?>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	//PRODUCT ZOOM
	$(document).ready( function () {
		//If your <ul> has the id "glasscase"
		$('#glasscase').glassCase({ 'thumbsPosition': 'bottom', 'widthDisplay' : 560});
	});
	
	//PRODUCT ZOOM
	$(function() {
    var action;
    $(".number-spinner button").mousedown(function () {
        btn = $(this);
        input = btn.closest('.number-spinner').find('input');
        btn.closest('.number-spinner').find('button').prop("disabled", false);

    	if (btn.attr('data-dir') == 'up') {
            action = setInterval(function(){
                if ( input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max')) ) {
                    input.val(parseInt(input.val())+1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	} else {
            action = setInterval(function(){
                if ( input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min')) ) {
                    input.val(parseInt(input.val())-1);
                }else{
                    btn.prop("disabled", true);
                    clearInterval(action);
                }
            }, 50);
    	}
    }).mouseup(function(){
        clearInterval(action);
    });
});

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

$(".loadlink").on('click', function(){
	var attrlink = $(this).attr('attrlink');
	location.replace(attrlink);
});


$(".provideo").on('click', function(){
	var embedcode = $(this).attr('embedcode');
	if(embedcode)
	{
		$('#provideodiv').html('<iframe width="100%" height="600" src="'+ embedcode +'?rel=0&amp;showinfo=0&autoplay=1" frameborder="0" allowfullscreen></iframe>');
	}
});
</script>