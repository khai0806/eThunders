<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eThunders Kehadiran Form</title>
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
        .logo-container {
            text-align: center;
            margin-top: 20px;
        }
        .logo-container img {
            width: 180px; 
            height: auto;
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
        }
        th, td {
            border: 1px solid white;
            padding: 12px;
            text-align: center;
        }
        th {
            background-color: #2176c7;
            font-weight: bold;
        }
        tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #2176c7;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }
        a:hover {
            background-color: #1e5ba5;
            transform: scale(1.05);
        }
        .footer {
            margin-top: 20px;
            font-size: 0.9em;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .container {
                width: 95%;
                padding: 15px;
            }
            .header {
                font-size: 1.5em;
            }
            a {
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Logo Container -->
    <div class="logo-container">
        <img src="logo.png" alt="eThunders Logo"> 
    </div>
    <div class="container">
        <div class="header">eThunders Schedule</div>
        <div class="table-container">
            <table>
                <tr>
                    <th>TARIKH</th>
                    <th>HARI</th>
                    <th>MASA</th>
                    <th>AKTIVITI</th>
                    <th>KEHADIRAN</th>
                </tr>
                <?php
                $data = [
                    ["2024-12-01", "Isnin", "08:00 AM", "TRAINING TAP"],
                    ["2024-12-02", "Selasa", "09:00 AM", "TRAINING PADDING AND TACKLING"],
                    ["2024-12-03", "Rabu", "10:00 AM", "STENGTH TRAINING"]
                ];

                foreach ($data as $index => $row) {
                    echo "<tr>";
                    foreach ($row as $cell) {
                        echo "<td>$cell</td>";
                    }
                    echo "<td>
                            <a href='tambah.php?tarikh={$row[0]}&hari={$row[1]}&masa={$row[2]}&aktiviti={$row[3]}'>
                                Isi Kehadiran
                            </a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
        <div class="footer">
            <a href="login_admin.php">ADMIN</a> <!-- Replace 'admin_dashboard.php' with your admin page file -->
        </div>
    </div>
</body>
</html>