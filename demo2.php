<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Booking Details</title>
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
        .main-content {
            margin-left: 230px;
            padding: 60px;
            width: calc(100% - 230px);
            background-color: #ecf0f1;
            overflow-y: auto;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
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
        .button-container {
            margin: 25px 0;
            display: flex;
            align-items: center;
        }
        .button-container select {
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            margin-right: 10px;
            flex-grow: 1;
        }
        .button-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            background-color: rgb(220, 53, 69);
            font-size: 1.01rem;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Tourist Adviser</h2>
        <a href="a_dashboard.php"><i class='bx bxs-dashboard'></i>&nbsp; Dashboard</a>
        <a href="a_contact.php"><i class='bx bxs-chat'></i>&nbsp; Message</a>
        <a href="a_users.php"><i class='bx bx-user'></i>&nbsp; Users</a>
        <a href="index.php"><i class='bx bx-globe'></i>&nbsp; Website</a>
        <a onclick="confirmLogout()"><i class='bx bx-log-out'></i>&nbsp; Logout</a>
        <script>
            function confirmLogout() {
                var userConfirmed = confirm("Are you sure you want to log out?");
                if (userConfirmed) {
                    window.location.href = 'login.php';
                }
            }
        </script>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Booking Panel</h1>
            <div class="button-container">
                <form method="POST" action="">
                    <select name="date" id="date" required>
                        <option value="">-- Select Date --</option>
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

                        // Fetch unique dates
                        $datesQuery = "SELECT DISTINCT Date FROM booking";
                        $datesResult = $conn->query($datesQuery);
                        while ($row = $datesResult->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($row['Date']) . '">' . htmlspecialchars(date("d/m/Y", strtotime($row['Date']))) . '</option>';
                        }
                        ?>
                    </select>

                    <select name="destination" id="destination" required>
                        <option value="">-- Select Destination --</option>
                        <?php
                        // Fetch unique destinations
                        $destinationsQuery = "SELECT DISTINCT Destination FROM booking";
                        $destinationsResult = $conn->query($destinationsQuery);
                        while ($row = $destinationsResult->fetch_assoc()) {
                            echo '<option value="' . htmlspecialchars($row['Destination']) . '">' . htmlspecialchars($row['Destination']) . '</option>';
                        }
                        ?>
                    </select>
                    
                    <button type="submit">OK</button>
                </form>
            </div>
        </div>

        <?php
            // Handle form submission for displaying selected records
            $filteredResults = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['destination']) && isset($_POST['date'])) {
                $destinationToDisplay = $_POST['destination'];
                $dateToDisplay = $_POST['date'];
                $displayQuery = "SELECT * FROM booking WHERE Destination = ? AND Date = ?";
                $stmt = $conn->prepare($displayQuery);
                $stmt->bind_param("ss", $destinationToDisplay, $dateToDisplay);
                $stmt->execute();
                $result = $stmt->get_result();
                $filteredResults = $result->fetch_all(MYSQLI_ASSOC);
                $stmt->close();
            } else {
                // Fetch all bookings if no filter is applied
                $displayQuery = "SELECT * FROM booking";
                $result = $conn->query($displayQuery);
                $filteredResults = $result->fetch_all(MYSQLI_ASSOC);
            }

            // Display booking table
            if (count($filteredResults) > 0) {
                echo "<table>
                <tr>
                <th>Username</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Date</th>
                <th>Gender</th>
                <th>Pick-up</th>
                <th>Number of People</th>
                <th>Destination</th>
                <th>Total Amount</th>
                </tr>";
                
                foreach ($filteredResults as $row) {
                    // Format the date to dd/mm/yyyy
                    $formattedDate = date("d/m/Y", strtotime($row["Date"]));
                    
                    echo "<tr>
                    <td>" . htmlspecialchars($row["FullName"]) . "</td>
                    <td>" . htmlspecialchars($row["Age"]) . "</td>
                    <td>" . htmlspecialchars($row["Phone"]) . "</td>
                    <td>" . htmlspecialchars($row["Email"]) . "</td>
                    <td>" . $formattedDate . "</td>
                    <td>" . htmlspecialchars($row["Gender"]) . "</td>
                    <td>" . htmlspecialchars($row["Pick_Up"]) . "</td>
                    <td>" . htmlspecialchars($row["Number_Of_People"]) . "</td>
                    <td>" . htmlspecialchars($row["Destination"]) . "</td>
                    <td>" . htmlspecialchars($row["TotalAmount"]) . "</td>
                    </tr>";
                }
                echo "</table>";
            } else {
                echo "No results found for the selected criteria.";
            }

            $conn->close();
        ?>
    </div>
</body>
</html>
