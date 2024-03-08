<?php

include 'db_connection.php';
$curcourse = $currsem.$_COOKIE['currentCourse'];
$curcoursem = $_COOKIE['currentCourse'];
// Define the days and time slots
$days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
$timeSlots = ['9_30', '10_30', '11_30', '12_30', '1_30', '2_30', '3_30', '4_30'];

// Create and drop the table
$location="";
for ($order = 1; $order <= 5; $order++) {
    foreach (['9_30', '10_30', '11_30', '12_30', '1_30', '2_30', '3_30', '4_30'] as $timeSlot) {
        // Fetch data from the current course table ($curcourse)
        $sql = "SELECT $timeSlot FROM $curcourse WHERE `ORDER` = $order";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cellValue = $row[$timeSlot];

            // Check if the cell value is not empty
            if (!empty($cellValue)) {
                // Split the value using the last underscore
                $parts = explode('_', $cellValue);
                $course = $parts[0];
                $location = strtolower($parts[1]); // Convert $location to lowercase
                // echo "UPDATE {$currsem}{$location} SET $timeSlot = '$course' WHERE `ORDER` = $order";
                // Update the location table using the obtained order value and $currsem
                $updateSql = "UPDATE {$currsem}{$location} SET $timeSlot = '' WHERE `ORDER` = $order";
                if($conn->query($updateSql))
                {
                    echo "SUCCESS";
                }
            } else if($location!="")
            {
                // If the cell is empty, insert an empty value into the location table
                $updateSql = "UPDATE {$currsem}{$location} SET $timeSlot = '' WHERE `ORDER` = $order";

                $conn->query($updateSql);
            }
        }
    }
}
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
        $fieldName = $curcoursem . ($i + 1) . $j;
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
$location="";
for ($order = 1; $order <= 5; $order++) {
    foreach (['9_30', '10_30', '11_30', '12_30', '1_30', '2_30', '3_30', '4_30'] as $timeSlot) {
        // Fetch data from the current course table ($curcourse)
        $sql = "SELECT $timeSlot FROM $curcourse WHERE `ORDER` = $order";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $cellValue = $row[$timeSlot];

            // Check if the cell value is not empty
            if (!empty($cellValue)) {
                // Split the value using the last underscore
                $lastUnderscorePos = strrpos($cellValue, '_');
                if ($lastUnderscorePos !== false) {
                    // Extract the parts before and after the last underscore
                    $course = substr($cellValue, 0, $lastUnderscorePos);
                    $location = strtolower(substr($cellValue, $lastUnderscorePos + 1));
                } // Convert $location to lowercase
                // echo "UPDATE {$currsem}{$location} SET $timeSlot = '$course' WHERE `ORDER` = $order";
                // Update the location table using the obtained order value and $currsem
                $updateSql = "UPDATE {$currsem}{$location} SET $timeSlot = '$course' WHERE `ORDER` = $order";
                // echo "UPDATE {$currsem}{$location} SET $timeSlot = '$course' WHERE `ORDER` = $order<br>";
                if($conn->query($updateSql))
                {
                    echo "SUCCESS";
                }
            } else if($location!="")
            {
                // If the cell is empty, insert an empty value into the location table
                $updateSql = "UPDATE {$currsem}{$location} SET $timeSlot = '' WHERE `ORDER` = $order";

                $conn->query($updateSql);
            }
        }
    }
}

include 'db_connection_close.php';
header('Location: sl.php');
?>