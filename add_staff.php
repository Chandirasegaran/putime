<?php
// add_staff.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have a database connection
    include 'db_connection.php';
    // Collect data from the form
    $staffName = $_POST['staffName'];


//     // Start of Creating table

//     // Your SQL query to create the table
//     $sql = 'CREATE TABLE IF NOT EXISTS ' . $staffName . ' (
//     `ORDER` INT PRIMARY KEY,
//     DAY varchar(10),
//     `9_30` VARCHAR(30),
//     `10_30` VARCHAR(30),
//     `11_30` VARCHAR(30),
//     `12_30` VARCHAR(30),
//     `1_30` VARCHAR(30),
//     `2_30` VARCHAR(30),
//     `3_30` VARCHAR(30),
//     `4_30` VARCHAR(30)
// )';

//     // Perform the query
//     if ($conn->query($sql) !== TRUE) {
//         echo 'Error creating table: ' . $conn->error;
//     }

//     // Your SQL query to insert data into the table
//     $sqlInsertData = "
//     INSERT INTO `{$staffName}` (`ORDER`, DAY, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
//     VALUES 
//     (1,'MONDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
//     (2,'TUESDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
//     (3,'WEDNESDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
//     (4,'THURSDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown'),
//     (5,'FRIDAY', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown', 'unknown');
// ";

//     // Perform the query
//     if ($conn->query($sqlInsertData) !== TRUE) {
//         echo 'Error inserting data: ' . $conn->error;
//     }


//     // End of creating Table



    // Insert data into the staff table
    $insertQuery = "INSERT INTO staff (name) VALUES ('$staffName')";

    if ($conn->query($insertQuery) === TRUE) {
        // Record added successfully
        $conn->close();
        header("Location: staff.php"); // Redirect back to the staff.php page
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }

    $conn->close();
}
?>