<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/morris/morris.css" />
        <link rel="stylesheet" href="<?= base_url()?>/assets/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?= base_url()?>/assets/vendor/jquery-datatables-bs3/assets/css/datatables.css" />
        <link rel="stylesheet" href="<?= base_url()?>assets/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= base_url()?>/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= base_url()?>/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= base_url()?>/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?= base_url()?>/assets/vendor/modernizr/modernizr.js"></script>
        
        
		<script src="<?= base_url()?>/assets/vendor/jquery/jquery.js"></script>
	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<header class="header">
				<div class="logo-container">
					<a href="../" class="logo">
						<img src="<?= base_url()?>/assets/images/logo.png" height="35" alt="JSOFT Admin" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
						
					<span class="separator"></span>
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
								<span class="name"><?= $_SESSION['userName']?></span>
								<span class="role"><?= $_SESSION['userPosition']?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
                                <!--
								<li>
									<a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
								</li>
								<li>
									<a role="menuitem" tabindex="-1" href="#" data-lock-screen="true"><i class="fa fa-lock"></i> Lock Screen</a>
								</li>
                                -->
								<li>
									<a role="menuitem" tabindex="-1" href="<?= base_url('signin/signout')?>"><i class="fa fa-power-off"></i> Logout</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
			</header>
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li class="nav-active">
										<a href="<?= base_url('dashboard')?>">
											<i class="fa fa-bar-chart-o" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-user" aria-hidden="true"></i>
											<span>User</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?= base_url('user')?>">
													 View User
												</a>
											</li>
                                            <?php if($_SESSION['userPosition']=="admin"){?>
											<li>
												<a href="<?= base_url('user/register')?>">
													 New User
												</a>
											</li>
                                            <?php }?>
										</ul>
									</li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-car" aria-hidden="true"></i>
											<span>Cars</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=base_url('car')?>">
													 View Cars
												</a>
											</li>
											<li>
												<a href="<?=base_url('car/register')?>">
													 New Car
												</a>
											</li>
										</ul>
									</li>
                                    
                                    <?php if($_SESSION['userPosition']=="admin" || $_SESSION['userPosition']=="employee"){?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-map-marker" aria-hidden="true"></i>
											<span>Location</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=base_url('location')?>">
													 View Locations
												</a>
											</li>
											<li>
												<a href="<?=base_url('location/register')?>">
													 New Location
												</a>
											</li>
										</ul>
									</li>
                                    <?php } ?>
                                    
                                    <?php if($_SESSION['userPosition']=="admin" || $_SESSION['userPosition']=="employee"){?>
									<li class="nav-parent">
										<a>
											<i class="fa fa-truck" aria-hidden="true"></i>
											<span>Transport</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?=base_url('transport')?>">
													 Transport List
												</a>
											</li>
											<li>
												<a href="<?=base_url('transport/new_transport')?>">
													 New Transport
												</a>
											</li>
										</ul>
									</li>
                                    <?php } ?>
                                    
									<li class="nav-parent">
										<a>
											<i class="fa fa-truck" aria-hidden="true"></i>
                                            <span><b>Active</b> Transport</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?= base_url('active')?>">
													 View Schedule
												</a>
											</li>
										</ul>
									</li>
                                    
                                    <li class="nav-parent">
										<a>
											<i class="fa fa-exclamation" aria-hidden="true"></i>
                                            <span><b>Problem</b> Report</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?= base_url('problem')?>">
													 View Problems
												</a>
											</li>
										</ul>
									</li>
                                    
                                    <?php if($_SESSION['userPosition']=="admin" || $_SESSION['userPosition']=="employee"){?>
                                    <li class="nav-parent">
										<a>
											<i class="fa fa-archive" aria-hidden="true"></i>
											<span>Item</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?= base_url('item')?>">
													 Item List
												</a>
											</li>
											<li>
												<a href="<?= base_url('item/register')?>">
													 New Item
												</a>
											</li>
										</ul>
									</li>
                                    <?php } ?>
                                    
                                    <!--
                                    <li class="nav-parent">
										<a>
											<i class="fa fa-file" aria-hidden="true"></i>
											<span>Report</span>
										</a>
										<ul class="nav nav-children">
											<li>
												<a href="<?= base_url('report/driver')?>">
													 Driver Report
												</a>
											</li>
											<li>
												<a href="<?= base_url('report/location')?>">
													 Location Report
												</a>
											</li>
                                            <li>
												<a href="<?= base_url('report/transport')?>">
													 Transport Report
												</a>
											</li>
										</ul>
									</li>
                                    -->
									
								</ul>
							</nav>
				
							<hr class="separator" />
						</div>
				
					</div>
				
				</aside>
				<!-- end: sidebar -->