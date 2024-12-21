<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eThunders Kehadiran Form</title>
    <link href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* General Body Styling */
        body {
            background: url('3.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensures full height of the page */
        }

        /* Content Container */
        .content {
            flex: 1; /* This ensures the content area takes up all available space */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .logo-container img {
            width: 150px;
            height: auto;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .logo-container img:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            max-width: 800px;
            width: 90%;
        }

        .header {
            background-color: #cd1111;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 10px 10px 0 0;
            font-size: 1.5em;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }

        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #2176c7;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: rgba(33, 118, 199, 0.1);
        }

        a {
            color: white;
            background-color: #2176c7;
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #1e5ba5;
        }

        .admin-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 15px;
            background-color: #cd1111;
            color: white;
            border-radius: 5px;
            font-size: 0.9rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .admin-btn:hover {
            background-color: #a50e0e;
        }

        /* Footer Styling */
        .footer {
            padding: 20px;
            font-size: 0.75rem;
            background-color: #2176c7;
            color: white;
            text-align: center;
            width: 100%;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
            margin-top: 30px; /* Ensures footer has space between content */
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .footer-links a {
            text-decoration: none;
            font-size: 0.75rem;
            color: white;
            border-radius: 5px;
            padding: 4px 8px;
        }

        .footer-social {
            margin-top: 8px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .footer-social a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }

        .footer-social a img {
            width: 20px;
            height: 20px;
        }

        .footer p {
            margin-top: 5px;
            font-size: 0.75rem;
        }
    </style>
</head>
<body>
    <div class="content">
        <div class="logo-container">
            <img src="logo.png" alt="eThunders Logo">
        </div>
        <div class="container">
            <div class="header">eThunders Kehadiran</div>
            <table>
                <thead>
                    <tr>
                        <th>TARIKH</th>
                        <th>HARI</th>
                        <th>MASA</th>
                        <th>AKTIVITI</th>
                        <th>KEHADIRAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM jadual_thunders ORDER BY tarikh ASC";
                    $result = mysqli_query($connect, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        foreach ($row as $attribute) {
                            echo "<td>" . htmlspecialchars($attribute) . "</td>";
                        }
                        echo "<td><a href='tambah.php?tarikh=" . $row['tarikh'] . "'>Isi Kehadiran</a></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div style="text-align: center;">
                <a href="login_admin.php" class="admin-btn">ADMIN</a>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-links">
            <a href="about_us.php">About Us</a>
            <a href="#privacy-policy">Privacy Policy</a>
            <a href="#terms-of-service">Terms of Service</a>
            <a href="#contact">Contact Us</a>
        </div>
        <div class="footer-social">
            <a href="https://www.facebook.com/KVSepang/?locale=ms_MY" class="facebook" target="_blank" rel="noopener noreferrer">
                <img src="facebook.png" alt="Facebook">
            </a>
            <a href="https://www.instagram.com/kvsepang_official/?hl=en" class="instagram" target="_blank" rel="noopener noreferrer">
                <img src="ig.png.png" alt="Instagram">
            </a>
            <a href="https://www.tiktok.com/@kv.sepang.official" class="tiktok" target="_blank" rel="noopener noreferrer">
                <img src="Tiktok.png" alt="Tiktok">
            </a>
        </div>
        <p>&copy; 2024 THUNDERS. All rights reserved.</p>
    </footer>
</body>
</html>
