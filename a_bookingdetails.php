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
            margin-left: 0.5%;
        }
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
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
        .filter-container {
            display: none; /* Initially hidden */
            margin-top: 20px;
        }
        .filter {
            margin-left: 70%;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            background-color: rgb(107, 155, 167);
            font-size: 1.01rem;
        }
        .filter:hover {
            background-color: rgb(145, 155, 167);
        }
        select {
            padding: 10px;
            margin-right: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
            background-color: white;
            cursor: pointer;
            transition: border-color 0.3s;
        }
        select:hover {
            border-color: rgb(107, 155, 167);
        }
        .selectbtn {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            background-color: rgb(107, 155, 167);
            font-size: 1.01rem;
        }
        .selectbtn:hover, .selectall:hover, .remove:hover {
            background-color: rgb(145, 155, 167);
        }
        .selectall, .remove {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            background-color: rgb(107, 155, 167);
            font-size: 1.01rem;
        }
        .delete {
            margin: 2% 0% 0% 46.3%;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            background-color: rgb(220, 53, 69);
            font-size: 1.01rem;
        }
        .delete:hover {
            background-color: rgb(200, 0, 0);
        }
    </style>
    <script>
        function validateForm() {
            const dateSelect = document.getElementById("date");
            const destinationSelect = document.getElementById("destination");

            if (dateSelect.value === "" && destinationSelect.value === "") {
                alert("Please select either a date or a destination before deleting.");
                return false; // Prevent form submission
            }

            const confirmDelete = confirm(`Are you sure you want to delete the booking for ${destinationSelect.value} on ${dateSelect.value}?`);
            return confirmDelete; // Proceed with form submission if confirmed
        }

        function toggleFilter() {
            const filterContainer = document.getElementById('filter-container');
            filterContainer.style.display = filterContainer.style.display === 'none' || filterContainer.style.display === '' ? 'block' : 'none';
        }

        function filterTable() {
            const dateSelect = document.getElementById('filter-date');
            const destinationSelect = document.getElementById('filter-destination');

            const filterDate = dateSelect.value;
            const filterDestination = destinationSelect.value;

            const table = document.querySelector("table");
            const tr = table.getElementsByTagName("tr");

            for (let i = 1; i < tr.length; i++) {
                const tdDate = tr[i].getElementsByTagName("td")[5]; // Date column
                const tdDestination = tr[i].getElementsByTagName("td")[9]; // Destination column

                const formattedDate = tdDate.textContent; // Already in d/m/Y format

                const dateMatch = filterDate === "" || formattedDate === filterDate;
                const destinationMatch = filterDestination === "" || (tdDestination && tdDestination.textContent === filterDestination);

                tr[i].style.display = dateMatch && destinationMatch ? "" : "none";
            }
        }

        function confirmLogout() {
            var userConfirmed = confirm("Are you sure you want to log out?");
            if (userConfirmed) {
                window.location.href = 'login.php';
            }
        }

        function toggleSelect() {
            const checkboxCells = document.querySelectorAll(".checkbox-cell");
            const selectButton = document.getElementById("selectButton");
            const removeButton = document.getElementById("removeButton");
            const allChecked = Array.from(checkboxCells).every(cell => cell.querySelector("input").checked);

            checkboxCells.forEach(cell => {
                const checkbox = cell.querySelector("input");
                checkbox.checked = !allChecked; // Check or uncheck all
            });

            // Toggle button visibility
            selectButton.style.display = allChecked ? "block" : "none"; // Show select all
            removeButton.style.display = allChecked ? "none" : "block"; // Show remove all
        }

        function toggleSelectAll() {
            const checkboxes = document.querySelectorAll("input[type='checkbox']");
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            checkboxes.forEach(checkbox => checkbox.checked = !allChecked); // Check or uncheck all

            document.getElementById("selectButton").style.display = allChecked ? "block" : "none"; // Show select all button
            document.getElementById("removeButton").style.display = allChecked ? "none" : "block"; // Show remove all button
        }

        function checkSelectedRows() {
            const checkboxes = document.querySelectorAll("input[type='checkbox']");
            const selectedRows = Array.from(checkboxes).filter(checkbox => checkbox.checked);

            if (selectedRows.length === 0) {
                alert("No rows are selected.");
                return false; // No rows selected
            } else {
                const rowData = selectedRows.map(checkbox => {
                    const row = checkbox.closest("tr");
                    const date = row.cells[5].textContent; // Date column index
                    const destination = row.cells[9].textContent; // Destination column index
                    return { date, destination };
                });

                const confirmationMessage = rowData.map(data => `Are you sure you want to delete the booking for ${data.destination} on ${data.date}?`).join("\n");

                if (confirm(confirmationMessage)) {
                    // Call the delete function here (e.g., AJAX request)
                    alert("Successfully deleted.");
                    // Optionally, remove the rows from the table
                    selectedRows.forEach(checkbox => {
                        const row = checkbox.closest("tr");
                        row.parentNode.removeChild(row); // Remove the row
                    });
                    return true; // Proceed with deletion
                } else {
                    return false; // Cancel deletion
                }
            }
        }
    </script>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <h2>Tourist Adviser</h2>
        <a href="a_dashboard.php"><i class='bx bxs-dashboard'></i>&nbsp; Dashboard</a>
        <a href="a_contact.php"><i class='bx bxs-chat'></i>&nbsp; Message</a>
        <a href="a_users.php"><i class='bx bx-user'></i>&nbsp; Users</a>
        <a href="index.php"><i class='bx bx-globe'></i>&nbsp; Website</a>
        <a onclick="confirmLogout()"><i class='bx bx-log-out'></i>&nbsp; Logout</a>
    </div>
    <div class="main-content">
        <div class="header-container">
            <h1>Booking Panel</h1>
            <button class="filter" onclick="toggleFilter()"><i class='bx bx-filter-alt'></i></button>
            <button id="selectButton" class="selectall" onclick="toggleSelect()"><i class='bx bx-select-multiple'></i> Select All</button>
            <button id="removeButton" class="remove" style="display: none;" onclick="toggleSelectAll()"><i class='bx bx-select-multiple'></i> Remove All</button>
        </div>

        <!-- Filter input container -->
        <div id="filter-container" class="filter-container">
            <select id="filter-date" onchange="filterTable()">
                <option value="">-- Select Date --</option>
                <?php
                    // Database connection code
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
                    $datesQuery = "SELECT DISTINCT Date FROM booking ORDER BY Date";
                    $datesResult = $conn->query($datesQuery);
                    if ($datesResult->num_rows > 0) {
                        while ($row = $datesResult->fetch_assoc()) {
                            // Format the date to dd/mm/yyyy
                            $formattedDate = date("d/m/Y", strtotime($row['Date']));
                            echo "<option value='" . htmlspecialchars($formattedDate) . "'>" . htmlspecialchars($formattedDate) . "</option>";
                        }
                    }
                ?>
            </select>

            <select id="filter-destination" onchange="filterTable()">
                <option value="">-- Select Destination --</option>
                <?php
                    // Fetch unique destinations
                    $destinationsQuery = "SELECT DISTINCT Destination FROM booking";
                    $destinationsResult = $conn->query($destinationsQuery);
                    if ($destinationsResult->num_rows > 0) {
                        while ($row = $destinationsResult->fetch_assoc()) {
                            echo "<option value='" . htmlspecialchars($row['Destination']) . "'>" . htmlspecialchars($row['Destination']) . "</option>";
                        }
                    }
                ?>
            </select>

            <button class="selectbtn" onclick="filterTable()">Apply Filter</button>
        </div>

        <?php
            // Fetch bookings
            $sql = "SELECT FullName, Age, Phone, Email, Date, Number_Of_People, Pick_Up, Gender, Destination, TotalAmount FROM booking";
            $result = $conn->query($sql);

            // Display booking table
            if ($result->num_rows > 0) {
                echo "<table>
                <tr>
                <th>Select</th>
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
                
                while($row = $result->fetch_assoc()) {
                    // Format the date to dd/mm/yyyy
                    $formattedDate = date("d/m/Y", strtotime($row["Date"]));
                    
                    echo "<tr>
                    <td class='checkbox-cell'><input type='checkbox'></td>
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
                echo "<p>No bookings found.</p>";
            }

            $conn->close();
        ?>
        <button class="delete" type="button" onclick="checkSelectedRows()">Delete</button>
    </div>
</body>
</html>
