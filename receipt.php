<?php

session_start();

$sambungan = mysqli_connect('localhost', 'root', '');

mysqli_select_db($sambungan, 'bbchomestay');

$idbilik = $_SESSION['idbilik'];
$tempoh = $_SESSION['tempoh'];
$tarikh = $_SESSION['date'];
$harga = $_SESSION['total'];
$idPelanggan =$_POST['id'];
$nama = $_POST['name'];
$ic = $_POST['IC'];
$tel = $_POST['tel'];
$alamat = $_POST['alamat'];
$poskod = $_POST['poskod'];
$negeri = $_POST['negeri'];
$idTempahan = "G" . strval(rand(100, 999));
$idPekerja = $_SESSION['id'];



$s = "INSERT INTO tempahan VALUES('$idTempahan', '$tarikh', '$tempoh', '$idbilik', '$idPekerja', '$harga')";

$keputusan = mysqli_query($sambungan, $s);

$s = "INSERT INTO pelanggan VALUES('$idPelanggan', '$nama', '$ic', '$tel', '$idbilik')";

$keputusan = mysqli_query($sambungan, $s);

$s = "INSERT INTO alamat VALUES('$nama', '$alamat', '$poskod', '$negeri')";

$keputusan = mysqli_query($sambungan, $s);

echo "<script type='text/javascript'>window.location='bilik.php'; alert('Tempahan Berjaya')</script>";
