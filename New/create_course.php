<?php
include("db_connection.php");
$courseName = $_POST["coursename"];
$numberOfSubjects = 25;
for ($i = 1; $i <= $numberOfSubjects; $i++) {
    ${"subjectCode{$i}"} = isset($_POST["subjectCode{$i}"]) ? $_POST["subjectCode{$i}"] : null;
    ${"subjectName{$i}"} = isset($_POST["subjectName{$i}"]) ? $_POST["subjectName{$i}"] : null;
    ${"hoursRequired{$i}"} = isset($_POST["hoursRequired{$i}"]) ? $_POST["hoursRequired{$i}"] : null;
    ${"lab{$i}"} = isset($_POST["lab{$i}"]) ? $_POST["lab{$i}"] : null;
}

// for ($i = 1; $i <= $numberOfSubjects; $i++) {
//     if(${"subjectCode{$i}"}!=null){
//         echo ${"subjectCode{$i}"} .'  |   '. ${"subjectName{$i}"} .'<br>';
//     }
//     else{
//         break;
//     }
// }

include 'db_connection.php';

$sql = "INSERT INTO ADMIN (COURSE) VALUES ('$courseName')";
if ($conn->query($sql) !== TRUE) {
    echo 'Error Inserting into Admin table: ' . $conn->error;
}

// Time table Creation

$sql = 'CREATE TABLE IF NOT EXISTS ' . $courseName . ' (
    DAY varchar(10) primary key,
    `9_30` VARCHAR(30),
    `10_30` VARCHAR(30),
    `11_30` VARCHAR(30),
    `12_30` VARCHAR(30),
    `1_30` VARCHAR(30),
    `2_30` VARCHAR(30),
    `3_30` VARCHAR(30),
    `4_30` VARCHAR(30)
)';

if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Timetable table: ' . $conn->error;
}

$sqlInsertData = "
    INSERT INTO `{$courseName}` (DAY, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
    VALUES 
    ('MONDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
    ('TUESDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
    ('WEDNESDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
    ('THURSDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
    ('FRIDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown');
";

// Execute the query
if ($conn->query($sqlInsertData) !== TRUE) {
    echo 'Error Inserting Data to Timetable table: ' . $conn->error;
}


// Subject Table

$sql = 'CREATE TABLE IF NOT EXISTS ' . $courseName . '_Subjects (
    subjectCode VARCHAR(8),
    subjectName VARCHAR(25),
    hoursRequired INT,
    lab VARCHAR(10),
    staffName VARCHAR(255)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Subject table: ' . $conn->error;
}


// Example: Insert data into a table
for ($i = 1; $i <= $numberOfSubjects; $i++) {
    if (${"subjectCode{$i}"} !== null) {
        $sql = "INSERT INTO {$courseName}_Subjects (subjectCode, subjectName, hoursRequired, lab)
                VALUES ('${"subjectCode{$i}"}', '${"subjectName{$i}"}', '${"hoursRequired{$i}"}', '${"lab{$i}"}')";
        if ($conn->query($sql) !== TRUE) {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        break;
    }
}
include 'db_connection_close.php'

?>