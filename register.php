<?php
session_start();
$host = 'localhost';
$dbname = 'health_system';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // match your login (using md5)

    // Check if username already exists
    $check_query = "SELECT * FROM doctors WHERE username='$user'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        $error = "Username already exists. Please choose another.";
    } else {
        // Insert into database
        $insert_query = "INSERT INTO doctors (username, password) VALUES ('$user', '$pass')";
        if ($conn->query($insert_query)) {
            $success = "Registration successful! <a href='login.php'>Click here to login</a>.";
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Registration</title>
    <style>
        body { background: #f4f7fa; font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .register-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { width: 100%; padding: 10px; background-color: #008CBA; color: white; border: none; }
        button:hover { background-color: #007bb5; }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>

<div class="register-container">
    <h2>Doctor Registration</h2>
    <?php 
    if ($error) echo "<p class='error'>$error</p>"; 
    if ($success) echo "<p class='success'>$success</p>"; 
    ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="login.php">Login here</a>.</p>
</div>

</body>
</html>
