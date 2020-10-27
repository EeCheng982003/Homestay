<?php 
 session_start();
 include('header.php');
 $conn = mysqli_connect("localhost", "root", "", "bbchomestay");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM pengguna ORDER BY IDpekerja";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="menu.css" />
   <title>Senarai Pekerja</title>
</head>
<body>
   <center>
      <h2 style="margin-top: 3%;">SENARAI PEKERJA </h2>
                     <form action="kemaskini.php" method="post">
                        <table>
                            <tr>
                                <th>Id Pekerja</th>
                                <th>Nama</th>
                                <th>Kata Laluan</th>
                                <th>Nama Pengurus</th>
                                <th>Kemaskini</th>
                            </tr>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row["IDpekerja"]; ?></td>
                                        <td><?php echo $row["namaPekerja"]; ?></td>
                                        <td><?php echo $row["katalaluan"]; ?></td>
                                        <td><?php echo $row["namaPengurus"]; ?></td>
                                        <td><input type="submit" name="edit" value="<?php echo $row["IDpekerja"]; ?>"
                                                   id="Kemaskini" class="btn-2"/>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </form>
                  <br>
                  <br>
                  <br>
                  <br>
                  <a href="importcsv.php">IMPORT FILE CSV </a>
   </center>
</body>
</html>