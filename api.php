<?php
// DB connection
$host = 'localhost';
$dbname = 'health_system';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

// Set the response type to JSON
header('Content-Type: application/json');

// Check if the request method is GET and the client_id is provided in the query string
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['client_id'])) {
    $client_id = intval($_GET['client_id']); // Ensure the client_id is an integer

    // Query to get client details
    $query = "SELECT * FROM clients WHERE id = $client_id";
    $result = $conn->query($query);

    // Check if client exists
    if ($row = $result->fetch_assoc()) {
        $client_profile = [
            'client_id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'phone' => $row['phone'],
        ];

        // Fetch the programs the client is enrolled in
        $programs_query = "SELECT p.name FROM programs p 
                           JOIN client_programs cp ON p.id = cp.program_id 
                           WHERE cp.client_id = $client_id";
        $programs_result = $conn->query($programs_query);

        $programs = [];
        while ($program = $programs_result->fetch_assoc()) {
            $programs[] = $program['name'];
        }

        // Add programs to the client profile
        $client_profile['programs'] = $programs;

        // Return the client profile as JSON
        echo json_encode($client_profile);
    } else {
        // Client not found
        echo json_encode(['error' => 'Client not found']);
    }
} else {
    // Invalid request
    echo json_encode(['error' => 'Invalid request']);
}

// Close the database connection
$conn->close();
?>
