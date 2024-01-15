<?php
// process_assign.php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Assuming you have a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "timetablepro";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the selected course code and staff name from the form
    $courseCode = $_POST['submit'];
    $staffName = $_POST['staffName'][$courseCode];

    // Check if the course code already exists in the assign table
    $existingRecordQuery = "SELECT * FROM assign WHERE course_code = '$courseCode'";
    $existingRecordResult = $conn->query($existingRecordQuery);

    if ($existingRecordResult->num_rows > 0) {
        // Course code already exists, update the staff name
        $updateQuery = "UPDATE assign SET staff_name = '$staffName' WHERE course_code = '$courseCode'";

        if ($conn->query($updateQuery) === TRUE) {
            // No need to display a success message
        } else {
            echo "Error: " . $updateQuery . "<br>" . $conn->error;
        }
    } else {
        // Course code doesn't exist, insert a new record
        $courseQuery = "SELECT * FROM course WHERE course_code = '$courseCode'";
        $courseResult = $conn->query($courseQuery);

        if ($courseResult->num_rows > 0) {
            $courseRow = $courseResult->fetch_assoc();

            // Insert into the assign table
            $insertQuery = "INSERT INTO assign (course_code, course_name, sem_type, course_core, department, lab, credit, priority, staff_name) VALUES (
                '" . $courseRow['course_code'] . "',
                '" . $courseRow['course_name'] . "',
                '" . $courseRow['sem_type'] . "',
                '" . $courseRow['course_core'] . "',
                '" . $courseRow['department'] . "',
                '" . $courseRow['lab'] . "',
                '" . $courseRow['credit'] . "',
                '" . $courseRow['priority'] . "',
                '$staffName'
            )";

            if ($conn->query($insertQuery) === TRUE) {
                // No need to display a success message
            } else {
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        } else {
            echo "Error: Course not found.";
        }
    }

    $conn->close();
}

// Refresh the page using JavaScript
echo '<script>window.location.href = "assign.php";</script>';
exit();
?>
