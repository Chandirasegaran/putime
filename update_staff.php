<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    $course = $conn->real_escape_string($_POST['course']);

    // Check if 'staffName' is set and is an array
    if (isset($_POST['staffName']) && is_array($_POST['staffName'])) {
        // Loop through the submitted staff names and update the database
        foreach ($_POST['staffName'] as $subjectCode => $selectedStaffName) {
            // Assuming $selectedStaffName is sanitized and validated before using in the query
            $selectedStaffName = $conn->real_escape_string($selectedStaffName);

            // Update the staffName column in the $course table for the specific subjectCode
            $updateQuery = "UPDATE " . $course . "_subjects SET staffName = '$selectedStaffName' WHERE subjectCode = '$subjectCode'";
            echo $updateQuery;
            $conn->query($updateQuery);

            // You may want to add error handling here
        }
    }

    // Redirect to the page where the form was submitted
    //header("Location:schedule.php");
    exit();
}

$conn->close();
?>
