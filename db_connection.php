<?php
$servername = "localhost"; // Replace with your MySQL server name
$username = "root"; // Replace with your MySQL username
$password = "semEIGHT*8"; // Replace with your MySQL password
$dbname = "pu_timetable"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
