<!DOCTYPE html>
<html>
<head>
    <title>Jadual Aktiviti</title>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('Team_Thunders.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .form-container {
            width: 90%;
            max-width: 400px;
            margin: 100px auto;
            padding: 30px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #0056b3;
        }
        table {
            margin: 0 auto;
            background-color: lightblue;
            padding: 20px;
            border-radius: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #0056b3;
            border-radius: 5px;
            font-size: 1em;
        }
        input[type="submit"], input[type="button"] {
            background: linear-gradient(90deg, #ff3737, #0056b3);
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background: linear-gradient(90deg, #0056b3, #ff3737);
        }
        .preview-container {
            margin-top: 30px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Borang Booking Bilik Khas</h2>
        <form id="bookingForm" method="POST" action="">
            <table border="0" cellpadding="5" cellspacing="1">
                <tr>
                    <td>TARIKH</td>
                    <td>:</td>
                    <td><input type="date" name="tarikh" id="tarikh" required></td>
                </tr>
                <tr>
                    <td>HARI</td>
                    <td>:</td>
                    <td>
                        <select name="hari" id="hari" required>
                            <option value="isnin">Isnin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="khamis">Khamis</option>
                            <option value="jumaat">Jumaat</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>MASA</td>
                    <td>:</td>
                    <td><input type="time" name="masa" id="masa" required></td>
                </tr>
                <tr>
                    <td>AKTIVITI</td>
                    <td>:</td>
                    <td><input type="text" name="aktiviti" id="aktiviti" required></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center;">
                        <input type="button" value="Preview" id="previewButton">
                        <input type="submit" name="hantar" value="Hantar">
                    </td>
                </tr>
            </table>
        </form>
        <div id="previewContainer" class="preview-container" style="display: none;">
            <h3>Preview Data</h3>
            <p><strong>Tarikh:</strong> <span id="previewTarikh"></span></p>
            <p><strong>Hari:</strong> <span id="previewHari"></span></p>
            <p><strong>Masa:</strong> <span id="previewMasa"></span></p>
            <p><strong>Aktiviti:</strong> <span id="previewAktiviti"></span></p>
        </div>
    </div>

    <script>
        document.getElementById('previewButton').addEventListener('click', function() {
            const tarikh = document.getElementById('tarikh').value;
            const hari = document.getElementById('hari').value;
            const masa = document.getElementById('masa').value;
            const aktiviti = document.getElementById('aktiviti').value;

            if (!tarikh || !hari || !masa || !aktiviti) {
                alert('Sila isi semua maklumat!');
                return;
            }

            document.getElementById('previewTarikh').textContent = tarikh;
            document.getElementById('previewHari').textContent = hari;
            document.getElementById('previewMasa').textContent = masa;
            document.getElementById('previewAktiviti').textContent = aktiviti;

            document.getElementById('previewContainer').style.display = 'block';
        });
    </script>

    <?php
    include_once("config.php");

    if (isset($_POST['hantar'])) {
        $tarikh = $_POST['tarikh'];
        $hari = $_POST['hari'];
        $masa = $_POST['masa'];
        $aktiviti = $_POST['aktiviti'];

        $result = mysqli_query($connect, "INSERT INTO jadual_thunders (tarikh, hari, masa, aktiviti) VALUES ('$tarikh', '$hari', '$masa', '$aktiviti')");

        if ($result) {
            echo "<script>alert('Berjaya Daftar!'); window.location.href='admin_page.php';</script>";
        } else {
            echo "<script>alert('Gagal Daftar!');</script>";
        }
    }
    ?>
</body>
</html>
