<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php echo $baseinformation->title; ?></title>
<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo base_url("resource/css/bootstrap.min.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("resource/css/bootstrap-tagsinput.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("resource/font-awesome/4.2.0/css/font-awesome.min.css"); ?>" />
<!-- page specific plugin styles -->
<!-- text fonts -->
<link rel="stylesheet" href="<?php echo base_url("resource/fonts/fonts.googleapis.com.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("resource/css/datepicker.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("resource/css/datepicker.min.css"); ?>" />
<link rel="stylesheet" href="<?php echo base_url("resource/css/custom.css"); ?>" />
<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url("resource/css/ace.min.css"); ?>" class="ace-main-stylesheet" id="main-ace-style" />
<script src="<?php echo base_url("resource/js/jquery.2.1.1.min.js"); ?>"></script>
<script src="<?php echo base_url("resource/js/bootstrap-tagsinput.js"); ?>"></script>
<script src="<?php echo base_url("resource/js/ace-extra.min.js"); ?>"></script>
<script src="<?php echo base_url('resource/jscripts/tiny_mce/tiny_mce.js'); ?>"></script>
<script language="javascript" type="text/javascript">
		tinyMCE.init({
			mode : "exact",
			elements : "ajaxfilemanager",
			//full url
			relative_urls : "false",
		    remove_script_host : false,
            convert_urls : false,
			//end full url,
			theme : "advanced",
			setup : function(ed) {
			      ed.onKeyUp.add(function(ed, l) {
			         tinyMCE.triggerSave();	                    
			      });
			},
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",

			theme_advanced_buttons1_add_before : "newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,forecolor,backcolor,liststyle",
			theme_advanced_buttons2_add_before: "cut,copy,separator,",
			theme_advanced_buttons3_add_before : "",
			theme_advanced_buttons3_add : "media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "hr[class|width|size|noshade]",
			file_browser_callback : "ajaxfilemanager",
			paste_use_dialog : false,
			theme_advanced_resizing : true,
			theme_advanced_resize_horizontal : true,
			apply_source_formatting : true,
			force_br_newlines : true,
			force_p_newlines : false,	
			relative_urls : true
		});

		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php");
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: SAWEB.getBaseAction("resource/jscripts/tiny_mce/plugins/ajaxfilemanager/ajaxfilemanager.php"),
                width: 700,
                height: 440,
                inline : "yes",
                close_previous : "no"
            },{
                window : win,
                input : field_name
            });
            
		}
	

</script>
</head>
<body class="no-skin">
<div id="navbar" class="navbar navbar-default">
  <script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>
  <div class="navbar-container" id="navbar-container">
    <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar"> <span class="sr-only">Toggle sidebar</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
    <div class="navbar-header pull-left"> <a href="<?php echo site_url("adminpanel/dashborad"); ?>" class="navbar-brand"> <small> <img class="nav-user-photo" src="<?php echo base_url("uploads/".$baseinformation->comlogo); ?>" alt="Company Logo" style="max-height:30px;"/> <?php echo $baseinformation->companyName; ?> </small> </a> </div>
    <div class="navbar-buttons navbar-header pull-right" role="navigation">
      <ul class="nav ace-nav">
        <li class="light-blue"> <a data-toggle="dropdown" href="#" class="dropdown-toggle"> <img class="nav-user-photo" src="<?php echo base_url("uploads/admin.png/"); ?>" alt="Company Logo" /> <span class="user-info"> <small>Welcome,</small> <small><?php echo $adminuserinfo->adminEmail; ?></small></span> <i class="ace-icon fa fa-caret-down"></i> </a>
          <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
            <li> <a href="<?php echo site_url("adminpanel/profileUpdate"); ?>"><i class="ace-icon fa fa-user"></i>Profile Update</a> </li>
            <li class="divider"></li>
            <li><a href="<?php echo site_url("adminlogin/adminLogoutAction"); ?>"><i class="ace-icon fa fa-power-off"></i>Logout</a> </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- /.navbar-container -->
</div>
<div class="main-container" id="main-container">
<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
<div id="sidebar" class="sidebar                  responsive">
  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>
  <?php  $filename = $this->uri->uri_string(); ?>
  <ul class="nav nav-list">
    <li class="active"> <a href="<?php echo base_url("adminpanel/dashborad"); ?>"> <i class="menu-icon fa fa-tachometer"></i> <span class="menu-text"> Dashboard </span> </a> <b class="arrow"></b> </li>
    <li class=""> <a href="<?php echo site_url("adminpanel/basicinformation"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Basic Information</span> </a> </li>
    <li class=""> <a href="<?php echo site_url("adminpanel/slidemanage"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Slide Manage</span> </a> </li>
    <li class=""> <a href="<?php echo site_url("adminpanel/category"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Category Manage</span> </a> </li>
    <li class=""> <a href="<?php echo site_url("adminpanel/subcategory"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Sub Category Manage</span> </a> </li>
<li class=""> <a href="<?php echo site_url("adminpanel/products"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Product Manage</span> </a> </li>
    <li class=""> <a href="<?php echo site_url("adminpanel/brand"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Brand Manage</span> </a> </li>
	<li class=""> <a href="<?php echo site_url("adminpanel/homeContent"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Home Content Manage</span> </a> </li>
	<li class=""> <a href="<?php echo site_url("adminpanel/contentmanage"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Others Menu / Content</span> </a> </li>
	<li class=""> <a href="<?php echo site_url("adminpanel/shoesVideo"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Shoes Page Video Manage</span> </a> </li>
	<li class=""> <a href="<?php echo site_url("adminpanel/paymentInformation"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Payment Information</span> </a> </li>
    <li class=""> <a href="<?php echo site_url("adminpanel/registrationView"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Registration View</span> </a> </li>
    <li class=""> <a href="<?php echo site_url("adminpanel/orderView"); ?>"> <i class="menu-icon fa fa-pencil-square-o"></i> <span class="menu-text">Order Details</span> </a> </li>
    <li class=""> <a href="<?php echo site_url('adminlogin/adminLogoutAction'); ?>"> <i class="menu-icon fa fa-sign-out"></i> <span class="menu-text">Log Out </span> </a> </li>
  </ul>
  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse"> <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i> </div>
  <script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
</div>
