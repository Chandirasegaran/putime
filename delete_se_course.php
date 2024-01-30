<?php
// delete_staff.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['coursename'])) {
    include 'db_connection.php';
    $coursename = $_GET['coursename'];
    echo $coursename;
    $deleteQuery = "DELETE FROM SETB WHERE `subjectName` = '".$coursename."'";


    if (($conn->query($deleteQuery) === TRUE)) {
        $conn->close();
        header("Location: index.php"); // Redirect back to the staff.php page
        exit();
    } else {
        echo "Error deleting Course record: " . $conn->error;
    }

    $conn->close();
}
?>
