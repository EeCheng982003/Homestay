<?php

session_start();

$sambungan = mysqli_connect('localhost', 'root', '');

mysqli_select_db($sambungan, 'bbchomestay');

$id = $_POST['idPengguna'];
$kataLaluan = $_POST['kataLaluan'];


$s = "select * from pengguna where IDPekerja = '$id' && katalaluan = '$kataLaluan'";

$keputusan = mysqli_query($sambungan, $s);

$nom = mysqli_num_rows($keputusan);

if ($nom == 1){
    $_SESSION['id'] = $id;
    echo "<script type='text/javascript'>window.location='bilik.php'; alert('Log masuk berjaya')</script>";
}
else{
    echo "<script type='text/javascript'>window.location='index.php'; alert('Id/Kata Laluan anda telah salah')</script>";

}

?>
