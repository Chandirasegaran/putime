<!-- assign.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Assign Staff - Timetable Pro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    
    <!-- Include the navbar -->
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <!-- Assign Staff Content -->
        <h2>Assign Staff</h2>

        <!-- Display Assign Form -->
        <form method="post" action="process_assign.php">
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Staff Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php
                // Assuming you have a database connection
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "timetablepro";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch course details
                $courseQuery = "SELECT * FROM course";
                $courseResult = $conn->query($courseQuery);

                echo '<tbody>';
                while ($courseRow = $courseResult->fetch_assoc()) {
                    echo '<tr';

                    // Check if staff name is already assigned for the course
                    $assignedQuery = "SELECT * FROM assign WHERE course_code = '" . $courseRow["course_code"] . "'";
                    $assignedResult = $conn->query($assignedQuery);

                    if ($assignedResult->num_rows > 0) {
                        // Staff name is already assigned, highlight the row with light green
                        echo ' style="background-color: lightgreen;"';
                    }

                    echo '>';

                    // Display course details
                    echo '<td>' . $courseRow["course_code"] . '</td>';
                    echo '<td>' . $courseRow["course_name"] . '</td>';

                    echo '<td>';
                    // Dropdown for staff names
                    echo '<select class="form-control" name="staffName[' . $courseRow["course_code"] . ']">';
                    echo '<option value="" selected disabled>Select Staff</option>'; // Empty option

                    // Assuming you have a staff table
                    $staffQuery = "SELECT name FROM staff";
                    $staffResult = $conn->query($staffQuery);

                    while ($staffRow = $staffResult->fetch_assoc()) {
                        $selected = ($assignedResult->num_rows > 0 && $staffRow["name"] == $assignedResult->fetch_assoc()["staff_name"]) ? 'selected' : '';
                        echo '<option value="' . $staffRow["name"] . '" ' . $selected . '>' . $staffRow["name"] . '</option>';
                    }

                    echo '</select>';
                    echo '</td>';
                    echo '<td><button type="submit" class="btn btn-primary" name="submit" value="' . $courseRow["course_code"] . '">Assign</button></td>';
                    echo '</tr>';
                }
                echo '</tbody>';

                $conn->close();
                ?>
            </table>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
