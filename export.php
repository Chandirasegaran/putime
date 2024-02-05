<?php
include 'navbar.php';
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merged Table</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Check the value of the 'whichsem' cookie -->
        <?php
        $whichSemCookie = $_COOKIE['whichsem'];
        $adminTable = ($whichSemCookie === 'odd') ? 'adminodd' : 'admineven';

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
                facultyName VARCHAR(255),   
                stype VARCHAR(255),
                theory VARCHAR(255)
            )";
        $conn->query($sqlCreateTable);

        // Get the list of table names from the 'adminodd' table
        $sqlGetTableNames = "SELECT CONCAT(course, '_subjects') AS tableName FROM $adminTable";
        $resultGetTableNames = $conn->query($sqlGetTableNames);

        if ($resultGetTableNames->num_rows > 0) {
            while ($row = $resultGetTableNames->fetch_assoc()) {
                $subjectTableWithSuffix = $row['tableName'];
                $coursenamewithtrim = str_replace(['odd', 'even', '_subjects'], '', trim($subjectTableWithSuffix));

                // Merge data from individual subject tables into 'merged_table'
                $sqlMergeData = "INSERT INTO $mergedTable (facultyName, stype, theory)
                                    SELECT staffName, stype AS stype, CONCAT(subjectCode, ' - ', subjectName) AS theory
                                    FROM $subjectTableWithSuffix";
                $conn->query($sqlMergeData);

                $sqlMergeData = "INSERT INTO $mergedTable (facultyName, stype, theory)
                                    SELECT labStaffName, stype AS stype, CONCAT(subjectCode, ' - ', subjectName) AS theory
                                    FROM $subjectTableWithSuffix";
                $conn->query($sqlMergeData);
            }
        }
        ?>

        <!-- Display the merged_table data in a Bootstrap table with rowspan and sorted by faculty name -->
        <h2>PONDICHERRY UNIVERSITY</h2>
        <h3>COMPUTER SCIENCE DEPARTMENT</h3>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1">S.no</th> <!-- Adjust column width here -->
                    <th class="col-2">Faculty Name</th>
                    <th class="col-2">Hardcore/Softcore</th> <!-- Adjust column width here -->
                    <th class="col-4">Subject</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query the merged_table to retrieve data sorted by faculty name
                $sqlGetData = "SELECT facultyName, stype, theory FROM $mergedTable ORDER BY facultyName ASC";
                $resultGetData = $conn->query($sqlGetData);

                if ($resultGetData->num_rows > 0) {
                    $prevFacultyName = '';
                    $serial = 1;
                    while ($row = $resultGetData->fetch_assoc()) {
                        echo "<tr>";
                        if ($prevFacultyName != $row["facultyName"]) {
                            echo "<td rowspan='1'>" . $serial++ . "</td>";
                            echo "<td rowspan='1'>" . $row["facultyName"] . "</td>";
                            $prevFacultyName = $row["facultyName"];
                        } else {
                            echo "<td rowspan='1'></td>";
                            echo "<td rowspan='1'></td>";
                        }
                        // echo "<td rowspan='1'></td>";
                        echo "<td rowspan='1'>" . ($row["stype"] === 'hc' ? 'Hardcore' : 'Softcore') . "</td>";
                        echo "<td>" . $row["theory"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Display tables based on names obtained from $adminTable -->
    <div class="container mt-5">
        <?php
        // Fetch table names from $adminTable
        $sqlGetTableNamesFromAdmin = "SELECT course AS tableName FROM $adminTable";
        $resultTableNames = $conn->query($sqlGetTableNamesFromAdmin);

        if ($resultTableNames->num_rows > 0) {
            while ($tableRow = $resultTableNames->fetch_assoc()) {
                $tableName = $tableRow['tableName'];

                // Display the table name
                echo "<h4>Course: " . str_replace(['odd', 'even', '_subjects'], '', trim($tableName)) . "</h4>";

                // Fetch and display data for each table
                $sqlGetData = "SELECT * FROM $tableName";
                $resultData = $conn->query($sqlGetData);

                if ($resultData && $resultData->num_rows > 0) {
                    echo "<table class='table table-bordered'><thead><tr>";

                    // Fetching column names for headers
                    $columns = array_keys($resultData->fetch_assoc());
                    foreach ($columns as $column) {
                        echo "<th>" . $column . "</th>";
                    }
                    echo "</tr></thead><tbody>";

                    // Reset pointer to the first row
                    $resultData->data_seek(0);

                    // Output data of each row
                    while ($row = $resultData->fetch_assoc()) {
                        echo "<tr>";
                        foreach ($row as $rowData) {
                            echo "<td>" . $rowData . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</tbody></table> <br>";

                    // Fetch and display data for each table
                    $sqlGetData = "SELECT subjectCode, subjectName, lab, stype, staffName, labStaffName FROM $tableName" . "_subjects";
                    $resultData = $conn->query($sqlGetData);

                    if ($resultData && $resultData->num_rows > 0) {
                        echo "<table class='table table-bordered'><thead><tr>";

                        // Fetching column names for headers
                        // $columns = ["Subject Code", "Subject Name", "Lab", "Type", "Staff Name"];
                        $columns = ["CODE ", "COURSE TITLE", "LAB", "H/S", "FACULTY", "FACULTY2"];
                        foreach ($columns as $column) {
                            echo "<th>" . $column . "</th>";
                        }
                        echo "</tr></thead><tbody>";

                        // Output data of each row
                        while ($row = $resultData->fetch_assoc()) {
                            echo "<tr>";
                            foreach ($row as $rowData) {
                                echo "<td>" . $rowData . "</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</tbody></table> <br>";
                    } else {
                        echo "No data available for table " . $tableName . "<br>";
                    }
                }
            }
        }
        ?>
        <div class="facultyTimetable">
            <!-- <h2>PONDICHERRY UNIVERSITY</h2>
            <h3>COMPUTER SCIENCE DEPARTMENT</h3>
            <br> -->

            <?php
            // // Fetch staff names
            // $sqlGetStaffNames = "SELECT NAME FROM staff";
            // $resultStaffNames = $conn->query($sqlGetStaffNames);

            // if ($resultStaffNames->num_rows > 0) {
            //     while ($staffRow = $resultStaffNames->fetch_assoc()) {
            //         $staffName = $staffRow['NAME'];
            //         echo "<h4>Staff: $staffName</h4>";

            //         // Initialize an array to store the staff timetable
            //         $staffTimetable = array();

            //         // Iterate over all tables with the suffix "_subjects" to find staff's courses
            //         $sqlGetCourses = "SHOW TABLES LIKE '%_subjects'";
            //         $resultCourses = $conn->query($sqlGetCourses);

            //         while ($tableRow = $resultCourses->fetch_assoc()) {
            //             $subjectTableName = $tableRow['Tables_in_putimetbdb (%_subjects)'];

            //             // Fetch the staff's courses from the subject table using a partial match
            //             $sqlGetStaffCourses = "SELECT * FROM $subjectTableName WHERE staffName LIKE '%$staffName%'";
            //             $resultStaffCourses = $conn->query($sqlGetStaffCourses);

            //             // Merge the timetable data
            //             while ($timetableRow = $resultStaffCourses->fetch_assoc()) {
            //                 $staffTimetable[] = $timetableRow;
            //             }
            //         }

            //         // Display the staff timetable in a table
            //         if (!empty($staffTimetable)) {
            //             echo "<table class='table table-bordered'>";
            //             // Add table header
            //             echo "<thead><tr>";
            //             foreach (array_keys($staffTimetable[0]) as $columnName) {
            //                 echo "<th>$columnName</th>";
            //             }
            //             echo "</tr></thead>";

            //             // Add table body
            //             echo "<tbody>";
            //             foreach ($staffTimetable as $timetableRow) {
            //                 echo "<tr>";
            //                 foreach ($timetableRow as $value) {
            //                     echo "<td>$value</td>";
            //                 }
            //                 echo "</tr>";
            //             }
            //             echo "</tbody>";

            //             echo "</table><br>";
            //         } else {
            //             echo "No courses found for $staffName.<br>";
            //         }
            //     }
            // } else {
            //     echo "No staff found.<br>";
            // }
            ?>
            <script>
                function staffmat(staffname) {
                    for (let i = 0; i < 5; i++) {
                        for (let j = 0; j < 8; j++) {
                            //document.getElementById(staffname+i+j)
                            let staffnamearr1 = []
                            let staffnamearr2 = document.querySelectorAll('.table' + i.toString() + j.toString());
                            let staffnamearrsf1 = []
                            let staffnamearrsf2 = document.querySelectorAll('.labStaffName' + i.toString() + j.toString());
                            
                            staffnamearr2.forEach(function(element) {
                                staffnamearr1.push(element.innerText);
                            });
                            staffnamearrsf2.forEach(function(element) {
                                staffnamearrsf1.push(element.innerText);
                            });
                            console.log(staffnamearrsf1);
                            var index = staffnamearr1.indexOf(staffname);
                            var index1=staffnamearrsf1.indexOf(staffname);
                            if (index != -1 ||index1 !=-1) {
                                document.getElementById(staffname + i + j).innerText = document.getElementsByClassName("lab" + i + j)[0].innerHTML;
                                console.log(staffnamearr1);

                                // console.log(document.getElementsByClassName("lab" + i + j)[0]);
                            }
                        }
                    }
                }
            </script>
        </div>

        <!-- fETCH faculty TABLE -->
        <div class="stb">
            <?php
            include 'db_connection.php';
            $scheduleResult = $conn->query("SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven"));

            // echo '<H1 class="mt-5">Final Schedule</H1>
            //             <h2>Class Schedule</h2>';
            if ($scheduleResult->num_rows > 0) {
                while ($classRow = $scheduleResult->fetch_assoc()) {

                    $discourse = $classRow["COURSE"];
                    $sql = "SELECT * FROM `$discourse`";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        echo '<h1 id="currentcourse" class="mt-5" hidden>' . $discourse . '</h1>';

                        echo '<table class="table table-bordered" hidden>';
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
                                    echo '<div class="lab' . $i . $j . '">';
                                    if ($labResult->num_rows > 0) {
                                        while ($labRow = $labResult->fetch_assoc()) {
                                            echo $columnValue;
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

            // Fetch all staff names
            $sqlGetStaff = "SELECT DISTINCT name FROM staff";
            $resultStaff = $conn->query($sqlGetStaff);
            echo '<br><br><h1>Faculty Time Table</h1><hr>';
            if ($resultStaff->num_rows > 0) {
                while ($staffRow = $resultStaff->fetch_assoc()) {
                    $staffName = $staffRow['name'];

                    echo "<h4>Timetable for $staffName</h4>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead>";
                    echo "<tr><th>SL.NO.</th><th>DAYS</th><th>9.30-10.30</th><th>10.30-11.30</th><th>11.30-12.30</th><th>12.30-1.30</th><th>1.30-2.30</th><th>2.30-3.30</th><th>3.30-4.30</th><th>4.30-5.30</th></tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
                    foreach ($days as $index => $day) {
                        echo "<tr>";
                        echo "<td>" . ($index + 1) . "</td>"; // SL.NO.
                        echo "<td>$day</td>";

                        // Loop through each time slot, assuming 9.30 as start and using 10 slots as an example
                        for ($slotIndex = 1; $slotIndex < 9; $slotIndex++) {
                            $startHour = 9 + intdiv($slotIndex, 2); // Integer division to increment hour every 2 slots
                            $startMinute = ($slotIndex % 2) * 30; // Alternate between 0 and 30 minutes
                            $endHour = $startHour + ($startMinute + 30 >= 60 ? 1 : 0); // Increment hour if end time is on the next hour
                            $endMinute = ($startMinute + 30) % 60; // Cycle minutes between 0 and 30

                            // Format time slots for display
                            $startTime = sprintf("%d.%02d", $startHour, $startMinute);
                            $endTime = sprintf("%d.%02d", $endHour, $endMinute);



                            echo "<td id=" . $staffName . ($index + 1) . $slotIndex . ">";

                            echo "</td>";



                            // $staffQuery = "SELECT staffName FROM {$discourse}_subjects WHERE subjectCode = '$columnValue'";
                            //                         $staffResult = $conn->query($staffQuery);
                            //                         echo '<td ><div class="table' . $i . $j . '">';
                            //                         if ($staffResult->num_rows > 0) {
                            //                             while ($staffRow = $staffResult->fetch_assoc()) {
                            //                                 echo $staffRow['staffName'];
                            //                             }
                            //                         } else {
                            //                             echo '';
                            //                         }
                        }

                        echo "</tr>";
                    }
                    echo "<script>staffmat('" . $staffName . "')</script>";
                    echo "</tbody>";
                    echo "</table>";



                    // Faculty Time Table



                    $staffName = $staffRow['name'];
                    // echo "<h4>Staff: $staffName</h4>";
                    echo "<br>";

                    // Initialize an array to store the staff timetable
                    $staffTimetable = array();

                    // Iterate over all tables with the suffix "_subjects" to find staff's courses
                    $sqlGetCourses = "SHOW TABLES LIKE '%_subjects'";
                    $resultCourses = $conn->query($sqlGetCourses);

                    while ($tableRow = $resultCourses->fetch_assoc()) {
                        $subjectTableName = $tableRow['Tables_in_putimetbdb (%_subjects)'];

                        // Fetch the staff's courses from the subject table using a partial match
                        $sqlGetStaffCourses = "SELECT * FROM $subjectTableName WHERE staffName LIKE '%$staffName%'";
                        $resultStaffCourses = $conn->query($sqlGetStaffCourses);

                        // Merge the timetable data
                        while ($timetableRow = $resultStaffCourses->fetch_assoc()) {
                            $staffTimetable[] = $timetableRow;
                        }
                        $sqlGetStaffCourses = "SELECT * FROM $subjectTableName WHERE labStaffName LIKE '%$staffName%'";
                        $resultStaffCourses = $conn->query($sqlGetStaffCourses);

                        // Merge the timetable data
                        while ($timetableRow = $resultStaffCourses->fetch_assoc()) {
                            $staffTimetable[] = $timetableRow;
                        }
                    }


                    // Display the staff timetable in a table
                    if (!empty($staffTimetable)) {
                        echo "<table class='table table-bordered'>";
                        // Add table header
                        echo "<thead><tr>";
                        foreach (array_keys($staffTimetable[0]) as $columnName) {
                            echo "<th>$columnName</th>";
                        }
                        echo "</tr></thead>";

                        // Add table body
                        echo "<tbody>";
                        foreach ($staffTimetable as $timetableRow) {
                            echo "<tr>";
                            foreach ($timetableRow as $value) {
                                echo "<td>$value</td>";
                            }
                            echo "</tr>";
                        }
                        echo "</tbody>";

                        echo "</table><br>";
                    } else {
                        echo "No courses found for $staffName.<br>";
                    }
                    // dfggfgdgdf
                    echo "<hr>";
                    echo "<br><br>";
                }
            } else {
                echo "No staff found.";
            }


            ?>
            <div class="LabTimetable">
                <!-- Add empty timetable templates for 4 labs -->
                <!-- Add empty timetable templates for 4 labs -->
                <?php
                $scheduleResult = $conn->query("SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven"));
                // echo '<H1 class="mt-5">Final Schedule</H1>
                // <h2>Class Schedule</h2>';
                if ($scheduleResult->num_rows > 0) {
                    while ($classRow = $scheduleResult->fetch_assoc()) {

                        $discourse = $classRow["COURSE"];

                        // Fetch the data for the selected course
                        $sql = "SELECT * FROM `$discourse`";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Display the fetched data in a table format without dropdowns

                            // echo '<h1 id="currentcourse" class="mt-5">' . $discourse . '</h1>';


                            echo '<table class="table table-bordered " style="display:none">';
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
                                        $staff_Query = "SELECT subjectCode FROM {$discourse}_subjects WHERE subjectCode = '$columnValue'";
                                        $staff_Result = $conn->query($staff_Query);
                                        echo '<td ><div class="tablecel' . $i . $j . '">';
                                        if ($staff_Result->num_rows > 0) {
                                            while ($staff_Row = $staff_Result->fetch_assoc()) {
                                                echo $staff_Row['subjectCode'];
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
                                        echo '<div class="labcel' . $i . $j . '" >';
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
                for ($lab = 1; $lab <= 4; $lab++) {
                    echo "<h4>Lab $lab Timetable</h4>";
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th>SL.NO.</th><th>DAYS</th>";

                    // Generate column headers for time slots
                    $timeSlots = ["9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
                    foreach ($timeSlots as $slot) {
                        echo "<th>$slot</th>";
                    }

                    echo "</tr></thead>";
                    echo "<tbody>";

                    // Generate rows for days (adjust the number of days as needed)
                    $days = ['MONDAY', 'TUESDAY', 'WEDNESDAY', 'THURSDAY', 'FRIDAY'];
                    foreach ($days as $index => $day) {
                        echo "<tr>";
                        echo "<td>" . ($index + 1) . "</td>"; // SL.NO.
                        echo "<td>$day</td>";

                        // Generate empty cells for each day and time slot
                        foreach ($timeSlots as $slotIndex => $slot) {
                            // Create unique id for each cell
                            $cellId = "lab" . $lab . ($index + 1) . ($slotIndex + 1);
                            echo "<td id='$cellId'>";
                            echo "</td>";
                        }

                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                }
                ?>
                <script>
                    labvalue();

                    function labvalue() {
                        for (let lab = 1; lab < 4; lab++) {
                            for (let i = 1; i < 8; i++) {
                                for (let j = 1; j < 5; j++) {
                                    var className = 'labcel' + i + j;
                                    var labcode = 'tablecel' + i + j;
                                    // Select elements with the constructed class name
                                    var labElements = document.querySelectorAll('.' + className);
                                    var labElements1 = document.querySelectorAll('.' + labcode);

                                    // Initialize an empty array to store the innerText values
                                    var labValues = [];
                                    var labValues1 = [];

                                    // Loop through the NodeList and push innerText values into the array
                                    labElements.forEach(function(element) {
                                        labValues.push(element.innerText);
                                    });

                                    labElements1.forEach(function(element) {
                                        labValues1.push(element.innerText);
                                    });

                        console.log(labValues); 
                        if(labValues.includes(lab.toString()))
                        {
                            var index = labValues.indexOf(lab.toString());
                            document.getElementById('lab'+lab.toString()+i.toString()+j.toString()).innerText=labValues1[index];
                        }
                    }
                }
            }
        }
    </script>
</div>
        </div>

        <div class="d-flex justify-content-center">
            <script>
                function prt() {
                    document.getElementById('btnhid').style.display = 'none';
                    window.print();
                    location.reload();
                }
            </script>
            <button type="button" id="btnhid" class="btn btn-primary col-3" onclick="prt()">Print</button>
        </div>
        <pre><br></pre>
    </div>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>


<?php
include 'db_connection_close.php';
?>