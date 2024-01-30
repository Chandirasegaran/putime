<?php
// Include your database connection script
include("db_connection.php");

// Check if the courseName is set in the POST request
if (isset($_POST['courseName'])) {
    $courseName = $_POST['courseName'];

    // Check if stype is set to 'sc'
    $stype = 'sc';

    // Prepare the SQL query to delete records
    $query = "DELETE FROM " . $courseName . "_subjects WHERE stype = ?";

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $stype);

    // Execute the query
    if ($stmt->execute()) {
        // Success response
        $response = array(
            'status' => 'success',
            'message' => 'Softcore values reset successfully.'
        );
    } else {
        // Error executing the query
        $response = array(
            'status' => 'error',
            'message' => 'Error executing the query: ' . $stmt->error
        );
    }
    $stype = ' sc';

    // Prepare the SQL query to delete records
    $query = "DELETE FROM " . $courseName . "_subjects WHERE stype = ?";

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $stype);

    // Execute the query
    if ($stmt->execute()) {
        // Success response
        $response = array(
            'status' => 'success',
            'message' => 'Softcore values reset successfully.'
        );
    } else {
        // Error executing the query
        $response = array(
            'status' => 'error',
            'message' => 'Error executing the query: ' . $stmt->error
        );
    }
    $stype = 'se';

    // Prepare the SQL query to delete records
    $query = "DELETE FROM " . $courseName . "_subjects WHERE stype = ?";

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $stype);

    // Execute the query
    if ($stmt->execute()) {
        // Success response
        $response = array(
            'status' => 'success',
            'message' => 'Softcore values reset successfully.'
        );
    } else {
        // Error executing the query
        $response = array(
            'status' => 'error',
            'message' => 'Error executing the query: ' . $stmt->error
        );
    }
    $stype = ' se';

    // Prepare the SQL query to delete records
    $query = "DELETE FROM " . $courseName . "_subjects WHERE stype = ?";

    // Use prepared statement to avoid SQL injection
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $stype);

    // Execute the query
    if ($stmt->execute()) {
        // Success response
        $response = array(
            'status' => 'success',
            'message' => 'Softcore values reset successfully.'
        );
    } else {
        // Error executing the query
        $response = array(
            'status' => 'error',
            'message' => 'Error executing the query: ' . $stmt->error
        );
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // courseName not set in POST request
    $response = array(
        'status' => 'error',
        'message' => 'Course name is required.'
    );
}

// Close the database connection
$conn->close();

// Set the content type to application/json
header('Content-Type: application/json');

// Encode and return the response as JSON
echo json_encode($response);
?>
