<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kehadiran</title>
    <style>
        /* Sama seperti sebelum ini */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('Team_Thunders.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }
        .header {
            background-color: #cd1111;
            color: white;
            font-size: 2rem;
            text-align: center;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
        }
        .table-container {
            padding: 20px;
            background-color: rgba(240, 240, 240, 0.9);
            border-radius: 10px;
            box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            text-align: center;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #2176c7;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f7f7f7;
        }
        tr:hover {
            background-color: #eaf4ff;
        }
        td a {
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        td a:hover {
            background-color: #c0392b;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }
        .footer a {
            display: inline-block;
            text-decoration: none;
            font-weight: bold;
            color: white;
            background-color: #2176c7;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .footer a:hover {
            background-color: #185b9d;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">Kehadiran</div>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Tarikh</th>
                        <th>Angka Giliran</th>
                        <th>Nama</th>
                        <th>Status Kehadiran</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Query disusun berdasarkan tarikh
                    $query = "SELECT * FROM kehadiran ORDER BY tarikh ASC"; // Gunakan DESC untuk susunan menurun
                    $result = mysqli_query($connect, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        foreach ($row as $attribute) {
                            echo "<td>" . htmlspecialchars($attribute) . "</td>";
                        }
                        echo "<td><a href='delete_kehadiran.php?angka_giliran=" . urlencode($row['angka_giliran']) . "' onClick='return confirm(\"Adakah anda pasti?\")'>Hapus</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <a href="admin_page.php">Kembali</a>
        </div>
    </div>
</body>
</html>
