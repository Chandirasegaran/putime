<?php
// add_course.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "timetablepro";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $courseCode = $_POST["courseCode"];
    $courseName = $_POST["courseName"];
    $semType = $_POST["semType"];
    $courseCore = $_POST["courseCore"]; // Added line
    $department = $_POST["department"];
    $lab = $_POST["lab"];
    $credit = $_POST["credit"];
    $priority = $_POST["priority"];

    // Insert data into the "course" table
    $sql = "INSERT INTO course (course_code, course_name, sem_type, course_core, department, lab, credit, priority) 
            VALUES ('$courseCode', '$courseName', '$semType', '$courseCore', '$department', '$lab', $credit, $priority)";

    if ($conn->query($sql) === TRUE) {
        // Redirect to course.php after successful submission
        header("Location: course.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
