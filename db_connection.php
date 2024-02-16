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
$sql = 'CREATE TABLE IF NOT EXISTS SOFTCORETB (
    subjectCode VARCHAR(15) PRIMARY KEY,
    subjectName VARCHAR(255),
    hoursRequired INT,
    lab VARCHAR(10)
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Softcore table: ' . $conn->error;
}

$sql = 'CREATE TABLE IF NOT EXISTS SETB (
    subjectCode VARCHAR(15) PRIMARY KEY,
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
