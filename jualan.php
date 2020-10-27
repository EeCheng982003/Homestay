<?php
require('header.php');
?>
<html>
<head>
<title>LAPORAN BULANAN BILIK</title>
</head>
<body>
<table width="711" border="0">
    <td><p><strong>LAPORAN BULANAN KEUNTUNGAN BILIK </strong></p>
<table width="1000" border="1" align="center">
  <tr>
  <td colspan="9">
REKOD TEMPAHAN BULANAN: <?php echo $namarumah; ?><br>
<div align="right" class="style15">Tarikh Cetakan:
<?php echo date("d/m/Y"); ?></div>
  </td>
  </tr>
<tr>
    <td width="30"><b>Bil.</b></td>
    <td width="150"><b>Nama Bilik</b></td>
    <td width="140"><b>Tarikh Masuk</B></td>
    <td width="100"><b>Tempoh Tempahan</b></td>
    <td width="100"><b>Nama Pelanggan</b></td>
    <td width="100"><b>Nom HP</b></td>
    <td width="140"><b>Harga</b></td>
    <td width="140"><b>Jumlah</b></td>
</tr>
<?php
    $no=1;
    $bilik=$_POST["bilik"];
    $bulan=$_POST["bulan"];
    $tahun=$_POST["tahun"];
    if ($bilik=="-"&&$bulan=="-"&&$tahun=="-")
    {
        $data1=mysqli_query($samb,"SELECT * FROM tempahan 
        ORDER by idBilik,tarikhMasuk");
    }
    elseif ($bilik!="-"&&$bulan=="-"&&$tahun=="-")
    {
        $data1=mysqli_query($samb,"SELECT * FROM tempahan
        WHERE idBilik='$bilik'
        ORDER by idBilik,tarikhMasuk");
    }
    elseif ($bilik!="-"&&$bulan!="-"&&$tahun=="-")
    {
        $data1=mysqli_query($samb,"SELECT * FROM tempahan
        WHERE idBilik='$bilik' AND (MONTH(tarikhMasuk)='$bulan'
        OR MONTH(tarikhKeluar)='$bulan')
        ORDER BY idBilik,tarikhMasuk");
    }
    elseif ($bilik!="-"&&$bulan!="-"&&$tahun!="-")
    {
        $data1=mysqli_query($samb,"SELECT * FROM tempahan
        WHERE idBilik='$bilik' AND ((MONTH(tarikhMasuk)='$bulan'
        AND YEAR(tarikhMasuk)='$tahun')
        OR (MONTH(tempoh)='$bulan' AND YEAR(tempoh)='$tahun'))
        ORDER BY idBilik,tempoh");
    }
    elseif ($bilik=="-"&&$bulan!="-"&&$tahun=="-")
    {
        $data1=mysqli_query($samb,"SELECT * FROM tempahan
        WHERE MONTH(tarikhMasuk)='$bulan' OR MONTH(tempoh)='$bulan
        ORDER BY idBilik,tarikhMasuk");
    }
    elseif ($bilik="-"&&$bulan=="-"&&$tahun!="-")
    {
        $data1=mysqli_query($samb,"SELECT * FROM tempahan
        WHERE(YEAR(tarikhMasuk)='$tahun' OR YEAR(tempoh)='$tahun')
        ORDER BY idBilik,tarikhMasuk");
    }
    elseif ($bilik!="-"&&$bulan=="-"&&$tahun!="-")
    {
        $data1=mysqli_query($samb,"SELECT * FROM tempahan
        WHERE idBilik='$bilik' AND (YEAR(tarikhMasuk)='$tahun'
        OR YEAR(tempoh)='$tahun')
        ORDER BY idbilik,tarikhMasuk");
    }

    $jumBesar=0;
    if(isset($data1->num_rows) && $data1->num_rows > 0){
      $bil_rekod = mysqli_num_rows($data1);
      while ($res=mysqli_fetch_array($data1, MYSQLI_ASSOC)){
        $info1[] = $res;
      } 
      for ($n=0;$n<count($info1);$n++)
      {
        $idBilik = $info1[$n]['idBilik'];
        $databilik=mysqli_query($samb,"SELECT * FROM bilik
        WHERE idBilik='$idBilik'");
        while ($res=mysqli_fetch_array($databilik, MYSQLI_ASSOC)){
          $infobilik[] = $res;
        }
        $idPelanggan = $info1[$n]['idPelanggan'];
        $datapelanggan=mysqli_query($samb,"SELECT * FROM pelanggan
        WHERE idPelanggan='$idPelanggan'");
        while ($res=mysqli_fetch_array($datapelanggan, MYSQLI_ASSOC)){
          $infopelanggan[] = $res;
        }

        $date1=date_create($info1[$n]['tarikhMasuk']);
        $date2=date_create($info1[$n]['tempoh']);
        $diff=date_diff($date1,$date2);
        $jumHari=$diff->format("%a");

        $masuk = date("d-m-Y", strtotime($info1[$n]['tarikhMasuk']));
        $keluar = date("d-m-Y", strtotime($info1[$n]['tempoh']));

        echo '<!-- PAPAR REKOD DALAM JADUAL -->';
        
        echo '<tr>';
        echo '<td>' . $no . '</td>';
        echo '<td>' . $infobilik[$n]['namaBilik'] . '</td>';
        echo '<td>' . $masuk . '</td>';
        echo '<td>' . $tempoh . '</td>';
        echo '<td>' . $infopelanggan[$n]['namaPelanggan'] . '</td>';
        echo '<td>' . $infopelanggan[$n]['noTelefon'] . '</td>';
        echo '<td>RM' . number_format($info1[$n]['hargaBilik'],2) . '</td>';
        echo '<td>RM' . number_format($info1[$n]['hargaBilik']*$jumHari,2) . '</td>';

        $jumBesar+=($info1[$n]['hargaBilik']*$jumHari);
      }
    } else {
      $bil_rekod = 0;
    }
  ?>
 
  </td>
  </tr>
  
<?php $no++;  ?>
  <tr>
<td colspan="8" align="right">
  JUMLAH KESELURUHAN
</td>
<td>RM <?php echo number_format($jumBesar,2);?></td>
</tr>
</table>
<hr /><div align="center" class="style15">* Laporan Tamat *<br />
Jumlah Rekod:<?php echo $bil_rekod; ?></div>
<center><br><br>
<a href="index2.php">Ke Menu Utama</a><br>
<a href="javascript:window.print()">Cetak Laporan</a>
</center>
</body>
</html>