<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    // Assuming you have a database connection
    include 'db_connection.php';

    $course = $_POST['course'];

    $sql = "SELECT * FROM `$currsem$course`";
    $result = $conn->query($sql);
    setcookie("currentCourse", $course, time() + 76000, '/');

    if ($result->num_rows > 0) {
        // Add a unique ID for this table
        echo '<h1 id="currentcourse" onmouseover="hourCheck()">' . str_replace(array('even', 'odd'), '', $course) . '</h1>';
        $tableID = 'hidetable';
        echo '<table id="' . $tableID . '" class="table table-bordered" style="display:none" >';
        $timeSlots = ["SL.NO.", "DAYS", "9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
        echo '<thead>';
        echo '<tr>';
        foreach ($timeSlots as $timeSlot) {
            echo '<th>' . $timeSlot . '</th>';
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        $rowNumber = 1; // Counter for row numbers
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $rowNumber++ . '</td>'; // SL.NO.
            echo '<td>' . $row["DAY"] . '</td>'; // DAYS

            // Loop through the time slots and display values
            foreach ($row as $columnName => $columnValue) {
                if ($columnName !== 'ORDER' && $columnName !== 'DAY') {
                    echo '<td>' . $columnValue . '</td>';
                }
            }

            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';

        // Add a hide button for the table
        echo '<input type="checkbox" id="hideCheckbox" onchange="hideTable1()">
        <label for="hideCheckbox">Show Table</label>';
    }

    // Fetch the data for the selected course
    $sql = "SELECT * FROM `$currsem$course`";
    $result = $conn->query($sql);
    setcookie("currentCourse", $course, time() + 76000, '/');

    if ($result->num_rows > 0) {

        // Display the fetched data in a table format with dropdowns
        // echo '<h1 id="currentcourse" onmouseover="hourCheck()">' . $course . '</h1>';


        echo '<table class="table table-bordered">';
        $timeSlots = ["SL.NO.", "DAYS", "9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
        echo '<thead>';
        echo '<tr>';
        foreach ($timeSlots as $timeSlot) {
            echo '<th>' . $timeSlot . '</th>';
        }
        echo '</tr>';
        echo '</thead>';
        echo '<tbody onmouseover="generatematrix()" >';

        $rowNumber = 1; // Counter for row numbers
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $rowNumber++ . '</td>'; // SL.NO.
            echo '<td>' . $row["DAY"] . '</td>'; // DAYS
            $i = 1;

            // Loop through the time slots and generate dropdowns
            foreach ($row as $columnName => $columnValue) {
                if ($columnName !== 'ORDER' && $columnName !== 'DAY') {
                    echo '<td>';

                    echo '<select id="' . "select" . $row["ORDER"] . $i . '" class="form-control ' . "sel" . $row["ORDER"] . $i . '" name="' . $course . $row["ORDER"] . $i . '" onchange="callCheck()" onclick="staffcheck(\'' . $row["ORDER"]. $i .'\')">';

                    //onclick="removesel('.$row["ORDER"] . $i.')"

                    // Add an initial option with value "Select"
                    echo '<option value="">Select</option>';

                    // Fetch and populate dropdown options with values from $course."_subjects" table
                    $subjectResult = $conn->query("SELECT * FROM {$currsem}{$course}_subjects");
                    $ai = 0;
                    $count = 0;
                    while ($subjectRow = $subjectResult->fetch_assoc()) {
                        $selected = ($subjectRow["subjectCode"] == $columnValue) ? 'selected' : '';
                        echo '<option style="background-color:' . $colorArray[$count++] . '; color:black; " value="' . $subjectRow["subjectCode"] . '" ' . $selected . ' id="' . $row["ORDER"] . $i . $ai++ . '">' . $subjectRow["subjectCode"] . '</option>';
                    }

                    echo '</select>';
                    echo '</td>';
                    $i++;
                }
            }
            if ($i == 9) {
                $i = 1;
            }

            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        echo ' <input class="btn btn-primary mt-5" type="submit" value="Store it to Database">';
    } else {
        echo 'No data found for the selected course.';
    }

    // if($currsem=="Odd"){
    // $scheduleResult = $conn->query("SELECT * FROM adminodd");    }
    // else if($currsem=="Even"){
    // $scheduleResult = $conn->query("SELECT * FROM admineven");    }
    $baseTableName = $currsem == "odd" ? "oddlab" : "evenlab";

// Loop to generate and query tables
for ($ilab = 1; $ilab <= 4; $ilab++) {
    $tableName = $baseTableName . $ilab;
    if($currsem.$course==$tableName)
    {
        continue;
    }
    $result = $conn->query("SELECT * FROM $tableName");

    if ($result->num_rows > 0) {
        echo '<h1 id="currentcourse" class="mt-5">' . str_replace(array('even', 'odd'), '', $tableName) .  '</h1>';
        echo '<table class="table table-bordered">';
        $timeSlots = ["SL.NO.", "DAYS", "9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
        // Table header
        echo '<thead>';
        echo '<tr>';
        foreach ($timeSlots as $timeSlot) {
            echo '<th>' . $timeSlot . '</th>';
        }
        echo '</tr>';
        echo '</thead>';
        $timeSlots = ["SL.NO.", "DAYS", "9_30", "10_30", "11_30", "12_30", "1_30", "2_30", "3_30", "4_30"];
        // Table body
        echo '<tbody>';
        $i=1;
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            $j=1;
            foreach ($timeSlots as $timeSlot) {
                if ($timeSlot == "SL.NO.") {
                    echo '<td>' . $row['ORDER'] . '</td>';
                    
                } elseif ($timeSlot == "DAYS") {
                    echo '<td>' . $row['DAY'] . '</td>';
                } else {
                    // echo '<td>' . $row[$timeSlot] . '</td>';
                    // Display other columns based on $timeSlot
                    $staffQuery = "SELECT staffName FROM {$tableName}_subjects WHERE subjectCode = '$row[$timeSlot]'";
                            $staffResult = $conn->query($staffQuery);
                            echo '<td ><div class="table' . $i . $j . '">';
                            if ($staffResult->num_rows > 0) {
                                while ($staffRow = $staffResult->fetch_assoc()) {
                                    echo $staffRow['staffName'];
                                }
                            } else {
                                echo '';
                            }
                            echo '</div>';

                            $labst2 = "SELECT labStaffName FROM {$tableName}_subjects WHERE subjectCode = '$row[$timeSlot]'";
                            $labResultst2 = $conn->query($labst2);
                            echo '<div class="labStaffName' . $i . $j . '">';
                            if ($labResultst2->num_rows > 0) {
                                while ($labRowst2 = $labResultst2->fetch_assoc()) {
                                    if ($labRowst2['labStaffName'] != "") {
                                        echo $labRowst2['labStaffName'];
                                    }
                                }
                            } else {
                                echo '';
                            }
                            echo '</div>';

                            $labQuery = "SELECT lab FROM {$tableName}_subjects WHERE subjectCode = '$row[$timeSlot]'";
                            $labResult = $conn->query($labQuery);
                            echo '<div class="lab' . $i . $j . '" >';
                            if ($labResult->num_rows > 0) {
                                while ($labRow = $labResult->fetch_assoc()) {
                                    echo $labRow['lab'];
                                }
                            } else {
                                echo '';
                            }
                            $j++;
                            echo '</div></td>';
                }
            }
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<p>No records found in ' . $tableName . '</p>';
    }
}

$conn->close();
}
