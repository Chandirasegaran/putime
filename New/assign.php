<?php
include("db_connection.php");
include("db_connection_close.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PU Time</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container mt-5">
        <h2>Class Schedule</h2>

        <?php
        // Fetch and display the class schedule
        $scheduleResult = $conn->query("SELECT * FROM admin");
        
        if ($scheduleResult->num_rows > 0) {
            while ($classRow = $scheduleResult->fetch_assoc()) {
                echo '<h3>' . $classRow["COURSE"] . '</h3>';
                
                // Display the 5x8 matrix table
                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Days/Time</th>';
                
                // Display column names
                $timeSlots = ["9.30-10.30", "10.30-11.30", "11.30-12.30", "12.30-1.30", "1.30-2.30", "2.30-3.30", "3.30-4.30", "4.30-5.30"];
                foreach ($timeSlots as $timeSlot) {
                    echo '<th>' . $timeSlot . '</th>';
                }
                
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                
                // Display row names and generate empty cells
                $days = ["MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY"];
                foreach ($days as $day) {
                    echo '<tr>';
                    echo '<td>' . $day . '</td>';
                    foreach ($timeSlots as $timeSlot) {
                        echo '<td></td>';
                    }
                    echo '</tr>';
                }
                
                echo '</tbody>';
                echo '</table>';
            }
        } else {
            echo 'No class records found.';
        }

        $conn->close();
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
