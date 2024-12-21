<?php
    include('config.php'); // Include database configuration
    $tarikh = $_GET['tarikh'];

    // Query to select record based on id_company
    $selectRowQuery = "SELECT * FROM jadual_thunders WHERE tarikh = '$tarikh'";
    $result = mysqli_query($connect, $selectRowQuery);

    // Fetch data from the query result
    while ($row = mysqli_fetch_array($result)) {
        $tarikh =$row['tarikh'];
        $hari =$roq['hari'];
        $masa =$row['masa'];
        $aktiviti =$row['aktiviti'];
    }

    // Handle form submission for updating the record
    if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['submit'])) {
        $tarikh =$_POST['tarikh'];
        $hari =$_POST['hari'];
        $masa =$_POST['masa'];
        $aktiviti =$_POST['aktiviti'];
    
        // Update query to modify the record in the database
        $updateQuery = "UPDATE jadual_thunders SET
            tarikh = '$tarikh', 
            hari = '$hari', 
            masa = '$masa', 
            aktiviti = '$aktiviti',

        mysqli_query($connect, $updateQuery);

        echo "<script>window.location.href = 'admin_page.php';</script>";
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Company Information</title>
    <style>
        /* Matching styling from index.php */
        body {
            font-family: sans-serif;
        }
        form {
            background-color: #f3f3f3;
            width: 400px;
            border: 1px solid #333;
            border-radius: 5px;
            box-shadow: 2px 2px 5px #ccc;
            margin: 20px auto;
            text-shadow: 1px 1px 2px #ccc;
        }
        .header-card {
            background-color: #333;
            color: #fff;
            font-size: 1.6em;
            text-shadow: 0px 1px 0px #777;
            box-shadow: 1px 1px 15px #999 inset;
            padding: 8px;
            padding-left: 23px;
            margin-bottom: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }
        td {
            padding: 8px;
        }
        .label {
            text-align: right;
            padding-right: 10px;
        }
        .second-level {
            padding-top: 10px;
        }
        .submit-container {
            text-align: center;
            padding-top: 10px;
        }
        #id_company,
        #name,
        #position,
        #company_name,
        #company_address,
        #company_phone,
        #company_fax,
        #company_email {
            padding: 6px;
            width: 80%;
            border-radius: 0.25rem;
            border: 1px solid #999;
        }
        #submit {
            height: 35px;
            width: 80px;
            border: 1px solid #bbb;
            border-color: #333;
            border-radius: 30px;
            text-shadow: 0 1px 0 #fff;
            background-image: linear-gradient(#f8f8f8, #d8d8d8);
            cursor: pointer;
            font-family: sans-serif;
            font-weight: 700;
            box-shadow: 2px 2px 5px #ccc;
        }
    </style>
</head>
<body>

    <header>
        <td width="390"><p align="center"><img src="image_company.png" width="230" height="100" /></p>
    </header>

    <!-- Update Form -->
    <form method="post">
        <div class="header-card">Update Company Information</div>
        <table>
            <tr class="second-level">
                <td class="label">tarikh</td>
                <td>:</td>
                <td><input type="date" name="tarikh" id="tarikh" readonly value="<?php echo $tarikh; ?>"></td>
            </tr>
            <tr>
                <td class="label">Hari</td>
                <td>:</td>
                <td><input type="text" name="hari" id="hari" value="<?php echo $hari; ?>"></td>
            </tr>
            <tr>
                <td class="label">Masa</td>
                <td>:</td>
                <td><input type="text" name="masa" id="masa" value="<?php echo $masa; ?>"></td>
            </tr>
            <tr>
                <td class="label">Aktiviti</td>
                <td>:</td>
                <td><input type="text" name="aktiviti" id="aktiviti" value="<?php echo $aktiviti ?>"></td>
            </tr>
        </table>
    </form>

</body>
</html>
