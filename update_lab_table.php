<?php

include 'db_connection.php';
$curcourse = $currsem.$_COOKIE['currentCourse'];
$curcoursem = $_COOKIE['currentCourse'];
// Define the days and time slots
$days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
$timeSlots = ['9_30', '10_30', '11_30', '12_30', '1_30', '2_30', '3_30', '4_30'];

// Create and drop the table
$sqlfordelete = "DROP TABLE IF EXISTS $curcourse";
$conn->query($sqlfordelete);

$sqlCreateTable = "CREATE TABLE IF NOT EXISTS $curcourse (
    `ORDER` INT PRIMARY KEY,
    DAY varchar(10),
    " . implode(" VARCHAR(30), ", $timeSlots) . " VARCHAR(30)
)";

$conn->query($sqlCreateTable);

// Prepare the INSERT query
$sqlInsertData = "INSERT INTO `$curcourse` (`ORDER`, DAY, " . implode(", ", $timeSlots) . ") VALUES ";

// Iterate over days and time slots to build the values part of the query
for ($i = 0; $i < count($days); $i++) {
    $day = $days[$i];
    $values = [$i + 1, "'$day'"];

    for ($j = 1; $j <= count($timeSlots); $j++) {
        $fieldName = $curcoursem . ($i + 1) . $j;
        $value = $_POST[$fieldName];
        $values[] = "'$value'";
    }

    $sqlInsertData .= "(" . implode(", ", $values) . "), ";
}

// Remove the trailing comma and space
$sqlInsertData = rtrim($sqlInsertData, ', ');

// Execute the INSERT query
if ($conn->query($sqlInsertData) !== TRUE) {
    echo 'Error Inserting Data to Timetable table: ' . $conn->error;
}

include 'db_connection_close.php';
header('Location: sl.php');
?>