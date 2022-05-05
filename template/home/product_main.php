<!DOCTYPE html>
<html lang="en">
<body>

	<div class="body-inner">

   <section id="main-container" class="main-container">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					<div class="post">

						<div class="post-body">
							<div class="entry-header">
								<div class="col-md-9">
								<h2 class="entry-title">
					 				{title}
					 			</h2><div class="post-meta">
									<span class="post-author">
										<i class="fa fa-user"></i><a href="#"> {size} Plots</a>
   								</span>
									<span class="post-cat">
										<i class="fa fa-map-marker"></i><a href="#"> {location}</a>
   								</span>
   								<span class="post-meta-date"><i class="fa fa-calendar"></i><?=date("d F Y", strtotime($date));?></span>
								</div>
							</div></div>
					 	 <div class="col-md-3">
					 			<h2 class="text-danger">
					 			#{price}</h2></div>


							</div><!-- header end -->
						<div class="post-media post-image">
							<img src="<?=base_url()?>template/home/images/news/news1.jpg" class="img-responsive" alt="">
						</div>
						<hr/>
							<div class="mt-2 entry-content"><h4>Property Description</h4>
								<p>{description}</p>
							</div>
							<hr>

							<div class="col-md-12 bg-light text-center" style="background-color: #ddd; width: 100%; min-height: auto !important; padding: 5px; color: black">
								<div >
								interested in this Property? <br><button type="button" class="btn btn-success ">Send us a message</button> <h4> or  Call: 08104567890</h4>
							</div>
							</div>

						</div><!-- post-body end -->


				</div><!-- Content Col end -->
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

					<div class="sidebar sidebar-right">
						<div class="widget">
							<h3 class="widget-title">Filter Results</h3>
							<div class="post-meta">
									<span class="post-autho">
										<i class="fa fa-user"></i><a href="#"> 10 Plots</a>
   								</span><br>
									<span class="post-cat">
										<i class="fa fa-map-marker"></i><a href="#"> Use offot, Nwaniba</a>
   								</span><br>
   								<span class="post-meta-date"><i class="fa fa-calendar"></i> June 14, 2022</span>
								</div>
						</div><!-- Categories end -->

						<div class="widget widget-tags">
							<h3 class="widget-title">Tags </h3>

							<ul class="unstyled clearfix">
			              	<li><a href="#">Construction</a></li>
		                  <li><a href="#">Design</a></li>
		                  <li><a href="#">Project</a></li>
		                  <li><a href="#">Building</a></li>
		                  <li><a href="#">Finance</a></li>
		                  <li><a href="#">Safety</a></li>
		                  <li><a href="#">Contracting</a></li>
		                  <li><a href="#">Planning</a></li>
			            </ul>
						</div><!-- Tags end -->


					</div><!-- Sidebar end -->
				</div><!-- Sidebar Col end -->
			</div><!-- Main row end -->

		</div><!-- Container end -->
	</section><!-- Main container end -->


	<!-- Javascript Files
================================================== -->

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- Owl Carousel -->
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<!-- Color box -->
	<script type="text/javascript" src="js/jquery.colorbox.js"></script>
	<!-- Isotope -->
	<script type="text/javascript" src="js/isotope.js"></script>
	<script type="text/javascript" src="js/ini.isotope.js"></script>


	<!-- Google Map API Key-->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
	<!-- Google Map Plugin-->
	<script type="text/javascript" src="js/gmap3.js"></script>

 <!-- Template custom -->
 <script type="text/javascript" src="js/custom.js"></script>

</div><!-- Body inner end -->
</body>

</html>
