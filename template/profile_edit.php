<style>
.small {
  color: black !important;
}
</style>
        <!-- Begin Page Content -->
        <div class="container-fluid ml-7">
          <!-- Event details start-->
          <form id="update_profile">
          <div class="col-md-10">
          <span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
          <i class="fas fa-circle fa-stack-2x"></i>
          <i class="fas fa-user fa-stack-1x fa-inverse"></i>
        </span> <h5 class="inline mb-3">Profile Details</h5>
          </div>
          <div class="col-sm-10 col-md-10 card  bg-light ml-4 mr-4">
          <div class="card-body" style="margin: -5px!important;">
          <div class="row">
                            <div class="col-sm-6 col-md-6 mt-3">
                          <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Full name:</small>
                          <br>
                        <input class="form-control form-control-user" type="text" value="{name}" name="name" placeholder="Full name">
                      </div>
                    <div class="ml-3">
                      <br>
                    <div class="text-sm text-primary text-capitalize"><small class="text-success">Mobile Number:</small>
                    <br>
                  <input class="form-control form-control-user" type="text" value="{phone}" name="phone" placeholder="Phone Number">
                </div><br>

<input type="hidden" name="id" value="{id}">
                </div></div>
                  <div class="col-sm-5 col-md-5 ml-4 mt-3">
              <div class="ml-3">
                <div class="text-sm text-primary text-capitalize"><small class="text-success">Email Address:</small>
                <br>
                <input class="form-control form-control-user" type="text" value="{email}" name="email" placeholder="Email Address">
                </div>

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
                    <input class="form-control form-control-user" type="text" value="{company_name}" name="company_name" placeholder="Company Name">
                    </div>
                <div class="ml-3"><br>
                <div class="text-sm text-primary text-capitalize"><small class="text-success">Company Address:</small>
                <br>
      <input class="form-control form-control-user" type="text" value="{company_address}" name="company_address" placeholder="Company Address">
</div><br>
              <div class="text-sm text-primary text-capitalize"><small class="text-success">Postal Code:</small>
              <br>
          <input class="form-control form-control-user" type="text" value="{company_zip_code}" name="company_zip_code" placeholder="Postal Code">

          </div>
            </div></div>
              <div class="col-sm-5 col-md-5 ml-4 mt-3">
                <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Position in the Company:</small>
                <br>
        <input class="form-control form-control-user" type="text" value="{company_position}" name="company_position" placeholder="Your Position">
</div>
          <div class="ml-3"><br>
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Country:</small>
          <br>
  <input class="form-control form-control-user" type="text" value="{company_country}" name="company_country" placeholder="Country">
</div><br>
        <div class="text-sm text-primary text-capitalize"><small class="text-success">State/city:</small>
        <br>
      <input class="form-control form-control-user" type="text" value="{company_state}" name="company_state" placeholder="State">
</div>
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
                  <h6>{doc1} <small><a href="<?php echo base_url();?>uploads/documents/{doc1}">View/Download</a></small></h6>
                <?php endif;?>
                  <b id="loading1"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
                  <b id="success1"></b>
                    <div class="input-group">
            <input type="text" name="doc1" value="{doc1}" class="form-control form-control-user small" placeholder="Title of document">
                  <div class="input-group-append">
                        <label for="docs1" class="btn btn-primary" type="button">
                          <i class="fas fa-upload fa-sm"></i>  <?php if(empty($doc1)):?>Upload file<?php else: ?> Change file<?php endif;?>
                        </label>
                      </div> <input type="hidden" value="{doc1}" name="doc1" class="docs1">
                          </div></div><br>
                    <div class="">
                      <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Document 2:</small>
                      <br>
                      <?php if(empty($doc2)):?>
                        <h6>No document uploaded.</h6>
                      <?php else:?>
                    <h6>{doc2} <small><a href="<?php echo base_url();?>uploads/documents/{doc2}">View/Download</a></small></h6>
                  <?php endif;?>
                      <b id="loading2"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
                      <b id="success2"></b>
                      <div class="input-group">
              <input type="text" name="doc2" value="{doc2}" class="form-control form-control-user small" placeholder="Title of document">
                    <div class="input-group-append">
                          <label for="docs2" class="btn btn-primary" type="button">
                            <i class="fas fa-upload fa-sm"></i>  <?php if(empty($doc2)):?>Upload file<?php else: ?> Change file<?php endif;?>
                          </label>
                        </div><input type="hidden" <?php if(!empty($doc2)):?>value="{doc2}"<?php else: ?> <?php endif;?> name="doc2" class="docs2">
                            </div></div>
          </div></div>

            <div class="col-sm-5 col-md-5 ml-4 mt-3">
              <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Document 3:</small>
              <br>
              <?php if(empty($doc3)):?>
                <h6>No document uploaded.</h6>
              <?php else:?>
            <h6>{doc3} <small><a href="<?php echo base_url();?>uploads/documents/{doc3}">View/Download</a></small></h6>
          <?php endif;?>
              <b id="loading3"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
              <b id="success3"></b>
              <div class="input-group">
      <input type="text" name="doc3" value="{doc3}" class="form-control form-control-user small" placeholder="Title of document">
            <div class="input-group-append">
                  <label for="docs3" class="btn btn-primary" type="button">
                    <i class="fas fa-upload fa-sm"></i>  <?php if(empty($doc3)):?>Upload file<?php else: ?> Change file<?php endif;?>
                  </label>
                </div> <input type="hidden" <?php if(!empty($doc3)):?>value="{doc3}"<?php else: ?> <?php endif;?> name="doc3" class="docs3">
                    </div></div><br>

            <div class="">
              <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Document 4:</small>
              <br>
              <?php if(empty($doc1)):?>
                <h6>No document uploaded.</h6>
              <?php else:?>
            <h6>{doc4} <small><a href="<?php echo base_url();?>uploads/documents/{doc4}">View/Download</a></small></h6>
          <?php endif;?>
              <b id="loading4"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
              <b id="success4"></b>
              <div class="input-group">
      <input type="text" name="doc4" value="{doc4}" class="form-control form-control-user small" placeholder="Title of document">
            <div class="input-group-append">
                  <label for="docs4" class="btn btn-primary" type="button">
                    <i class="fas fa-upload fa-sm"></i>  <?php if(empty($doc4)):?>Upload file<?php else: ?> Change file<?php endif;?>
                  </label>
                </div><input type="hidden" <?php if(!empty($doc4)):?>value="{doc4}"<?php else: ?> <?php endif;?> name="doc4" class="docs4">
                          </div></div>

        </div>
        </div>
          <div class="col-sm-12 col-md-12">
            <button type="button" id="update" class="btn btn-block btn-success">Update Profile <i class="fas fa-cog fa-spin" id="loading"></i></button>
          </div>
          </div>
      <!-- event details end -->

    </div>
        <!-- /.container-fluid -->
</form>
      </div>
      <!-- End of Main Content -->


    </div>
    <!-- End of Content Wrapper -->
    <form id="upload1">
    <input type="file" name="docs1" id="docs1" style="visibility: hidden;">
<input type="hidden" name="type" value="docs1"></form>
    <form id="upload2"><input type="hidden" name="type" value="docs2">
    <input type="file" name="docs2" id="docs2" style="visibility: hidden;"></form>
    <form id="upload3"><input type="hidden" name="type" value="docs3">
    <input type="file" name="docs3" id="docs3" style="visibility: hidden;"></form>
    <form id="upload4"><input type="hidden" name="type" value="docs4">
    <input type="file" name="docs4" id="docs4" style="visibility: hidden;"></form>

  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script>
  $(document).ready(function() {

  //Hide all loading icons
  $('#loading').hide();
  $('#loading1').hide();
  $('#loading2').hide();
  $('#loading3').hide();
  $('#loading4').hide();

//Submit the file upload on file select
$('#docs1').on('change',function() {
  $('#loading-verify').show();
$('#upload1').submit();
});
$('#docs2').on('change',function() {
  $('#loading2').show();
$('#upload2').submit();
});
$('#docs3').on('change',function() {
  $('#loading3').show();
$('#upload3').submit();
});
$('#docs4').on('change',function() {
  $('#loading4').show();
$('#upload4').submit();
});

//Document 1
$('#upload1').submit(function(e){
  $('#loading1').show();
              e.preventDefault();
                   $.ajax({
                       url:'<?php echo base_url();?>dashboard/do_upload',
                       type:"post",
                       data:new FormData(this),
                       processData:false,
                       contentType:false,
                       cache:false,
                       async:false,
                        success: function(data){
  $('#loading1').hide();
  $('#success1').html(data);
      }
                   });
              });

  //Document 2
  $('#upload2').submit(function(e){
    $('#loading2').show();
                e.preventDefault();
                     $.ajax({
                         url:'<?php echo base_url();?>dashboard/do_upload',
                         type:"post",
                         data:new FormData(this),
                         processData:false,
                         contentType:false,
                         cache:false,
                         async:false,
                          success: function(data){
    $('#loading2').hide();
    $('#success2').html(data);
        }
                     });
                });
//Document 3
$('#upload3').submit(function(e){
  $('#loading3').show();
              e.preventDefault();
                   $.ajax({
                       url:'<?php echo base_url();?>dashboard/do_upload',
                       type:"post",
                       data:new FormData(this),
                       processData:false,
                       contentType:false,
                       cache:false,
                       async:false,
                        success: function(data){
  $('#loading3').hide();
  $('#success3').html(data);
      }
                   });
              });

//Document 4
$('#upload4').submit(function(e){
  $('#loading4').show();
              e.preventDefault();
                   $.ajax({
                       url:'<?php echo base_url();?>dashboard/do_upload',
                       type:"post",
                       data:new FormData(this),
                       processData:false,
                       contentType:false,
                       cache:false,
                       async:false,
                        success: function(data){
  $('#loading4').hide();
  $('#success4').html(data);
      }
                   });
              });

  //Save edits

  $('#update').on('click',function() {
  $('#loading').show();
  $.ajax({
    url:'<?php echo base_url()."dashboard/update_profile";?>',
    type: "POST",
    error: function(){
      alert('An error occured, please try again');
      $('#loading').hide();
    },
    timeout: 6000,
    data: $('#update_profile').serialize(),
    success:function(data) {
  $('#loading').hide();
  if(data='true') {
  alert('Profile has been saved successfully');
  window.location.href = "<?php echo base_url();?>dashboard/profile";
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
