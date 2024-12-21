<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadual Aktiviti</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('Team_Thunders.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        /* Container Styling */
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 400px;
            text-align: center;
        }

        /* Header */
        h2 {
            text-align: center;
            font-weight: bold;
            color: #325d87;
            margin-bottom: 20px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
            width: 100%;
        }

        label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #525252;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
            outline: none;
            box-sizing: border-box;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input:focus {
            border-color: #325d87;
            box-shadow: 0 0 5px rgba(50, 93, 135, 0.3);
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #325d87;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #1e4c6c;
            transform: scale(1.05);
        }

        input[type="submit"]:focus,
        input[type="button"]:focus {
            outline: none;
            background-color: #1e4c6c;
        }

        /* Preview Container */
        .preview-container {
            margin-top: 20px;
            background-color: rgba(240, 240, 240, 0.9);
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 100%;
        }

        .preview-container h3 {
            color: #325d87;
            text-align: center;
            margin-bottom: 15px;
        }

        .preview-container p {
            margin: 5px 0;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Jadual Aktiviti</h2>
        <form id="bookingForm" method="POST" action="">
            <div class="form-group">
                <label for="tarikh">Tarikh</label>
                <input type="date" name="tarikh" id="tarikh" required>
            </div>
            <div class="form-group">
                <label for="hari">Hari</label>
                <select name="hari" id="hari" required>
                    <option value="isnin">Isnin</option>
                    <option value="selasa">Selasa</option>
                    <option value="rabu">Rabu</option>
                    <option value="khamis">Khamis</option>
                    <option value="jumaat">Jumaat</option>
                </select>
            </div>
            <div class="form-group">
                <label for="masa">Masa</label>
                <input type="time" name="masa" id="masa" required>
            </div>
            <div class="form-group">
                <label for="aktiviti">Aktiviti</label>
                <input type="text" name="aktiviti" id="aktiviti" required placeholder="Contoh: Latihan Tapping">
            </div>
            <input type="button" value="Preview" id="previewButton">
            <input type="submit" name="hantar" value="Hantar">
        </form>

        <!-- Preview Section -->
        <div id="previewContainer" class="preview-container" style="display: none;">
            <h3>Preview Data</h3>
            <p><strong>Tarikh:</strong> <span id="previewTarikh"></span></p>
            <p><strong>Hari:</strong> <span id="previewHari"></span></p>
            <p><strong>Masa:</strong> <span id="previewMasa"></span></p>
            <p><strong>Aktiviti:</strong> <span id="previewAktiviti"></span></p>
        </div>
    </div>

    <!-- JavaScript -->
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
