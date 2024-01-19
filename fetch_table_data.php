<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    // Assuming you have a database connection
    include 'db_connection.php';

    $course = $_POST['course'];
    echo '<script>alert("' . $_POST['course'] . '");</script>';

  
    // Fetch the data for the selected course
    $sql = "SELECT * FROM `$course`";
    $result = $conn->query($sql);
    setcookie("currentCourse",$course,time()+7600,'/');

    if ($result->num_rows > 0) {
        // Display the fetched data in a table format with dropdowns
        echo '<h1 id="currentcourse">'.$course.'</h1>';

        echo '<table class="table table-bordered">';
        $timeSlots = ["SL.NO.","DAYS","9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
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
            $i=1;
            
            // Loop through the time slots and generate dropdowns
            foreach ($row as $columnName => $columnValue) {
                if ($columnName !== 'ORDER' && $columnName !== 'DAY') {
                    echo '<td>';
                    echo '<select class="form-control '. "sel".$row["ORDER"] . $i .'" name="' . $course . $row["ORDER"] . $i . '">';
                    //onclick="removesel('.$row["ORDER"] . $i.')"
                    
                    // Add an initial option with value "Select"
                    echo '<option value="">Select</option>';
                    
                    // Fetch and populate dropdown options with values from $course."_subjects" table
                    $subjectResult = $conn->query("SELECT * FROM {$course}_subjects");
                    $ai=0;
                    while ($subjectRow = $subjectResult->fetch_assoc()) {
                        $selected = ($subjectRow["subjectCode"] == $columnValue) ? 'selected' : '';
                        echo '<option value="' . $subjectRow["subjectCode"] . '" ' . $selected . ' id="'.$row["ORDER"].$i.$ai++.'">' . $subjectRow["subjectCode"] . '</option>';
                    }
                    
                    echo '</select>';
                    echo '</td>';
                    $i++;
                }
            }
            if($i==9){
                $i=1;
            }

            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';

        echo ' <input class="btn btn-primary mt-5" type="submit" value="Store it to Database">';

    } else {
        echo 'No data found for the selected course.';
    }
    $scheduleResult = $conn->query("SELECT * FROM admin");
    echo'<H1 class="mt-5">Final Schedule</H1>
    <h2>Class Schedule</h2>';
    if ($scheduleResult->num_rows > 0) {
        while ($classRow = $scheduleResult->fetch_assoc()) {
    
            $discourse = $classRow["COURSE"];
                if($discourse==$course)
                {
                    continue;
                }        
            // Fetch the data for the selected course
            $sql = "SELECT * FROM `$discourse`";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
                // Display the fetched data in a table format without dropdowns
                echo '<h1 id="currentcourse" class="mt-5">' . $discourse . '</h1>';
    
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
                $i=0;
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    $i++;
                    echo '<td>' . $rowNumber++ . '</td>'; // SL.NO.
                    echo '<td>' . $row["DAY"] . '</td>'; // DAYS
    
                    // Loop through the time slots and display values
                    $j=1;
                    foreach ($row as $columnName => $columnValue) {
                        if ($columnName !== 'ORDER' && $columnName !== 'DAY') {
                            // Fetch staff name from $discourse."_subjects" table using $columnValue
                            $staffQuery = "SELECT staffName FROM {$discourse}_subjects WHERE subjectCode = '$columnValue'";
                            $staffResult = $conn->query($staffQuery);
    
                            echo '<td class="table'.$i.$j++.'">';
                            if ($staffResult->num_rows > 0) {
                                while ($staffRow = $staffResult->fetch_assoc()) {
                                    echo $staffRow['staffName'];
                                }
                            } else {
                                echo '';
                            }
                            echo '</td>';
                        }
                    }
    
                    echo '</tr>';
                }
    
                echo '</tbody>';
                echo '</table>';
                $i=0;
                
            } else {
                echo 'No data found for the selected course.';
            }
        }
    }
    $conn->close();
}
?>
