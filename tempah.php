<?php

session_start();

$bilik = $_SESSION['bilik'];

if ($bilik="bujang"){
    $harga = 100;
}
elseif($bilik="berkembar"){
    $harga = 200;
}
elseif($bilik="presiden"){
    $harga=500;
}

$total = $harga * $_POST['tempoh'];

$_SESSION['total'] = $total;

echo "<script type='text/javascript'>window.location='bayar.php';</script>";