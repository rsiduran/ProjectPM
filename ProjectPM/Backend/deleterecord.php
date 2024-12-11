<?php
// Include your database connection
include('config.php');

// Check if an ID is provided
if (isset($_POST['id'])) {
    $recordId = (int)$_POST['id'];  // Ensure it's an integer

    // Prepare and execute the SQL query to delete the record
    $sql = "DELETE FROM record WHERE id = ?";
    
    if ($stmt = $connect->prepare($sql)) {
        $stmt->bind_param("i", $recordId);
        
        if ($stmt->execute()) {
            echo 'success';  // Return success message
        } else {
            echo 'Failed to delete record';  // If there was an issue
        }
        $stmt->close();
    } else {
        echo 'Database error';  // If the prepare fails
    }

    // Close the connection
    $connect->close();
} else {
    echo 'Record ID not provided';  // If ID is missing
}
?>
