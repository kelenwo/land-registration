<script src="<?php echo base_url();?>template/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url();?>template/assets/js/demo/datatables-demo.js"></script>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Active Contracts</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Choose from a list of contracts available for bid</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
<?php foreach ($contracts as $res ): ?>
                <div class="col-xl-12 col-md-10 mb-2">
                  <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                          <div class="text-lg font-weight-bold text-primary text-capitalize mb-1">
                            <a href="<?php echo base_url();?>bidding/contract_details/<?php echo $res['bid_number'];?>"><?php echo $res['contract_title'];?></a></div>
                          <div class="h6 mb-0 text-gray-800">Category:<b style="color:green"> <?php echo $res['category'];?></b></div>
                          <div class="h6 mb-0 text-gray-800">Contract Number:<b style="color:green"> <?php echo $res['bid_number'];?></b></div>
                          <div class="h6 mb-0 text-gray-800">Bid Opening Date:<b style="color:green"> <?php echo date("d F Y", strtotime($res['bid_opening_date']));?></b></div>
                          <div class="h6 mb-0 text-gray-800">Bid Closing Date:<b style="color:green"> <?php echo date("d F Y", strtotime($res['bid_closing_date']));?></b></div>

                        </div>
                        <div class="col-auto">
                          <a class="btn btn-success" href="<?php echo base_url();?>bidding/contract_details/<?php echo $res['bid_number'];?>">See more details</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
<?php endforeach;?>

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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
