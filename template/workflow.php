
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Workflow</h1>
                    </div>

          <!-- Content Row -->

          <div class="row">
              <div class="col-xl-6 col-lg-6 mb-4">
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
              <div class="col-xl-6 col-lg-6 mb-4">
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

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Work Progress</h6>
                </div>
                <!-- Card Body -->

<h6 class="m-0 font-weight-bold "> </h6>

<?php foreach ($contract as $res ):
  $startDate = new DateTime($res['start_date']);
  $currentDate = new DateTime(); // defaults to now
  $endDate = new DateTime($res['end_date']);
  $totalTime = $endDate->diff($startDate)->format('%a');
  $elapsedTime = $currentDate->diff($startDate)->format('%a');
  $per = round(($elapsedTime / $totalTime) * 100,-1);
  if($per >= 100) {
    $percent = 100;
  } else {
    $percent = $per;
  }
  //var_dump(round(87.55,1));
?>
  <div class="col-xl-12 col-md-10 mb-2">
    <div class="card  shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-lg font-weight-bold text-primary text-capitalize mb-1">Contract Title:
              <b style="color:green"><?php echo $res['contract_title'];?></b></div>
            <div class="h6 mb-0 text-gray-800">Category:<b style="color:green"> <?php echo $res['category'];?></b></div>
            <div class="h6 mb-0 text-gray-800">Contract Number:<b style="color:green"> <?php echo $res['contract_number'];?></b></div>
            <div class="progress mt-3" style="height: 40px;">
              <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $percent;?>%; font-size:18px;" aria-valuenow="<?php echo $percent;?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percent;?>% Completed</div>
            </div>
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
