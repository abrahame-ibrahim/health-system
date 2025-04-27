<?php
// DB connection
$host = 'localhost';
$dbname = 'health_system';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

// Check DB connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $client_id = (int) $_POST['client_id']; // cast to int for security

    // Ensure program_id is always an array
    $program_ids = isset($_POST['program_id']) ? (array)$_POST['program_id'] : [];

    if (empty($program_ids)) {
        echo "<script>alert('No programs selected!'); window.history.back();</script>";
    } else {
        $all_success = true;
        foreach ($program_ids as $program_id) {
            $program_id = (int) $program_id; // cast to int for security

            $query = "INSERT INTO client_programs (client_id, program_id) VALUES ($client_id, $program_id)";
            if ($conn->query($query) !== TRUE) {
                $all_success = false;
                echo "<script>alert('Error enrolling client in program ID $program_id: " . $conn->error . "'); window.history.back();</script>";
                break;
            }
        }

        if ($all_success) {
            echo "<script>alert('Client enrolled successfully!'); window.history.back();</script>";
        }
    }
}

$conn->close();
?>
