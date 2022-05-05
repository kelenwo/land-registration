
        <!-- Begin Page Content -->
        <div class="container-fluid ml-7">
          <!-- Event details start-->
          <div class="col-md-10">
            <?php if(empty($company_name) && empty($company_address) && empty($company_position) && empty($doc1) && empty($doc2)): ?>
              <h5 class="inline mb-3 text-warning">Your profile is not yet complete.
                <a class="btn pl-5 pr-5 btn-success" href="<?php echo base_url();?>dashboard/edit_profile"><i class="far fa-edit"></i>
                  Complete Profile</a>
                </h5>
              <?php endif;?>
          <span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
          <i class="fas fa-circle fa-stack-2x"></i>
          <i class="fas fa-user fa-stack-1x fa-inverse"></i>
        </span> <h5 class="inline mb-3">Personal Details</h5>
          </div>
          <div class="col-sm-10 col-md-10 card  bg-light ml-4 mr-4">
          <div class="card-body" style="margin: -5px!important;">
          <div class="row">
                            <div class="col-sm-6 col-md-6 mt-3">
                          <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Full name:</small>
                          <br>
                        <h6>{name}</h6></div>
                    <div class="ml-3">
                    <div class="text-sm text-primary text-capitalize"><small class="text-success">Mobile Number:</small>
                    <br>
                  <h6>{phone}</h6></div>
                  <div class="text-sm text-primary text-capitalize"><small class="text-success">Grade Points:</small>
                  <br>
                <h6>{points}</h6></div>
                      </div></div>
                  <div class="col-sm-5 col-md-5 ml-4 mt-3">
                  <div class="ml-3">
                    <div class="text-sm text-primary text-capitalize"><small class="text-success">Email Address:</small>
                    <br>
                  <h6>{email}</h6></div>
                <div class="text-sm text-primary text-capitalize"><small class="text-success">Date Joined:</small>
            <br>
          <h6>{date}</h6></div>

                  </div>
                </div>
              </div>
                </div>
          <!-- event details end -->

        </div>
      <!-- work details -->
      <div class="col-md-10 mt-3">
      <span class="fa-stack text-info fa-2x" style="font-size: 0.9em !important;">
      <i class="fas fa-circle fa-stack-2x"></i>
      <i class="fas fa-suitcase fa-stack-1x fa-inverse"></i>
    </span> <h5 class="inline mb-3">Work Details</h5>
      </div>
      <div class="col-sm-10 col-md-10 card  bg-light ml-4 mr-4">
      <div class="card-body" style="margin: -5px!important;">
      <div class="row">
                        <div class="col-sm-6 col-md-6 mt-3">
                      <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Company name:</small>
                      <br>
                    <h6>{company_name}</h6></div>
                <div class="ml-3">
                <div class="text-sm text-primary text-capitalize"><small class="text-success">Company Address:</small>
                <br>
              <h6>{company_address}</h6></div>
              <div class="text-sm text-primary text-capitalize"><small class="text-success">Postal Code:</small>
              <br>
            <h6>{company_zip_code}</h6></div>
            </div></div>
              <div class="col-sm-5 col-md-5 ml-4 mt-3">
                <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Position:</small>
                <br>
              <h6>{company_position}</h6></div>
          <div class="ml-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Country:</small>
          <br>
        <h6>{company_country}</h6></div>
        <div class="text-sm text-primary text-capitalize"><small class="text-success">State:</small>
        <br>
      <h6>{company_state}</h6></div>
              </div>
            </div>
          </div>
            </div>
</div>
    <!-- Documents -->
    <div class="col-md-10 mt-3">
    <span class="fa-stack text-warning fa-2x" style="font-size: 0.9em !important;">
    <i class="fas fa-circle fa-stack-2x"></i>
    <i class="fas fa-file fa-stack-1x fa-inverse"></i>
  </span> <h5 class="inline mb-3">Documents</h5>
    </div>
    <div class="col-sm-10 col-md-10 card  bg-light ml-4 mr-4">
    <div class="card-body" style="margin: -5px!important;">
    <div class="row">
                      <div class="col-sm-6 col-md-6 mt-3">
                    <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Document 1:</small>
                    <br>
                    <?php if(empty($doc1)):?>
                      <h6>No document uploaded.</h6>
                    <?php else:?>
                  <h6>{doc1} <br><small><a href="<?php echo base_url();?>uploads/documents/{doc1}">View/Download</a></small></h6>
                <?php endif;?>
                </div>
                    <div class="ml-3">
              <div class="text-sm text-primary text-capitalize"><small class="text-success">Document 2:</small>
              <br>
              <?php if(empty($doc2)):?>
                <h6>No document uploaded.</h6>
              <?php else:?>
            <h6>{doc2} <small><a href="<?php echo base_url();?>uploads/documents/{doc2}">View/Download</a></small></h6>
          <?php endif;?>
          </div>
          </div></div>
            <div class="col-sm-5 col-md-5 ml-4 mt-3">
              <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Document 3:</small>
              <br>
              <?php if(empty($doc3)):?>
                <h6>No document uploaded.</h6>
              <?php else:?>
            <h6>{doc3} <small><a href="<?php echo base_url();?>uploads/documents/{doc4}">View/Download</a></small></h6>
          <?php endif;?>
          </div>
            <div class="ml-3">
        <div class="text-sm text-primary text-capitalize"><small class="text-success">Document 4:</small>
        <br>
        <?php if(empty($doc4)):?>
          <h6>No document uploaded.</h6>
        <?php else:?>
      <h6>{doc} <small><a href="<?php echo base_url();?>uploads/documents/{doc4}">View/Download</a></small></h6>
    <?php endif;?></div>
        </div>
        </div>
          </div>
      <!-- event details end -->

    </div>
        <!-- /.container-fluid -->

      </div>
      <div class="ml-4 inline">
        <div class="form-group text-center mt-3">
          <a class="btn pl-5 pr-5 btn-success" href="<?php echo base_url('dashboard/edit_profile');?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="far fa-edit"></i>
             Edit Profile &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
           </div>
      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->


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
