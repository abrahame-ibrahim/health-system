<?php
session_start();
if (!isset($_SESSION['doctor'])) {
    header('Location: login.php');
    exit();
}

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

if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];

    // Fetch client details
    $client_result = $conn->query("SELECT * FROM clients WHERE id = $client_id");
    $client = $client_result->fetch_assoc();

    // Fetch programs the client is enrolled in
    $programs_result = $conn->query("SELECT programs.name FROM programs
                                     INNER JOIN client_programs ON programs.id = client_programs.program_id
                                     WHERE client_programs.client_id = $client_id");
    $programs = [];
    while ($row = $programs_result->fetch_assoc()) {
        $programs[] = $row['name'];
    }
} else {
    echo "Client ID is required.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <div class="content-container">
        <h1>Client Profile</h1>
        <?php if ($client): ?>
            <h2><?= htmlspecialchars($client['name']) ?>'s Profile</h2>
            <p><strong>Email:</strong> <?= htmlspecialchars($client['email']) ?></p>
            <p><strong>Phone:</strong> <?= htmlspecialchars($client['phone']) ?></p>

            <h3>Enrolled Programs:</h3>
            <ul>
                <?php if (!empty($programs)): ?>
                    <?php foreach ($programs as $program): ?>
                        <li><?= htmlspecialchars($program) ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li>No programs enrolled</li>
                <?php endif; ?>
            </ul>
        <?php else: ?>
            <p>Client not found.</p>
        <?php endif; ?>
    </div>
</div>
</body>
</html>
