<?php

include("db_connection.php");
$numberOfSubjects = 95;
for ($i = 1; $i <= $numberOfSubjects; $i++) {
    ${"subjectCode{$i}"} = isset($_POST["subjectCode{$i}"]) ? $_POST["subjectCode{$i}"] : null;
    ${"subjectName{$i}"} = isset($_POST["subjectName{$i}"]) ? $_POST["subjectName{$i}"] : null;
    ${"hoursRequired{$i}"} = isset($_POST["hoursRequired{$i}"]) ? $_POST["hoursRequired{$i}"] : null;
    ${"lab{$i}"} = isset($_POST["lab{$i}"]) ? $_POST["lab{$i}"] : null;
}

for ($i = 1; $i <= $numberOfSubjects; $i++) {
    if (${"subjectCode{$i}"} !== null) {
        $sql = "INSERT INTO SETB (subjectCode, subjectName, hoursRequired, lab)
                VALUES ('${"subjectCode{$i}"}', '${"subjectName{$i}"}', '${"hoursRequired{$i}"}', '${"lab{$i}"}')";
        if ($conn->query($sql) !== TRUE) {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        break;
    }
}
include 'db_connection_close.php';
header("Location: index.php");
?>