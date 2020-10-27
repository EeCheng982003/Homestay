<?php 
 session_start();
 include('header.php');

$connect = mysqli_connect('localhost', 'root', '', 'bbchomestay');
$s = "SELECT * FROM pengguna WHERE IDpekerja = '{$_POST['edit']}'";
$result = mysqli_query($connect, $s);
while($data = mysqli_fetch_assoc($result)){
    $namaPekerja = $data['namaPekerja'];
    $kataLaluan = $data['katalaluan'];
    $namaPengurus = $data['namaPengurus'];
}


 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>kemaskini</title>
 </head>
 <body>
            <center>
                <form action="kemas.php" method="post">
                            <div class="textbox" style="margin-top: 3%;">
                                <i> ID Pekerja :</i>
                                <input type="text" name="IDpekerja"
                                       value=<?php echo $_POST['edit'] ?> readonly="readonly"/>
                            </div>
                            <div class="textbox">
                                <i > NAMA PEKERJA :</i>
                                <input type="text" name="namaPekerja" value="<?php echo $namaPekerja; ?>" required>
                            </div>
                            <div class="textbox">
                                <i> KATA LALUAN :</i>
                                <input type="text" name="katalaluan" value="<?php echo $kataLaluan; ?>" required>
                            </div>
                            <div class="textbox">
                                <i> NAMA PENGURUS :</i>
                                <input type="text" name="namaPengurus" value="<?php echo $namaPengurus; ?>" required>
                            </div>
                    
                        <button class="btn-primary">KEMASKINI DATA</button>
                    
                </form>
            </center>
 </body>
 </html>