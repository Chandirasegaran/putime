<?php
include("db_connection.php");

$courseName = isset($_POST["courseName"]) ? $_POST["courseName"] : '';
// $numberOfSubjects = isset($_POST["numberOfSubjects"]) ? $_POST["numberOfSubjects"] : '';
$numberOfSubjects = 45;
// Drop existing Subject table
$sqlDrop = 'DROP TABLE IF EXISTS ' . $courseName . '_Subjects';
if ($conn->query($sqlDrop) !== TRUE) {
    echo 'Error dropping Subject table: ' . $conn->error;
}

for ($i = 1; $i <= $numberOfSubjects; $i++) {
    echo $i;
    echo "<br>";
    ${"subjectCode{$i}"} = isset($_POST["subjectCode{$i}"]) ? $_POST["subjectCode{$i}"] : null;
    ${"subjectName{$i}"} = isset($_POST["subjectName{$i}"]) ? $_POST["subjectName{$i}"] : null;
    ${"hoursRequired{$i}"} = isset($_POST["hoursRequired{$i}"]) ? $_POST["hoursRequired{$i}"] : null;
    ${"lab{$i}"} = isset($_POST["lab{$i}"]) ? $_POST["lab{$i}"] : null;
}

// Create a new Subject table


$sqlCreateTable = 'CREATE TABLE IF NOT EXISTS ' . $courseName . '_Subjects (
                    subjectCode VARCHAR(8) PRIMARY KEY,
                    subjectName VARCHAR(255),
                    hoursRequired INT,
                    hoursRequiredDup INT,
                    lab VARCHAR(10),
                    staffName VARCHAR(255)
                )';

if ($conn->query($sqlCreateTable) !== TRUE) {
    echo 'Error creating new Subject table: ' . $conn->error;
}

for ($i = 1; $i <= $numberOfSubjects; $i++) {
    echo $i;
    if (${"subjectCode{$i}"} !== null) {
        $sql = "INSERT INTO {$currsem}{$courseName}_Subjects (subjectCode, subjectName, hoursRequiredDup , hoursRequired, lab)
                VALUES ('${"subjectCode{$i}"}', '${"subjectName{$i}"}', '${"hoursRequired{$i}"}', '${"hoursRequired{$i}"}', '${"lab{$i}"}')";
        if ($conn->query($sql) !== TRUE) {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        break;
    }
}


// for ($i = 0; $i < $numberOfSubjects; $i++) {
//     $subjectCode = isset($_POST["subjectCode{$i}"]) ? $_POST["subjectCode{$i}"] : null;
//     $subjectName = isset($_POST["subjectName{$i}"]) ? $_POST["subjectName{$i}"] : null;
//     $hoursRequired = isset($_POST["hoursRequired{$i}"]) ? $_POST["hoursRequired{$i}"] : null;
//     $lab = isset($_POST["lab{$i}"]) ? $_POST["lab{$i}"] : null;
//     echo $subjectCode;
//     echo $subjectName;
//     echo $hoursRequired;
//     echo $lab;
//     if (!empty($subjectCode)) {
//         $sql = "INSERT INTO {$courseName}_Subjects (subjectCode, subjectName, hoursRequired, lab)
//                 VALUES ('$subjectCode', '$subjectName', '$hoursRequired', '$lab')";
//         if ($conn->query($sql) !== TRUE) {
//             echo 'Error: ' . $sql . '<br>' . $conn->error;
//             exit; // Stop execution if there's an error
//         }
//     }
// }

include 'db_connection_close.php';

// Redirect back to index.php
// header("Location: index.php");
// exit; // Ensure that no code is executed after the redirect
?>