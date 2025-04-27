<?php
session_start();
$host = 'localhost';
$dbname = 'health_system';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = md5($_POST['password']); // (use password_hash in real apps)

    $query = "SELECT * FROM doctors WHERE username='$user' AND password='$pass'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['doctor'] = $user;
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Login</title>
    <style>
        body { background: #f4f7fa; font-family: Arial; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-container { background: white; padding: 20px; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; }
        button:hover { background-color: #45a049; }
        .error { color: red; }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Doctor Login</h2>
    <?php if ($error) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
