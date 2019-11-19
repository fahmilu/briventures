<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title><?php echo $title; ?> | BRI Ventures CMS</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="<?php echo base_url(); ?>assets/admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- jQuery UI -->
	<!--<link href="plugins/jquery-ui/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />-->
	<!--[if lt IE 9]>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery.ui.1.10.2.ie.css"/>
	<![endif]-->

	<!-- Theme -->
	<link href="<?php echo base_url(); ?>assets/admin/css/main.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/admin/css/icons.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/libs/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/libs/lodash.compat.min.js"></script>

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="<?php echo base_url(); ?>assets/admin/js/libs/html5shiv.js"></script>
	<![endif]-->

	<!-- Smartphone Touch Events -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/touchpunch/jquery.ui.touch-punch.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/event.swipe/jquery.event.move.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/event.swipe/jquery.event.swipe.js"></script>

	<!-- General -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/libs/breakpoints.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/respond/respond.min.js"></script> <!-- Polyfill for min/max-width CSS3 Media Queries (only for IE8) -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/cookie/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/uniform/jquery.uniform.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/slimscroll/jquery.slimscroll.horizontal.min.js"></script>
	<!-- form component -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/select2/select2.min.js"></script> <!-- Styled select boxes -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/fileinput/fileinput.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/wysihtml5.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
	<!-- App -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/app.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/js/plugins.form-components.js"></script>

	<!-- Bootbox -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootbox/bootbox.js"></script>

	<script>
	$(document).ready(function(){
		"use strict";

		App.init(); // Init layout and core plugins
		Plugins.init(); // Init all plugins
		FormComponents.init(); // Init all form-specific plugins
	});
	</script>
</head>

<body>

	<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" style="width: 276px;" href="<?php echo site_url('webadmin'); ?>">
				<!-- <img src="assets/img/logo.png" alt="logo" /> -->
				<strong>BRI <span style="color: #ea6f23;">ventures</span></strong> CMS
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
<!-- 			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
					<a href="<?php echo site_url(); ?>" target="_blank">
						VIEW SITE
					</a>
				</li>
			</ul> -->
			<!-- /Top Left Menu -->

			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-male"></i>
						<span class="username">Hi, <?php echo $this->session->userdata('username'); ?></span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo site_url('auth/change_password'); ?>"><i class="icon-key"></i> Change Password</a></li>
						<li><a href="<?php echo site_url('auth/logout'); ?>"><i class="icon-off"></i> Log Out</a></li>
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
				<li>
					<a href="<?php echo site_url(); ?>" target="_blank">
						VIEW SITE
					</a>
				</li>
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->
	</header> <!-- /.header -->

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!--=== Navigation ===-->
				<ul id="nav">
<!-- 					<li <?php echo ($menu == 'dashboard') ? 'class="current"' : '' ;?> >
						<a href="<?php echo site_url('webadmin/dashboard'); ?>"><i class="icon-dashboard"></i>Dashboard</a>
					</li> -->					
					<li <?php echo ($menu == 'news') ? 'class="current"' : '' ;?> >
						<a href="<?php echo site_url('webadmin/news'); ?>">News</a>
					</li>				
<!-- 					<li <?php echo ($menu == 'investment' or $menu == 'indigo') ? 'class="current"' : '' ;?> >
						<a href="#">Portfolio</a>
						<ul class="sub-menu">
							<li <?php echo ($menu == 'investment') ? 'class="current"' : '' ;?> >
								<a href="<?php echo site_url('webadmin/portfolio/index/investment'); ?>">Investment</a>
							</li>	
							<li <?php echo ($menu == 'indigo') ? 'class="current"' : '' ;?> >
								<a href="<?php echo site_url('webadmin/portfolio/index/indigo'); ?>">Indigo</a>
							</li>							
						</ul>
					</li> -->					
					<li <?php echo ($menu == 'portfolio') ? 'class="current"' : '' ;?> >
						<a href="<?php echo site_url('webadmin/portfolio'); ?>">Portfolio</a>
					</li>					
					<li <?php echo ($menu == 'team') ? 'class="current"' : '' ;?> >
						<a href="<?php echo site_url('webadmin/team'); ?>">Teams</a>
					</li>			
				</ul>

				<!-- /Navigation -->
				<!-- <span style="padding-left: 20px; width: 100%;font-size: 12px;">Copyright &copy; <strong>PT. Modern Data Solusi</strong></span> -->
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">