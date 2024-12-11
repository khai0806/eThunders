<?php
include('config.php');
?>
<html>
<body>
     <head>
        <title>Tambah Tarikh Latihan</title>
        <style>
            #header {width:100%, height:60px, border:1px solid #333; background-color: beige;}
        </style>
     </head>
<body>
 
 <?php 

 if(isset($_POST['submit']))

{
    $angka_giliran =$_POST["angka_giliran"];
    $nama = $_POST["nama"];
    $kehadiran =$_POST["kehadiran"];

    $result = mysqli_query($connect, "INSERT INTO kehadiran (angka_giliran, nama, kehadiran)"."VALUES('$angka_giliran', '$nama', '$kehadiran' )");
        
echo "<script> alert ('Berjaya Daftar Maklumat Pelajar');"
    . "window.location='index.php'</script>";
} 
?>
    <html>
    <head>
        <title>TAMBAH REKOD</title>
    </head>
    <body bgcolor="cyan">
    <center> <br><br><h2 style="color: black;">TAMBAH REKOD PELAJAR</h2>
        <fieldset>
            <form action="index.php" method="post" name="form1">
                <table width="25%" border="0">

            <tr>
                <td style="color:black;">ANGKA_GILIRAN</td>
                <td><input type="text" name="angka_giliran"></td>
            </tr>

            <tr>
                <td style="color:black;">NAMA</td>
                <td><input type="text" name="nama"></td>
            </tr>

            <tr>
                <td style="color:black;">KEHADIRAN</td>
                <td><select  name="masa">
                <option>hadir</option>
                <option>tidak hadir</option>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="submit" value="Tambah Rekod"></td>

            </tr>
        </table>
    </form>

    <br><a href="admin_login.php">Kembali Ke Laman Utama</a>
</fieldset>
</center>
    </body>
    </html>
