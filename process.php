<?php
// process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "2503";
    $dbname = "timetablepro";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve department name from the form
    $deptName = $_POST["deptName"];

    // Insert the new department into the database
    $sql = "INSERT INTO courses (dept) VALUES ('$deptName')";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the home page after adding the department
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
