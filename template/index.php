
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

          <!-- Content Row -->
          <div class="row">
              <?php  if(empty($company_name) && empty($company_address) && empty($company_position)): ?>
            <div class="col-xl-12 col-md-12 mb-12 mb-2">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-secondary fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-user fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <h4 class="inline mt-3 text-warning">Your profile is not yet complete.
                        <a class="btn pl-5 pr-5 btn-success" href="<?php echo base_url();?>dashboard/edit_profile"><i class="far fa-edit"></i>
                           Complete Profile</a>
                         </h4>                    </div>

                  </div>
                </div>
              </div>
            </div>

            <?php endif;?>
            <!--  -->
            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-secondary fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Approved Contracts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{contracts_approved_count}</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-info fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Contracts</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{contracts_active_count}</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-success fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Contracts Completed</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{contracts_finished}</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-3 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <span class="fa-stack text-warning fa-2x" style="font-size: 1.8em !important;">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fas fa-newspaper fa-stack-1x fa-inverse"></i>
                      </span>
                    </div>
                    <div class="col ml-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Bids</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">{contracts_pending_count}</div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
<h6 class="m-0 font-weight-bold text-info">Latest Contract:</h6>
<?php foreach ($contracts_new as $contract):?>
<span class="m-0 ml-3 text-primary text-sm">Contract Title: <?php echo $contract['contract_title'];?></span> <br>
<span class="m-0 ml-3 text-primary text-sm">Bidding start: <?php echo date("d F, Y",strtotime($contract['bid_opening_date']));?></span>
<?php endforeach;?>
                </div>
                <div class="card-body">
<h6 class="m-0 font-weight-bold text-warning">Upcoming Event:</h6>
<?php foreach ($events as $event):?>
<span class="m-0 ml-3 text-primary text-sm"><?php echo $event['event_title'];?></span> <br>
<span class="m-0 ml-3 text-primary text-sm"><?php echo date("h:m a",strtotime($event['event_time'])).','.date("d F, Y",strtotime($event['event_date']));?></span>
<?php endforeach;?>
                </div>
                <div class="card-body">
<h6 class="m-0 font-weight-bold text-success">Board Event:</h6>
<?php foreach ($events_board as $event):?>
<span class="m-0 ml-3 text-primary text-sm"><?php echo $event['event_title'];?></span> <br>
<span class="m-0 ml-3 text-primary text-sm"><?php echo date("h:m a",strtotime($event['event_time'])).',&nbsp;'.date("d F, Y",strtotime($event['event_date']));?></span>
<?php endforeach;?>
                </div>
              </div>
            </div>

            <!-- Contracts by category-->
            <div class="col-xl-6 col-lg-6">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Bidding  Status </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Approved Bids
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Pending Bids
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: ["Approved", "Pending"],
    datasets: [{
      data: [<?php echo $contracts_approved_count;?>, <?php echo $contracts_pending_count;?>,],
      backgroundColor: ['#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

</script>
</body>

</html>
