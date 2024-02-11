<?php
include 'db_connection.php';

if (isset($_POST['subjectName'])) {
    $subjectName = $_POST['subjectName']; // Corrected variable name

    // Fetch subject details based on the subjectName
    $subjectDetailsQuery = $conn->query("SELECT subjectCode, hoursRequired, lab FROM softcoretb WHERE subjectName = '$subjectName'");

    if ($subjectDetailsQuery->num_rows > 0) {
        $subjectDetails = $subjectDetailsQuery->fetch_assoc();
        echo json_encode($subjectDetails);
    } else {
        echo json_encode(['error' => 'Subject details not found.']);
    }
} else {
    echo json_encode(['error' => 'Invalid request.']);
}

$conn->close();
