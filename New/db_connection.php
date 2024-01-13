<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "putimetbdb";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection Error: ' . $conn->connect_error);
}
?>