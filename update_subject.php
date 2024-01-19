<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the POST request
    $courseName =isset($_POST["courseName"]) ? $_POST["courseName"] : null;
    $subjectCode = isset($_POST["subjectCode"]) ? $_POST["subjectCode"] : null;
    $subjectName = isset($_POST["subjectName"]) ? $_POST["subjectName"] : null;
    $hoursRequired = isset($_POST["hoursRequired"]) ? $_POST["hoursRequired"] : null;
    $lab = isset($_POST["lab"]) ? $_POST["lab"] : null;
    
    // Validate data (you should perform proper validation according to your requirements)

    // Update the database
    $updateSql = "UPDATE " . $courseName . "_Subjects SET subjectName = ?, hoursRequired = ?, lab = ? WHERE subjectCode = ?";
    
    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($updateSql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die('Error preparing statement: ' . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("ssss", $subjectName, $hoursRequired, $lab, $subjectCode);

    // Execute the statement
    if ($stmt->execute()) {
        echo 'Data updated successfully';
        header("Location: index.php");

    } else {
        echo 'Error updating data: ' . $stmt->error;
    }

    // Close prepared statement
    $stmt->close();
} else {
    echo 'Invalid request';
}

// Close the database connection
include 'db_connection_close.php';
?>
