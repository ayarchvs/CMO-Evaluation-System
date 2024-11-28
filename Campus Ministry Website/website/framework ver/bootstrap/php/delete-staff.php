<?php
// delete-staff.php

session_start(); // Start the session to access session variables
include "../config/config.php";  
include "../access_control.php"; 

// Check if the user is an admin
if (!is_admin()) {
    echo json_encode(['status' => 'error', 'message' => 'Unauthorized: Only admins can delete staff.']);
    exit; 
}

// Check if ID is provided via GET
if (isset($_GET['id'])) {
    $staffId = $conn->real_escape_string($_GET['id']); // Sanitize input to prevent SQL injection

    // Check if the staff member is associated with any events
    $checkEventQuery = "SELECT COUNT(*) AS count FROM event WHERE Staff_ID = '$staffId'";
    $result = $conn->query($checkEventQuery);

    if ($result) {
        $data = $result->fetch_assoc();

        // If there are events associated with the staff member
        if ($data['count'] > 0) {
            echo json_encode(['status' => 'error', 'message' => 'This staff member is assigned to an event and cannot be deleted.']);
            exit; // Stop the script execution
        }

        // SQL query to delete the staff from the database
        $query = "DELETE FROM staff WHERE Staff_ID = '$staffId'";

        // Execute the query
        if ($conn->query($query) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Staff deleted successfully.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error deleting staff: ' . $conn->error]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error checking events: ' . $conn->error]);
    }
} else {
    // If no ID is provided
    echo json_encode(['status' => 'error', 'message' => 'No ID provided.']);
}
?>
