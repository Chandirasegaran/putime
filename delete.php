<?php
// delete.php

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

    // Retrieve department ID from the form
    $deptId = $_POST["deptId"];

    // Delete the department from the database
    $sql = "DELETE FROM department WHERE sno = $deptId";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the home page after deleting the department
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
