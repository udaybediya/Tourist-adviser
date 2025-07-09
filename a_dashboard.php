<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin Panel</title>
    <style>

        body {
            background-color: #f0f0f0;
            margin: 0;
            font-family: "Poppins", sans-serif;
            /* font-weight: 300; */
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
            background-color:rgb(145, 155, 167);
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
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: rgb(107, 155, 167);;
            color: #ecf0f1;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
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

        /* card css */
        .all-card {
            display: flex;
            /* display: grid; */
            gap: 20px;
            /* Adjust the value as needed */
        }

        .card {
            margin: 2px;
            padding: 20px;
            width: 300px;
            min-height: 200px;
            display: grid;
            grid-template-rows: 20px 50px 1fr 50px;
            border-radius: 10px;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
            transition: all 0.2s;
        }

        .card:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
            transform: scale(1.01);
        }

        .card__link,
        .card__exit,
        .card__icon {
            position: relative;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.9);
        }

        .card__link::after {
            position: absolute;
            top: 25px;
            left: 0;
            content: "";
            width: 0%;
            height: 3px;
            background-color: rgba(255, 255, 255, 0.6);
            transition: all 0.5s;
        }

        .card__link:hover::after {
            width: 100%;
        }

        .text {
            color: #fff;
            padding-top: 72px;
        }

        .text2 {
            color: white;
            padding-top: 35px;
        }

        .card__exit {
            grid-row: 1/2;
            justify-self: end;
        }

        .card__icon {
            grid-row: 2/3;
            font-size: 30px;
        }

        .card__title {
            grid-row: 3/4;
            font-weight: 400;
            color: #ffffff;
        }

        .card__apply {
            grid-row: 4/5;
            align-self: center;
        }

        .card-5 {
            background: radial-gradient(rgb(145, 155, 167), rgb(107, 155, 167));
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
        <h1>Bokking panel</h1>
        <div class="all-card">
            <div class="card card-5">
                <div class="card__icon">🗺️</div>
                <div class="text">Manage Package:</div>
                <div class="text2">Deciding Whether to keep the package or not</div>
                <p class="card__apply">
                    <a class="card__link" href="a_managepackage.php">Open Now<i class="fas fa-arrow-right"></i></a>
                </p>
            </div>
            <div class="card card-5">
                <div class="card__icon">📋</div>
                <div class="text">Booking Package:</div>
                <div class="text2">Check Conformation booking from Tourist</div>
                <p class="card__apply">
                    <a class="card__link" href="a_bookingdetails.php">Open Now<i class="fas fa-arrow-right"></i></a>
                </p>
            </div>
        </div>
</html>
