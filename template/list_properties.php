<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<style>
.modal { overflow-y: auto !important}
</style>
<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Properties</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Properties List</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

<!-- View contracts Start -->
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th>#</th>
  <th>Title</th>
  <th>Location</th>
  <th>Price</th>
  <th>Status</th>
  <th>Date</th>
</tr>
</thead>
  <tbody>
<?php if($properties==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($properties as $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewcontract-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['title']; ?></a></td>
<td><?php echo $req['location']; ?></td>
  <td><?php echo $req['price']; ?></td>
  <td><?php echo $req['status']; ?></td>
<td><?php echo date("d F Y", strtotime($req['date']));?></td>

<!-- delete contract -->
</tr>
<form id="del_contract-<?php echo $req['id'];?>">
<input type="hidden" name="id" value="<?php echo $req['id'];?>">
<input type="hidden" name="type" value="contract">
</form>
<!-- delete contract end -->

 <!-- List contract modal -->
 <div class="modal fade" id="viewcontract-<?php echo $req['id'];?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header inline">
       <div class="text-center mt-2">
<span class="fa-stack text-main fa-2x" style="margin-top: -0.7em; font-size: 1.1em !important;">
   <i class="fas fa-circle fa-stack-2x"></i>
   <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
 </span> <h3 class="inline">View Contract</h3>
 </div>
</div>
       <div class="modal-body">
<!-- General Information start-->
 <div class="col-md-12">
<span class="fa-stack text-success fa-2x" style="font-size: 0.9em !important;">
<i class="fas fa-circle fa-stack-2x"></i>
<i class="far fa-copy fa-stack-1x fa-inverse"></i>
</span> <h5 class="inline">General Information</h5>
</div>
<div class="col-sm-11 col-md-11 card  bg-light ml-4">
 <div class="card-body" style="margin: -5px!important;">
<div class="row">
   <div class="col-sm-6 col-md-6 mt-3">
 <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Title:</small>
 <br>
<h6><?php echo $req['title'];?></h6></div>
<br>
           <div class="ml-3">
           <div class="text-sm text-primary text-capitalize"><small class="text-success">Location:</small>
           <br>
         <h6><?php echo $req['location'];?></h6></div>
       <br>
       <div class="text-sm text-primary text-capitalize"><small class="text-success">Date Added:</small>
       <br>
     <h6><?php echo date("d F Y", strtotime($req['date']));?></h6></div>
       </div></div>
         <div class="col-sm-5 col-md-5 ml-4 mt-3">
           <div class="text-sm text-primary text-capitalize"><small class="text-success">Approval Status:</small>
           <br>
         <h6><?php echo $req['auth'];?></h6>
       </div><br>
         <div class="text-sm text-primary text-capitalize"><small class="text-success">Status:</small>
         <br>
       <h6><?php echo $req['status'];?></h6>
     </div>
       <br>
       <div class="text-sm text-primary text-capitalize"><small class="text-success">Description:</small>
       <br>
     <h6><?php echo $req['description'];?></h6></div>
         </div>
       </div>
     </div>
       </div>
<!-- General Information end -->

     </div>
     <form id="del_article-<?php echo $req['id'];?>">
     <input type="hidden" name="id" value="<?php echo $req['id'];?>">
     <input type="hidden" name="type" value="contract">
   </form>
       <div class="modal-footer inline">
         <div class="form-group text-center mt-3">
           <button class="btn pl-5 pr-5 btn-danger" type="button" id="del-contract-<?php echo $req['id'];?>"><i class="fas fa-trash"></i> Delete</button>
           <button class="btn pl-5 pr-5 btn-info" type="button" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i> Close</button>
        </div>
       </div>
     </div>
   </div>
 </div>
<!--List Contract modal End -->
<script>
$(document).ready(function() {

//delete contract
$('#loadingcontract-<?php echo $req["id"];?>').hide();
$("#del-contract-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."ucp/manage/delete_item";?>',
      type: "POST",
      data: $('#del_contract-<?php echo $req["id"];?>').serialize(),
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
//Save contract edit
$("#save-contract-edit-<?php echo $req['id'];?>").click(function() {
$("#loadingcontract-<?php echo $req['id'];?>").show();
$.ajax({
  url:'<?php echo base_url()."contracts/update_contract";?>',
  type: "POST",
  data: $("#edit_contract-<?php echo $req['id'];?>").serialize(),
  success:function(data) {
$("#loadingcontract-<?php echo $req['id'];?>").hide();
  if(data="true") {
$("#msg-<?php echo $req['id'];?>").html('Changes has been saved');
$("#edit_contract-<?php echo $req['id'];?>")[0].reset();
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



</body>

</html>
