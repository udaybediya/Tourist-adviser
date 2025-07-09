<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Users</title>
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
            margin: 5px 0px;
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
            width: calc(100% - 200px);
            background-color: #ecf0f1;
            overflow-y: auto;
        }

        .main-content h1 {
            margin-top: 0;
            margin-left: 0.5%;
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
            background-color: rgb(255, 0, 0);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: rgb(200, 0, 0);
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <h2>Tourist adviser</h2>
        <a href="a_dashboard.php"><i class='bx bxs-dashboard'></i>&nbsp; Dashboard</a>
        <a href="a_contact.php"><i class='bx bxs-chat'></i>&nbsp;  Message</a>
        <a href="a_users.php"><i class='bx bx-user'></i>&nbsp;  Users</a>
        <a href="index.php"><i class='bx bx-globe'></i>&nbsp;   Website</a>
        <a onclick="confirmLogout()"><i class='bx bx-log-out'></i>&nbsp;  Logout</a>
        <script>
        function confirmLogout() {
            var userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                window.location.href = 'login.php'; // Redirect to login page
            }
        }
        </script>
    </div>
    <div class="main-content">
        <h1>User Information</h1>
        <?php
        $servername = "localhost"; // or your database server
        $username = "root"; // your database username
        $password = ""; // your database password
        $dbname = "tourist"; // your database name
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Handle delete request
        if (isset($_POST['delete'])) {
            $deleteId = $_POST['id']; // Get the ID from the hidden input

            $deleteSql = "DELETE FROM regi WHERE id = ?";
            $stmt = $conn->prepare($deleteSql);

            if ($stmt === false) {
                die("Prepare failed: " . htmlspecialchars($conn->error));
            }

            $stmt->bind_param("i", $deleteId); // Use integer type for ID

            if (!$stmt->execute()) {
                die("Execute failed: " . htmlspecialchars($stmt->error));
            }

            $stmt->close();
        }

        // Query to get users
        $sql = "SELECT id, Username, Email, Mobile_Number, Password FROM regi";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
        <tr>
        <th>SR. NO</th>
        <th>Username</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Password</th>
        <th>Action</th>
        </tr>";

            $srNo = 1; // Initialize serial number
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
            <td>" . $srNo++ . "</td>
            <td>" . htmlspecialchars($row["Username"]) . "</td>
            <td>" . htmlspecialchars($row["Email"]) . "</td>
            <td>" . htmlspecialchars($row["Mobile_Number"]) . "</td>
            <td>" . htmlspecialchars($row["Password"]) . "</td>
            <td>
                <form method='POST' action=''>
                    <input type='hidden' name='id' value='" . htmlspecialchars($row['id']) . "'>
                    <button type='submit' name='delete' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</button>
                </form>
            </td>
            </tr>";
            }
            echo "</table>";
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }

        $conn->close();
        ?>
    </div>
</body>

</html>
