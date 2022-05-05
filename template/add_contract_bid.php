
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Contract</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-7">
              <div class="card shadow mb-4">
                              <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">General Information</h6>
                </a>
    <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample" style="">
      <div class="card-body">
        <form id="add_contract"><div class="form-group">
          <label>Contract Title <small style="color: red">*</small></label>
          <input disabled value="{contract_title}" type="text" class="form-control form-control-user" placeholder="Contract Title">
          <input value="{contract_title}" type="hidden" name="contract_title">

        </div>
        <div class="form-group">
          <label>Contract Number <small style="color: red">*</small></label>
          <input type="text" disabled value="{bid_number}" class="form-control form-control-user" placeholder="Contract Number">
          <input type="hidden" name="contract_number" value="{bid_number}">
        </div>
        <div class="form-group">
          <label>Category <small style="color: red">*</small></label>
          <select name="category" class="form-control">
          <option value="{category}">{category}</option>
        </select>
                </div>
        <div class="form-group">
          <label>Status <small style="color: red">*</small></label>
          <select name="status" class="form-control">
          <option value="active">Active</option>
        </select>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="description" class="form-control form-control-user" placeholder="Description">
                </div>
      </div>
          </div>
            </div>
            </div>
<!-- Contract Lifecylce -->
            <div class="col-xl-5 col-lg-5">
              <div class="card shadow mb-4">
                              <!-- Card Header - Accordion -->
          <a href="#lifecylclecard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="lifecylclecard">
              <h6 class="m-0 font-weight-bold text-primary">Life Cycle</h6>
                </a>
    <!-- Card Content - Collapse -->
  <div class="collapse show" id="lifecylclecard" style="">
      <div class="card-body">
        <div class="form-group">
          <label>Start Date <small style="color: red">*</small></label>
          <input type="date" name="start_date" value="" class="form-control form-control-user">
                  </div>
        <div class="form-group">
          <label>End Date <small style="color: red">*</small></label>
          <input type="date" value="{end_date}" name="end_date" class="form-control form-control-user">
        </div>
        <div class="form-group">
          <label>Contract has renewal? <small style="color: red">*</small></label>
          <input type="checkbox" id="has_renewal" name="has_renewal" class="" value="1" style="height:1.1rem;width:1.1rem;background-color:#32b449;color:#fff">
        </div>
        <div class="form-group">
          <label>Renewal Period</label>
          <input type="date" id="renewal_period" name="renewal_period" class="form-control form-control-user" disabled>
        </div>
</div>
                </div>
      </div>
          </div>

<!-- Billing transactions -->

          <div class="col-xl-10 col-lg-10">
            <div class="card shadow mb-4">
                            <!-- Card Header - Accordion -->
        <a href="#billingcard" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="billingcard">
            <h6 class="m-0 font-weight-bold text-primary">Billing and Financials</h6>
              </a>
  <!-- Card Content - Collapse -->
<div class="collapse" id="billingcard" style="">
    <div class="card-body">
      <div class="form-group">
        <label>Billing Cycle <small style="color: red">*</small></label>
        <select name="billing_cycle" class="form-control">
        <option value="One time">One time</option>
        <option value="Yearly">Yearly</option>
      </select>
    </div>
    <div class="form-group">
      <label>Billing Amount <small style="color: red">*</small></label>
      <input type="text" disabled value="NGN &nbsp;{bid_amount}" class="form-control form-control-user">
<input type="hidden" value="{bid_amount}" name="billing_amount">
    </div>

      <div class="form-group">
        <label>First Billing Date <small style="color: red">*</small></label>
        <input type="date" name="first_billing_date" class="form-control form-control-user">
      </div>
      <div class="form-group">
        <label>Last Billing Date <small style="color: red">*</small></label>
        <input type="date" name="last_billing_date" class="form-control form-control-user">
      </div>

</div>
              </div>
    </div>
        </div>
        <div class="form-group col-lg-10">
          <button class="btn btn-success btn-block" type="button" id="add">SUBMIT <i id="loading" class="fas fa-cog fa-spin"></i></button>
        </div>
      </div>
      <input type="hidden" name="contract_owner" value="{name}">
      <input type="hidden" name="owner" value="{owner}">
      <input type="hidden" name="owner_email" value="{email}">
      <input type="hidden" name="date" value="<?php echo date("d M Y");?>">
</form>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>
  $(document).ready(function() {

  //Hide all loading icons
  $('#loading').hide();

  $('#has_renewal').click(function() {
    if ($(this).is(':checked')) {
  $('#renewal_period').removeAttr('disabled'); //enable input
  } else {
  $('#renewal_period').attr('disabled', true); //disable input
         }
  });

  $('#add').on('click',function() {
  $('#loading').show();
  $.ajax({
    url:'<?php echo base_url()."contracts/publish_contract_bid";?>',
    type: "POST",
    data: $('#add_contract').serialize(),
    success:function(data) {
  $('#loading').hide();
  if(data='true') {
  alert('Contract has been published successfully');
  window.location.href = "<?php echo base_url();?>contracts/list";
} else {
    alert(data);
  }
    }
  })
  });
  });
  </script>

</body>

</html>
