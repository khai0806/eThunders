<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eThunders Kehadiran</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('Team_Thunders.jpg'); /* Replace with your image */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 100px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #0056b3;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Rekod Kehadiran eThunders</h2>
        <table>
            <thead>
                <tr>
                    <th>Angka Giliran</th>
                    <th>Nama</th>
                    <th>Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
            <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Thunders";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch attendance records
$sql = "SELECT roll_no, name, status FROM jadual_thunders";

// Run the query
$result = $conn->query($sql);

// Check if query was successful
if (!$result) {
    // Output the error if query failed
    die("Error in query: " . $conn->error);
}

// Check if records were found
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . htmlspecialchars($row['roll_no']) . "</td><td>" . htmlspecialchars($row['name']) . "</td><td>" . htmlspecialchars($row['status']) . "</td></tr>";
    }
} else {
    echo "<tr><td colspan='3'>No records found.</td></tr>";
}

$conn->close();

?>
            </tbody>
        </table>
    </div>
</body>
</html>
