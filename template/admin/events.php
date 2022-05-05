<div class="col-xs-12 col-sm-9 content">
  <div class="panel panel-default">
<div class="panel-heading">
  <h3 class="panel-title"><a href="javascript:void(0);" class="toggle-sidebar">
    <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span></a>Events</h3>
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
 <li class="active"><a class="" href="#tab1" data-toggle="tab">List Events</a></li>
  <li class="" ><a class="" href="#tab2" data-toggle="tab">Add Event</a></li>

   </ul>
  <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade  active in" id="tab1">
 <div class="col-md-12">
  <div class="panel">
  <table class="table table-hover table-responsive custom-tbl">
<thead>
<tr>
  <th>#</th>
  <th>Title</th>
  <th>Date</th>
  <th>Type</th>
  <th>Actions</th>
</tr>
</thead>
  <tbody>
<?php if($events==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($events as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><?php echo $req['event_title']; ?></td>
<td><?php echo $req['event_date']; ?></td>
<td><?php echo $req['type']; ?></td>
<td class="actions">
  <a href="#edit_events_<?php echo $req['id'];?>" data-toggle="modal">Edit&nbsp;<i class="fas fa-edit"></i></a>&nbsp;|&nbsp;
  <a id="del-events-<?php echo $req['id'];?>"><b style="color:red;">Delete&nbsp;<i class="far fa-trash-alt"></i></a></b>
  <form id="del_events-<?php echo $req['id'];?>">
  <input type="hidden" name="id" value="<?php echo $req['id'];?>">
  <input type="hidden" name="type" value="event">
</form>
</td>
</tr>
<div class="modal fade" id="edit_events_<?php echo $req['id'];?>" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
<div class="modal-dialog modal-dialog-centered" role="document">
 <div class="modal-content">
 <div class="modal-header">
<h3 class="modal-title text-center">Edit Event</h3>
 </div>
 <div class="modal-body">
<form name="edit_events-<?php echo $req['id'];?>" method="post" id="edit_events-<?php echo $req['id'];?>">
 <div class="form-group">
<label for="title">Title</label>
<div class="input-group">
 <span class="input-group-addon">
 <i class="fa fa-user"></i>
 </span>
<input type="text" name="event_title" value="<?php echo $req['event_title'];?>" required class="form-control" id="title-<?php echo $req["id"];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
</div></div>

<div class="form-group">
<label for="Type">Type</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fas fa-folder-open"></i>
</span>
<select class="form-control" name="type" id="type-select">
<<option value="contract" <?php if($req['type']=="contract") {echo 'selected';}?>>Contract</option>
<option value="bid opening" <?php if($req['type']=="bid opening") {echo 'selected';}?>>Bid opening</option>
<option value="bid closing" <?php if($req['type']=="bid closing") {echo 'selected';}?>>Bid closing</option>
<option value="contract expiry" <?php if($req['type']=="contract expiry") {echo 'selected';}?>>Contract Expiry</option>
<option value="billing" <?php if($req['type']=="billing") {echo 'selected';}?>>Billing</option>
<option value="others" <?php if($req['type']=="others") {echo 'selected';}?>>Others</option>
   </select>
</div></div>

<div class="form-group">
<label for="Bid Closing date">Event Date</label>
<div class="input-group">
<span class="input-group-addon">
<i class="fas fa-calendar-alt"></i>
</span>
<input type="date" name="event_date" required="" value="<?php echo $req['event_date'];?>"  class="form-control" id="date" placeholder="Event Date">
</div></div>

<div class="form-group">
<label for="event time">Event Time</label>
<div class="input-group">
<span class="input-group-addon">
<i class="far fa-clock"></i>
</span>
<input type="time" name="event_time" required="" value="<?php echo $req['event_time'];?>"  class="form-control" id="event_time" placeholder="Event time">
</div></div>

  <div class="form-group">
  <label for="Description">Description</label>
  <div class="input-group">
    <span class="input-group-addon">
    <i class="far fa-newspaper"></i>
    </span>
    <textarea class="form-control" name="description"><?php echo $req['description'];?></textarea>
  </div></div>
 <div class="modal-footer">
<button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal" >CANCEL</button>
<button type="button" id="save-events-edit-<?php echo $req['id'];?>" class="btn btn-primary">SUBMIT <i id="loadingevents-<?php echo $req['id'];?>" class="fas fa-cog fa-spin"></i></button>
 </div>
 </form>
</div>
</div>
 </div>
<script>
$(document).ready(function() {

//delete
$('#loadingevents-<?php echo $req["id"];?>').hide();
$("#del-events-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."ucp/manage/delete_item";?>',
      type: "POST",
      data: $('#del_events-<?php echo $req["id"];?>').serialize(),
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

$("#save-events-edit-<?php echo $req['id'];?>").click(function() {
$("#loadingevents-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/update_events";?>',
  type: "POST",
  data: $("#edit_events-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadingevents-<?php echo $req['id'];?>").hide();
  if(data="true") {
alert('Record has been saved');
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
  } else {
$('#editeventsmsg-<?php echo $req["id"];?>').html(data);
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

<!--Add event start -->
 <div class="tab-pane" id="tab2">
   <div class="panel">
     <form id="add_event">
       <div class="container-fluid">
             <div class="col-md-6 col-xs-6">
           <div class="form-group">
           <label for="Title">Title</label>
           <div class="input-group">
             <span class="input-group-addon">
             <i class="fa fa-user"></i>
             </span>
           <input type="text" name="event_title" required=""   class="form-control" id="title" placeholder="Title">
         </div></div></div>

         <div class="col-md-4 col-xs-6">
       <div class="form-group">
       <label for="Type">Type</label>
       <div class="input-group">
         <span class="input-group-addon">
         <i class="fas fa-folder-open"></i>
         </span>
         <select class="form-control" name="type" id="type-select">
           <option>-Select Type</option>
           <option value="contract">Contract</option>
           <option value="bid opening">Bid opening</option>
           <option value="bid closing">Bid closing</option>
           <option value="contract expiry">Contract Expiry</option>
           <option value="billing">Billing</option>
           <option value="others">Others</option>
                </select>
       </div></div></div>

         <div class="col-md-6 col-xs-6"> <div class="form-group">
         <label for="Bid Closing date">Event Date</label>
         <div class="input-group">
         <span class="input-group-addon">
         <i class="fas fa-calendar-alt"></i>
         </span>
         <input type="date" name="event_date" required=""   class="form-control" id="date" placeholder="Event Date">
         </div></div></div>

         <div class="col-md-6 col-xs-6"> <div class="form-group">
         <label for="event time">Event Time</label>
         <div class="input-group">
         <span class="input-group-addon">
         <i class="far fa-clock"></i>
         </span>
         <input type="time" name="event_time" required=""   class="form-control" id="event_time" placeholder="Event time">
         </div></div></div>

          <input type="hidden" name="date" value="<?php echo date('d F, Y'); ?>">
          <input type="hidden" name="owner" value="ePROCLOUD">
          <input type="hidden" name="owner_email" value="admin@eprocloud.com">
                 <div class="col-md-12 col-xs-12">
               <div class="form-group">
               <label for="Description">Description</label>
               <div class="input-group">
                 <span class="input-group-addon">
                 <i class="far fa-eventspaper"></i>
                 </span>
                 <textarea class="form-control" name="description"></textarea>
               </div></div></div>
 </form>
        <div class="col-md-12 col-xs-12">
      <div class="form-group">
              <button class="btn btn-primary" id="submit" type="button">Submit
          <i class="fas fa-cog fa-spin" id="loading"></i>
        </button>
      </div></div>
          <div style="color:red;" class="form-group" id="msg"></div>
        </div>
        </div>
 </div>
 <!-- Add event end -->

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
$('#loading').hide();

$('#submit').on('click',function() {
$('#loading').show();
$.ajax({
  url:'<?php echo base_url()."ucp/manage/save_event";?>',
  type: "POST",
  data: $('#add_event').serialize(),
  success:function(data) {
$('#loading').hide();
if(data="true") {
alert('Event has been published successfully');
window.location.href = "<?php echo $_SERVER['PHP_SELF'];?>";
} else {
  $('#msg').html(data);
}
  }
})
});

});
</script>
