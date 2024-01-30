<?php
$currsem = $_COOKIE['whichsem'];

include("db_connection.php");
$courseName = $_POST["coursename"];
$numberOfSubjects = 25;
$hasbatches = $_POST["hasbatches"];
// echo $hasbatches;
$bat = false;
if (isset($_POST["hasbatches"])) {
    $bat = true;
} else {
    $bat = false;
}


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
// if($currsem=="Odd"){
//     $sql = "INSERT INTO adminodd (COURSE) VALUES ('$courseName')";
// }
// else if($currsem=="Even"){
//     $sql = "INSERT INTO admineven (COURSE) VALUES ('$courseName')";
// }


// Batch 1

$sql = "INSERT INTO " . ($currsem == "odd" ? "adminodd" : "admineven") . " (COURSE) VALUES ('$currsem$courseName')";

if ($conn->query($sql) !== TRUE) {
    echo 'Error Inserting into Admin table: ' . $conn->error;
}

// Time table Creation

$sql = 'CREATE TABLE IF NOT EXISTS ' . $currsem . $courseName . ' (
    `ORDER` INT PRIMARY KEY,
    DAY varchar(10),
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
    INSERT INTO `{$currsem}{$courseName}` (`ORDER`, DAY, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
    VALUES 
    (1,'MONDAY', '', '', '', '', '', '', '', ''),
    (2,'TUESDAY', '', '', '', '', '', '', '', ''),
    (3,'WEDNESDAY', '', '', '', '', '', '', '', ''),
    (4,'THURSDAY', '', '', '', '', '', '', '', ''),
    (5,'FRIDAY', '', '', '', '', '', '', '', '');
";


// Execute the query
if ($conn->query($sqlInsertData) !== TRUE) {
    echo 'Error Inserting Data to Timetable table: ' . $conn->error;
}


// Subject Table

$sql = 'CREATE TABLE IF NOT EXISTS ' . $currsem . $courseName . $batch . '_Subjects (
    subjectCode VARCHAR(8) PRIMARY KEY,
    subjectName VARCHAR(255),
    hoursRequired INT,
    hoursRequiredDup INT,
    lab VARCHAR(10),
    staffName VARCHAR(255),
    stype VARCHAR(10)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Subject table: ' . $conn->error;
}


// Example: Insert data into a table
for ($i = 1; $i <= $numberOfSubjects; $i++) {
    if (${"subjectCode{$i}"} !== null) {
        $sql = "INSERT INTO {$currsem}{$courseName}{$batch}_Subjects (subjectCode, subjectName,hoursRequiredDup,hoursRequired, lab, stype)
            VALUES ('${"subjectCode{$i}"}', '${"subjectName{$i}"}', '${"hoursRequired{$i}"}', '${"hoursRequired{$i}"}', '${"lab{$i}"}' ,'hc')";
        if ($conn->query($sql) !== TRUE) {
            echo 'Error: ' . $sql . '<br>' . $conn->error;
        }
    } else {
        break;
    }
}

// Batch 2
if ($bat == true) {

    // Batch 2
    $batch = "B2";
    $sql = "INSERT INTO " . ($currsem == "odd" ? "adminodd" : "admineven") . " (COURSE) VALUES ('$currsem$courseName$batch')";

    if ($conn->query($sql) !== TRUE) {
        echo 'Error Inserting into Admin table: ' . $conn->error;
    }

    // Time table Creation

    $sql = 'CREATE TABLE IF NOT EXISTS ' . $currsem . $courseName . $batch . ' (
    `ORDER` INT PRIMARY KEY,
    DAY varchar(10),
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
    INSERT INTO `{$currsem}{$courseName}{$batch}` (`ORDER`, DAY, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
    VALUES 
    (1,'MONDAY', '', '', '', '', '', '', '', ''),
    (2,'TUESDAY', '', '', '', '', '', '', '', ''),
    (3,'WEDNESDAY', '', '', '', '', '', '', '', ''),
    (4,'THURSDAY', '', '', '', '', '', '', '', ''),
    (5,'FRIDAY', '', '', '', '', '', '', '', '');
";


    // Execute the query
    if ($conn->query($sqlInsertData) !== TRUE) {
        echo 'Error Inserting Data to Timetable table: ' . $conn->error;
    }


    // Subject Table

    $sql = 'CREATE TABLE IF NOT EXISTS ' . $currsem . $courseName . $batch . '_Subjects (
    subjectCode VARCHAR(8) PRIMARY KEY,
    subjectName VARCHAR(255),
    hoursRequired INT,
    hoursRequiredDup INT,
    lab VARCHAR(10),
    staffName VARCHAR(255),
    stype VARCHAR(10)
)';


    if ($conn->query($sql) !== TRUE) {
        echo 'Error creating Subject table: ' . $conn->error;
    }


    // Example: Insert data into a table
    for ($i = 1; $i <= $numberOfSubjects; $i++) {
        if (${"subjectCode{$i}"} !== null) {
            $sql = "INSERT INTO {$currsem}{$courseName}{$batch}_Subjects (subjectCode, subjectName,hoursRequiredDup,hoursRequired, lab, stype)
                VALUES ('${"subjectCode{$i}"}', '${"subjectName{$i}"}', '${"hoursRequired{$i}"}', '${"hoursRequired{$i}"}', '${"lab{$i}"}' ,'hc')";
            if ($conn->query($sql) !== TRUE) {
                echo 'Error: ' . $sql . '<br>' . $conn->error;
            }
        } else {
            break;
        }
    }
}



include 'db_connection_close.php';
header("Location: index.php");
?>