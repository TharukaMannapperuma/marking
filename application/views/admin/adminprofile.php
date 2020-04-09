<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
          <div class="card-block">
            <div>
              <h2 class="text-center" style="font-size: 100%;"><i class="fa fa-users-cog f-center"></i></h2>
            </div>
            <h2 class="text-center"><span><?php echo ($class_data["theory"] + $class_data["revision"]) ?> Total</span></h2>
            <p class="m-b-0" style="text-align: center;">Students are in the system!</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3">
        <a href="admin_table.php">
          <div class="card bg-c-green order-card">
            <div class="card-block">
              <div>
                <h2 class="text-center" style="font-size: 100%;"><i class="fa fa-users f-center"></i></h2>
              </div>
              <h2 class="text-center"><span><?php echo $class_data["theory"] ?> Theory</span></h2>
              <p class="m-b-0" style="text-align: center;">Students are in the system!</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-xl-3">
        <a href="admin_add.php">
          <div class="card bg-c-yellow order-card">
            <div class="card-block">
              <div>
                <h2 class="text-center" style="font-size: 100%;"><i class="fa fa-users f-center"></i></h2>
              </div>
              <h2 class="text-center"><?php echo $class_data["revision"] ?> Revision</h2>
              <p class="m-b-0" style="text-align: center;">Students are in the system!</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md-4 col-xl-3">
        <a href=<?php echo base_url('students') ?>>
          <div class="card bg-c-pink order-card">
            <div class="card-block">
              <div>
                <h2 class="text-center" style="font-size: 100%;"><i class="fa fa-list f-center"></i></h2>
              </div>
              <h2 class="text-center">Access</h2>
              <p class="m-b-0" style="text-align: center;">Student List</p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="row">
      <!-- column -->
      <!-- column -->
      <!-- column -->
      <!-- column -->
      <!-- column -->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">No of Students in each class</h4>
            <div class="chart-container" style="position: relative;">
              <canvas id="pie-chart" height="100px"></canvas>
            </div>
          </div>
        </div>
      </div>
      <!-- column -->
    </div>
    <?php include 'partials/footer.php' ?>
    <script>
      $(function() {
        "use strict";
        // Bar chart
        var chartData = JSON.parse(`<?php echo $chart_data; ?>`);
        // New chart
        new Chart(document.getElementById("pie-chart"), {
          type: 'doughnut',
          data: {
            labels: chartData.labels,
            datasets: [{
              label: chartData.labels,
              backgroundColor: ["#03dbfc", "#03fc8c", "#fc0390", "#8fa0f3", '#34ebb7'],
              data: chartData.count
            }]
          },
          options: {
            title: {
              maintainAspectRatio: false,
              responsive: true,
              display: true,
              text: "Classes"
            }
          }
        });
        // line second
      });
    </script>