<?php
include 'move-to-top.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PU Time - Lab Schedule</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'navbar.php';
    include 'db_connection.php';

    // Fetch and display lab courses from the "admin" table based on $currsem
    $tableName = ($currsem == "odd") ? "adminodd" : "admineven";
    $tableNamesResult = $conn->query("SELECT * FROM $tableName");

    // Truncate lab_subjects tables before inserting new values
    $conn->query("TRUNCATE TABLE ${currsem}lab1_subjects");
    $conn->query("TRUNCATE TABLE ${currsem}lab2_subjects");
    $conn->query("TRUNCATE TABLE ${currsem}lab3_subjects");
    $conn->query("TRUNCATE TABLE ${currsem}lab4_subjects");

    if ($tableNamesResult->num_rows > 0) {
        while ($tableRow = $tableNamesResult->fetch_assoc()) {
            $subjectTableName = $tableRow["COURSE"] . "_subjects";
            $subjectsResult = $conn->query("SELECT * FROM $subjectTableName");

            while ($subjectRow = $subjectsResult->fetch_assoc()) {
                // Skip rows with lab value "no"
                if ($subjectRow["lab"] == "no") {
                    continue;
                }

                // Insert values into corresponding lab_subjects table
                $labTableName = "${currsem}lab" . $subjectRow["lab"] . "_subjects";
                $insertQuery = "INSERT INTO $labTableName (subjectCode, subjectName, hoursRequired, hoursRequiredDup, lab, staffName, labStaffName, stype, coursename)
                                VALUES ('{$subjectRow["subjectCode"]}', '{$subjectRow["subjectName"]}', '{$subjectRow["hoursRequired"]}', '{$subjectRow["hoursRequiredDup"]}', '{$subjectRow["lab"]}', '{$subjectRow["staffName"]}', '{$subjectRow["labStaffName"]}', '{$subjectRow["stype"]}', '{$tableRow["COURSE"]}')";
                $conn->query($insertQuery);
            }
        }
    } 
    $conn->close();
    ?>
</body>

</html>
