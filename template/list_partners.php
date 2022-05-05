<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Business Partners</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <a class="btn btn-success" href="<?php echo base_url();?>partners/add">Add Business Partner</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<!-- View partners Start -->
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">#</th>
  <th width="25%">Name</th>
  <th width="20%">Email</th>
  <th width="15%">Phone Number</th>
  <th width="30%">Contract</th>
</tr>
</thead>
  <tbody>
<?php if($partner==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($partner as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewpartner-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['name']; ?></a></td>
<td><?php echo $req['email']; ?></td>
<td><?php echo $req['phone']; ?></td>
<td><?php echo $req['contract_title'];?></td>

<!-- delete partner -->
</tr>
<form id="del_partner-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="type" value="partner">
</form>
<!-- delete partner end -->

<!--edit partner modal -->
<div class="modal fade" id="edit_partner_<?php echo $req['id'];?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" style="width:700px !important;" role="document">
 <div class="modal-content">
 <div class="modal-header inline">
   <div class="text-center mt-2">
  <span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
  <i class="fas fa-circle fa-stack-2x"></i>
  <i class="fas fa-edit fa-stack-1x fa-inverse"></i>
</span> <h3 class="inline">Edit Business Partner</h3>
  </div>
 </div>
 <div class="modal-body">
   <div class="row">
<form name="edit_partner-<?php echo $req['id'];?>" method="post" id="edit_partner-<?php echo $req['id'];?>">
<div class="form-group col-md-12">
  <label>Name <small style="color: red">*</small></label>
  <input type="text" name="name" value="<?php echo $req['name'];?>" class="form-control form-control-user" placeholder="Name">
</div>

<div class="form-group col-md-12">
  <label>Email Address <small style="color: red">*</small></label>
  <input type="text" name="email" value="<?php echo $req['email'];?>" class="form-control form-control-user" placeholder="Email Address">
</div>

<div class="form-group col-md-12">
  <label>Phone Number <small style="color: red">*</small></label>
  <input type="text" name="phone" value="<?php echo $req['phone'];?>" class="form-control form-control-user" placeholder="Phone Number">
</div>
<div class="form-group col-md-12">
  <label>Contract Title <small style="color: red">*</small></label>
  <select name="contract_title" class="form-control" id="contract_number-<?php echo $req['id'];?>">
    <?php foreach($contract as $res): ?>
      <option value="<?php echo $res['contract_title'];?>" <?php if($req['contract_title']==$res['contract_title']) { echo 'selected';} ?>>
      <?php echo $res['contract_title'];?></option>
    <?php endforeach;?>
</select>
        </div>
        <div class="form-group col-md-12">
          <label>Contract Number <small style="color: red">*</small></label>
          <input type="text" disabled class="form-control form-control-user" value="<?php echo $req['contract_number'];?>" id="contract_number-<?php echo $req['id'];?>" placeholder="Contract Number">
        </div>
<input type="hidden" name="contract_number" value="<?php echo $req['contract_number'];?>" id="contract-<?php echo $req['id'];?>">
<input type="hidden"  name="id" value="<?php echo $req['id'];?>">
</div>
<div class="form-group col-md-12" style="color:green"><span id="msg-<?php echo $req['id'];?>"></span></div>
<div class="form-group col-md-12" style="color:red"><span id="msgerr-<?php echo $req['id'];?>"></span></div>
</form>
 <div class="modal-footer">
<button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
<button type="button" id="save-partner-edit-<?php echo $req['id'];?>" class="btn btn-success">SUBMIT <i id="loadingpartner-<?php echo $req['id'];?>" class="fas fa-cog fa-spin"></i></button>
 </div>

</div>
</div>
 </div>
</div>
<!--  Edit partner modal end-->
<!-- List contract modal -->
<div class="modal fade" id="viewpartner-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header inline">
      <div class="text-center mt-2">
<span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
  <i class="fas fa-circle fa-stack-2x"></i>
  <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
</span> <h3 class="inline">Business Partner</h3>
</div>
</div>
      <div class="modal-body">
<!-- partner details start-->
<div class="col-md-12">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-copy fa-stack-1x fa-inverse"></i>
</span> <h5 class="inline">Contact Details</h5>
</div>
<div class="col-sm-11 col-md-11 card  bg-light ml-4">
<div class="card-body" style="margin: -5px!important;">
<div class="row">
                  <div class="col-sm-6 col-md-6 mt-3">
                <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Full Name:</small>
                <br>
              <h6><?php echo $req['name'];?></h6></div>
              <div class="ml-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Phone Number:</small>
          <br>
        <h6><?php echo $req['phone'];?></h6></div>
        <div class="text-sm text-primary"><small class="text-success">Email Address:</small>
        <br>
      <h6><?php echo $req['email'];?></h6></div>
      </div></div>
        <div class="col-sm-5 col-md-5 ml-4 mt-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Contract Title:</small>
              <h6><?php echo $req['contract_title'];?></h6></div><br>
        <div class="text-sm text-primary text-capitalize"><small class="text-success">Contract Number:</small>
        <br>
      <h6><?php echo $req['contract_number'];?></h6></div>
      <div class="text-sm text-primary text-capitalize"><small class="text-success">Date Added:</small>
      <br>
    <h6><?php echo $req['date'];?></h6></div>

        </div>
      </div>
    </div>
      </div>
<!-- partner details end -->

    </div>

      <div class="modal-footer inline">
        <div class="form-group text-center mt-3">
          <a class="btn pl-5 pr-5 btn-success" href="#edit_partner_<?php echo $req['id'];?>" data-dismiss="modal" data-toggle="modal"><i class="far fa-edit"></i> Edit</a>
          <button class="btn pl-5 pr-5 btn-danger" type="button" id="del-partner-<?php echo $req['id'];?>"><i class="fas fa-trash"></i> Delete</button>
          <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
       </div>
      </div>
    </div>
  </div>
</div>
<!--List epartner modal End -->
<script>
$(document).ready(function() {

//delete partner
$('#loadingpartner-<?php echo $req["id"];?>').hide();

$('#contract_title-<?php echo $req["id"];?>').on('change',function() {
  $.ajax({
    url:'<?php echo base_url()."partners/get_contract_number";?>',
    type: "POST",
    data: $('#edit_partner-<?php echo $req["id"];?>').serialize(),
    success:function(data) {
      $('#contract_number-<?php echo $req['id'];?>').val(data);
      $('#contract-<?php echo $req['id'];?>').val(data);
    }
  })
});

$("#del-partner-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."ucp/manage/delete_item";?>',
      type: "POST",
      data: $('#del_partner-<?php echo $req["id"];?>').serialize(),
      success:function(data) {
if(data='true') {
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  alert(data);
}
}
});
  } {
    return false;
  }
});
//Save partner edit
$("#save-partner-edit-<?php echo $req['id'];?>").click(function() {
$("#loadingpartner-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."partners/update_partner";?>',
  type: "POST",
  data: $("#edit_partner-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadingpartner-<?php echo $req['id'];?>").hide();
  if(data="true") {
alert('Changes has been saved');
$("#edit_partner-<?php echo $req['id'];?>")[0].reset();
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
$('#msgerr-<?php echo $req["id"];?>').html(data);
  }
  }
});
});

});
</script>
<?php endforeach;
endif;?>
</tbody>
</table>
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

  <!-- List partner modal -->
  <div class="modal fade" id="viewpartner" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header inline">
        <div class="text-center mt-2">
 <span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
    <i class="fas fa-circle fa-stack-2x"></i>
    <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
  </span> <h3 class="inline">View partner</h3>
  </div>
</div>
        <div class="modal-body">
<!-- partner details start-->
  <div class="col-md-12">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-copy fa-stack-1x fa-inverse"></i>
</span> <h5 class="inline">partner Details</h5>
</div>
<div class="col-sm-11 col-md-11 card  bg-light ml-4">
  <div class="card-body" style="margin: -5px!important;">
<div class="row">
    <div class="col-sm-6 col-md-6 mt-3">
  <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">partner Title:</small>
  <br>
<h6>COnstruction of uniuyo road</h6></div>
<br>
            <div class="ml-3">
            <div class="text-sm text-primary text-capitalize"><small class="text-success">Type:</small>
            <br>
          <h6>Works</h6></div>
        </div></div>
          <div class="col-sm-5 col-md-5 ml-4 mt-3">
            <div class="text-sm text-primary text-capitalize"><small class="text-success">Date:</small>
            <br>
          <h6>Active</h6></div><br>
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Description:</small>
          <br>
        <h6>Sample Description</h6></div>

          </div>
        </div>
      </div>
        </div>
<!-- partner details end -->

      </div>

        <div class="modal-footer inline">
          <div class="form-group text-center mt-3">
            <button class="btn pl-5 pr-5 btn-success" type="button"><i class="far fa-edit"></i> Edit</button>
            <button class="btn pl-5 pr-5 btn-danger" type="button"><i class="fas fa-trash"></i> Delete</button>
            <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
        </div>
        </div>
      </div>
    </div>
  </div>
<!--List partner modal End -->

</body>

</html>
