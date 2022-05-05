
		<!-- Carousel -->
		<div id="main-slide" class="carousel slide" data-ride="carousel">

			<!-- Indicators -->
			<ol class="carousel-indicators visible-lg visible-md">
				<li data-target="#main-slide" data-slide-to="0" class="active"></li>
				<li data-target="#main-slide" data-slide-to="1"></li>
				<li data-target="#main-slide" data-slide-to="2"></li>
			</ol>
			<!--/ Indicators end-->

			<!-- Carousel inner -->
			<div class="carousel-inner">

				<div class="item active" style="background-image:url(<?php echo base_url();?>template/home/images/slider-main/bg1.jpg)">
					<div class="slider-content">
						<div class="col-md-12 text-center">
							<br>
							<br>
							<br>
							<br>
							<br>
							<h3 class="slide-sub-title animated2">Easy Land Registration and Management</h3>
							<p class="animated3" style="text-transform: capitalize; font-size: 20px; color:#eee;">Purchase Your Land from the rightful Owner with the right documents and manage your Properties in one place.

							<p>
								<a href="<?php echo base_url();?>ucp/login/signup" class="slider btn btn-primary">Sign up now</a>
								<a href="<?php echo base_url();?>contact" class="slider btn btn-primary border">Contact Us</a>
							</p>
						</div>
					</div>
				</div>
				<!--/ Carousel item 1 end -->


				<!--/ Carousel item 3 end -->

			</div><!-- Carousel inner end-->

			<!-- Controllers -->

		</div>
		<!--/ Carousel end -->

		<section class="call-to-action-box no-padding">
			<div class="container">
				<div class="action-style-box">
					<div class="row">
						<div class="col-md-10">
							<div class="call-to-action-text">
                                <input style="border: 1px #fff solid; color: #000" class="form-control" type="text" placeholder="Search by Location ... ">
							</div>
						</div><!-- Col end -->
						<div class="col-md-2">
							<div class="call-to-action-btn" style="margin-left: -30px;">
								<a class="btn btn-dark" style="border: 2px #000 solid" href="<?php echo base_url();?>ucp/login">Search</a>
							</div>
						</div><!-- col end -->
					</div><!-- row end -->
				</div><!-- Action style box -->
			</div><!-- Container end -->
		</section><!-- Action end -->
		<section id="main-container" class="main-container">
		 <div class="container">
			 <div class="row">
				 <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
		 			<div class="ts-intro">
		 				<h2 class="into-title"><b>Latest Listed Properties</b></h2><hr/>
		 			</div>
				</div>
		<div class=" col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<?php foreach($properties as $res): ?>
			<div class="product row pt-5 mb-3">
				<div class="col-md-5">
				<div class="post-media post-image">
					<img src="<?=base_url()?>template/home/images/news/news1.jpg" class="img-responsive" alt="">
				</div> </div>
				<div class="col-md-7">
				<div class="post-body">
					<div class="entry-header">
						<small class="post-meta">
								<span class="post-cat">
								<i class="fa fa-map-marker"></i><a href="#"><?=$res['location'];?></a>
							</span>
								</small>
						<h5 class=" ">
							<a href="<?=base_url();?>home/property_details/<?=$res['id']?>"><?=$res['title'];?></a>
						</h5>
					</div><!-- header end -->

					<div class="entry-content">
						<p><?=$res['description'];?></p>
					</div>

					<div class="post-footer">
						<a href="<?=base_url();?>home/property_details/<?=$res['id'];?>" class="btn btn-primary btn-sm d-inline">More details</a> <h3 class="d-inline text-danger ml-1">
						#<?=$res['price'];?></h3>
					</div>

				</div><!-- post-body end -->
			</div>

			</div><!-- 1st post end -->
		<?php endforeach;?>
	</div>
</div>
</div>
</section>
		<!-- Content Col end -->
		<section id="ts-features" class="ts-features">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div class="ts-intro">
							<h2 class="into-title">About Us</h2><hr/>
							<h3 class="into-sub-title">Land Purchase made easy and safe</h3>
							<p>Purchase your land from the right owner and avoid being defrauded even from your own comfort. You get to search and choose from varieties of available lands for purchase. All properties listed are duely registered and have all necessary documents.</p>
						</div><!-- Intro box end -->

						<div class="gap-20"></div>

						<div class="row">
							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fa fa-check-circle"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">Easy to use</h3>
									</div>
								</div><!-- Service 1 end -->
							</div><!-- col end -->

							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fa fa-lock"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">Fraud Free</h3>
									</div>
								</div><!-- Service 2 end -->
							</div><!-- col end -->
						</div><!-- Content row 1 end -->

						<div class="row">
							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fa fa-thumbs-up"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">Amazing User Experience</h3>
									</div>
								</div><!-- Service 1 end -->
							</div><!-- col end -->

							<div class="col-md-6">
								<div class="ts-service-box">
									<span class="ts-service-icon">
										<i class="fa fa-users"></i>
									</span>
									<div class="ts-service-box-content">
										<h3 class="service-box-title">Customer Friendly</h3>
									</div>
								</div><!-- Service 2 end -->
							</div><!-- col end -->
						</div><!-- Content row 1 end -->
					</div><!-- Col end -->

					<div class="col-md-6 col-xs-12">
						<h3 class="into-sub-title">Our Values</h3>
						<p></p>
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Security</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">
										<p>Security is our Priority.
											Procloud keeps your data private and safe with TLS/SSL and file encryption, ensuring what is yours stays yours.</p>
									</div>
								</div>
							</div>
							<!--/ Panel 1 end-->

							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseTwo"> Fraud Free</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse in">
									<div class="panel-body">
										<p>Properties Listed are duely checked and verified to ensure your are buying from the right owner.</p>
									</div>
								</div>
							</div>
							<!--/ Panel 2 end-->


							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseThree">
											Amazing User experience</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse in">
									<div class="panel-body">
										<p>it is so easy to use, you and your team won’t need any extensive training to get started.
											You can sign up for free and start taking control of your contracts right away.
											And if you have any questions our great support team is there for you.</p>
									</div>
								</div>
							</div>
							<!--/ Panel 3 end-->

						</div>
						<!--/ Accordion end -->

					</div><!-- Col end -->
				</div><!-- Row end -->
			</div><!-- Container end -->
		</section><!-- Feature are end -->


		<!-- Javascript Files
	================================================== -->

		<!-- initialize jQuery Library -->
		<script type="text/javascript" src="<?php echo base_url();?>template/home/js/jquery.js"></script>
		<!-- Bootstrap jQuery -->
		<script type="text/javascript" src="<?php echo base_url();?>template/home/js/bootstrap.min.js"></script>
		<!-- Owl Carousel -->
		<script type="text/javascript" src="<?php echo base_url();?>template/home/js/owl.carousel.min.js"></script>
		<!-- Color box -->
		<script type="text/javascript" src="<?php echo base_url();?>template/home/js/jquery.colorbox.js"></script>
		<!-- Isotope -->
		<script type="text/javascript" src="<?php echo base_url();?>template/home/js/isotope.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>template/home/js/ini.isotope.js"></script>


    <!-- Google Map API Key-->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
		<!-- Google Map Plugin-->
		<script type="text/javascript" src="<?php echo base_url();?>template/home/js/gmap3.js"></script>

	 <!-- Template custom -->
	 <script type="text/javascript" src="<?php echo base_url();?>template/home/js/custom.js"></script>

	</div><!-- Body inner end -->
</body>

</html>
