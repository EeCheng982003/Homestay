<?php
  session_start();
  include('header.php');
  $_SESSION['bilik'] = "bilik berkembar";
  $_SESSION['harga'] = '200';
  $_SESSION['idbilik'] = "H1456";
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
    <title>Tempahan</title>
  </head>
  <body>
    <div class="card mb-3">
      <img src="room2.jpg" class="card-img-top1" >
      <div class="card-body">
        <h4 class="card-title">Bilik Berkembar</h4>
        <p class="card-text">Bilik ini sesuai bagi dua orang sahaja</p>
        <p class="card-text">Bilik ini terdapat WiFi percuma.</p>
        <p class="card-text">Bilik ini terdapat dua buah katil bujang, bilik tandas dan sebuah 42" televisyen.</p>
        <p class="card-text">Bilik ini terdapat pendingin hawa.</p>
        <p class="card-text">Bilik ini berharga RM200 semalam</p>
        <h5 class="card-title">Sila masukan tarikh masuk.</h5>
        <form action="tempah.php" method="POST">
              <label for="tarikhMasuk">Tarikh Masuk:</label>
              <input type="date" id="tarikhMasuk" name="tarikhMasuk" required />
        <h5 class="card-title">Sila masukan tempoh tempahan.</h5>
              <label for="tarikhKeluar">Tempoh tempahan :</label>
              <select name="tempoh" id="tempoh" required>Pilih tempoh
                <option value=1>1 hari</option>
                <option value=2>2 hari</option>
                <option value=3>3 hari</option>
                </select>
              <input type="submit" value="Submit">
            </form>
      </div>
    </div>
  </body>
</html>