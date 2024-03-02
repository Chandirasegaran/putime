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
for ($i = 1; $i <= 4; $i++) {
    $tableName = $baseTableName . $i;

    $result = $conn->query("SELECT * FROM $tableName");

    echo "<h2>$tableName</h2>";

    if ($result->num_rows > 0) {
        echo '<table border="1">';
        echo '<tr><th>Column1</th><th>Column2</th><!-- Add more headers as needed --></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['column1'] . '</td>';
            echo '<td>' . $row['column2'] . '</td>';
            // Add more columns as needed
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>No records found in ' . $tableName . '</p>';
    }
}

$conn->close();
}
