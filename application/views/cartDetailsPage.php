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
		<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; Cart Details
	</div>
    
    <div class="row usrmnu1">
	  <div class="col-md-9 padding0">
	  	<div class="usrmnu2">CART DETAILS</div>
		<?php if(!empty($rows)) { ?>
		<div class="row" style="background-color:#eeeeee; padding:10px 0px; margin:0px 1px; border-left:solid 1px #eeeeee; font-weight:bold;">
			<div class="col-md-8">Product</div>
			<div class="col-md-1">Remove</div>
			<div class="col-md-1">Quantity</div>
			<div class="col-md-1">Price</div>
			<div class="col-md-1" align="right">Total</div>
		</div>
		
		<?php  foreach ($this->cart->contents() as $items) { ?>
		<div class="row" style="border-left:solid 1px #eeeeee; border-right:solid 1px #eeeeee; border-bottom:solid 1px #eeeeee; padding:10px 0px; margin:0px 1px;  font-weight:normal;">
			<div class="col-md-8 padding0">
				<div class="col-md-2">
					<img  class="img-responsive" src="<?php echo base_url("uploads/".$items['proimage']); ?>" title="<?php echo $items['name']; ?>" alt="<?php echo $items['name']; ?>" />
				</div>
				<div class="col-md-10">
					<div style="font-size:15px;"><?php echo $items['name']; ?></div>
					<div>Product Code : <?php echo $items['procode']; ?></div>
					<div>Product Size : <?php echo $items['prosize']; ?></div>
				</div>
			</div>
			<div class="col-md-1"><a href="#" class="remove_cart" data-id="<?php echo $items['rowid']; ?>"><img src="<?php echo base_url("view_resource/image/Delete.png"); ?>" title="Delete/Remove this item" /></a></div>
			<div class="col-md-1">
			<div class="form-group">
			<select class="cartupdate qty" data-id="<?php echo $items['rowid']; ?>">
				<?php
					$where4         = array('proid' =>$items['proid']);	  
					$allqtyList		= $this->M_cloud->tbWhRow('products_manage', $where4);
					
					for ($i = 1; $i <= $allqtyList->quantity; $i++) {
					$tqt = $i;
				?>
			  <option value="<?php echo $tqt; ?>" <?php if($items['qty'] == $tqt){ echo 'selected'; } ?>><?php echo $tqt; ?></option>
			  <?php } ?>
			</select>
			</div>
			</div>
			<div class="col-md-1"><?php echo $items['price']; ?></div>
			<div class="col-md-1" align="right"><?php echo $items['subtotal']; ?></div>
		</div>
		<?php } ?>
		
		<div class="row" style="background-color:#f9f9f9; padding:10px 0px; margin:0px 1px; text-align:right; font-weight:bold;">
			<div class="col-md-11">Subtotal :</div>
			<div class="col-md-1"><?php echo $this->cart->total(); ?></div>
		</div>
		<div class="row" style="background-color:#f3f3f3; padding:10px 0px; margin:0px 1px; text-align:right; font-weight:bold;">
			<div class="col-md-11">Estimated Shipping Cost :</div>
			<div class="col-md-1">100</div>
		</div>
		<?php
			$grandtotal = $this->cart->total() + 100;
		?>
		<div class="row" style="background-color:#eeeeee; padding:10px 0px; margin:0px 1px; text-align:right; font-weight:bold;">
			<div class="col-md-11">Grand Total :</div>
			<div class="col-md-1"><?php echo $grandtotal; ?></div>
		</div>
		<div class="row" style="border-left:solid 1px #eeeeee; border-right:solid 1px #eeeeee; border-bottom:solid 1px #eeeeee; padding:10px 0px; margin:0px 1px;">
			<div class="col-md-6" align="left"><a href="<?php echo site_url("home"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">Continue Shopping</a></div>
			<div class="col-md-6" align="right"><?php if(!empty($regid)) { ?><a href="<?php echo site_url("myAccount/deliveryAddress"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">Checkout</a><?php } else { ?><a href="<?php echo site_url("home/login"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">Checkout</a><?php } ?></div>
		</div>
		<?php } else { ?>
			<div class="partpadding1 red" align="center">YOUR CART ITEMS IS EMPTY.</div>
		<?php }?>
	  </div>
	  <div class="col-md-3">
	  	<div class="usrmnu2">YOU WILL ALSO LOVE THESE</div>
		  <div class="carousel carousel-showmanymoveone slide" id="itemslider">
			<div class="carousel-inner">
			  <?php
				  $i = 0; 
				  foreach($othersProList as $v) {
				
				  if($i == 0){
				  $active = "active";
				  } else {
				  $active = "";
				  }
			  ?> 
			  <div class="item <?php  echo $active; ?>">
				<div class="col-xs-12 col-sm-6 col-md-12 padding0">
				  <a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>"><img class="img-responsive center-block" src="<?php echo base_url("uploads/".$v->proimage); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a>
				  <?php if($v->discount) { ?><span class="badge"><?php echo $v->discount; ?></span><?php } else {?><?php } ?>
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
<a class="left carousel-control" href="#itemslider" data-slide="prev" style="padding-top:50% !important;"><img src="<?php echo base_url("uploads/arrow_left.PNG"); ?>" alt="Left" class="img-responsive"></a>
			<a class="right carousel-control" href="#itemslider" data-slide="next" style="padding-top:50% !important;"><img src="<?php echo base_url("uploads/arrow_right.PNG"); ?>" alt="Right" class="img-responsive"></a>
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
 

<script>
<!---------------------- Rimove Items start ------------------------->
	 $('.remove_cart').on('click', function(){
		var row_id = $(this).attr("data-id");
		var currUrl = window.location.pathname;
	
		var formURL = "<?php echo site_url('home/deleteCartItem'); ?>";
		/// AJAX CALL HERE
		$.ajax(
			{
				url : formURL,
				type: "POST",
				//dataType: "json",
				data : {row_id: row_id},
				success:function(data){
					location.replace(currUrl);
				}
			});
	});
	
<!---------------------- update Items start ------------------------->
	 $('.cartupdate').on('change', function(){
		var rowid = $(this).attr("data-id");
		var qty = $(this).val();
			
		var currUrl = window.location.pathname;
	
		var formURL = "<?php echo site_url('home/updateCartItem'); ?>";
		/// AJAX CALL HERE
		$.ajax(
			{
				url : formURL,
				type: "POST",
				//dataType: "json",
				data : {rowid: rowid, qty:qty},
				
				success:function(data){
					location.replace(currUrl);
				}
			});
	});
	
	<!--- products slider start --->
	$(document).ready(function(){
	
	$('#itemslider').carousel({ interval: 2000 });
	
	$('.carousel-showmanymoveone .item').each(function(){
	var itemToClone = $(this);
	
	for (var i=1;i<1;i++) {
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
</script>
