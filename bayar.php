<?php
    session_start();
    if(!isset($_SESSION['id'])) {
        header("Location: logMasuk.php");
        die();
    }
    require ('header.php');
    ?>

<html>
<head>

</head>
<body>
    <div class="price-container">
        <div class="price">
            <?php echo "BILIK : "  . $_SESSION['bilik'] ?><br>
            <?php echo "TEMPOH : " . $_SESSION['tempoh']?><br>
            <?php echo "TARIKH MASUK : " . $_SESSION['date']?><br>
            <br>
            <br>
            <?php echo "Jumlah Harga : RM" . $_SESSION['total'] ?>
            <br>
            <br>
            
                <div class="middle">
                    <button class="btn-bayar">BAYAR</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

    