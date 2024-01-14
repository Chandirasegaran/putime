<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    // Assuming you have a database connection
    include 'db_connection.php';

    $course = $_POST['course'];
    echo '<script>alert("' . $_POST['course'] . '");</script>';

    // Fetch the data for the selected course
    $sql = "SELECT * FROM `$course`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the fetched data in a simple table format
        echo '<table class="table table-bordered">';
        $timeSlots = ["SL.NO.","DAYS","9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
                foreach ($timeSlots as $timeSlot) {
                    echo '<th>' . $timeSlot . '</th>';
                }

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            foreach ($row as $column) {
                echo '<td>' . $column . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No data found for the selected course.';
    }

    $conn->close();
}
?>
