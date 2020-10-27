
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

<?php
$samb = mysqli_connect("localhost","root","","bbchomestay");
if (mysqli_connect_errno()){
echo "Gagal sambungkan pangkalan data mysql: ".mysqli_connect_error();
//sambung ke fail header 
require('header.php');
?>
<html>
<FONT SIZE="+0" COLOR="cyan" font face="Times New Roman">
<center><h3>SENARAI PEKERJA</h3><br>
<fieldset>
<table width="800" border="1" align="center">
	<tr>
		<td colspan="5" valign="middle" align="right"><b>
	<a href="tambah_pekerja.php">[+] Tambah Pekerja</a></b></td>
	</tr>
	<tr>
		<td width="40"><FONT COLOR="cyan" font face="Times New Roman"><b>Bil.</b></td>
		<td width="150"><FONT COLOR="cyan" font face="Times New Roman"><b>ID Pekerja</b></td>
		<td width="150"><FONT COLOR="cyan" font face="Times New Roman"><b>Nama Pekerja</b></td>
		<td width="120"><FONT COLOR="cyan" font face="Times New Roman"><b>Kata Laluan</b></td>
		<td width="120"><FONT COLOR="cyan" font face="Times New Roman"><b>Tindakan</b></td>
</tr>
  <?php
  $data1=mysqli_query($samb,"SELECT * FROM pengguna");
		$no=1;
	while ($info1=mysqli_fetch_array($data1))
		{
		?>
	<tr>
		<td><FONT COLOR="cyan" font face="Times New Roman"><?php echo $no; ?></td>
		<td><FONT COLOR="cyan" font face="Times New Roman"><?php echo $info1['IDpekerja']; ?></td>
		<td><FONT COLOR="cyan" font face="Times New Roman"><?php echo $info1['namaPekerja']; ?></td>
		<td><FONT COLOR="cyan" font face="Times New Roman"><?php echo $info1['katalaluan']; ?></td>
		<td><a href="kemaskini_pekerja.php?idPengguna=
		    <?php echo $info1['idPengguna']; ?>">Kemaskini</a>
			<a href="hapus_pekerja.php?idPengguna=<?php echo $info1['idPengguna'];?>">Hapus</a>
		</td>
		</tr>
		<?php $no++; } ?>
</table>
</fieldset>
<a href="index2.php">Ke Menu Utama</a><br>
</center>
   </body>
      <div class="echo">
          <a class="navbar-brand" href="kemaskinipekerja.php">Kemaskini Pekerja</a>
          <button type="button" class="btn-2" onclick="">Import CSV</button>
      </div>
   </body>

</html>