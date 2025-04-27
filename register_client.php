<?php 
// DB connection
$host = 'localhost';
$dbname = 'health_system';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['client_name'];
    $email = $_POST['client_email'];
    $phone = $_POST['client_phone'];

    $query = "INSERT INTO clients (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('New client registered successfully!');</script>";
    } else {
        echo "<script>alert('Error registering client: " . $conn->error . "');</script>";
    }
}

$conn->close();
?>
