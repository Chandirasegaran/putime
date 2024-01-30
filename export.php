<?php
include 'navbar.php';
include 'db_connection.php';

// Check the value of the 'whichsem' cookie
$whichSemCookie = $_COOKIE['whichsem'];
$adminTable = ($whichSemCookie === 'Odd Semester') ? 'adminodd' : 'admineven';

// Define the new name of the merged table
$mergedTable = 'merged_table'; // Updated table name

// Check if 'merged_table' already exists and delete it if it does
$sqlCheckTable = "SHOW TABLES LIKE '$mergedTable'";
$resultCheckTable = $conn->query($sqlCheckTable);
if ($resultCheckTable->num_rows > 0) {
    $sqlDropTable = "DROP TABLE $mergedTable";
    $conn->query($sqlDropTable);
}

// Create the 'merged_table' with a serial number field
$sqlCreateTable = "CREATE TABLE $mergedTable (
    serialNo INT AUTO_INCREMENT PRIMARY KEY,
    subjectCode VARCHAR(255),
    subjectName VARCHAR(255),
    hoursRequired INT,
    hoursRequiredDup INT,
    lab INT,
    staffName VARCHAR(255),
    stype VARCHAR(255)
)";
$conn->query($sqlCreateTable);

// Get the list of table names from the 'adminodd' table
$sqlGetTableNames = "SELECT CONCAT(course, '_subjects') AS tableName FROM $adminTable";
$resultGetTableNames = $conn->query($sqlGetTableNames);

if ($resultGetTableNames->num_rows > 0) {
    while ($row = $resultGetTableNames->fetch_assoc()) {
        $subjectTableWithSuffix = $row['tableName'];
        
        // Merge data from individual subject tables into 'merged_table'
        $sqlMergeData = "INSERT INTO $mergedTable (subjectCode, subjectName, hoursRequired, hoursRequiredDup, lab, staffName, stype)
                         SELECT subjectCode, subjectName, hoursRequired, hoursRequiredDup, lab, staffName, stype
                         FROM $subjectTableWithSuffix";
        $conn->query($sqlMergeData);
    }
}

include 'db_connection_close.php';
?>
