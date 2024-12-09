<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eThunders Kehadiran</title>
    <style>
        body {
            background-image: url('bgrd.jpg'); /* Replace with your image file */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            font-family: Arial, sans-serif;
        }

/* skibidi toilet */  

        .form-container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #4a90e2;
            color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            text-align: center;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: white;
            color: #4a90e2;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>eThunders Kehadiran</h2>
        <form action="process.php" method="post">
            <label>ANGKA GILIRAN</label>
            <input type="text" name="angka_giliran" required>

            <label>NAMA</label>
            <input type="text" name="nama" required>

            <label>SEBAB TIDAK HADIR</label>
            <textarea name="sebab_tidak_hadir" rows="4" required></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>