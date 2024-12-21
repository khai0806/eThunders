<!DOCTYPE html>
<html>
<head>
    <title>Rekod Kehadiran Pemain</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: url('Team_Thunders.jpg');
            background-size: cover;
        }
        h2 {
            text-align: center;
            font-weight: normal;
            color: #325d87;
            margin-bottom: 20px;
            padding: 15px;
            background-color: white;
            border-radius: 20px;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        form {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            width: 280px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-size: 14px;
            margin-bottom: 4px;
            color: #525252;
        }
        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            outline: none;
            box-sizing: border-box;
            background-color: #fafafa;
        }
        input[type="submit"] {
            background-color: #325d87;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.2s ease;
            width: 100%;
        }
        input[type="submit"]:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body background="add.jpg">
    <div class="container">
        <h2>Rekod Kehadiran Pemain</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="tarikh">Tarikh</label>
                <input type="date" id="tarikh" name="tarikh" required>
            </div>
            <div class="form-group">
                <label for="angka_giliran">Angka Giliran</label>
                <input type="text" id="angka_giliran" name="angka_giliran" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
            <p>KEHADIRAN :</p>
            <label for="kehadiran">HADIR</label>
            <input type="radio" id="kehadiran" name="kehadiran" value="YA">
            <label for="kehadiran">TIDAK HADIR</label>
            <input type="radio" id="kehadiran" name="kehadiran" value="TIDAK">

            </div>
            <input type="submit" name="hantar" value="Hantar">
        </form>

        <?php
        include('config.php'); 

        if (isset($_POST['hantar'])) {
            $tarikh =$_POST['tarikh'];
            $angka_giliran =$_POST['angka_giliran'];
            $nama =$_POST['nama'];
            $kehadiran =$_POST['kehadiran'];
            
            $result = mysqli_query($connect, "INSERT INTO kehadiran (tarikh, angka_giliran, nama, kehadiran) 
                      VALUES ('$tarikh', '$angka_giliran', '$nama', '$kehadiran')");
            
            if ($result) {
                echo "<script>alert('Berjaya Daftar!'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Gagal Daftar!');</script>";
            }
    }
        ?>
            <?php
if (isset($_POST['Result']))
  {
$radioVal = $_POST["MyRadio"];

if($radioVal == "YA")
{
echo("HADIR");
}
else if ($radioVal == "TIDAK")
{
echo("TIDAK HADIR");
}
}
?>
    </div>
</body>
</html>
