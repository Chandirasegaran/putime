<?php
// delete_staff.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['coursename'])) {
    // Assuming you have a database connection
    include 'db_connection.php';
    // Collect registration number from the query parameters
    $coursename = $_GET['coursename'];
    echo $coursename;
    // Delete the staff record from the staff table

    // if($currsem=="Odd"){
    //     $deleteQuery = "DELETE FROM adminodd WHERE `adminodd`.`COURSE` = '".$coursename."'";
    // }
    // else if($currsem=="Even"){
    //     $deleteQuery = "DELETE FROM admineven WHERE `admineven`.`COURSE` = '".$coursename."'";
    // }

    $deleteQuery = "DELETE FROM " . ($currsem == "odd" ? "adminodd" : "admineven") . " WHERE `" . ($currsem == "odd" ? "adminodd" : "admineven") ."`.`COURSE` = '".$coursename."'";

    $deletetable = "DROP TABLE ". $coursename;
    $deleteclasssubject = "DROP TABLE " . $coursename . "_subjects";
    echo $deletetable;
    echo $deleteclasssubject;
    if (($conn->query($deleteQuery) === TRUE) and ($conn->query($deletetable)) and ($conn->query($deleteclasssubject))) {
        $conn->close();
        header("Location: index.php"); // Redirect back to the staff.php page
        exit();
    } else {
        echo "Error deleting Course record: " . $conn->error;
    }

    $conn->close();
}
?>
