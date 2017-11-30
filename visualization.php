<?php
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous">
</script>
<style>
  .centerMe {
    text-align: center;
    bottom: 0;
    padding-bottom: 0px;
  }
</style>
<head>
  <br>
  <center><h2>Purchase Statistics</h2></center>
</head>
<html>
  <body>
  <div style="margin: auto; width:700px; height:700px;">
      <canvas id="canvas" width="900" height="800" style="padding-top: 100px; margin: auto;"></canvas>
      <script>
        $.ajax({
          type: 'POST',
          url: 'getData.php',
          dataType: 'JSON',
          success: function (data) {
            var ctx = document.getElementById("canvas");
            var myChart = new Chart(ctx, {
              type: 'bar',
              data: data,
              options: {
                responsive: true,
		maintainAspectRatio: true,
                  scales: {
                      yAxes: [{
                          ticks: {
                            beginAtZero:true
                          }
                      }]
                  }
              }
            });
          }
        });
      </script>
    </div>

  </body>
</html>

</script>

<? ?>
