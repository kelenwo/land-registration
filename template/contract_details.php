<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Bid Contract</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Contract details</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

                <div class="col-xl-12 col-md-10 mb-2">
                  <div class="card h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters ">
                        <div class="col mr-2">
                          <table class="table " width="90%">
                            <tbody>
                              <tr>
                                <td class="table-dark" width="20%">Title</td>
                                <td width="80%">{contract_title}</td>
                              </tr>
                              <tr>
                                <td class="table-dark" width="20%">Contract Number</td>
                                <td>{bid_number}</td>
                              </tr>
                              <tr>
                                <td class="table-dark" width="20%">Description</td>
                                <td width="80%">{description}</td>
                              </tr>
                              <tr>
                                <td class="table-dark" width="20%">Category</td>
                                <td width="80%">{category}</td>
                              </tr>
                              <tr>
                                <td class="table-dark" width="20%">Location</td>
                                <td>{location}</td>
                              </tr>
                              <tr>
                                <td class="table-dark" width="20%">Contract Owner</td>
                                <td>{owner}</td>
                              </tr>
                              <tr>
                                <td class="table-dark" width="20%">Bid Opening date</td>
                                <td><?php echo date("d F Y", strtotime($bid_opening_date));?></td>
                              </tr>
                              <tr>
                                <td class="table-dark" width="20%">Bid Closing date</td>
                                <td><?php echo date("d F Y", strtotime($bid_closing_date));?></td>
                              </tr>
                              <?php if(!empty($document)):?>
                              <tr>
                                <td class="table-dark" width="25%">Attached Document</td>
                                <td>
                                <h6>{document}  &nbsp;&nbsp;<b style="color: green;"><a href="<?php echo base_url();?>uploads/documents/{document}">View/Download</a></b></h6>
                                </td>
                              </tr>
                              <?php endif;?>
                            </tbody>
                          </table>
                        <?php if($can_bid==true): ?>
                          <?php if(empty($company_name) && empty($company_position) && empty($doc1) && empty($doc2)): ?>
                            <h5 class="inline m-3 ml-3 text-danger">You can't place a bid, Your profile is not yet complete.
                              <a class="btn pl-5 pr-5 btn-success" href="<?php echo base_url();?>dashboard/edit_profile"><i class="far fa-edit"></i>
                                Complete Profile</a>
                              </h5>
                            <?php else: ?>
      <?php if(strtotime($bid_opening_date) <= strtotime(date('d F, Y')) && strtotime($bid_closing_date) > strtotime(date('d F, Y'))):?>
<button class="btn btn-success btn-lg btn-block" data-toggle="modal"  data-target="#bidcontractconfirm">Place Bid</button>
<?php elseif($bid_status==true): ?>
  <h4 class="text-center text-danger">You have Placed a bid for this contract already!!</h4>
<?php elseif(strtotime($bid_opening_date) > strtotime(date('d F, Y'))): ?>
  <h4 class="text-center text-danger">Bidding has not yet started!!</h4>
<?php elseif(strtotime($bid_closing_date) < strtotime(date('d F, Y'))): ?>
  <h4 class="text-center text-danger">Bidding is closed!!</h4>
<?php endif;?>
<?php endif;?>
<?php else: ?>
  <h4 class="text-center text-danger">You can't place bid, contact your administrator</h4>
<?php endif; ?>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

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

<!-- Bid contract modal -->
<div class="modal fade" id="bidcontractconfirm" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Complete Bid</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <form id="place_bid">
      <div class="modal-body m-3">
        <div class="form-group">
          <label>Amount to Bid <small style="color: red">*</small></label>
          <input type="number" name="bid_amount" class="form-control form-control-user" placeholder="Amount">
        </div>
        <div class="form-group">
        <label for="">Bill of Contract</label>
        <br><b id="loading-doc" style="color:green;"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
        <b id="success"></b>
        <div class="input-group">
          <div class="input-group-append">
                <label for="doc" class="btn btn-primary" type="button">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <i class="fas fa-upload fa-sm"></i> Upload file&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </label>
              </div>
<input type="text" id="doc1" class="form-control form-control-user small" placeholder="Bill of Contract">
 <input type="hidden" name="bill_of_contract" id="bill_of_contract">
              </div></div>
        <br>
        <div class="form-group">
          <h6>Clicking "place bid" registers you as one of the bidder for the product, do you understand?
            <small style="color: red">*</small>
          <input disabled type="checkbox" id="confirm" class="" style="height:1rem;width:1rem;background-color:#32b449;color:#fff"></h6>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id="placebid" disabled type="button">Place Bid <i id="loading" class="fas fa-cog fa-spin"></i></button>

        <input type="hidden" name="contract_title" value="{contract_title}">
        <input type="hidden" name="bid_number" value="{bid_number}">
        <input type="hidden" name="category" value="{category}">
        <input type="hidden" name="bid_by" value="{name}">
        <input type="hidden" name="bid_by_email" value="{email}">
        <input type="hidden" name="owner" value="{owner}">
        <input type="hidden" name="location" value="{location}">
        <input type="hidden" name="bid_date" value="<?php echo date('d-m-Y');?>">
        <input type="hidden" name="bid_time" value="<?php echo time();?>">
        <input type="hidden" name="bid_status" value="pending">
</form>
      </div>
    </div>
  </div>
</div>

</body>
<form id="uploadDoc">
<input type="file" name="doc" id="doc" style="visibility: hidden;">
</form>
</html>
<script>
$(document).ready(function() {
$('#loading').hide();
$('#loading-doc').hide();
$('#confirm').click(function() {
  if ($(this).is(':checked')) {
$('#placebid').removeAttr('disabled'); //enable input
} else {
$('#placebid').attr('disabled', true); //disable input
       }
});

$('#doc').on('change',function() {
  $('#loading-doc').show();
$('#uploadDoc').submit();
});

//Document 1
$('#uploadDoc').submit(function(e){
  $('#loading-doc').show();
              e.preventDefault();
 $.ajax({
     url:'<?php echo base_url();?>bidding/do_upload',
     type: 'POST',
     data:new FormData(this),
     processData:false,
     contentType:false,
     cache:false,
     dataType: 'JSON',
     async:false,
     success: function(data){
  $('#loading-doc').hide();
  if(data.success=='true') {
    $('#success').html('<b><i class="fas fa-check-square-o" style="color:green; font-size:14px;"> Document Uploaded successfully</i></b>')
    $('#doc1').val(data.file_name);
    $('#bill_of_contract').val(data.file_name);
    $('#confirm').removeAttr('disabled');
  } else if(data.success=='false') {
  $('#success').html('<i class="fa fa-info-circle" style="color:red;">'+data.msg+'</i>')
  }
      }
          });
       });


$('#placebid').on('click',function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."bidding/placebid";?>',
  type: "POST",
  data: $('#place_bid').serialize(),
  error: function(){
    alert('An error occured, please try again');
    $('#loading').hide();
  },
  timeout: 6000,
  success:function(data) {
$('#loading').hide();
if(data=="true") {
alert('Bid has been placed successfully');
window.location.href = "<?php echo base_url('bidding/pending');?>";
} else {
  alert(data);
}
  }
})
});
});
</script>
