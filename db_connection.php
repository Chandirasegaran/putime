<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "semEIGHT*8";
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

$sql = 'CREATE TABLE IF NOT EXISTS ADMIN (
    COURSE VARCHAR(50) PRIMARY KEY
)';


if ($conn->query($sql) !== TRUE) {
    echo 'Error creating Subject table: ' . $conn->error;
}

?>
