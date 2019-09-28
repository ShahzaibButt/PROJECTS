@extends('layout.admin')

@section('content')
     <!--Bar chart and pie chart-->
    <div class="column">
          <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                Bar Chart Result</div>
              <div class="card-body">
                <canvas id="myBarChart" width="600" height="400"></canvas>
              </div>
              
            </div>
          </div>
          
    </div>
    <div class="col-lg-12">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-pie"></i>
                Pie Chart Result</div>
              <div class="card-body">
                <div id="donutchart" style="width: 900px; height: 500px; margin-left: 100px"></div>
              </div>
              
            </div>
          </div>
</div>
<!-- /.container-fluid -->

  {{-- <script src="{{ url('http://localhost/Smart_Ballot_System/public/assets/vendor/chart.js/Chart.min.js')}}"></script> --}}

<script type="text/javascript">

  var partynames = <?php echo json_encode($partyArrName);  ?>;
  var partyvotes = <?php echo json_encode($partyArrVotes);  ?>;

  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  // Bar Chart Example
  let ctx = document.getElementById("myBarChart");
  let myLineChart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
      labels: partynames,
      datasets: [{
        data: partyvotes,
        label: "Votes",
        backgroundColor: "rgba(2,117,216,1)",
        borderColor: "rgba(2,117,216,1)",
      }],
    },
    options: {
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: true
          },
          ticks: {
            maxTicksLimit: 9
          }
        }],
        yAxes: [{
          ticks: {
            min: 5,
            max: 20000000,
            maxTicksLimit: 15
          },
          gridLines: {
            display: true
          }
        }],
      },
      legend: {
        display: true
      }
    }
  });



  //end of bar chart


  // //PIE CHART

  google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            [partynames, partyvotes],
          <?php
            foreach($partyArrName as $key => $partyName){
              echo "['".$partyName."',".$partyArrVotes[$key]."],";
            }

          ?>

          ]);


          var options = {
            title: 'ELECTION RESULTS',
            pieHole: 0.4,
          };

          var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
          chart.draw(data, options);
        }

</script>
    
@endsection