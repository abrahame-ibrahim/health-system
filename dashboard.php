<?php
session_start();
if (!isset($_SESSION['doctor'])) {
    header('Location: register.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('hospital-background.jpg'); /* Replace with your background image */
            background-size: cover;
            background-position: center;
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .dashboard-container {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 400px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #4CAF50;
        }

        p {
            font-size: 1.2em;
            margin: 10px 0;
        }

        a {
            color: #4CAF50;
            font-size: 1.2em;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .logout-button {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
            background-color: #FF5722;
            color: white;
            font-size: 1.2em;
            border-radius: 5px;
            text-decoration: none;
        }

        .logout-button:hover {
            background-color: #E64A19;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h1>Welcome, Dr. <?= $_SESSION['doctor']; ?>!</h1>
    <p><a href="index.php">Go to Health System</a></p>
    <p><a href="logout.php" class="logout-button">Logout</a></p>
</div>

</body>
</html>
