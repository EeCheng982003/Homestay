<?php

session_start();

$bilik = $_SESSION['bilik'];

echo $bilik;

$harga = $_SESSION['harga'];

$total = (int)$harga * (int)$_POST['tempoh'];

$_SESSION['tempoh'] = $_POST['tempoh'];

$_SESSION['total'] = $total;

$_SESSION['date'] = $_POST['date'];


echo "<script type='text/javascript'>window.location='bayar.php';</script>";