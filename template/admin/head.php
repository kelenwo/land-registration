<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> {title}</title>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="/favicon_16.ico"/>
    <link rel="bookmark" href="/favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="<?php echo base_url();?>template/admin/assets/css/site.min.css">
        <link href="<?php echo base_url();?>style/style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google	Fonts -->
    <link href="<?php echo base_url();?>template/admin/assets/css/fonts.css" rel="stylesheet" />
	    <!--  Jquery Core Script -->
    <script src="<?php echo base_url();?>template/admin/assets/js/jquery.min.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo base_url();?>template/admin/assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts -->
         <script src="<?php echo base_url();?>template/admin/assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="<?php echo base_url();?>template/admin/assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts -->
    <script src="<?php echo base_url();?>template/admin/assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts -->
         <script src="<?php echo base_url();?>template/admin/assets/js/custom.js"></script>
         <link href="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!-- [if lt IE 9] -->
     <!--[endif] -->
    <script type="text/javascript" src="/style/dist/js/site.min.js"></script>

  </head>
  <body>
    <?php //if(!isset($this->session->user_name)) {
       //header('Location:'. base_url().'ucp/login');
  //  } ?>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand"><h4>ePROCLOUD - Admin Panel</h4></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse ">
            <ul class="nav navbar-nav navbar-right">
              <li class="disabled"><a href="index.html"><h4>{name}</h4></a></li>
              <li class="active"><a href="<?php echo base_url();?>ucp/login/logout"><h5>Logout</h5></a></li>

              <!-- <li class="disabled"><a href="#">Link</a></li> -->
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-4 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                  <li><a class="list-group-item" id="index-tab" href="<?php echo base_url();?>ucp/manage">
                  <i class="fa fa-home" ></i>
                Dashboard </a></li>
                <li><a class="list-group-item" id="courses-tab" href="<?php echo base_url();?>ucp/manage/approved_contracts"><i class="fa fa-folder-open"></i>
              Approved<span class="badge badge-danger" style="display:none;" id="count"></span> </a></li>
              <li><a class="list-group-item" id="courses-tab" href="<?php echo base_url();?>ucp/manage/contracts"><i class="glyphicon glyphicon-list-alt"></i>
            Properties </a></li>
                <li><a class="list-group-item" id="courses-tab" href="<?php echo base_url();?>ucp/manage/events"><i class="fa fa-users"></i>
              Events</a></li>
                          <li><a class="list-group-item" id="courses-tab" href="<?php echo base_url();?>ucp/manage/users"><i class="fa fa-user"></i>
          Manage Users</a></li>
            <li><a class="list-group-item" id="add-tab" href="#"><i class="fa fa-bell">
            </i>News Items</a></li>
            <li><a class="list-group-item" id="settings-tab" href="<?php echo base_url();?>ucp/manage/bids">
              <i class="fa fa-list-alt"></i> Pending Approval</a></li>
                <li><a class="list-group-item" id="portal-tab" ><i class="fa fa-money"></i>
                  Payments</a></li>
                  <li><a class="list-group-item" id="settings-tab" >
                    <i class="fa fa-cogs"></i> Settings</a></li>

              </ul>
          </div>
  <div id="content"></div>

<script>
$(document).ready(function(){

  $.ajax({
    url:'<?php echo base_url()."ucp/manage/get_new_approved";?>',
    type: "GET",
    success:function(data) {
if(data > 0)  {
  $('#count').show();
  $('#count').html(data);
}
    }
  });

  });
  </script>
