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
          <h1 class="h3 mb-2 text-gray-800">Your Bids (Pending)</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bids <b style="color:red;">Pending</b> Approval</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

<!-- View contracts Start -->
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
<tr>
  <th>#</th>
  <th>Title</th>
  <th>Size</th>
  <th>Amount</th>
  <th>Status</th>
  <th>Date</th>
</tr>
</thead>
  <tbody>
<?php if($bid==false): ?>
  <tr><td colspan="7"><h4 class="text-center">NO DATA TO DISPLAY</h4></td></tr>
<?php else: $i = 1;?>
<?php  foreach($bid as $key => $req): ?>
<tr>
<td><?php echo $i++.'.';?>
<td><a href="#viewcontract-<?php echo $req['id'];?>" data-toggle="modal"><?php echo $req['contract_title']; ?></a></td>
<td><?php echo $req['bid_number']; ?></td>
<td><?php echo $req['category']; ?></td>
<td><?php echo $req['bid_amount']; ?></td>
<td><?php echo $req['bid_status']; ?></td>
<td><?php echo date("d F Y", strtotime($req['bid_date']));?></td>

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
 </span> <h3 class="inline">Contract Bid Information</h3>
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
 <div class="text-sm text-primary ml-3 text-capitalize"><small class="text-success">Contract Title:</small>
 <br>
<h6><?php echo $req['contract_title'];?></h6></div>
<br>
           <div class="ml-3">
           <div class="text-sm text-primary text-capitalize"><small class="text-success">Category:</small>
           <br>
         <h6><?php echo $req['category'];?></h6></div>
         <br>
         <div class="text-sm text-primary text-capitalize"><small class="text-success">Contract Number:</small>
         <br>
       <h6><?php echo $req['bid_number'];?></h6></div>
       <br>
         <div class="text-sm text-primary text-capitalize"><small class="text-success">Location:</small>
         <br>
       <h6><?php echo $req['location'];?></h6></div>
       <br>
       <div class="text-sm text-primary text-capitalize"><small class="text-success">Contract Owner:</small>
       <br>
     <h6><?php echo $req['owner'];?></h6></div>
       </div></div>
         <div class="col-sm-5 col-md-5 ml-4 mt-3">
           <div class="text-sm text-primary text-capitalize"><small class="text-success">Bid Status:</small>
           <br>
         <h6><?php echo $req['bid_status'];?></h6></div><br>
       <div class="text-sm text-primary text-capitalize"><small class="text-success">Bid Date:</small>
       <br>
     <h6><?php echo $req['bid_date'];?></h6></div>
<?php if($req['bid_status']!=="pending"):?>
     <br>
     <div class="text-sm text-primary text-capitalize"><small class="text-success">Billing Cycle:</small>
     <br>
    <h6><?php echo $req['billing_cycle'];?></h6></div>
    <br>
    <div class="text-sm text-primary text-capitalize"><small class="text-success">Approval Date:</small>
    <br>
   <h6><?php echo $req['approval_date'];?></h6></div>
  <?php endif;?>
         </div>
       </div>
     </div>
       </div>
<!-- General Information end -->

     </div>

       <div class="modal-footer inline">
         <div class="form-group text-center mt-3">
           <span style="color:green;" id="msg-<?php echo $req['id'];?>"></span>
           <span style="color:red;" id="msg2-<?php echo $req['id'];?>"></span>
           <?php if($req['bid_status']=="authorized"):?>
             <form id="update_contract_<?php echo $req['id'];?>">
            <input type="hidden" name="id" value="<?php echo $req['id'];?>">
            <input type="hidden" name="bid_status" value="approved">
             </form>
             <button class="btn pl-5 pr-5 btn-success" id="save-<?php echo $req['id'];?>"><i class="far fa-edit"></i> Accept Contract &nbsp;
             <i id="loading-<?php echo $req['id'];?>" class="fas fa-cog fa-spin"></i></button>
           <?php endif;?>
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
$('#loading-<?php echo $req["id"];?>').hide();
$("#del-contract-<?php echo $req['id'];?>").click(function(){
  if (confirm("Do you want to delete?")){
    $.ajax({
      url:'<?php echo base_url()."bidding/delete_item";?>',
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
$("#msg-<?php echo $req['id'];?>").html('You have accepted the contract, You will be notified shortly.');
$("#save-<?php echo $req['id'];?>").attr('disabled','disabled');
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
