<?php
// get_lab_subjects.php

// Assuming you have the database connection logic here
include 'db_connection.php';

$colorArray = [
    '#24d7a3',
    '#bed7ea',
    '#f5db5c',
    '#f5d6b1',
    '#e2f5c6',
    '#29ffe3',
    '#97c8c3',
    '#8db365',
    '#4aafaa',
    '#516d14',
    '#f89a9b',
    '#c8c8ab',
    '#1abc9c',
    '#9b59b6',
    '#d35400',
    '#27ae60',
    '#ffa07a'
];

if (isset($_POST['lab'])) {
    $labNumber = $_POST['lab'];

    // Fetch lab subjects based on the selected lab
    $labTableName = $currsem . "lab" . $labNumber . "_subjects";
    $labResult = $conn->query("SELECT * FROM $labTableName");

    if ($labResult->num_rows > 0) {
        // Display lab subjects in a table with alternating colors
        echo '<table border="1">
                <thead>
                    <tr>
                        <th>subjectCode</th>
                        <th>subjectName</th>
                        <th>hoursRequired</th>
                        <th>hoursRequiredDup</th>
                        <th>lab</th>
                        <th>staffName</th>
                        <th>labStaffName</th>
                        <th>stype</th>
                        <th>course name</th>
                    </tr>
                </thead>
                <tbody>';

        $colorIndex = 0;
        while ($row = $labResult->fetch_assoc()) {
            // Remove $currsem value from coursename
            $courseName = str_replace($currsem, '', $row['coursename']);

            // Check if labStaffName is "Nil" and display an empty string
            $labStaffName = ($row['labStaffName'] == "Nil") ? "" : $row['labStaffName'];

            echo "<tr style='background-color: {$colorArray[$colorIndex]}'>
                    <td>{$row['subjectCode']}</td>
                    <td>{$row['subjectName']}</td>
                    <td>{$row['hoursRequired']}</td>
                    <td>{$row['hoursRequiredDup']}</td>
                    <td>{$row['lab']}</td>
                    <td>{$row['staffName']}</td>
                    <td>{$labStaffName}</td>
                    <td>{$row['stype']}</td>
                    <td>{$courseName}</td>
                </tr>";

            // Increment color index, and reset to 0 if it exceeds the array length
            $colorIndex = ($colorIndex + 1) % count($colorArray);
        }

        echo '</tbody></table>';
    } else {
        echo 'No data found for Lab ' . $labNumber . '.';
    }

    // Close the database connection
    $conn->close();
} else {
    echo 'Lab not specified.';
}

?>
