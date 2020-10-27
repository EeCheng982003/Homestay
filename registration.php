<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '');

mysqli_select_db($connect, 'bbchomestay');

$userId = $_POST['idPengguna'];
$namaPek = $_POST['namaPekerja'];
$password = $_POST['kataLaluan'];
$namaPeng = $_POST['namaPengurus'];

$s = "select * from pengguna where IDpekerja = '$userId'";

$result = mysqli_query($connect, $s);

$num = mysqli_num_rows($result);

if ($num == 1){
    echo "<script type='text/javascript'>window.location='index.php'; alert('Pengguna telah wujud. Sila gunakan id yang lain')</script>";
}
else{
    $s = "INSERT INTO pengguna (IDpekerja, katalaluan, namaPekerja, namaPengurus) VALUES ('$userId', '$password', '$namaPek', '$namaPeng')";
    $insert = mysqli_query($connect, $s);
    echo "<script type='text/javascript'>window.location='index.php'; alert('Pengunna berjaya didaftarkan. Sila Log masuk')</script>";
}