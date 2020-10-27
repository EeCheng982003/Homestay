<?php
session_start();
include('header.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" type="text/css" href="menu.css" />
    <title>Bilik</title>
  </head>
  <body>
    <center>
      <div class="main">
      <div class="charlie">
        <h2>Sila Pilih Bilik Anda.</h2>
      </div>
      <div class="card-group">
        <div class="card">
          <img src="room1.jpg" class="card-img-top" />
          <div class="card-body">
            <h5 class="card-title">Bilik Bujang</h5>
            <p class="card-text">Bilik ini sesuai untuk tinggal secara berseorangan</p>
            <a href="tempahan1.php" class="btn btn-primary">Pilih</a>
          </div>
        </div>
        <div class="card">
          <img src="room2.jpg" class="card-img-top" />
          <div class="card-body">
            <h5 class="card-title">Bilik Berkembar</h5>
            <p class="card-text">Bilik ini sesuai bagi dua orang sahaja.</p>
            <a href="tempahan2.php" class="btn btn-primary">Pilih</a>
          </div>
        </div>
        <div class="card">
          <img src="room3.jpg" class="card-img-top" />
          <div class="card-body">
            <h5 class="card-title">Suite Presiden</h5>
            <p class="card-text">Bilik ini sesuai untuk ditinggal sekeluarga.</p>
            <a href="tempahan3.php" class="btn btn-primary">Pilih</a>
          </div>
        </div>
      </div>
      </div>
    </center>
  </body>
</html>
