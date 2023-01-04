<!-- 前回失敗したGoogle chart-->

<?php include "db.php";?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', '収益', '総資産', '負債'],
          <?php
            $query="select * from gs_bm_table2";
            $res=mysqli_query($conn,$query);
            while($data=mysqli_fetch_array($res)){
              $year=$data['year'];
              $revenue=$data['revenue'];
              $asset=$data['asset'];
              $liab=$data['liab'];
           ?>
           ['<?php echo $year;?>',<?php echo $revenue;?>,<?php echo $asset;?>,<?php echo $liab;?>],   
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'Company Performance',
            subtitle: '収益, 総資産, 負債',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>

