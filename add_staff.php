<?php
// add_staff.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection
    include 'db_connection.php';
    // Collect data from the form
    $staffName = $_POST['staffName'];


    // Insert data into the staff table
    $insertQuery = "INSERT INTO staff (name) VALUES ('$staffName')";

    if ($conn->query($insertQuery) === TRUE) {
        // Record added successfully
        $conn->close();
        header("Location: staff.php"); // Redirect back to the staff.php page
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    $conn->close();
}
?>