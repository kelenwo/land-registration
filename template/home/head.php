<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Basic Page Needs
	================================================== -->
	<meta charset="utf-8">
	<title>{title}</title>

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


	<!-- CSS
	================================================== -->

	<!-- Bootstrap -->
	<script src="<?php echo base_url();?>template/vendor/jquery/jquery.min.js"></script>
	<script src="<?php echo base_url();?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/bootstrap.min.css">
	<!-- Template styles-->
	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/style.css">
	<!-- Responsive styles-->
	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/responsive.css">
	<!-- FontAwesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/font-awesome.min.css">
	<!-- Animation -->
	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/animate.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/owl.theme.default.min.css">
	<!-- Colorbox -->
	<link rel="stylesheet" href="<?php echo base_url();?>template/home/css/colorbox.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
	<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>

<body>

	<div class="body-inner">

		<!-- Header start -->
		<header id="header" class="header-one">
			<div class="container">
				<div class="row">
					<div class="logo-area clearfix">
						<div class="logo col-xs-12 col-md-3">
							<a href="<?=base_url()?>">
								<img src="<?php echo base_url();?>template/home/images/logo.png" alt="">
							</a>
						</div><!-- logo end -->

						<div class="col-xs-12 col-md-9 header-right">
							<ul class="top-info-box">
								<li>
									<div class="info-box">
										<div class="info-box-content">
											<p class="info-box-title">Call Us</p>
											<p class="info-box-subtitle">15/EG/CO/000</p>
										</div>
									</div>
								</li>
								<li>
									<div class="info-box">
										<div class="info-box-content">
											<p class="info-box-title">Contact</p>
											<p class="info-box-subtitle">John Doe</p>
										</div>
									</div>
								</li>
								<li class="last">
									<div class="info-box last">
										<div class="info-box-content">
											<p class="info-box-title">Department</p>
											<p class="info-box-subtitle">Computer Engineering</p>
										</div>
									</div>
								</li>
							</ul><!-- Ul end -->
						</div><!-- header right end -->
					</div><!-- logo area end -->

				</div><!-- Row end -->
			</div><!-- Container end -->

			<nav class="site-navigation navigation navdown">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="site-nav-inner pull-left">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>

								<div class="collapse navbar-collapse navbar-responsive-collapse">
									<ul class="nav navbar-nav">
										<li class="active">
											<a href="<?php echo base_url();?>">Home</a>
										</li>

										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <i
													class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="<?php echo base_url();?>home/properties">Buy A Property</a></li>
												<li><a href="<?php echo base_url();?>property/sell">Sell Property</a></li>
											</ul>
										</li>

										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">Help Center   <i
													class="fa fa-angle-down"></i></a>
											<ul class="dropdown-menu" role="menu">
												<li><a href="<?php echo base_url();?>contact">Contacts Us </a></li>
											</ul>
										</li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle">About Us</a>
                    </li>
										<li class="dropdown">
											<a href="<?php echo base_url();?>ucp/login" class="dropdown-toggle">Sign In</a>
										</li>
									</ul>
									<!--/ Nav ul end -->
								</div>
								<!--/ Collapse end -->

							</div><!-- Site Navbar inner end -->

						</div>
						<!--/ Col end -->
					</div>
					<!--/ Row end -->

					<div class="nav-search">
						<span id="search"><i class="fa fa-search"></i></span>
					</div><!-- Search end -->

					<div class="search-block" style="display: none;">
						<input type="text" class="form-control" placeholder="Type what you want and enter">
						<span class="search-close">&times;</span>
					</div><!-- Site search end -->
				</div>
				<!--/ Container end -->

			</nav>
			<!--/ Navigation end -->
		</header>
		<!--/ Header end -->
