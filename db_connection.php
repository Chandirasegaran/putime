<?php

$currsem = null;
if (isset($_COOKIE['whichsem'])) {
    $currsem = $_COOKIE['whichsem'];
}


// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

$dbname = "putimetbdb";

// Check connection
if ($conn->connect_error) {
    die('Connection Error: ' . $conn->connect_error);
}

// Create database if not exists
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sqlCreateDB) !== TRUE) {
    echo 'Error creating database: ' . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// Check if the database is selected successfully
if ($conn->error) {
    echo 'Error selecting database: ' . $conn->error;
}

$sql = 'CREATE TABLE IF NOT EXISTS ' . ($currsem == "odd" ? "adminodd" : "admineven") . '(
    COURSE VARCHAR(50) PRIMARY KEY
)';

if ($conn->query($sql) !== TRUE) {
    echo 'Error creating  Subject table: ' . $conn->error;
}

// $sql = 'CREATE TABLE IF NOT EXISTS SOFTCORETB (
//     COURSE VARCHAR(50) PRIMARY KEY
// )';


// if ($conn->query($sql) !== TRUE) {
//     echo 'Error creating EVEN Subject table: ' . $conn->error;
// }
$sql = 'CREATE TABLE IF NOT EXISTS HARDCORETB (
    subjectCode VARCHAR(25) PRIMARY KEY,
    subjectName VARCHAR(255),
    hoursRequired INT,
    lab VARCHAR(10)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating hardcore table: ' . $conn->error;
}

$sql = 'CREATE TABLE IF NOT EXISTS SOFTCORETB (
    subjectCode VARCHAR(25) PRIMARY KEY,
    subjectName VARCHAR(255),
    hoursRequired INT,
    lab VARCHAR(10)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Softcore table: ' . $conn->error;
}
for ($i = 1; $i <= 4; $i++) {
    $tableName = $currsem . 'lab' . $i.'_subjects';

    $sql = "CREATE TABLE IF NOT EXISTS $tableName (
        subjectCode VARCHAR(25) PRIMARY KEY,
        subjectName VARCHAR(255),
        hoursRequired INT,
        hoursRequiredDup INT,
        lab VARCHAR(10),
        staffName VARCHAR(255),
        labStaffName VARCHAR(255),
        stype VARCHAR(10),
        coursename VARCHAR(30)
    )";

    if ($currsem!="" && $conn->query($sql) !== TRUE) {
        echo "Error creating $tableName table: " . $conn->error;
    }
}

for ($i = 1; $i <= 4; $i++) {
    $tableName = $currsem . 'lab' . $i;

    // Create table if not exists
    $sqlCreateTable = 'CREATE TABLE IF NOT EXISTS ' . $currsem . 'lab' . $i . ' (
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

    if ($currsem!="" && $conn->query($sqlCreateTable) !== TRUE) {
        echo 'Error creating Timetable table: ' . $conn->error;
    }

    // Insert data if the table is newly created
    $sqlInsertData = "
        INSERT IGNORE INTO `{$currsem}lab{$i}` (`ORDER`, DAY, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
        VALUES 
        (1, 'MONDAY', '', '', '', '', '', '', '', ''),
        (2, 'TUESDAY', '', '', '', '', '', '', '', ''),
        (3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
        (4, 'THURSDAY', '', '', '', '', '', '', '', ''),
        (5, 'FRIDAY', '', '', '', '', '', '', '', '');
    ";

    if ($currsem!="" && $conn->query($sqlInsertData) !== TRUE) {
        echo 'Error inserting data: ' . $conn->error;
    }
}

$sql = 'CREATE TABLE IF NOT EXISTS SETB (
    subjectCode VARCHAR(25) PRIMARY KEY,
    subjectName VARCHAR(255),
    hoursRequired INT,
    lab VARCHAR(10)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Skill Enhancement table: ' . $conn->error;
}


$sql = 'CREATE TABLE IF NOT EXISTS STAFF (
    REGNO INT PRIMARY KEY AUTO_INCREMENT,
    NAME VARCHAR(50)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Staff table: ' . $conn->error;
}
