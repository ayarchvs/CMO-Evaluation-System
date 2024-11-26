<?php
// delete-event.php

include "../config/config.php";  // Include your DB connection

// Check if ID is provided via GET
if (isset($_GET['id'])) {
    $eventId = $_GET['id'];

    // SQL query to delete the event from the database
    $query = "DELETE FROM event WHERE Event_ID = '$eventId'";

    // Execute the query
    if ($conn->query($query) === TRUE) {
        // Respond with success
        echo json_encode(['status' => 'success', 'message' => 'Event deleted successfully.']);
    } else {
        // Respond with an error if deletion fails
        echo json_encode(['status' => 'error', 'message' => 'Error deleting event: ' . $conn->error]);
    }
} else {
    // If no ID is provided
    echo json_encode(['status' => 'error', 'message' => 'No ID provided.']);
}
?>
