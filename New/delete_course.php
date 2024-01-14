<?php
// delete_staff.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['coursename'])) {
    // Assuming you have a database connection
    include 'db_connection.php';
    // Collect registration number from the query parameters
    $coursename = $_GET['coursename'];

    // Delete the staff record from the staff table
    $deleteQuery = "DELETE FROM admin WHERE COURSE = $coursename";

    if ($conn->query($deleteQuery) === TRUE) {
        $conn->close();
        header("Location: index.php"); // Redirect back to the staff.php page
        exit();
    } else {
        echo "Error deleting Course record: " . $conn->error;
    }

    $conn->close();
}
?>
