<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '');

mysqli_select_db($connect, 'bbchomestay');

$IDpekerja = $_POST['IDpekerja'];
$namaPekerja = $_POST['namaPekerja'];
$kataLaluan = $_POST['katalaluan'];
$namaPengurus = $_POST['namaPengurus'];
$s = "UPDATE pengguna SET namaPekerja = '{$namaPekerja}', katalaluan = '{$kataLaluan}', namaPengurus = '{$namaPengurus}' WHERE IDpekerja = '{$IDpekerja}'";
$update = mysqli_query($connect, $s);

echo "<script type='text/javascript'>window.location='senaraiPekerja.php'; alert('Pekerja berjaya dikemaskini')</script>";
