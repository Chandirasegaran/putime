<?php
include 'db_connection.php';

$sql = "SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven");
$classResult = $conn->query($sql);

if ($classResult === false) {
    die("Error executing the query: " . $conn->error);
}

if ($classResult->num_rows > 0) {
    while ($classRow = $classResult->fetch_assoc()) {
        $tableName = $classRow["COURSE"];
        $truncateSql = "TRUNCATE TABLE `$tableName`";

        // Truncate the table
        if ($conn->query($truncateSql) === true) {
            echo "Table '$tableName' truncated.<br>";

            // Insert data into truncated table
            $insertSql = "INSERT INTO `$tableName` (`ORDER`, DAY, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
                VALUES 
                (1,'MONDAY', '', '', '', '', '', '', '', ''),
                (2,'TUESDAY', '', '', '', '', '', '', '', ''),
                (3,'WEDNESDAY', '', '', '', '', '', '', '', ''),
                (4,'THURSDAY', '', '', '', '', '', '', '', ''),
                (5,'FRIDAY', '', '', '', '', '', '', '', '')";

            // Execute the insert SQL query
            if ($conn->query($insertSql) === true) {
                echo "Data inserted into table '$tableName'.<br>";
            } else {
                echo "Error inserting data into table '$tableName': " . $conn->error . "<br>";
            }
        } else {
            echo "Error truncating table '$tableName': " . $conn->error . "<br>";
        }
    }
} else {
    echo 'No Course records found.';
}
for ($lab = 1; $lab <= 4; $lab++) {
    // Generate table name dynamically with semester
    $tableName = $currsem . "lab" . $lab;

    // Truncate the table
    $truncateQuery = "TRUNCATE TABLE $tableName";
    $conn->query($truncateQuery);

    // Insert values into the table
    $insertQuery = "INSERT INTO $tableName (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
                    VALUES
                    (1, 'MONDAY', '', '', '', '', '', '', '', ''),
                    (2, 'TUESDAY', '', '', '', '', '', '', '', ''),
                    (3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
                    (4, 'THURSDAY', '', '', '', '', '', '', '', ''),
                    (5, 'FRIDAY', '', '', '', '', '', '', '', '')";

    $conn->query($insertQuery);
}
$conn->close();
header("Location: index.php");
?>
