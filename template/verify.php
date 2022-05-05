<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ePROCLOUD - Verify Account</title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>template/assets/css/sb-admin-2.min.css" rel="stylesheet">
  <!--  Jquery Core Script -->
<script src="<?php echo base_url();?>template/admin/assets/js/jquery.min.js"></script>
<!--  Core Bootstrap Script -->
<script src="<?php echo base_url();?>template/admin/assets/js/bootstrap.js"></script>

</head>

<body class="bg-gradient-primary">

  <div class="container">
      <div class="row">
<div class="col-lg-2"></div>
    <div class="col-lg-7">
      <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->


<div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h2 text-gray-900 mb-4">Verify your account</h1>
              </div>
              <form class="user" id="register">
                <h1 class="h4 text-gray-900 mb-4">Verification code has been sent to {email}.</h1>
                <div class="form-group">
                  <input type="text" name="auth" class="form-control form-control-user" id="auth" placeholder="Enter code from email.">
                </div>
                <input type="hidden" name="email" value="{email}">
                <input type="hidden" name="name" value="{name}">
                <input type="hidden" name="phone" value="{phone}">
                <button id="submit" type="button" class="btn btn-primary btn-user btn-block">
                  Submit <i id="loading" class="fas fa-cog fa-spin"></i>
                </button>
                </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3"></div>


  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url();?>template/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url();?>template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url();?>template/assets/js/sb-admin-2.min.js"></script>

</body>
<script>
$(document).ready(function() {

//Hide all loading icons
$('#loading').hide();
//get Issue list from db

$('#submit').on('click',function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."ucp/login/auth";?>',
  type: "POST",
  error: function(){
    alert('An error occured, please try again');
    $('#loading').hide();
  },
  timeout: 6000,
  data: $('#register').serialize(),
  success:function(data) {
$('#loading').hide();
if(data=="true") {
window.location.href = "<?php echo base_url('dashboard/index');?>";
} else {
alert(data);
}
  }
})
});

});
</script>
</html>
