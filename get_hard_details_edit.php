<?php
include 'db_connection.php';

if (isset($_POST['subjectCode'])) {
    $subjectCode = $_POST['subjectCode'];

    // Fetch subject details based on the subjectCode
    $subjectDetailsQuery = $conn->query("SELECT subjectName, hoursRequired, lab FROM hardcoretb WHERE subjectCode = '$subjectCode'");

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
