<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Events</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Events List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<!-- View events Start -->
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th width="5%">#</th>
  <th width="55%">Event Title</th>
  <th width="15%">Type</th>
  <th width="25%">Date</th>
</tr>
</thead>
  <tbody>
<?php if($event==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($event as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewevent-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['event_title']; ?></a></td>
<td><?php echo $req['type']; ?></td>
<td><?php echo date("d F Y", strtotime($req['date']));?></td>

<!-- delete event -->
</tr>
<form id="del_event-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="type" value="event">
</form>
<!-- delete event end -->

<!--edit event modal -->
<div class="modal fade" id="edit_event_<?php echo $req['id'];?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" style="width:700px !important;" role="document">
 <div class="modal-content">
 <div class="modal-header inline">
   <div class="text-center mt-2">
  <span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
  <i class="fas fa-circle fa-stack-2x"></i>
  <i class="fas fa-edit fa-stack-1x fa-inverse"></i>
</span> <h3 class="inline">Edit Event</h3>
  </div>
 </div>
 <div class="modal-body">
   <div class="row">
<form name="edit_event-<?php echo $req['id'];?>" method="post" id="edit_event-<?php echo $req['id'];?>">
<div class="form-group col-md-12">
  <label>Event Title <small style="color: red">*</small></label>
  <input type="text" name="event_title" value="<?php echo $req['event_title'];?>" class="form-control form-control-user" placeholder="Event Title">
</div>
<div class="form-group col-md-6">
  <label>Type <small style="color: red">*</small></label>
  <select name="type" class="form-control">
    <option value="contract" <?php if($req['type']=="contract") {echo 'selected';}?>>Contract</option>
    <option value="bid opening" <?php if($req['type']=="bid opening") {echo 'selected';}?>>Bid opening</option>
    <option value="bid closing" <?php if($req['type']=="bid closing") {echo 'selected';}?>>Bid closing</option>
    <option value="contract expiry" <?php if($req['type']=="contract expiry") {echo 'selected';}?>>Contract Expiry</option>
    <option value="billing" <?php if($req['type']=="billing") {echo 'selected';}?>>Billing</option>
    <option value="others" <?php if($req['type']=="others") {echo 'selected';}?>>Others</option>
</select>
        </div>
        <div class="form-group col-md-6">
          <label>Date <small style="color: red">*</small></label>
          <input type="date" name="event_date" value="<?php echo $req['event_date'];?>" class="form-control form-control-user">
        </div>
        <div class="form-group col-md-6">
          <label>End Date <small style="color: red">*</small></label>
          <input type="time" name="event_time" value="<?php echo $req['event_time'];?>" class="form-control form-control-user">
        </div>
<input type="hidden"  name="id" value="<?php echo $req['id'];?>">
        <div class="form-group col-md-12">
          <label>Description</label>
          <input type="text" name="description" <?php echo $req['description'];?> class="form-control form-control-user" placeholder="Description">
        </div></div>
<div class="form-group col-md-12" style="color:green"><span id="msg-<?php echo $req['id'];?>"></span></div>
<div class="form-group col-md-12" style="color:red"><span id="msgerr-<?php echo $req['id'];?>"></span></div>
</form>
 <div class="modal-footer">
<button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
<button type="button" id="save-event-edit-<?php echo $req['id'];?>" class="btn btn-success">SUBMIT <i id="loadingevent-<?php echo $req['id'];?>" class="fas fa-cog fa-spin"></i></button>
 </div>

</div>
</div>
 </div>
</div>
<!--  Edit event modal end-->
<!-- List contract modal -->
<div class="modal fade" id="viewevent-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header inline">
      <div class="text-center mt-2">
<span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
  <i class="fas fa-circle fa-stack-2x"></i>
  <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
</span> <h3 class="inline">View Event</h3>
</div>
</div>
      <div class="modal-body">
<!-- Event details start-->
<div class="col-md-12">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-copy fa-stack-1x fa-inverse"></i>
</span> <h5 class="inline">Event Details</h5>
</div>
<div class="col-sm-11 col-md-11 card  bg-light ml-4">
<div class="card-body" style="margin: -5px!important;">
<div class="row">
                  <div class="col-sm-6 col-md-6 mt-3">
                <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Event Title:</small>
                <br>
              <h6><?php echo $req['event_title'];?></h6></div>
              <br>
          <div class="ml-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Type:</small>
          <br>
        <h6><?php echo $req['type'];?></h6></div>
      </div></div>
        <div class="col-sm-5 col-md-5 ml-4 mt-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Date:</small>
          <br>
        <h6><?php echo date("h:i a", strtotime($req['event_time'])). ", &nbsp;". date("d F Y", strtotime($req['event_date']));?></h6></div><br>
        <div class="text-sm text-primary text-capitalize"><small class="text-success">Description:</small>
        <br>
      <h6><?php echo $req['description'];?></h6></div>

        </div>
      </div>
    </div>
      </div>
<!-- event details end -->

    </div>

      <div class="modal-footer inline">
        <div class="form-group text-center mt-3">
          <a class="btn pl-5 pr-5 btn-success" href="#edit_event_<?php echo $req['id'];?>" data-dismiss="modal" data-toggle="modal"><i class="far fa-edit"></i> Edit</a>
          <button class="btn pl-5 pr-5 btn-danger" type="button" id="del-event-<?php echo $req['id'];?>"><i class="fas fa-trash"></i> Delete</button>
          <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
       </div>
      </div>
    </div>
  </div>
</div>
<!--List eevent modal End -->
<script>
$(document).ready(function() {

//delete event
$('#loadingevent-<?php echo $req["id"];?>').hide();
$("#del-event-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."ucp/manage/delete_item";?>',
      type: "POST",
      data: $('#del_event-<?php echo $req["id"];?>').serialize(),
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
//Save event edit
$("#save-event-edit-<?php echo $req['id'];?>").click(function() {
$("#loadingevent-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."events/update_event";?>',
  type: "POST",
  data: $("#edit_event-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadingevent-<?php echo $req['id'];?>").hide();
  if(data="true") {
alert('Changes has been saved');
$("#edit_event-<?php echo $req['id'];?>")[0].reset();
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

  <!-- List event modal -->
  <div class="modal fade" id="viewevent" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header inline">
        <div class="text-center mt-2">
 <span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
    <i class="fas fa-circle fa-stack-2x"></i>
    <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
  </span> <h3 class="inline">View Event</h3>
  </div>
</div>
        <div class="modal-body">
<!-- Event details start-->
  <div class="col-md-12">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-copy fa-stack-1x fa-inverse"></i>
</span> <h5 class="inline">Event Details</h5>
</div>
<div class="col-sm-11 col-md-11 card  bg-light ml-4">
  <div class="card-body" style="margin: -5px!important;">
<div class="row">
    <div class="col-sm-6 col-md-6 mt-3">
  <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Event Title:</small>
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
<!-- event details end -->

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
<!--List Event modal End -->

</body>

</html>
