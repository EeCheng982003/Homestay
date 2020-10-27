<?php
  session_start();
  include('header.php');
  $connect = mysqli_connect('localhost', 'root', '', 'bbchomestay');

$s = "SELECT SUM(bayaran) AS 'Jumlah' from tempahan ";
$s2 = "SELECT IDbilik, SUM(bayaran) AS 'Jumlah' FROM tempahan GROUP BY IDbilik";

if (isset($_POST['query'])){
    $bulan = (int)$_POST['query'];
    $_SESSION['bulan'] = $bulan;
    if($bulan == 0){
        $s = "SELECT SUM(bayaran) AS 'Jumlah' from tempahan ";
        $s2 = "SELECT IDbilik, SUM(bayaran) AS 'Jumlah' FROM tempahan GROUP BY IDbilik";
    }
    else{
        $s = "SELECT SUM(bayaran) AS 'Jumlah' from tempahan WHERE EXTRACT(MONTH FROM tarikhJualan) = $bulan";
        $s2 = "SELECT IDbilik, SUM(bayaran) AS 'Jumlah' FROM tempahan WHERE EXTRACT(MONTH FROM tarikhJualan) = $bulan GROUP BY IDbilik";

    }


}

$result = mysqli_query($connect, $s);
while($data = mysqli_fetch_assoc($result)){
    $jumlah = $data['Jumlah'];
    $_SESSION['Jumlah'] = $jumlah;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <title>Jualan</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Bilik', 'Jualan(RM)'],
                <?php
                $z = mysqli_query($connect, $s2);
                while($result = mysqli_fetch_assoc($z)){
                    echo"['".$result['IDbilik']."', ".$result['Jumlah']."],";
                }
                ?>
            ]);
            var options = {
                title: 'JUALAN HOMESTAY BBC',
                width: '100%',
                legend: { position: 'none' },
                chart: { title: 'Jualan BBC HOMESTAY',
                    subtitle: 'jumlah jualan mengikut bilik' },
                bars: 'horizontal', // Required for Material Bar Charts.
                axes: {
                    x: {
                        0: { side: 'top', label: 'Jualan'} // Top x-axis.
                    }
                },
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, options);
        };
    </script>
</head> 
<body>
        <div class="query" style="margin-top: 1%;">
          <h5>Sila Pilih bulan jualan :</h5>
          <form method="post" action="">
            <select name="query" required>
              <option><?php
                  if (isset($_POST['query'])){
                      echo $bulan;
                  }else{
                      echo "All";
                  }
                  ?></option>
              <option value="0">ALL</option>
              <option value="1">Januari</option>
              <option value="2">Februari</option>
              <option value="3">March</option>
              <option value="4">April</option>
              <option value="5">May</option>
              <option value="6">Jun</option>
              <option value="7">July</option>
              <option value="8">Ogos</option>
              <option value="9">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Disember</option>
              </select>
              <button type="submit" class="btn-primary">TERUSKAN</button>
          </form>
          <center>
            <div class="jualan" style="margin-top: 1%; font-size: 24px">
                <?php if (isset($_POST['query'])){ 
                         if ($bulan == 0) {
                              echo "Jualan Bagi Setahun " ;
                          }else{
                              echo "Jualan Bagi Bulan : ". $bulan;
                          }
                      }else{
                        echo "Jualan Bagi Setahun " ;
                      }
                ?>
            </div>
          </center>

          </div>
          <div id="top_x_div" style="width: 100%; height: 500px; margin-top: 2%;"></div>
            <center>
                <h5 style="margin-top: 2%"><?php echo "JUMLAH : RM" . $jumlah; ?></h5>
            
            <br>
            <button onclick="window.print()" class="btn-primary">MUAT TURUN LAPORAN JUALAN</button>
            </center>
</body>
</html>