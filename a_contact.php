<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "tourist"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle deletion if a POST request is made
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sr_no'])) {
    $sr_no = intval($_POST['sr_no']); // Sanitize input

    // SQL query to delete the record
    $sql = "DELETE FROM contact WHERE sr_no = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sr_no);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        // Update sr_no for remaining rows
        $update_sql = "UPDATE contact SET sr_no = sr_no - 1 WHERE sr_no > ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("i", $sr_no);
        $update_stmt->execute();
        $update_stmt->close();

        echo "Record deleted successfully and sr_no updated.";
    } else {
        echo "Error deleting record.";
    }

    $stmt->close();
    $conn->close();
    exit; // Exit to prevent further output
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Message</title>

    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            font-family: "Poppins", sans-serif;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 230px;
            background-color: rgb(107, 155, 167);
            color: white;
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
        }

        .sidebar h2 {
            margin: 0 0 20px;
            font-size: 1.8rem;
        }

        .sidebar a {
            color: white;
            font-size: 1.4rem;
            text-decoration: none;
            margin: 5px 0;
            padding: 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            display: block;
        }

        .sidebar a:hover {
            background-color: rgb(145, 155, 167);
        }

        .main-content {
            margin-left: 230px;
            padding: 60px;
            width: calc(100% - 230px);
            background-color: #ecf0f1;
            overflow-y: auto;
        }

        .main-content h1 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: rgb(107, 155, 167);
            color: #ecf0f1;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        button {
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, opacity 0.3s;
            width: 80px;
            text-align: center;
        }

        .read-button {
            background-color: #4CAF50; /* Green for read */
        }

        .unread-button {
            background-color: #4CAF50; /* Green for unread */
        }

        .delete-button {
            background-color: #F44336; /* Red for delete */
            opacity: 0.5; /* Start dimmed */
        }

        .delete-button:not(.disabled) {
            opacity: 1; /* Bright when enabled */
        }

        .delete-button.disabled {
            background-color: rgb(225, 90, 100); /* Gray out the delete button */
            cursor: not-allowed;
        }
        
        .read {
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Tourist adviser</h2>
        <a href="a_dashboard.php"><i class='bx bxs-dashboard'></i>&nbsp; Dashboard</a>
        <a href="a_contact.php"><i class='bx bxs-chat'></i>&nbsp; Message</a>
        <a href="a_users.php"><i class='bx bx-user'></i>&nbsp; Users</a>
        <a href="index.php"><i class='bx bx-globe'></i>&nbsp; Website</a>
        <a onclick="confirmLogout()"><i class='bx bx-log-out'></i>&nbsp; Logout</a>
    </div>
    <div class="main-content">
        <h1>User wants to contact you</h1>
        <?php
            // Reconnect to database for displaying messages
            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "SELECT sr_no, Name, Email, Phone, Company_Name, Message FROM contact ORDER BY sr_no";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table>
                <tr>
                <th>Sr No</th>
                <th>Username</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Company Name</th>
                <th>Message</th>
                <th>Action</th>
                <th>Delete</th>
                </tr>";
                
                while($row = $result->fetch_assoc()) {
                    echo "<tr data-srno='" . htmlspecialchars($row["sr_no"]) . "'>
                    <td>" . htmlspecialchars($row["sr_no"]) . "</td>
                    <td>" . htmlspecialchars($row["Name"]) . "</td>
                    <td>" . htmlspecialchars($row["Email"]) . "</td>
                    <td>" . htmlspecialchars($row["Phone"]) . "</td>
                    <td>" . htmlspecialchars($row["Company_Name"]) . "</td>
                    <td>" . htmlspecialchars($row["Message"]) . "</td>
                    <td><button type='button' class='action-btn read-button' onclick='toggleRead(this)'>Read</button></td>
                    <td class='bhai'><button type='button' class='action-btn delete-button disabled' onclick='deleteRow(this, " . htmlspecialchars($row["sr_no"]) . ")' disabled>Delete</button></td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
        ?>
    </div>

    <script>
        const originalOrder = []; // To store the original order of rows

        document.querySelectorAll('tr[data-srno]').forEach((row, index) => {
            originalOrder.push({ 
                row: row, 
                srNo: parseInt(row.dataset.srno), 
                index: index 
            });
        });

        function toggleRead(button) {
            const row = button.parentNode.parentNode;
            const deleteButton = row.querySelector('.delete-button');

            if (button.textContent === 'Read') {
                button.textContent = 'Unread';
                button.classList.remove('read-button');
                button.classList.add('unread-button');
                row.classList.add('read');

                // Enable the delete button
                deleteButton.classList.remove('disabled');
                deleteButton.disabled = false;
                deleteButton.style.opacity = '1'; // Make the button look brighter
                deleteButton.style.cursor = 'pointer'; // Change cursor to pointer

                // Move the row to the bottom
                row.parentNode.appendChild(row);

                // Update serial numbers
                updateSerialNumbers();
            } else {
                button.textContent = 'Read';
                button.classList.remove('unread-button');
                button.classList.add('read-button');
                row.classList.remove('read');

                // Disable the delete button
                deleteButton.classList.add('disabled');
                deleteButton.disabled = true;
                deleteButton.style.opacity = '0.5'; // Dim the button
                deleteButton.style.cursor = 'not-allowed'; // Change cursor to not-allowed

                // Move back to original position
                const originalRow = originalOrder.find(item => item.srNo === parseInt(row.dataset.srno));
                if (originalRow) {
                    const originalIndex = originalRow.index;
                    row.parentNode.insertBefore(row, row.parentNode.rows[originalIndex + 1]); // +1 to skip header
                }

                // Update serial numbers
                updateSerialNumbers();
            }
        }

        function updateSerialNumbers() {
            const rows = document.querySelectorAll('tr[data-srno]');
            rows.forEach((row, index) => {
                const srNoCell = row.cells[0]; // First cell for Sr No
                srNoCell.textContent = index + 1; // Update Sr No
            });
        }

        function deleteRow(button, srNo) {
            if (confirm("Are you sure you want to delete this message?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var row = button.parentNode.parentNode;
                        row.parentNode.removeChild(row);
                        updateSerialNumbers(); // Update serial numbers after deletion
                    }
                };
                xhr.send("sr_no=" + srNo);
            }
        }

        function confirmLogout() {
            var userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                window.location.href = 'login.php'; // Replace with your actual login page URL
            }
        }
    </script>
</body>
</html>
