<?php
include 'db_connection.php';

$sql = "SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven");
$classResult = $conn->query($sql);

if ($classResult === false) {
    die("Error executing the query: " . $conn->error);
}

if ($classResult->num_rows > 0) {
    while ($classRow = $classResult->fetch_assoc()) {
        $tableName = $classRow["COURSE"]."_subjects";
        $sql = "UPDATE " . $tableName . " SET staffName = '', labStaffName = ''";
        $conn->query($sql);
    }}
    $conn->close();
    header("Location: truncate_table.php");
    ?>