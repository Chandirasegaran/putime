<?php
// include 'db_connection.php';
// $curcourse = $_COOKIE['currentCourse'];

// // For Monday
// $monday01 = $curcourse . '1' . '1';
// $monday02 = $curcourse . '1' . '2';
// $monday03 = $curcourse . '1' . '3';
// $monday04 = $curcourse . '1' . '4';
// $monday05 = $curcourse . '1' . '5';
// $monday06 = $curcourse . '1' . '6';
// $monday07 = $curcourse . '1' . '7';
// $monday08 = $curcourse . '1' . '8';

// // For Tuesday
// $tuesday01 = $curcourse . '2' . '1';
// $tuesday02 = $curcourse . '2' . '2';
// $tuesday03 = $curcourse . '2' . '3';
// $tuesday04 = $curcourse . '2' . '4';
// $tuesday05 = $curcourse . '2' . '5';
// $tuesday06 = $curcourse . '2' . '6';
// $tuesday07 = $curcourse . '2' . '7';
// $tuesday08 = $curcourse . '2' . '8';

// // For Wednesday
// $wednesday01 = $curcourse . '3' . '1';
// $wednesday02 = $curcourse . '3' . '2';
// $wednesday03 = $curcourse . '3' . '3';
// $wednesday04 = $curcourse . '3' . '4';
// $wednesday05 = $curcourse . '3' . '5';
// $wednesday06 = $curcourse . '3' . '6';
// $wednesday07 = $curcourse . '3' . '7';
// $wednesday08 = $curcourse . '3' . '8';

// // For Thursday
// $thursday01 = $curcourse . '4' . '1';
// $thursday02 = $curcourse . '4' . '2';
// $thursday03 = $curcourse . '4' . '3';
// $thursday04 = $curcourse . '4' . '4';
// $thursday05 = $curcourse . '4' . '5';
// $thursday06 = $curcourse . '4' . '6';
// $thursday07 = $curcourse . '4' . '7';
// $thursday08 = $curcourse . '4' . '8';

// // For Friday
// $friday01 = $curcourse . '5' . '1';
// $friday02 = $curcourse . '5' . '2';
// $friday03 = $curcourse . '5' . '3';
// $friday04 = $curcourse . '5' . '4';
// $friday05 = $curcourse . '5' . '5';
// $friday06 = $curcourse . '5' . '6';
// $friday07 = $curcourse . '5' . '7';
// $friday08 = $curcourse . '5' . '8';

// // For Monday
// $monday1 = $_POST[$monday01];
// $monday2 = $_POST[$monday02];
// $monday3 = $_POST[$monday03];
// $monday4 = $_POST[$monday04];
// $monday5 = $_POST[$monday05];
// $monday6 = $_POST[$monday06];
// $monday7 = $_POST[$monday07];
// $monday8 = $_POST[$monday08];
// // For Tuesday
// $tuesday1 = $_POST[$tuesday01];
// $tuesday2 = $_POST[$tuesday02];
// $tuesday3 = $_POST[$tuesday03];
// $tuesday4 = $_POST[$tuesday04];
// $tuesday5 = $_POST[$tuesday05];
// $tuesday6 = $_POST[$tuesday06];
// $tuesday7 = $_POST[$tuesday07];
// $tuesday8 = $_POST[$tuesday08];

// // For Wednesday
// $wednesday1 = $_POST[$wednesday01];
// $wednesday2 = $_POST[$wednesday02];
// $wednesday3 = $_POST[$wednesday03];
// $wednesday4 = $_POST[$wednesday04];
// $wednesday5 = $_POST[$wednesday05];
// $wednesday6 = $_POST[$wednesday06];
// $wednesday7 = $_POST[$wednesday07];
// $wednesday8 = $_POST[$wednesday08];

// // For Thursday
// $thursday1 = $_POST[$thursday01];
// $thursday2 = $_POST[$thursday02];
// $thursday3 = $_POST[$thursday03];
// $thursday4 = $_POST[$thursday04];
// $thursday5 = $_POST[$thursday05];
// $thursday6 = $_POST[$thursday06];
// $thursday7 = $_POST[$thursday07];
// $thursday8 = $_POST[$thursday08];

// // For Friday
// $friday1 = $_POST[$friday01];
// $friday2 = $_POST[$friday02];
// $friday3 = $_POST[$friday03];
// $friday4 = $_POST[$friday04];
// $friday5 = $_POST[$friday05];
// $friday6 = $_POST[$friday06];
// $friday7 = $_POST[$friday07];
// $friday8 = $_POST[$friday08];



// $sqlfordelete = "drop table ".$curcourse;
// if ($conn->query($sqlfordelete) !== TRUE) {
//     echo 'Error Deleting Data to Timetable table: ' . $conn->error;
// }


// $sql = 'CREATE TABLE IF NOT EXISTS ' . $curcourse . ' (
//     `ORDER` INT PRIMARY KEY,
//     DAY varchar(10),
//     `9_30` VARCHAR(30),
//     `10_30` VARCHAR(30),
//     `11_30` VARCHAR(30),
//     `12_30` VARCHAR(30),
//     `1_30` VARCHAR(30),
//     `2_30` VARCHAR(30),
//     `3_30` VARCHAR(30),
//     `4_30` VARCHAR(30)
// )';

// if ($conn->query($sql) !== TRUE) {
//     echo 'Error creating Timetable table: ' . $conn->error;
// }

// $sqlInsertData = "
//     INSERT INTO `{$curcourse}` (`ORDER`, DAY, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
//     VALUES 
//     (1, 'MONDAY', '".$monday1."', '".$monday2."', '".$monday3."', '".$monday4."', '".$monday5."', '".$monday6."', '".$monday7."', '".$monday8."'),
//     (2, 'TUESDAY', '".$tuesday1."', '".$tuesday2."', '".$tuesday3."', '".$tuesday4."', '".$tuesday5."', '".$tuesday6."', '".$tuesday7."', '".$tuesday8."'),
//     (3, 'WEDNESDAY', '".$wednesday1."', '".$wednesday2."', '".$wednesday3."', '".$wednesday4."', '".$wednesday5."', '".$wednesday6."', '".$wednesday7."', '".$wednesday8."'),
//     (4, 'THURSDAY', '".$thursday1."', '".$thursday2."', '".$thursday3."', '".$thursday4."', '".$thursday5."', '".$thursday6."', '".$thursday7."', '".$thursday8."'),
//     (5, 'FRIDAY', '".$friday1."', '".$friday2."', '".$friday3."', '".$friday4."', '".$friday5."', '".$friday6."', '".$friday7."', '".$friday8."');
// ";


// // Execute the query
// if ($conn->query($sqlInsertData) !== TRUE) {
//     echo 'Error Inserting Data to Timetable table: ' . $conn->error;
// }
// include 'db_connection_close.php';
// header ('schedule.php');

include 'db_connection.php';
$curcourse = $_COOKIE['currentCourse'];

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
        $fieldName = $curcourse . ($i + 1) . $j;
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
header('Location: schedule.php');
?>