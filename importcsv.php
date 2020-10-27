<?php
  session_start();
  include('header.php');
  $connect = mysqli_connect("localhost", "root", "", "bbchomestay");


if(isset($_POST["upload"])) {
    if ($_FILES['product_file']['name']) {
        $filename = explode(".", $_FILES['product_file']['name']);
        if (end($filename) == "csv") {
            $filename = $_FILES['product_file']['tmp_name'];
            if ($_FILES['product_file']['size'] > 0) {
                $file = fopen($filename, "r");
                $csvArray = array_map('str_getcsv', file($filename));
                for($counter = 0; $counter < count($csvArray); $counter++){
                    $data = $csvArray[$counter];
                    $idPengguna = $data[0];
                    $namaPekerja = $data[1];
                    $kataLaluan = $data[2];
                    
                    $namaPengurus = $data[3];
                    $query = "INSERT INTO pengguna VALUES ('$idPengguna', '$namaPekerja', '$kataLaluan', '$namaPengurus')";


                    mysqli_query($connect, $query);
                }
            }

            echo "<script type='text/javascript'>alert('Anda telah berjaya menaikkan file CSV')</script>";
           header("location: importcsv.php?updation=1");
        }else{
            echo "<script type='text/javascript'> alert('Sila masukkan File CSV sahaja')</script>";
        }
    }
}

if(isset($_GET["updation"]))
{
    echo "<script type='text/javascript'>window.location='importcsv.php'; alert('PENDAFTARAN BERJAYA')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Import CSV</title>
</head>
<body>
              <center>
                <div class="reg">
                    <form enctype="multipart/form-data" method="post">
                        <table border="1">
                            <tr >
                                <td colspan="2" align="center"><strong>Import CSV file</strong></td>
                            </tr>
                            <tr>
                                <td align="center">CSV File:</td><td><input type="file" name="product_file" id="file"></td></tr>
                        </table>
                        <br>
                        <button class="btn-primary" name="upload" value="Upload" type="submit">IMPORT CSV</button>
                    </form>

                </div>
                </center>
</body>
</html>