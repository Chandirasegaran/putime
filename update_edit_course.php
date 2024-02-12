
<?php
include("db_connection.php");

$courseName = isset($_POST["courseName"]) ? $_POST["courseName"] : '';
$numberOfSubjects = 25;

for ($i = 1; $i <= $numberOfSubjects; $i++) {
    ${"subjectCode{$i}"} = isset($_POST["subjectCode{$i}"]) ? $_POST["subjectCode{$i}"] : null;
    ${"subjectName{$i}"} = isset($_POST["subjectName{$i}"]) ? $_POST["subjectName{$i}"] : null;
    ${"hoursRequired{$i}"} = isset($_POST["hoursRequired{$i}"]) ? $_POST["hoursRequired{$i}"] : null;
    ${"lab{$i}"} = isset($_POST["lab{$i}"]) ? $_POST["lab{$i}"] : null;
    ${"type{$i}"} = isset($_POST["type{$i}"]) ? $_POST["type{$i}"] : null;
}

// Drop existing Subject table
$sqlDrop = 'DELETE FROM ' . $courseName . '_Subjects';
if ($conn->query($sqlDrop) !== TRUE) {
    echo 'Error deleting old data: ' . $conn->error;
}

$sql = 'CREATE TABLE IF NOT EXISTS ' . $courseName . '_Subjects (
    subjectCode VARCHAR(8) PRIMARY KEY,
    subjectName VARCHAR(255),
    hoursRequired INT,
    hoursRequiredDup INT,
    lab VARCHAR(10),
    staffName VARCHAR(255),
    labStaffName VARCHAR(255),
    stype VARCHAR(10)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Subject table: ' . $conn->error;
}


// Example: Insert data into a table
for ($i = 1; $i <= $numberOfSubjects; $i++) {
    if (${"subjectCode{$i}"} !== null) {
        $sql = "INSERT INTO {$courseName}_Subjects (subjectCode, subjectName,hoursRequiredDup,hoursRequired, lab ,stype)
                VALUES ('${"subjectCode{$i}"}', '${"subjectName{$i}"}', '${"hoursRequired{$i}"}', '${"hoursRequired{$i}"}', '${"lab{$i}"}','${"type{$i}"}')";
        if ($conn->query($sql) !== TRUE) {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        continue;
    }
}
include 'db_connection_close.php';
header("Location: index.php");
exit();


?>