<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Check if the 'id' parameter is present in the URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Prepare SQL query to fetch the detainee record by ID
    $query = "SELECT * FROM record WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        // Error preparing the statement
        echo json_encode(['error' => 'Database query error']);
        exit;
    }

    // Bind the ID parameter as an integer
    $stmt->bind_param("i", $id);
    
    // Execute the prepared statement
    $stmt->execute();
    
    // Get the result of the query
    $result = $stmt->get_result();

    // Check if any record was found
    if ($result->num_rows > 0) {
        // Fetch the record as an associative array
        $record = $result->fetch_assoc();
        // Return the record as a JSON response
        echo json_encode($record);
    } else {
        // No record found with the given ID
        echo json_encode(['error' => 'Detainee not found']);
    }
    
    // Close the statement
    $stmt->close();
} else {
    // No ID was provided in the URL
    echo json_encode(['error' => 'Invalid ID']);
}

// Close the database connection
$conn->close();
?>
