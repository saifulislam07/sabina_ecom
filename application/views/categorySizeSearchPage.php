<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $baseinformation->title; ?></title>

<link rel="stylesheet" href="<?php echo base_url("view_resource/css_2/freshslider.min.css"); ?>">

</head>
<body>
<div class="container-fluid">
  <div class="navbar-fixed-top">
    <?php $this->load->view("header"); ?>
  </div>
  <div class="container fixednavbar">
    <div class="row mntitle1">
				<div class="col-md-6 padding0">
					<a href="<?php echo site_url("home"); ?>">Home</a> &nbsp;>&nbsp; <a href="<?php echo site_url("home/category/" . $catNameList->catid); ?>"><?php echo $catNameList->catname; ?></a> &nbsp;>&nbsp; <?php echo $catSizeNameList->prosize; ?>
				</div>
				<div class="col-md-6 padding0">
					<div id="ranged-value"></div>
				</div>
			</div>
	<div class="row prview1">
		<div class="col-md-3">
			<div class="row ltsubcat1">
				<div class="ltsubcat2">SIZE SEARCH</div>
				<div class="form-inline"><?php foreach($catsizeList as $v) { ?><div class="form-group ltsubcat3"><a href="<?php echo base_url("home/categorySizeSearch/" .$v->catid.'/'.$v->prosize); ?>" class="sizebun"><?php echo $v->prosize; ?></a></div><?php } ?></div>
				<div class="ltsubcat4"></div>
				
				<div class="ltsubcat5">BRANDS SEARCH</div>
				<div class="ltsubcat6">
					<form method="post" name="form1" action="<?php echo site_url("home/brandsProducts"); ?>">
					<div class="input-group">
					  <input type="text" class="lftsrcfld" name="bndname" id="bndname" placeholder="Search Brands">
					  <span class="input-group-btn">
						<button class="lftsrcbtn" type="submit" name="Submit" value="Search"><i class="fa fa-search" aria-hidden="true"></i></button>
					  </span>
					</div>
					</form>
				</div>
				<div class="ltsubcat4"></div>
				
				<div class="ltsubcat5">COLOUR SEARCH</div>
				<?php foreach($catcolorList as $v) { ?>
				<div class="cls1"><a href="<?php echo site_url("home/categoryColorSearch/".$v->catid.'/'.$v->colorname); ?>"><span style="border:solid 1px #eeeeee; background-color:<?php echo $v->colorcode; ?>; padding:2px 10px;"></span> &nbsp; <?php echo $v->colorname; ?></a></div>
				<?php } ?>
			</div>
		</div>
		<div class="col-md-9 padding0" id="rangeview">
     	<?php foreach($productsList as $v) { ?>
		  <div class="col-md-4">
			<div class="row prview2"> <a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="proimg"><img class="img-responsive" src="<?php echo base_url("uploads/".$v->proimage); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a><?php if($v->discount) { ?><span class="badge2"><?php echo $v->discount; ?>%</span><?php } else {?><?php } ?><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="proimg hover"><img class="img-responsive" src="<?php echo base_url("uploads/".$v->proimage1); ?>" title="<?php echo $v->proname; ?>" alt="<?php echo $v->proname; ?>"/></a>
			  <div class="prview3"><?php echo $v->proname; ?></div>
			  <div>
				<div class="col-md-9 prview4"><?php echo $v->proprice; ?> TK &nbsp;&nbsp;
				  <?php if(!$v->prooldprice == '0') { ?>
				  <span class="prview5"><?php echo $v->prooldprice; ?> TK</span>
				  <?php } ?>
				</div>
				<div class="col-md-3 prview6"><a href="<?php echo site_url("home/productDetails/" . $v->proid); ?>" class="prview7"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></div>
			  </div>
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

<script src="<?php echo base_url("view_resource/js/freshslider.min.js"); ?>"></script>
<script>
     var s3 = $("#ranged-value").freshslider({
        range: true,
        step:1,
        value:[<?php echo $minprice->proprice;?>, <?php echo $maxprice->proprice;?>],
        onchange:function(low, high){
            console.log(low, high);
			$.ajax({
				url: '<?php echo base_url('home/catpricerangeSize/'.$catNameList->catid.'/'.$catSizeNameList->prosize); ?>?low='+low+'&high='+high,
				type: 'GET',
				dataType: 'html',
				success: function(data){
					$('#rangeview').html(data);
				}
			});
        }
    });
</script>