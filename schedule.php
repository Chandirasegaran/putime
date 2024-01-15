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
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php include 'navbar.php' ?>

    <div class="container mt-5">

        <H1>Assign Schedule</H1>
        <div id="assign-schedule">

            <label for="listcourse">Select Your Course for Scheduling </label>
            <select class="custom-select" name="listcourse" id="listcourse" onclick="hideselect()">
            <option value="select" selected id="SelectCourseDrop">Select</option>
            <script>function hideselect(){
                document.getElementById("SelectCourseDrop").remove();
                document.getElementById("listcourse").removeAttribute("onclick");
            }
            
            </script>
                <?php
                include 'db_connection.php';
                // Fetch and display the class schedule
                $scheduleResult = $conn->query("SELECT * FROM admin");

                if ($scheduleResult->num_rows > 0) {

                    while ($classRow = $scheduleResult->fetch_assoc()) {
                        echo '<option value="' . $classRow["COURSE"] . '">' . $classRow["COURSE"] . '</option>';
                    }
                } else {
                    echo 'No class records found.';
                }

                $conn->close();
                ?>
            </select>

            <div id="subjectStaffTable" class="mt-5">
                <!-- Table for subject names and staff names will be displayed here -->
            </div>
            <br>
            <hr>
            <br>
            <div id="assigningtable">

            </div>
        </div>

        <H1>Final Schedule</H1>
        <h2>Class Schedule</h2>

        <?php
        include 'db_connection.php';
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
    <script>
        document.getElementById('listcourse').addEventListener('change', function () {
            var selectedCourse = this.value;

            // Make an AJAX request to fetch the table structure for the selected course
            $.ajax({
                type: "POST",
                url: "fetch_table_data.php",
                data: { course: selectedCourse },
                success: function (response) {
                    // Update the assigningtable div with the received table data
                    document.getElementById('assigningtable').innerHTML = response;

                    // Make another AJAX request to fetch subject names and staff names
                    $.ajax({
                        type: "POST",
                        url: "fetch_subject_staff.php",
                        data: { course: selectedCourse },
                        success: function (subjectStaffTable) {
                            // Update the subjectStaffTable div with the received table data
                            document.getElementById('subjectStaffTable').innerHTML = subjectStaffTable;
                        },
                        error: function (error) {
                            console.log("Error: " + error.responseText);
                        }
                    });
                },
                error: function (error) {
                    console.log("Error: " + error.responseText);
                }
            });
        });
    </script>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>

        // Add an event listener to the select element
        document.getElementById('listcourse').addEventListener('change', function () {
            var selectedCourse = this.value;
            // alert(selectedCourse);

            // Make an AJAX request to fetch the table structure for the selected course
            $.ajax({
                type: "POST",
                url: "fetch_table_data.php", // Adjust the path to match your file structure
                data: { course: selectedCourse },
                success: function (response) {
                    // Update the assigningtable div with the received table data
                    document.getElementById('assigningtable').innerHTML = response;
                },
                error: function (error) {
                    console.log("Error: " + error.responseText);
                }
            });
        });
    </script>
</body>

</html>