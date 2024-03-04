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
                        <th>staffName</th>
                        <th>labStaffName</th>
                        <th>hoursRequired</th>
                        <th>Remaining</th>
                        <th>lab</th>
                        <th>stype</th>
                        <th>course name</th>
                    </tr>
                </thead>
                <tbody>';

        $colorIndex = 0;
        $hidval=0;
        while ($row = $labResult->fetch_assoc()) {
            // Remove $currsem value from coursename
            $courseName = str_replace($currsem, '', $row['coursename']);

            // Check if labStaffName is "Nil" and display an empty string
            $labStaffName = ($row['labStaffName'] == "Nil") ? "" : $row['labStaffName'];
            $hidval++;
            echo "<tr style='background-color: {$colorArray[$colorIndex]}'>
                    <td id='s{$hidval}1'>{$row['subjectCode']}</td>
                    <td id='s{$hidval}2'>{$row['subjectName']}</td>
                    <td id='s{$hidval}3'>{$row['staffName']}</td>
                    <td id='st{$hidval}3'>{$labStaffName}</td>
                    <td id='s{$hidval}4'>{$row['hoursRequired']}</td>
                    <td id='s{$hidval}4c'></td>
                    <td id='s{$hidval}5'>{$row['lab']}</td>
                    <td id='s{$hidval}6'>{$row['stype']}</td>
                    <td id='s{$hidval}7'>{$courseName}</td>
                </tr>";

            // Increment color index, and reset to 0 if it exceeds the array length
            $colorIndex = ($colorIndex + 1) % count($colorArray);
        }   

        echo '</tbody></table>';
    } else {
        echo 'No data found for Lab ' . $labNumber . '.';
    }
    echo '<div id="hidval" style="display:none;">' . $hidval . '</div>';

    // Close the database connection
    $conn->close();
} else {
    echo 'Lab not specified.';
}

?>
