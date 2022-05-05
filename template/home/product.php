<!DOCTYPE html>
<html lang="en">
<body>

	<div class="body-inner">

   <div id="banner-area" class="banner-area" style="background-image:url(../template/home/images/banner/banner1.jpg)">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">News</h1>
                     <ol class="breadcrumb">
                        <li>Home</li>
                        <li>News</li>
                        <li><a href="#">News Left Sidebar</a></li>
                     </ol>
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end -->


   <section id="main-container" class="main-container">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

					<div class="sidebar sidebar-left">
						<div class="widget">
							<h3 class="widget-title">Filter Results</h3>
							<ul class="arrow nav nav-tabs nav-stacked">
		                  <li><a href="#">Construction</a></li>
		                  <li><a href="#">Commercial</a></li>
		                  <li><a href="#">Building</a></li>
		                  <li><a href="#">Safety</a></li>
		                  <li><a href="#">Structure</a></li>
		              	</ul>
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
				<div class=" col-lg-9 col-md-9 col-sm-9 col-xs-12">
					<?php foreach($properties as $res): ?>
					<div class="product row pt-5 mb-3">
						<div class="col-md-6">
						<div class="post-media post-image">
							<img src="../template/home/images/news/news1.jpg" class="img-responsive" alt="">
						</div> </div>
						<div class="col-md-6">
						<div class="post-body">
							<div class="entry-header">
					 			<small class="post-meta">
										<span class="post-cat">
										<i class="fa fa-map-marker"></i><a href="#"><?=$res['location'];?></a>
   								</span>
   								<span class="post-meta-date"><i class="fa fa-calendar"></i> <?=date("d F Y", strtotime($res['date']));?></span>
								</small>
								<h2 class="entry-title">
					 				<a href="<?=base_url();?>home/property_details"><?=$res['title'];?></a>
					 			</h2>
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


					<div class="paging">
		            <ul class="pagination">
		              <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
		              <li class="active"><a href="#">1</a></li>
		              <li><a href="#">2</a></li>
		              <li><a href="#">3</a></li>
		              <li><a href="#">4</a></li>
		              <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
		            </ul>
	          	</div>

				</div><!-- Content Col end -->

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
