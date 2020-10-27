<?php
    session_start();
    require ('header.php');
    ?>

<html>
<head>

</head>
<body>
    <center>
    <div class="price-container" style="font-size: 22px; margin-top : 3%;">
        <div class="price">
            <?php echo "BILIK : "  . $_SESSION['bilik'] ?><br>
            <?php echo "TEMPOH : " . $_SESSION['tempoh'] . " hari"?><br>
            <?php echo "TARIKH MASUK : " . $_SESSION['date']?><br>
            <br>
            <?php echo "Jumlah Harga : RM" . $_SESSION['total'] ?>
            <br>
            <form action="receipt.php" method="post" >
                <br>
                <div class="pelanggan" style=" font-size : 20px">
                <p>Maklumat Pelanggan : </p>
                ID Pelanggan :<input type="text" name="id" placeholder="Masukkan ID Pelanggan" style="width:auto" required><br>
                Nama Pelanggan :<input type="text" name="name" placeholder="Masukkan nama Pelanggan" style="width:auto" required><br>
                Kad pengenalan : <input type="text" name="IC" placeholder="Masukkan nombor IC" style="width:auto" required> <br>
                Nombor telefon : <input type="text" name="tel" placeholder="Masukkan nombor telefon" style="width:auto" required> <br>
                <br>
                <p>Alamat Pelanggan : </p>
                Alamat :<input type="text" name="alamat" placeholder="Masukkan Alamat Pelanggan" style="width:auto" required><br>
                Poskod :<input type="integer" name="poskod" placeholder="Masukkan Poskod" style="width:auto" required><br>
                Negeri :<input type="text" name="negeri" placeholder="Masukkan Negeri" style="width:auto" required><br>
                <div class="middle">
                    <button class="btn-bayar">BAYAR</button>
                </div>
                </div>
            </form>
        </div>
    </div>
    <center>
</body>
</html>

    