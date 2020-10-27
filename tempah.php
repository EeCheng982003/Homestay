<?php

session_start();

$bilik = $_SESSION['bilik'];

if ($bilik="Bilik Bujang"){
    $harga = 500;
}
elseif($bilik="Bilik Berkembar"){
    $harga = 200;
}
elseif($bilik="Suite Presiden"){
    $harga = 100;
}

$total = $x * $_POST['tempoh'];

$_SESSION['total'] = $total;

echo "<script type='text/javascript'>window.location='bayar.php';</script>";