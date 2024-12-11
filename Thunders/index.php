<?php
include('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eThunders Kehadiran Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-image: url('Team_Thunders.jpg'); /* Replace with your image file */
            background-size: cover;
            background-repeat: no-repeat;
            margin: 0;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }
        .logo-container {
            text-align: center;
            margin-top: 20px;
            position: relative;
        }
        .logo-container img {
            width: 150px;
            height: auto;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
        }
        .logo-container img:hover {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
        .glow {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 200px;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(255, 0, 0, 0.6), transparent);
            border-radius: 50%;
            filter: blur(30px);
            animation: glowEffect 2s infinite alternate;
            pointer-events: none;
        }
        @keyframes glowEffect {
            from {
                transform: translate(-50%, -50%) scale(0.9);
                opacity: 0.8;
            }
            to {
                transform: translate(-50%, -50%) scale(1.1);
                opacity: 0.4;
            }
        }
        .container {
            width: 90%;
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .header {
            text-align: center;
            font-size: 2em;
            color: #fff;
            background-color: #cd1111;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            text-align: center;
            padding: 12px 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #2176c7;
            color: white;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: rgba(33, 118, 199, 0.1);
        }
        a {
            text-decoration: none;
            color: white;
            background-color: #2176c7;
            padding: 8px 12px;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #1e5ba5;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            padding: 8px 15px;
            background-color: #cd1111;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .footer a:hover {
            background-color: #a80e0e;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            th, td {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector('.container');

    // Loading Spinner
    const spinner = document.createElement('div');
    spinner.className = 'spinner';
    spinner.style.cssText = `
        display: none; 
        position: fixed; 
        top: 50%; 
        left: 50%; 
        transform: translate(-50%, -50%); 
        border: 8px solid #f3f3f3; 
        border-top: 8px solid #3498db; 
        border-radius: 50%; 
        width: 50px; 
        height: 50px; 
        animation: spin 1s linear infinite;
        z-index: 1000;
    `;
    document.body.appendChild(spinner);

    // Show spinner while loading data
    spinner.style.display = 'block';

    // Fetch data and populate table
    fetch('fetch_data.php') // Create a separate PHP file to fetch data
        .then(response => response.json())
        .then(data => {
            spinner.style.display = 'none';
            populateTable(data);
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            spinner.style.display = 'none';
        });

    function populateTable(data) {
        const tableBody = document.querySelector('table tbody');
        tableBody.innerHTML = ''; // Clear existing rows
        data.forEach(row => {
            const tr = document.createElement('tr');
            Object.values(row).forEach(attribute => {
                const td = document.createElement('td');
                td.textContent = attribute;
                tr.appendChild(td);
            });
            const actionTd = document.createElement('td');
            const link = document.createElement('a');
            link.href = '#';
            link.className = 'attendance-link';
            link.dataset.tarikh = row.tarikh;
            link.textContent = 'Isi Kehadiran';
            actionTd.appendChild(link);
            tr.appendChild(actionTd);
            tableBody.appendChild(tr);
        });
    }

    // Search Bar with Column Filter
    const searchBar = document.createElement('div');
    searchBar.innerHTML = `
        <div style="margin-bottom: 20px;">
            <label for="searchColumn" style="font-weight: bold;">Search Column:</label>
            <select id="searchColumn" style="margin-left: 10px; padding: 5px; border-radius: 5px;">
                <option value="all">All</option>
                <option value="0">TARIKH</option>
                <option value="1">HARI</option>
                <option value="2">MASA</option>
                <option value="3">AKTIVITI</option>
            </select>
            <input id="searchInput" type="text" placeholder="Search..." style="margin-left: 10px; padding: 8px; width: 50%; border: 1px solid #ddd; border-radius: 5px;">
        </div>
    `;
    container.insertBefore(searchBar, container.querySelector('table'));

    document.getElementById('searchInput').addEventListener('keyup', function () {
        const filter = this.value.toLowerCase();
        const column = document.getElementById('searchColumn').value;
        const rows = document.querySelectorAll('table tr:not(:first-child)');

        rows.forEach(row => {
            const cells = row.querySelectorAll('td');
            let match = false;

            if (column === 'all') {
                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(filter)) match = true;
                });
            } else {
                const cell = cells[column];
                if (cell && cell.textContent.toLowerCase().includes(filter)) match = true;
            }
            row.style.display = match ? '' : 'none';
        });
    });

    // Dark/Light Mode Toggle
    const toggleButton = document.createElement('button');
    toggleButton.textContent = 'Dark Mode';
    toggleButton.style.cssText = 'margin: 10px; padding: 10px  15px; background-color: #2176c7; color: #fff; border: none; border-radius: 5px; cursor: pointer;';
    container.insertBefore(toggleButton, container.firstChild);

    toggleButton.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
        toggleButton.textContent = document.body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';
    });

    const darkModeStyles = document.createElement('style');
    darkModeStyles.textContent = `
        body.dark-mode {
            background-color: #333;
            color: #ddd;
        }
        body.dark-mode .container {
            background-color: rgba(50, 50, 50, 0.95);
        }
        body.dark-mode th {
            background-color: #444;
        }
        body.dark-mode tr:nth-child(even) {
            background-color: #555;
        }
    `;
    document.head.appendChild(darkModeStyles);

    // Handle form submission
    document.getElementById('attendanceForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const status = document.getElementById('status').value;
        const tarikh = e.target.querySelector('.attendance-link').dataset.tarikh;

        // Simulate a successful submission
        alert(`Attendance submitted for ${name} on ${tarikh} as ${status}`);
        modal.style.display = 'none';

        // Optionally, you can add code here to send the data to the server
    });

    // Toast Notification Function
    function showToast(message) {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.style.cssText = `
            position: fixed; 
            bottom: 20px; 
            right: 20px; 
            background: #333; 
            color: #fff; 
            padding: 10px 20px; 
            border-radius: 5px; 
            opacity: 0.9; 
            transition: opacity 0.5s ease;
        `;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.style.opacity = '0';
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 500);
        }, 3000);
    }

    // Call showToast when attendance is submitted
    document.getElementById('attendanceForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const name = document.getElementById('name').value;
        const status = document.getElementById('status').value;
        showToast(`Attendance submitted for ${name} as ${status}`);
        modal.style.display = 'none';
    });
});
</script>
<body>
    <div class="logo-container">
        <div class="glow"></div>
        <img src="logo.png" alt="eThunders Logo">
    </div>
    <div class="container">
        <div class="header">eThunders Kehadiran</div>
        <table>
            <tr>
                <th>TARIKH</th>
                <th>HARI</th>
                <th>MASA</th>
                <th>AKTIVITI</th>
                <th>KEHADIRAN</th>
            </tr>
            <?php
            $query = "SELECT * FROM jadual_thunders";
            $result = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                foreach ($row as $attribute) {
                    echo "<td>" . htmlspecialchars($attribute) . "</td>";
                }
                echo "<td>
                        <a href='tambah.php?tarikh=" . urlencode($row['tarikh']) . "'>Isi Kehadiran</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </table>
        <div class="footer">
            <a href="login_admin.php">ADMIN</a>
        </div>
    </div>
</body>
</html>
