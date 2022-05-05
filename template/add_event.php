
        <!-- Begin Page Content -->
        <div class="container-fluid ml-7">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add Event</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-sm-8 col-md-8">
              <div class="card shadow mb-4">
                              <!-- Card Header - Accordion -->
          <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
              <h6 class="m-0 font-weight-bold text-primary">Event details</h6>
                </a>
    <!-- Card Content - Collapse -->
  <div class="collapse show" id="collapseCardExample" style="">
      <div class="card-body">
        <form id="add_event">
        <div class="form-group">
          <label>Title <small style="color: red">*</small></label>
          <input type="text" name="event_title" class="form-control form-control-user" placeholder="Event Title">
        </div>
        <div class="form-group">
          <label>Type <small style="color: red">*</small></label>
          <select name="type" class="form-control">
          <option >Category</option>
          <option value="contract">Contract</option>
          <option value="bid opening">Bid opening</option>
          <option value="bid closing">Bid closing</option>
          <option value="contract expiry">Contract Expiry</option>
          <option value="billing">Billing</option>
          <option value="others">Others</option>
        </select>
                </div>
                <div class="form-group">
                  <label>Date <small style="color: red">*</small></label>
                  <input name="event_date" type="date" class="form-control form-control-user">
                </div>

                <div class="form-group">
                  <label>Time <small style="color: red">*</small></label>
                  <input name="event_time" type="time" class="form-control form-control-user">
                </div>

                <div class="form-group">
                  <label>Description <small style="color: red">*</small></label>
                  <input type="text" name="description" class="form-control form-control-user" placeholder="Description">
                </div>
      </div>
          </div>
            </div>
            </div>
<input type="hidden" name="owner" value="{name}">
<input type="hidden" name="owner_email" value="{email}">
<input type="hidden" name="date" value="<?php echo date("d-M-Y");?>">
        <div class="form-group col-sm-8 col-md-8">
          <button class="btn btn-success btn-block" type="button" id="add">SUBMIT <i id="loading" class="fas fa-cog fa-spin"></i></button>
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

  $('#add').on('click',function() {
  $('#loading').show();
  $.ajax({
    url:'<?php echo base_url()."events/publish_event";?>',
    type: "POST",
    data: $('#add_event').serialize(),
    success:function(data) {
  $('#loading').hide();
  if(data='true') {
  alert('Event has been saved successfully');
  window.location.href = "<?php echo base_url();?>events/list";
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
