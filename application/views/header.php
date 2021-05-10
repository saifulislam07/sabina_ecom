<!-- bootstrap  start -->
	<link rel="stylesheet" href="<?php echo base_url("view_resource/css/bootstrap.min.css"); ?>">
    <script src="<?php echo base_url("view_resource/js/jquery.min.js"); ?>"></script>
	<script src="<?php echo base_url("view_resource/js/bootstrap.min.js"); ?>"></script>
	<link rel="stylesheet" href="<?php echo base_url("view_resource/css/font-awesome.min.css"); ?>">
<!-- bootstrap  end -->
<!--Anather start-->
	<link rel="stylesheet" href="<?php echo base_url("view_resource/css_2/muhibullah.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("view_resource/css_2/muhibullah1.css"); ?>">
	<link rel="stylesheet" href="<?php echo base_url("view_resource/css_2/image_effect.css"); ?>">	
<!--Anather end-->
<!--Anather start-->
	<link rel="stylesheet" href="<?php echo base_url("view_resource/css_2/top_menu.css"); ?>">	
	<script src="<?php echo base_url("view_resource/js/top_menu.js"); ?>"></script>
<!--Anather end-->
<!--productZoom start-->
	<link rel="stylesheet" href="<?php echo base_url("view_resource/css_2/productZoom.css"); ?>">	
	<script src="<?php echo base_url("view_resource/js/productZoom.js"); ?>"></script>
<!--productZoom end-->

<!--- header start --->
<div class="row header1">
	<div class="container padding0">
		<div class="col-md-3 col-xs-7 header2">
			<a href="<?php echo site_url("home"); ?>"><img class="img-responsive" src="<?php echo base_url("uploads/".$baseinformation->comlogo); ?>" title="Sabina Secret" alt="Sabina Secret"/></a>
		</div>
		
		<div class="col-xs-2 hidden-md hidden-lg"></div>
		
		<div class="col-md-2 col-xs-3 hidden-md hidden-lg padding0" align="right">
			<div class="col-md-6 col-xs-6 padding0" align="right">
			<div class="btn-group show-on-hover"><?php $regid  = $this->session->userdata('regid'); if(!empty($regid)) { ?><span class="actvlgn"></span><?php } ?>
				<button type="button" class="btn btn-default dropdown-toggle userButton1" data-toggle="dropdown"><i class="fa fa-user-o" aria-hidden="true"></i></button>
				<ul class="dropdown-menu dropdown-menu-right header3" aria-labelledby="dropdownMenu1">
						<li class="header4">Welcome</li>
						<?php
						$regid  = $this->session->userdata('regid');
						if(!empty($regid)) { ?>
						<li class="hdrli"><a href="<?php echo site_url("myAccount"); ?>">My Account</a></li>
						<li class="hdrli"><a href="<?php echo site_url("myAccount/orderHistory"); ?>">Order History</a></li>
						<li class="hdrli"><a href="<?php echo site_url("myAccount/passwordUpdate"); ?>">Password Update</a></li>
						<li class="hdrli"><a href="<?php echo site_url("userlogin/userLogoutAction"); ?>">Log Out</a></li>
						<?php } else { ?>
						<li class="hdrli"><a href="<?php echo site_url("home/login"); ?>">Login</a></li>
						<li class="hdrli"><a href="<?php echo site_url("home/registration"); ?>">Register</a></li>
						<li class="hdrli"><a href="<?php echo site_url("home/forgottenPassword"); ?>">Forgotten Password</a></li>
						<?php } ?>
					</ul>
			</div>
			</div>
			<div class="col-md-6 col-xs-6 padding0" align="right">
			<div class="btn-group show-on-hover"><?php if(!empty($rows)) { ?><span class="cartitems"><?php echo $rows; ?></span><?php } ?>
				<button type="button" class="btn btn-default dropdown-toggle userButton1" data-toggle="dropdown"><i class="fa fa-shopping-bag header5" aria-hidden="true"></i></button>
					<ul class="dropdown-menu dropdown-menu-right header3" aria-labelledby="dropdownMenu1">
						<li class="header4">MY BAG <?php if(!empty($rows)) { ?><span class="cartitems"><?php echo $rows; ?></span><?php } ?> ITEMS</li>
						<?php if(!empty($rows)) { ?>
						<?php  foreach ($this->cart->contents() as $items) { ?>
						<li class="hdrli">
							<div class="row header6">
							<div class="col-md-4 col-xs-4">
							<img  class="img-responsive" src="<?php echo base_url("uploads/".$items['proimage']); ?>" title="<?php echo $items['name']; ?>" alt="<?php echo $items['name']; ?>" />
							</div>
							<div class="col-md-8 col-xs-8 padding0">
							<div><?php echo $items['name']; ?></div>
							<div class="header7">Code : <?php echo $items['procode']; ?></div>
							<div class="header7">Size : <?php echo $items['prosize']; ?><a href="#" class="remove_cart header8" data-id="<?php echo $items['rowid']; ?>"><img src="<?php echo base_url("view_resource/image/Delete.png"); ?>" title="Delete/Remove this item" height="15" /></a></div>
							<div class="header7">Quantity : <?php echo $items['qty']; ?></div>
							<div class="header7">Price : <?php echo $items['subtotal']; ?></div>
							</div>
							</div>
						</li>
						<?php } ?>
						<div class="header9">SUB TOTAL PRICE : <?php echo $this->cart->total(); ?></div>
						<div class="header10">
						<a href="<?php echo site_url("home/cartDetails"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">VIEW BAG</a><?php if(!empty($regid)) { ?><a href="<?php echo site_url("myAccount/deliveryAddress"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none; float:right;">Checkout</a><?php } else { ?><a href="<?php echo site_url("home/login"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;float:right;">Checkout</a><?php } ?>
						</div>
						<?php } else { ?>
							<div class="partpadding1 red" align="center">YOUR CART ITEMS IS EMPTY.</div>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		
		
		<div class="col-md-1">
		</div>
		<div class="col-md-5 col-xs-12 header21">
			<form method="post" action="<?php echo site_url("home/searchAll"); ?>" enctype="multipart/form-data">
			<div class="input-group">
			  <input type="text" class="search_field" name="search_field" id="search_field" placeholder="Search Products Name, Code, Brand.">
			  <span class="input-group-btn">
				<button class="search_button" type="submit" name="Submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
			  </span>
			</div>
			</form>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-2 hidden-sm hidden-xs header21" align="right">
			<div class="col-md-6">
			</div>
			<div class="col-md-3 padding0" align="right">
				<div class="btn-group show-on-hover"><?php $regid  = $this->session->userdata('regid'); if(!empty($regid)) { ?><span class="actvlgn"></span><?php } ?>
				<button type="button" class="btn btn-default dropdown-toggle userButton1" data-toggle="dropdown"><i class="fa fa-user-o" aria-hidden="true"></i></button>
					<ul class="dropdown-menu header3" aria-labelledby="dropdownMenu1">
						<li class="header4">Welcome</li>
						<?php
						$regid  = $this->session->userdata('regid');
						if(!empty($regid)) { ?>
						<li class="hdrli"><a href="<?php echo site_url("myAccount"); ?>">My Account</a></li>
						<li class="hdrli"><a href="<?php echo site_url("myAccount/orderHistory"); ?>">Order History</a></li>
						<li class="hdrli"><a href="<?php echo site_url("myAccount/passwordUpdate"); ?>">Password Update</a></li>
						<li class="hdrli"><a href="<?php echo site_url("userlogin/userLogoutAction"); ?>">Log Out</a></li>
						<?php } else { ?>
						<li class="hdrli"><a href="<?php echo site_url("home/login"); ?>">Login</a></li>
						<li class="hdrli"><a href="<?php echo site_url("home/registration"); ?>">Register</a></li>
						<li class="hdrli"><a href="<?php echo site_url("home/forgottenPassword"); ?>">Forgotten Password</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="col-md-3 padding0" align="right">
			<div class="btn-group show-on-hover"><?php if(!empty($rows)) { ?><span class="cartitems"><?php echo $rows; ?></span><?php } ?>
				<button type="button" class="btn btn-default dropdown-toggle userButton1" data-toggle="dropdown"><i class="fa fa-shopping-bag header5" aria-hidden="true"></i></button>
					<ul class="dropdown-menu dropdown-menu-right header3" aria-labelledby="dropdownMenu1">
						<li class="header4">MY BAG <?php if(!empty($rows)) { ?><span class="cartitems"><?php echo $rows; ?></span><?php } ?> ITEMS</li>
						<?php if(!empty($rows)) { ?>
						<?php  foreach ($this->cart->contents() as $items) { ?>
						<li class="hdrli">
							<div class="row header6">
							<div class="col-md-4">
							<img  class="img-responsive" src="<?php echo base_url("uploads/".$items['proimage']); ?>" title="<?php echo $items['name']; ?>" alt="<?php echo $items['name']; ?>" />
							</div>
							<div class="col-md-8 padding0">
							<div><?php echo $items['name']; ?></div>
							<div class="header7">Code : <?php echo $items['procode']; ?></div>
							<div class="header7">Size : <?php echo $items['prosize']; ?><a href="#" class="remove_cart header8" data-id="<?php echo $items['rowid']; ?>"><img src="<?php echo base_url("view_resource/image/Delete.png"); ?>" title="Delete/Remove this item" height="15" /></a></div>
							<div class="header7">Quantity : <?php echo $items['qty']; ?></div>
							<div class="header7">Price : <?php echo $items['subtotal']; ?></div>
							</div>
							</div>
						</li>
						<?php } ?>
						<div class="header9">SUB TOTAL PRICE : <?php echo $this->cart->total(); ?></div>
						<div class="header10">
						<a href="<?php echo site_url("home/cartDetails"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;">VIEW BAG</a><?php if(!empty($regid)) { ?><a href="<?php echo site_url("myAccount/deliveryAddress"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none; float:right;">Checkout</a><?php } else { ?><a href="<?php echo site_url("home/login"); ?>" class="abc left1_btn left1_btn-1 left1_btn-1c" style="background:#000000; text-decoration:none;float:right;">Checkout</a><?php } ?>
						</div>
						<?php } else { ?>
							<div class="partpadding1 red" align="center">YOUR CART ITEMS IS EMPTY.</div>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--- menu start --->
<div class="row">
	<nav class="navbar navbar-inverse mymenu">
		<div class="navbar-header">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		</button>
		</div>
		
		<div class="collapse navbar-collapse js-navbar-collapse">
		<ul class="nav navbar-nav mymenu2">
		
		<?php
			foreach($menuList as $v){
			$menuid = $v->catid;	
		?>
		<li class="dropdown1 mega-dropdown">
			<a href="
			<?php
				if($menuid == '2') {
					 echo site_url("temp/index");
			 	} else if($menuid == '3') {
					echo site_url("temp/cosmetics");
				} else if($menuid == '5') {
					echo site_url("temp/shoes");
				} else {
					echo site_url("home/category/" . $v->catid);
				} 
			?>
			" class="menuacolor dropdown-toggle disabled" data-toggle="dropdown1"><?php echo $v->catname; ?></a>				
			<ul class="dropdown-menu mega-dropdown-menu">
				 
				<li class="col-sm-8">
					<ul>
						<?php
							$a = 1;
							$b = 3;
							$where1         = array('catid' =>$menuid, 'status' =>'Active');
							$subMenuList	= $this->M_cloud->tbWhObyResult('sub_category_manage', $where1, 'subcatid asc');
							foreach($subMenuList as $v2){
							if($a == 0) echo "<li class='col-sm-6'>";
							if($a <= $b)
						?>
						<li class="col-sm-6"><a href="<?php echo base_url("home/subCategory/" . $v2->subcatid); ?>"><?php echo $v2->subcatname; ?></a></li>
						<?php 
							$a++;	
							if($a == $b) echo "</li>";				
							if($a == $b) $a=1;
							}
						 ?>
					</ul>
				</li>
				
				<li class="col-sm-4">
					<ul>
						<a href="<?php echo site_url("home/category/" . $v->catid); ?>"><img class="img-responsive" src="<?php echo base_url("uploads/".$v->catimage); ?>" title="<?php echo $v->catname; ?>" alt="<?php echo $v->catname; ?>"/></a>
						<li class="divider"></li>
						<li><a href="<?php echo site_url("home/category/" . $v->catid); ?>">View all Collection</a></li>
					</ul>
				</li>
			</ul>				
		</li>
		<?php } ?>
		
		</ul>
		</div>
	</nav>
</div>

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

<!---------------------- Top menu start ------------------------->	
	jQuery(document).ready(function(){
    $(".dropdown1").hover(
        function() { $('.dropdown-menu', this).stop().fadeIn("fast");
        },
        function() { $('.dropdown-menu', this).stop().fadeOut("fast");
    });
});
</script>