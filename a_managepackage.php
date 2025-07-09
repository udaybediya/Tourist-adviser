<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Manage package</title>
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

        td {
            width: 80%; /* Fixed width for package name */
        }

        td button {
            width: 100px; /* Fixed width for buttons */
        }

        button {
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button.hide {
            background-color: rgb(255, 0, 0);
        }

        button.hide:hover {
            background-color: rgb(200, 0, 0);
        }

        button.show {
            background-color: #4CAF50; /* Green */
        }

        button.show:hover {
            background-color: #45a049; /* Darker green */
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                box-shadow: none;
                display: none;
            }

            .sidebar.show {
                display: flex;
            }

            .main-content {
                margin-left: 0;
                width: auto;
            }

            .menu-toggle {
                display: block;
                cursor: pointer;
                font-size: 1.5em;
                color: #2c3e50;
                background-color: #ecf0f1;
                padding: 10px;
                border: none;
                border-radius: 5px;
                margin: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <h2>Tourist adviser</h2>
        <a href="a_dashboard.php"><i class='bx bxs-dashboard'></i>&nbsp; Dashboard</a>
        <a href="a_contact.php"><i class='bx bxs-chat'></i>&nbsp;  Message</a>
        <a href="a_users.php"><i class='bx bx-user' ></i>&nbsp;  Users</a>
        <a href="index.php"><i class='bx bx-globe'></i>&nbsp;   Website</a>
        <a onclick="confirmLogout()"><i class='bx bx-log-out'></i>&nbsp;  Logout</a>
        <script>
        function confirmLogout() {
            // Show confirmation dialog
            var userConfirmed = confirm("Are you sure you want to log out?");
            
            // Check if the user confirmed
            if (userConfirmed) {
                // Redirect to login page
                window.location.href = 'login.php'; // Replace 'login.html' with your actual login page URL
            }
            // If the user clicks "Cancel", they stay on the current page
        }
        </script>
    </div>
    <div class="main-content">
        <h1>Package Manage</h1>
        <table>
            <tr>
                <th>Package Name</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1. Saputara - Adventure Camp</td>
                <td>
                    <button id="hideButton1" class="hide">Hide</button>
                    <button id="showButton1" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>2. Polo Forest - Trekking Camp</td>
                <td>
                    <button id="hideButton2" class="hide">Hide</button>
                    <button id="showButton2" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>3. Matheran - Mejestic Hill Station</td>
                <td>
                    <button id="hideButton3" class="hide">Hide</button>
                    <button id="showButton3" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>4. Meghalaya - Scotland of the East</td>
                <td>
                    <button id="hideButton4" class="hide">Hide</button>
                    <button id="showButton4" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>5. Jaisalmer Camping & Trekking</td>
                <td>
                    <button id="hideButton5" class="hide">Hide</button>
                    <button id="showButton5" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>6. Kutch - Bhuj(Gem of Gujrat)</td>
                <td>
                    <button id="hideButton6" class="hide">Hide</button>
                    <button id="showButton6" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>7. Manali Adventure Camp _ With Kasol</td>
                <td>
                    <button id="hideButton7" class="hide">Hide</button>
                    <button id="showButton7" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>8. Kedarnath with Chpota-Tungnath Trek</td>
                <td>
                    <button id="hideButton8" class="hide">Hide</button>
                    <button id="showButton8" class="show" style="display: none;">Show</button>
                </td>
            </tr>
            <tr>
                <td>9. The Leh Ladakh Camaping & Road Trip</td>
                <td>
                    <button id="hideButton9" class="hide">Hide</button>
                    <button id="showButton9" class="show" style="display: none;">Show</button>
                </td>
            </tr>
        </table>
    </div>
    <script>
        const packageIds = ['saputara', 'poloforest', 'matheran', 'meghalaya', 'jaisalmer', 'kutch', 'manali', 'kedarnath', 'lehladakh'];

        function toggleVisibility(hideBtnId, showBtnId, packageName) {
            const hideButton = document.getElementById(hideBtnId);
            const showButton = document.getElementById(showBtnId);

            hideButton.addEventListener('click', () => {
                // Confirm dialog for hiding
                if (confirm(`Are you sure you want to hide ${packageName}?`)) {
                    hideButton.style.display = 'none';
                    showButton.style.display = 'inline';
                    localStorage.setItem(packageName, 'hidden');
                }
            });

            showButton.addEventListener('click', () => {
                // Confirm dialog for showing
                if (confirm(`Are you sure you want to show ${packageName}?`)) {
                    hideButton.style.display = 'inline';
                    showButton.style.display = 'none';
                    localStorage.removeItem(packageName);
                }
            });
        }

        // Loop through package IDs and set up event listeners
        packageIds.forEach((packageId, index) => {
            toggleVisibility(`hideButton${index + 1}`, `showButton${index + 1}`, packageId);
        });
    </script>
</body>
</html>
