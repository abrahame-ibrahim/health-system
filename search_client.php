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

// Check if we should show a success popup
if (isset($_GET['registered']) && $_GET['registered'] == 1) {
    echo "<script>alert('New client registered successfully!');</script>";
}

// Accept both GET and POST
$client_name = $_REQUEST['client_name'] ?? '';

echo "<h2>Search Clients</h2>";

if (!empty($client_name)) {
    // Search query
    $query = "SELECT * FROM clients WHERE name LIKE ?";
    $stmt = $conn->prepare($query);
    $search_term = "%{$client_name}%";
    $stmt->bind_param("s", $search_term);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Display results nicely in a table
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Client Name</th><th>Email</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No clients found matching \"$client_name\".";
    }

    $stmt->close();
} else {
    echo "Please enter a client name to search.";
}

$conn->close();
?>
