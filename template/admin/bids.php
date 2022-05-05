<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>

<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Bids</h3>
</div>
   <div class="panel-body">
<div class="content-row">
   <div class="col-md-12 panel">
<div class="panel-heading">

<div class="panel-options">
<a class="bg" data-target="#sample-modal-dialog-1" data-toggle="modal" href="#sample-modal"><i class="entypo-cog"></i></a>
<a data-rel="collapse" href="#"><i class="entypo-down-open"></i></a>
<a data-rel="close" href="#!/tasks" ui-sref="Tasks"><i class="entypo-cancel"></i></a>
</div>
</div>

<div class="">
  <div class="">
 <div class="tab-contents">
  <ul id="myTab1" class="nav nav-tabs nav-justified">
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Contract Bids</a></li>
   </ul>
  <div id="myTabContent" class="tab-content">

<!-- View contracts Start -->
 <div class="tab-pane fade  active in" id="tab1">
 <div class="col-md-12">
  <div class="panel">
  <table class="table table-bordered table-hover table-responsive custom-tbl" id="dataTable">
<thead>
<tr>
  <th>#</th>
  <th>Contract Title</th>
  <th>Bidder</th>
  <th>Bidder Email</th>
  <th>Contract number</th>
  <th>Bid Amount</th>
  <th>Bid Status</th>
</tr>
</thead>
  <tbody>
<?php if($bids==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($bids as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td> <a href="#viewcontract-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['contract_title']; ?></a></td>
<td><?php echo $req['bid_by']; ?></td>
<td><?php echo $req['bid_by_email']; ?></td>
<td><?php echo $req['bid_number']; ?></td>
  <td><?php echo $req['bid_amount']; ?></td>
  <td><?php echo $req['bid_status']; ?></td>
</tr>
<!-- List contract modal -->
<div class="modal fade" id="viewcontract-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

    <div class="modal-content" style="font-size: 1.5em;">
      <div class="modal-header inline">
      <div class="text-center mt-3">
<span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
  <i class="fas fa-circle fa-stack-2x"></i>
  <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
</span> <h3 class="d-inline">View Contract</h3>
</div>
</div>
      <div class="modal-body">
<!-- General Information start-->
<div class="col-md-12">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-copy fa-stack-1x fa-inverse"></i>
</span> <h5 class="d-inline">General Information</h5>
</div>
<div class="col-sm-11 col-md-11 card  bg-light ml-4">
<div class="card-body" style="margin: -5px!important;">
<div class="row">
  <div class="col-sm-6 col-md-6 mt-3">
<div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Contract Title:</small>
<h6><?php echo $req['contract_title'];?></h6></div>

          <div class="ml-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Category:</small>
        <h6><?php echo $req['category'];?></h6></div>

      <div class="text-sm text-primary text-capitalize"><small class="text-success">Bidder:</small>
    <h6><?php echo $req['bid_by'];?></h6></div>
    <?php if($req['bid_status']=="pending"): ?>
              <div class="text-sm text-primary text-capitalize"><small class="text-success">Billing Cycle:</small>
              <br><br>
              <form id="update_contract_<?php echo $req['id'];?>">
                <input type="hidden" name="id" value="<?php echo $req['id'];?>">
                <input type="hidden" name="bid_by_email" value="<?php echo $req['bid_by_email'];?>">
                <input type="hidden" name="bid_status" value="authorized">
                <input type="hidden" name="contract_status" value="pending">
                <input type="hidden" name="approval_date" value="<?php echo date("d F, Y");?>">
            <select name="billing_cycle" class="form-control bg-light">
              <option value="One Time">One Time</option>
              <option value="Monthly">Monthly</option>
              <option value="Quaterly">Quaterly</option>
              <option value="Yearly">Yearly</option>
            </select>  </form>
          </div>
            <?php endif;?>
      </div></div>
        <div class="col-sm-5 col-md-5 ml-4 mt-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Bid Amount:</small>
        <h6><?php echo $req['bid_amount'];?></h6></div><br>
        <div class="text-sm text-primary text-capitalize"><small class="text-success">Contract Number:</small>
      <h6><?php echo $req['bid_number'];?></h6></div>

      <div class="text-sm text-primary text-capitalize"><small class="text-success">Bidder Email:</small>
    <h6><?php echo $req['bid_by_email'];?></h6></div>

    <div class="text-sm text-primary text-capitalize"><small class="text-success">Bill of contract:</small>
    <h6><?php echo $req['bill_of_contract'];?> <small><a href="<?php echo base_url();?>uploads/boc/<?php echo $req['bill_of_contract'];?>">View/Download</a></small></h6>
  </div>
        </div>
      </div>
    </div>
      </div>
<!-- General Information end -->

    </div>

      <div class="modal-footer mt-2">
        <span style="color:green;" id="msg-<?php echo $req['id'];?>"></span>
        <span style="color:red;" id="msg2-<?php echo $req['id'];?>"></span>
        <div class="form-group text-center mt-5">
  <?php if($req['bid_status'] !=="pending"): ?>
          <button class="btn pl-5 pr-5 btn-success" id="unsave-<?php echo $req['id'];?>"><i class="far fa-edit"></i> Unauthorize Bid &nbsp;
          <i id="loadingg-<?php echo $req['id'];?>" class="fas fa-cog fa-spin"></i></button>
  <?php else: ?>
    <button class="btn pl-5 pr-5 btn-success" id="save-<?php echo $req['id'];?>"><i class="far fa-edit"></i> Authorize Bid &nbsp;
    <i id="loading-<?php echo $req['id'];?>" class="fas fa-cog fa-spin"></i></button>
  <?php endif;?>
          <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> &nbsp;Close</button>
       </div>
      </div>
    </div>
  </div>
</div>

<form id="updat_contract_<?php echo $req['id'];?>">
  <input type="hidden" name="id" value="<?php echo $req['id'];?>">
  <input type="hidden" name="bid_by_email" value="<?php echo $req['bid_by_email'];?>">
  <input type="hidden" name="bid_status" value="pending">
  <input type="hidden" name="approval_date" value=" ">
</form>
<!--List Contract modal End -->
<script>
$(document).ready(function() {
$("#loadingg-<?php echo $req['id'];?>").hide();
$("#loading-<?php echo $req['id'];?>").hide();
//delete contract
$('#loadingcontract-<?php echo $req["id"];?>').hide();
$("#del-contract-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."ucp/manage/delete_item";?>',
      type: "POST",
      data: $('#del_contract-<?php echo $req["id"];?>').serialize(),
      success:function(data) {
if(data=='true') {
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
//Save contract edit
$("#save-<?php echo $req['id'];?>").click(function() {
$("#loading-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/update_contract_bid";?>',
  type: "POST",
  data: $("#update_contract_<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$('#msg2-<?php echo $req["id"];?>').html('');
$('#msg-<?php echo $req["id"];?>').html('');
$("#loading-<?php echo $req['id'];?>").hide();
  if(data=="true") {
$("#msg-<?php echo $req['id'];?>").html('Contract has been Authorized Pending contractors approval');
$("#save-<?php echo $req['id'];?>").attr('disabled','disabled');
  } else {
$('#msg2-<?php echo $req["id"];?>').html(data);
  }
  }
});
});

//Save contract edit
$("#unsave-<?php echo $req['id'];?>").click(function() {
$("#loadingg-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/update_contract_bid";?>',
  type: "POST",
  data: $("#updat_contract_<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$('#msg2-<?php echo $req["id"];?>').html('');
$('#msg-<?php echo $req["id"];?>').html('');
$("#loadingg-<?php echo $req['id'];?>").hide();
  if(data=="true") {
$("#msg-<?php echo $req['id'];?>").html('Contract Bid has been Unauthorized');
  } else {
$('#msg2-<?php echo $req["id"];?>').html(data);
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

<!-- Publish contracts start-->
 <div class="tab-pane" id="tab2">
   <div class="panel">
     <form id="add_contract">
       <div class="container-fluid">

             <div class="col-md-6 col-xs-6">
           <div class="form-group">
           <label for="Title">Title</label>
           <div class="input-group">
             <span class="input-group-addon">
             <i class="fa fa-user"></i>
             </span>
           <input type="text" name="contract_title" required=""   class="form-control" id="title" placeholder="Contract Title">
         </div></div></div>

         <div class="col-md-6 col-xs-6"> <div class="form-group">
      <label for="owner">Contract Owner</label>
      <div class="input-group">
        <span class="input-group-addon">
        <i class="fa fa-suitcase"></i>
        </span>
      <input type="text" name="owner" required=""   class="form-control" id="owner" placeholder="Contract Owner">
    </div></div></div>

      <div class="col-md-4 col-xs-6">
    <div class="form-group">
    <label for="Category">Category</label>
    <div class="input-group">
      <span class="input-group-addon">
      <i class="fas fa-folder-open"></i>
      </span>
      <select class="form-control" name="category" id="category-select">
        <option>-Select Category</option>
        <option value="civil">Civil</option>
        <option value="Electrical">Electrical</option>
             </select>
    </div></div></div>

    <div class="col-md-8 col-xs-6"> <div class="form-group">
 <label for="Location">Location</label>
 <div class="input-group">
   <span class="input-group-addon">
   <i class="fas fa-map-marker-alt"></i>
   </span>
 <input type="text" name="location" required=""   class="form-control" id="location" placeholder="Location">
</div></div></div>

<div class="col-md-6 col-xs-6"> <div class="form-group">
<label for="Bid Opening date">Bid Opening Date</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fas fa-calendar-plus"></i>
</span>
<input type="date" name="bid_opening_date" required=""   class="form-control" id="bid_opening_date" placeholder="Bid Opening Date">
</div></div></div>

<div class="col-md-6 col-xs-6"> <div class="form-group">
<label for="Bid Closing date">Bid Closing Date</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-calendar-times"></i>
</span>
<input type="date" name="bid_closing_date" required=""   class="form-control" id="bid_closing_date" placeholder="Bid Closing Date">
</div></div></div>

 <input type="hidden" name="date" value="<?php echo date('d F, Y'); ?>">
        <div class="col-md-12 col-xs-12">
      <div class="form-group">
      <label for="Description">Description</label>
      <div class="input-group">
        <span class="input-group-addon">
        <i class="far fa-newspaper"></i>
        </span>
        <textarea class="form-control" name="description"></textarea>
      </div></div></div>
 </form>

        <div class="col-md-12 col-xs-12">
      <div class="form-group">
              <button class="btn btn-primary" id="submit" type="button">Submit
          <i class="fa fa-gear fa-spin" id="loading"></i>
        </button>
      </div></div>
          <div style="color:red;" class="form-group" id="msg"></div>
        </div>
        </div>
 </div>
<!--Publish contract end -->

</div>
 </div>
</div>

 </div>
 </div>
</div>
</div>
  </div>
</div>
<script>
$(document).ready(function() {

//Hide all loading icons
$('#loading-issue').hide();
$('#loading-file').hide();
$('#loading').hide();
$('#loading-vol').hide();
//$('#submit').attr('disabled','disabled');
//$('#success').hide();

//get Issue list from db
$('#archive-select').on('change',function() {
$('#loading-vol').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/get_volume";?>',
  type: "POST",
  data: $('#add_contract').serialize(),
  success:function(data) {
$('#loading-vol').hide();
$('#volume-select').html(data);
  }
});
});

//get Issue list from db
$('#volume-select').on('change',function() {
$('#loading-issue').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/get_issue";?>',
  type: "POST",
  data: $('#add_contract').serialize(),
  success:function(data) {
$('#loading-issue').hide();
$('#getissue').html(data);
  }
});
});


$('#submit').on('click',function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/publish_contract";?>',
  type: "POST",
  data: $('#add_contract').serialize(),
  success:function(data) {
$('#loading').hide();
if(data=="true") {
alert('Contract has been published successfully');
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  $('#msg').html(data);
}
  }
})
});
});
</script>
