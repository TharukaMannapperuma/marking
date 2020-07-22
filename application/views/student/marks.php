<?php include 'partials/header.php' ?>
<?php include 'partials/nav.php' ?>
<div class="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <div class="card bg-c-blue order-card">
          <div class="card-block">
            <div>
              <h2 class="text-center" style="font-size: 100%;"><i class="fa fa-marker f-center"></i></h2>
            </div>
            <h2 class="text-center" style="font-size: xxx-large"><span><?php echo $fetched_data->marks ?></span></h2>
            <p class="m-b-0" style="text-align: center;">Latest Paper Marks</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3">
        <div class="card bg-c-green order-card">
          <div class="card-block">
            <div>
              <h2 class="text-center" style="font-size: 100%;"><i class="fas fa-tasks f-center"></i></h2>
            </div>
            <h2 class="text-center" style="font-size: xxx-large"><span><?php echo $fetched_data->d_rank ?></span></h2>
            <p class="m-b-0" style="text-align: center;">District Rank</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3">
        <div class="card bg-c-yellow order-card">
          <div class="card-block">
            <div>
              <h2 class="text-center" style="font-size: 100%;"><i class="fa fa-spinner f-center"></i></h2>
            </div>
            <h2 class="text-center" style="font-size: xxx-large"><span><?php echo $fetched_data->c_rank ?></span></h2>
            <p class="m-b-0" style="text-align: center;">Central Rank</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-xl-3">
        <div class="card bg-c-pink order-card">
          <div class="card-block">
            <div>
              <h2 class="text-center" style="font-size: 100%;"><i class="fa fa-award f-center"></i></h2>
            </div>
            <h2 class="text-center" style="font-size: xxx-large">Soon!</h2>
            <p class="m-b-0" style="text-align: center;">Z-Score</p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Progress of Marks</h4>
            <div>
              <canvas id="line-chart" height="120"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Progress of District Rank</h4>
            <div>
              <canvas id="line3-chart" height="120"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Progress of Central Rank</h4>
            <div>
              <canvas id="line4-chart" height="120"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Progress of Z-Score</h4>
            <div>
              <canvas id="line2-chart" height="120"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'partials/footer.php' ?>
    <script>
      $(function() {
        var chartData = JSON.parse(`<?php echo $chart_data; ?>`);
        new Chart(document.getElementById("line-chart"), {
          type: "line",
          data: {
            labels: chartData.label,
            datasets: [{
              data: chartData.marks,
              label: "Marks",
              borderColor: "#7367f0",
              fill: false
            }]
          },
          options: {
            title: {
              display: true,
            }
          }
        });
        new Chart(document.getElementById("line2-chart"), {
          type: "line",
          data: {
            labels: chartData.label,
            datasets: [{
              data: chartData.d_rank,
              label: "Z-Score",
              borderColor: "#f65599",
              fill: false
            }]
          },
          options: {
            title: {
              display: true,
            }
          }
        });
        new Chart(document.getElementById("line3-chart"), {
          type: "line",
          data: {
            labels: chartData.label,
            datasets: [{
              data: chartData.d_rank,
              label: "District Rank",
              borderColor: "#3bb2b8",
              fill: false
            }]
          },
          options: {
            title: {
              display: true,
            }
          }
        });
        new Chart(document.getElementById("line4-chart"), {
          type: "line",
          data: {
            labels: chartData.label,
            datasets: [{
              data: chartData.c_rank,
              label: "Central Rank",
              borderColor: "#f59e83",
              fill: false
            }]
          },
          options: {
            title: {
              display: true,
            }
          }
        });
      });
    </script>