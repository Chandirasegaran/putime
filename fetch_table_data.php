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
    '#c0392b'
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    // Assuming you have a database connection
    include 'db_connection.php';

    $course = $_POST['course'];

    $sql = "SELECT * FROM `$course`";
    $result = $conn->query($sql);
    setcookie("currentCourse", $course, time() + 7600, '/');

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
    $sql = "SELECT * FROM `$course`";
    $result = $conn->query($sql);
    setcookie("currentCourse", $course, time() + 7600, '/');

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

                    echo '<select id="' . "select" . $row["ORDER"] . $i . '" class="form-control ' . "sel" . $row["ORDER"] . $i . '" name="' . $course . $row["ORDER"] . $i . '" onchange="callCheck()" onclick="staffcheck(\'sel' . $row["ORDER"].'\')">';

                    //onclick="removesel('.$row["ORDER"] . $i.')"

                    // Add an initial option with value "Select"
                    echo '<option value="">Select</option>';

                    // Fetch and populate dropdown options with values from $course."_subjects" table
                    $subjectResult = $conn->query("SELECT * FROM {$course}_subjects");
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
    $scheduleResult = $conn->query("SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven"));
    echo '<H1 class="mt-5">Final Schedule</H1>
    <h2>Class Schedule</h2>';
    if ($scheduleResult->num_rows > 0) {
        $days = ["MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY"];

        while ($classRow = $scheduleResult->fetch_assoc()) {
            $discourse = $classRow["COURSE"];
            if ($discourse == $course) {
                continue;
                // echo '<table class="table table-bordered"><thead><tr><th>SL.NO.</th><th>DAYS</th><th>9.30-10.30</th><th>10.30-11.30</th><th>11.30-12.30</th><th>12.30-1.30</th><th>1.30-2.30</th><th>2.30-3.30</th><th>3.30-4.30</th><th>4.30-5.30</th></tr></thead><tbody>';
                // for ($rowNumber = 1; $rowNumber <= 5; $rowNumber++) {
                //     echo '<tr>';
                //     echo '<td>' . $rowNumber . '</td>'; // SL.NO.
                //     echo '<td>' . $days[$rowNumber-1] . '</td>'; // DAYS
                //     for ($j = 1; $j <= 8; $j++) {
                //         echo '<td>';
                //         echo '<div class="table' . $rowNumber . $j . '"></div>';
                //         echo '<div class="labStaffName' . $rowNumber . $j . '"></div>';
                //         echo '<div class="lab' . $rowNumber . $j . '"></div>';
                //         echo '</td>';
                //     }
                //     echo '</tr>';
                // }
                // echo '</tbody></table>';
            }
            // Fetch the data for the selected course
            $sql = "SELECT * FROM `$discourse`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Display the fetched data in a table format without dropdowns

                echo '<h1 id="currentcourse" class="mt-5">' . str_replace(array('even', 'odd'), '', $discourse) .  '</h1>';


                echo '<table class="table table-bordered">';
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
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    $i++;
                    echo '<td>' . $rowNumber++ . '</td>'; // SL.NO.
                    echo '<td>' . $row["DAY"] . '</td>'; // DAYS

                    // Loop through the time slots and display values
                    $j = 1;
                    foreach ($row as $columnName => $columnValue) {
                        if ($columnName !== 'ORDER' && $columnName !== 'DAY') {
                            // Fetch staff name from $discourse."_subjects" table using $columnValue
                            $staffQuery = "SELECT staffName FROM {$discourse}_subjects WHERE subjectCode = '$columnValue'";
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

                            $labst2 = "SELECT labStaffName FROM {$discourse}_subjects WHERE subjectCode = '$columnValue'";
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

                            $labQuery = "SELECT lab FROM {$discourse}_subjects WHERE subjectCode = '$columnValue'";
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
                $i = 0;
            } else {
                echo 'No data found for the selected course.';
            }
        }
    }
    $conn->close();
}
