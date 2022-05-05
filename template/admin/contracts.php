<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>

<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>contracts</h3>
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
 <li class="active"><a class="" href="#tab1" data-toggle="tab">Contracts</a></li>
  <li class="" ><a class="" href="#tab2" data-toggle="tab">Publish a Property</a></li>

   </ul>
  <div id="myTabContent" class="tab-content">

<!-- View contracts Start -->
 <div class="tab-pane fade  active in" id="tab1">
 <div class="col-md-12">
  <div class="panel  table-responsive">
  <table class="table table-bordered custom-tbl" id="dataTabl" cellspacing="0">
<thead>
<tr>
  <th>#</th>
  <th>ContractTitle</th>
  <th>Contract number</th>
  <th>Location</th>
  <th>Bid Start</th>
  <th>Bid Stop</th>
  <th>Actions</th>
</tr>
</thead>
  <tbody>
<?php if($contract==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($contract as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewcontract-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['contract_title']; ?></a></td>
<td><?php echo $req['bid_number']; ?></td>
<td><?php echo $req['location']; ?></td>
  <td><?php echo $req['bid_opening_date']; ?></td>
<td><?php echo $req['bid_closing_date']; ?></td>
<td class="actions">
  <a href="#edit_contract_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fas fa-edit"></i></a>|
  <a id="delt-contract-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="far fa-trash-alt"></i></a></b>
  <form id="del_contract-<?php echo $req['id'];?>">
  <input type="hidden" name="id" value="<?php echo $req['id'];?>">
  <input type="hidden" name="type" value="contract_bidding">
</form>
</td>
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
<br>
<h6><?php echo $req['contract_title'];?></h6></div>

          <div class="ml-3">
            <div class="text-sm text-primary text-capitalize"><small class="text-success">Contract Number:</small>
            <br>
          <h6><?php echo $req['bid_number'];?></h6></div>

          <div class="text-sm text-primary text-capitalize"><small class="text-success">Category:</small>
          <br>
        <h6><?php echo $req['category'];?></h6></div>

      </div>
  <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Min. bid amount</small>
    <?php if(empty($req['min_amount'])): ?>
      <h6>Not Included</h6>
    <?php else: ?>
<h6><?php echo $req['min_amount'];?></h6>
<?php endif;?>
</div>
<div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Attached Document:</small>
<br>
<?php if(empty($req['document'])):?>
  <h6>No document uploaded.</h6>
<?php else:?>
<h6><?php echo $req['document'];?> <br><small><a href="<?php echo base_url();?>uploads/documents/<?php echo $req['document'];?>">View/Download</a></small></h6>
<?php endif;?>
</div>
    </div>
        <div class="col-sm-5 col-md-5 ml-4 mt-3">
          <div class="text-sm text-primary text-capitalize"><small class="text-success">Bid Opening Date:</small>
        <h6><?php echo $req['bid_opening_date'];?></h6></div>

        <div class="text-sm text-primary text-capitalize"><small class="text-success">Bid closing Date:</small>
      <h6><?php echo $req['bid_closing_date'];?></h6></div>

      <div class="text-sm text-primary text-capitalize"><small class="text-success">Location:</small>
    <h6><?php echo $req['location'];?></h6></div>

    <div class="text-sm text-primary text-capitalize"><small class="text-success">Max. bid amount</small>
      <?php if(empty($req['max_amount'])): ?>
        <h6>Not Included</h6>
      <?php else: ?>
  <h6><?php echo $req['max_amount'];?></h6>
<?php endif;?>
</div>

        </div>


      </div>
    </div>
      </div>
<!-- General Information end -->

    </div>

      <div class="modal-footer mt-2">
        <div class="form-group text-center mt-5">
          <a class="btn pl-5 pr-5 btn-success" href="#edit_contract_<?php echo $req['id'];?>" data-toggle="modal"><i class="far fa-edit"></i> Edit</a>
    <button class="btn pl-5 pr-5 btn-danger" id="del-contract-<?php echo $req['id'];?>"><i class="fas fa-trash-alt"></i> Delete</button>

          <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> &nbsp;Close</button>
       </div>
      </div>
    </div>
  </div>
</div>

<!--List Contract modal End -->
<!--edit contract modal -->
<div class="modal fade" id="edit_contract_<?php echo $req['id'];?>" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
 <div class="modal-header">
<h3 class="modal-title text-center">Edit Contract</h3>
 </div>
 <div class="modal-body">
<form name="edit_contract-<?php echo $req['id'];?>" method="post" id="edit_contract-<?php echo $req['id'];?>">

 <div class="form-group">
<label for="title">Title</label>
<div class="input-group">
 <span class="input-group-addon">
 <i class="fa fa-user"></i>
 </span>
<input type="text" name="contract_title" value="<?php echo $req['contract_title'];?>" required class="form-control" id="contract_title-<?php echo $req["id"];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
</div></div>

<div class="">
<div class="form-group">
<label for="Category">Category</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fas fa-folder-open"></i>
</span>
<select class="form-control" name="category" id="category-select">
<option>-Select Category</option>
<option value="Civil Works" <?php if($req['category']=="Civil Works") {echo 'selected';}?>>Civil Works</option>
<option value="Electrical Works" <?php if($req['category']=="Electrical Works") {echo 'selected';}?>>Electrical Works</option>
<option value="Plumbing and fitting" <?php if($req['category']=="Plumbing and fitting") {echo 'selected';}?>>Plumbing and fitting</option>
<option value="Welding" <?php if($req['category']=="Welding") {echo 'selected';}?>>Welding</option>
<option value="Others" <?php if($req['category']=="others") {echo 'selected';}?>>Others</option>
    </select>
</div></div></div>

<div class=""> <div class="form-group">
<label for="Location">Location</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fas fa-map-marker-alt"></i>
</span>
<input type="text" name="location" value="<?php echo $req['location'];?>"   class="form-control" id="location" placeholder="Location">
</div></div></div>

<div class=""> <div class="form-group">
<label for="Bid Opening date">Bid Opening Date</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fas fa-calendar-plus"></i>
</span>
<input type="date" name="bid_opening_date" value="<?php echo $req['bid_opening_date'];?>"   class="form-control" id="bid_opening_date" placeholder="Bid Opening Date">
</div></div></div>

<div class=""> <div class="form-group">
<label for="Bid Closing date">Bid Closing Date</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-calendar-times"></i>
</span>
<input type="date" name="bid_closing_date" value="<?php echo $req['bid_closing_date'];?>"   class="form-control" id="bid_closing_date" placeholder="Bid Closing Date">
</div></div></div>

<div class=""> <div class="form-group">
<label for="Budget">Min bid amount</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-naira"></i>
</span>
<input type="number" name="min_amount" value="<?php echo $req['min_amount'];?>"   class="form-control" id="min_amount" placeholder="Min. bid amount">
</div></div></div>

<div class=""> <div class="form-group">
<label for="Budget">Max bid amount</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-naira"></i>
</span>
<input type="number" name="max_amount" value="<?php echo $req['max_amount'];?>"   class="form-control" id="max_amount" placeholder="Max. bid amount">
</div></div></div>

<div class=""> <div class="form-group">
<label for="">Document</label><br>
<?php if(empty($req['document'])):?>
  <b style="color:red;">No document uploaded.</b>
<?php else:?>
<span><?php echo $req["document"];?> <small style="color:green;"><a href="<?php echo base_url();?>uploads/documents/<?php echo $req["document"];?>">View/Download</a></small></span>
<?php endif;?>
<br><b id="loading-doc-<?php echo $req["id"];?>" style="color:green;"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
<b id="success-<?php echo $req["id"];?>"></b>
<div class="input-group">
  <span class="input-group-addon">
    <label for="docs-<?php echo $req["id"];?>" class="btn-primary" style="font-weight: lighter !important;" type="button">
      &nbsp;&nbsp;<i class="fas fa-upload fa-sm"></i>&nbsp;&nbsp;&nbsp;  <?php if(empty($req['document'])):?>Upload file<?php else: ?> Change file<?php endif;?>
    &nbsp;&nbsp;&nbsp;</label>
   <input type="hidden" value="<?php echo $req['document'];?>" name="document" class="docs-<?php echo $req["id"];?>">
  </span>
<input type="text" disabled name="document" value="<?php echo $req['document'];?>"  class="form-control">
</div></div></div>

<div class="">
<div class="form-group">
<label for="Description">Description</label>
<div class="input-group">
<span class="input-group-addon">
<i class="far fa-newspaper"></i>
</span>
<textarea class="form-control" name="description"><?php echo $req['description'];?></textarea>
</div></div></div>

</form>
 <div class="modal-footer">
<button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
<button type="button" id="save-contract-edit-<?php echo $req['id'];?>" class="btn btn-primary">SUBMIT <i id="loadingcontract-<?php echo $req['id'];?>" class="fa fa-gear fa-spin"></i></button>
 </div>

</div>
</div>
 </div>
 <form id="upload-<?php echo $req["id"];?>">
<input type="hidden" name="type" value="docs-<?php echo $req["id"];?>">
 <input type="file" name="docs-<?php echo $req["id"];?>" id="docs-<?php echo $req["id"];?>" style="visibility: hidden;">
</form>
<script>
$(document).ready(function() {

  $('#loading-doc-<?php echo $req["id"];?>').hide();

//Submit the file upload on file select
$('#docs-<?php echo $req["id"];?>').on('change',function() {
  $('#loading-doc-<?php echo $req["id"];?>').show();
$('#upload-<?php echo $req["id"];?>').submit();
});

$('#upload-<?php echo $req["id"];?>').submit(function(e){
  $('#loading-doc-<?php echo $req["id"];?>').show();
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
  $('#loading-doc-<?php echo $req["id"];?>').hide();
  $('#success-<?php echo $req["id"];?>').html(data);
      }
                   });
              });
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

$("#delt-contract-<?php echo $req['id'];?>").click(function(){
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
$("#save-contract-edit-<?php echo $req['id'];?>").click(function() {
$("#loadingcontract-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/update_contract";?>',
  type: "POST",
  data: $("#edit_contract-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadingcontract-<?php echo $req['id'];?>").hide();
  if(data=="true") {
$("#editcontractmsg-<?php echo $req['id'];?>").html('saved');
$("#edit_contract-<?php echo $req['id'];?>")[0].reset();
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
$('#editcontractmsg-<?php echo $req["id"];?>').html(data);
  }
  }
});
});


$('#document-<?php echo $req['id'];?>').on('change',function() {
$('#upload-<?php echo $req['id'];?>').submit();
});

$('#upload-<?php echo $req['id'];?>').submit(function(e){
$('#loading-file-<?php echo $req['id'];?>').show();
            e.preventDefault();
                 $.ajax({
                     url:'<?php echo base_url();?>ucp/manage/do_uploads',
                     type:"post",
                     data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                      success: function(data){
$('#loading-file-<?php echo $req['id'];?>').hide();
$('#success-<?php echo $req['id'];?>').html(data);
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

             <div class="col-md-12 col-xs-12">
           <div class="form-group">
           <label for="Title">Title</label>
           <div class="input-group">
             <span class="input-group-addon">
             <i class="fa fa-user"></i>
             </span>
           <input type="text" name="contract_title" required=""   class="form-control" id="title" placeholder="Contract Title">
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
        <option value="Civil Works">Civil Works</option>
        <option value="Electrical Works">Electrical Works</option>
        <option value="Plumbing and fitting">Plumbing and fitting</option>
        <option value="Welding">Welding</option>
        <option value="Others">Others</option>
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

<div class="col-md-3 col-xs-6"> <div class="form-group">
<label for="budget">Min. Bid Amount</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-naira"></i>
</span>
<input type="number" name="min_amount" required=""   class="form-control" id="min_Amount" placeholder="Min Amount">
</div></div></div>

<div class="col-md-3 col-xs-6"> <div class="form-group">
<label for="budget">Max. Bid Amount</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fa fa-naira"></i>
</span>
<input type="number" name="max_amount" required=""   class="form-control" id="max_amount" placeholder="Max Amount">
</div></div></div>


<div class="col-md-6 col-xs-6"> <div class="form-group">
<label for="">Document</label>
<br><b id="loading-doc" style="color:green;"><i class="fas fa-spinner fa-spin"></i> Uploading file, please wait.</b>
<b id="success"></b>
<div class="input-group">
  <span class="input-group-addon">
    <label for="docss" class="btn-primary" style="font-weight: lighter !important;" type="button">
      &nbsp;&nbsp;<i class="fas fa-upload fa-sm"></i>&nbsp;&nbsp;&nbsp; Select file
    &nbsp;&nbsp;&nbsp;</label>
   <input type="hidden" value="" name="document" class="docss">
  </span>
<input type="text" disabled name="document"  class="form-control" value="Upload file">
</div></div></div>

 <input type="hidden" name="date" value="<?php echo date('d F, Y'); ?>">
  <input type="hidden" name="owner" value="ePROCLOUD">
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
<form id="upload">
<input type="hidden" name="type" value="docss">
<input type="file" name="docss" id="docss" style="visibility: hidden;">
</form>
<script>
$(document).ready(function() {

//Hide all loading icons
$('#loading').hide();

$('#loading-doc').hide();

//Submit the file upload on file select
$('#docss').on('change',function() {
$('#loading-doc').show();
$('#upload').submit();
});

$('#upload').submit(function(e){
$('#loading-doc').show();
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
$('#loading-doc').hide();
$('#success').html(data);
    }
                 });
            });

$('#submit').on('click',function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/publish_contract";?>',
  type: "POST",
  error: function(){
    $('#msg').html('An error occured, please try again');
    $('#loading').hide();
  },
  timeout: 6000,
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
