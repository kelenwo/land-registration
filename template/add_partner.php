
        <!-- Begin Page Content -->
        <div class="container-fluid ml-7">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Business Partner</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-sm-8 col-md-8">
              <div class="card shadow mb-4">
                              <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Business Partner details</h6>
                </a>
    <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample" style="">
      <div class="card-body">
        <form id="add_partner">
        <div class="form-group">
          <label>Full Name <small style="color: red">*</small></label>
          <input type="text" name="name" class="form-control form-control-user" placeholder="Full Name">
        </div>
        <div class="form-group">
          <label>Phone Number <small style="color: red">*</small></label>
          <input type="text" name="phone" class="form-control form-control-user" placeholder="Phone Number">
        </div>
        <div class="form-group">
          <label>Email Address <small style="color: red">*</small></label>
          <input type="text" name="email" class="form-control form-control-user" placeholder="Email Address">
        </div>

        <div class="form-group">
          <label>Contract Title <small style="color: red">*</small></label>
        <select class="form-control form-control-user" name="contract_title" id="contract_title">
          <option>- Select Contract-</option>
          <?php foreach($contract as $res): ?>
            <option value="<?php echo $res['contract_title'];?>"><?php echo $res['contract_title'];?></option>
          <?php endforeach;?>
        </select>
        </div>
        <div class="form-group">
          <label>Contract Number <small style="color: red">*</small></label>
          <input type="text" disabled class="form-control form-control-user" id="contract_number" placeholder="Contract Number">
        </div>
<input type="hidden" name="owner_email" value="{email}">
<input type="hidden" name="contract_number" id="contract">
<input type="hidden" name="date" value="<?php echo date('d-m-Y');?>">

      </div>
          </div>
            </div>
            </div>

        <div class="form-group col-sm-8 col-md-8">
          <button type="button" id="submit" class="btn btn-success btn-block" disabled>SUBMIT <i class="fas fa-cog fa-spin" id="loading"></i></button>
        </div>
      </div>
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

//lOAD CONTRACT NUMBER BASED ON SELECTED CONTRACT TITLE
  $('#contract_title').on('change',function() {
    $.ajax({
      url:'<?php echo base_url()."partners/get_contract_number";?>',
      type: "POST",
      data: $('#add_partner').serialize(),
      success:function(data) {
        $('#contract_number').val(data);
        $('#contract').val(data);
        $('#submit').removeAttr('disabled');
      }
    })
  });


  $('#submit').on('click',function() {
  $('#loading').show();
  $.ajax({
    url:'<?php echo base_url()."partners/publish_partner";?>',
    type: "POST",
    data: $('#add_partner').serialize(),
    success:function(data) {
  $('#loading').hide();
  if(data='true') {
  alert('Business Partner has been saved successfully');
  window.location.href = "<?php echo base_url();?>partners/list";
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
