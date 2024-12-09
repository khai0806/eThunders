<?php
// Read attendance data from a file or database
$attendance_data = [];

// Check if the file exists and read its content
if (file_exists("attendance_records.txt")) {
    $file = fopen("attendance_records.txt", "r");
    while (($line = fgets($file)) !== false) {
        $record = explode(" | ", trim($line));
        if (count($record) === 3) {
            $attendance_data[] = [
                "angka_giliran" => $record[0],
                "nama" => $record[1],
                "status" => $record[2]
            ];
        }
    }
    fclose($file);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kehadiran</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('Team_Thunders.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            text-align: center;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
        }
        .header {
            background-color: #cd1111;
            color: white;
            padding: 15px;
            font-size: 1.8em;
            border-radius: 10px 10px 0 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        .table-container {
            background-color: #57a8e4;
            padding: 20px;
            border-radius: 10px;
            color: white;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.3);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #2176c7;
            font-weight: bold;
            color: white;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
        }
        .footer a {
            text-decoration: none;
            font-weight: bold;
            color: black;
            background-color: #e5e5e5;
            border: 1px solid black;
            padding: 10px 20px;
            border-radius: 20px;
            transition: 0.3s ease;
        }
        .footer a:hover {
            background-color: #cfcfcf;
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
                <tr>
                    <th>Angka Giliran</th>
                    <th>Nama</th>
                    <th>Status Kehadiran</th>
                </tr>
                <?php
                // Populate the table with attendance data
                if (!empty($attendance_data)) {
                    foreach ($attendance_data as $entry) {
                        echo "<tr>";
                        echo "<td>{$entry['angka_giliran']}</td>";
                        echo "<td>{$entry['nama']}</td>";
                        echo "<td>{$entry['status']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Tiada data kehadiran.</td></tr>";
                }
                ?>
            </table>
        </div>

        <!-- Footer -->
        <div class="footer">
            <a href="index.php">Halaman Utama</a>
        </div>
    </div>
</body>
</html>
