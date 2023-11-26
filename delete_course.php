<?php
// delete_course.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['course_id'])) {
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

    // Get course_id from the URL parameter
    $courseId = $_GET['course_id'];

    // SQL to delete the course with the specified course_id
    $sql = "DELETE FROM course WHERE course_id = $courseId";

    if ($conn->query($sql) === TRUE) {
        // Redirect to course.php
        header("Location: course.php");
        exit();
    } else {
        echo "Error deleting course: " . $conn->error;
    }

    $conn->close();
}
?>
