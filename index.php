<?php
session_start();
if (!isset($_SESSION['doctor'])) {
    header('Location: login.php');
    exit();
}
?>

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

// Fetch available programs
$programs_result = $conn->query("SELECT * FROM programs");
$programs = [];
while ($row = $programs_result->fetch_assoc()) {
    $programs[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Information System</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS -->
    <!-- Bootstrap and jQuery libraries -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="content-container">
        <h1>Health Information System</h1>

        <!-- Register New Client Form -->
        <div class="form-container">
            <h2>Register New Client</h2>
            <form method="POST" action="register_client.php">
                <div class="form-group">
                    <label for="client_name">Client Name</label>
                    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Client Name" required>
                </div>
                <div class="form-group">
                    <label for="client_email">Client Email</label>
                    <input type="email" class="form-control" name="client_email" id="client_email" placeholder="Client Email" required>
                </div>
                <div class="form-group">
                    <label for="client_phone">Client Phone</label>
                    <input type="text" class="form-control" name="client_phone" id="client_phone" placeholder="Client Phone" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Register Client</button>
            </form>
        </div>

        <!-- Enroll Client in Programs Form -->
        <div class="form-container">
            <h2>Enroll Client in Programs</h2>
            <form method="POST" action="enroll_client.php">
                <div class="form-group">
                    <label for="client_id">Client ID</label>
                    <input type="number" class="form-control" name="client_id" id="client_id" placeholder="Client ID" required>
                </div>
                <div class="form-group">
                    <label for="program_id">Programs</label>
                    <select name="program_id[]" class="form-control" id="program_id" multiple required>
                        <?php foreach ($programs as $program): ?>
                            <option value="<?= $program['id'] ?>"><?= $program['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enroll Client</button>
            </form>
        </div>

        <!-- Search Client Form -->
        <div class="form-container">
            <h2>Search for Client</h2>
            <form method="POST" action="search_client.php">
                <div class="form-group">
                    <label for="search_name">Client Name</label>
                    <input type="text" class="form-control" name="client_name" id="search_name" placeholder="Enter Client Name" required>
                </div>
                <button type="submit" class="btn btn-info btn-block">Search</button>
            </form>
        </div>

        <!-- View Client Profile Form -->
        <div class="form-container">
            <h2>View Client Profile</h2>
            <form method="GET" action="view_client.php">
                <div class="form-group">
                    <label for="view_client_id">Client ID</label>
                    <input type="number" class="form-control" name="client_id" id="view_client_id" placeholder="Client ID" required>
                </div>
                <button type="submit" class="btn btn-warning btn-block">View Profile</button>
            </form>
        </div>

        <p><a href="logout.php" class="logout-button">Logout</a></p>
    </div>
</div>

</body>
</html>
