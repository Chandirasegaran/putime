<?php
include 'db_connection.php';

if (isset($_POST['courseName'])) {
    $tableName = $_POST['courseName'] . "_subjects";
    $sql = "UPDATE " . $tableName . " SET staffName = '', labStaffName = ''";

    if ($conn->query($sql) === TRUE) {
        echo "Staff reset successful";
    } else {
        echo "Error resetting course: " . $conn->error;
    }
} else {
    echo "Course name not provided";
}
$conn->close();
?>
