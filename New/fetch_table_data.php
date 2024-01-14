<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    // Assuming you have a database connection
    include 'db_connection.php';

    $course = $_POST['course'];
    // echo '<script>alert("' . $_POST['course'] . '");</script>';

    // Fetch the data for the selected course
    $sql = "SELECT * FROM `$course`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the fetched data in a table format with dropdowns
        echo '<table class="table table-bordered">';
        $timeSlots = ["SL.NO.","DAYS","9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
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

            // Loop through the time slots and generate dropdowns
            for ($i = 1; $i <= 8; $i++) {
                echo '<td>';
                echo '<select class="form-control" id="' . $course . $row["ORDER"] . $i . '">';
                
                // Add a default option "Unknown"
                echo '<option value="Unknown">Unknown</option>';

                // Fetch and populate dropdown options with subjects for the selected course
                $subjectResult = $conn->query("SELECT * FROM {$course}_Subjects");
                while ($subjectRow = $subjectResult->fetch_assoc()) {
                    echo '<option value="' . $subjectRow["subjectCode"] . '">' . $subjectRow["subjectName"] . '</option>';
                }

                echo '</select>';
                echo '</td>';
            }

            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
    } else {
        echo 'No data found for the selected course.';
    }

    $conn->close();
}
?>
