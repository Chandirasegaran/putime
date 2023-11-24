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

        <!-- Display Department Dropdown and Filter Button -->
        <form method="post" action="assign.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="departmentFilter">Select Department:</label>
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

                    // Fetch department names from the assign table
                    $departmentQuery = "SELECT DISTINCT department FROM assign";
                    $departmentResult = $conn->query($departmentQuery);

                    echo '<select class="form-control" id="departmentFilter" name="departmentFilter">';
                    echo '<option value="" selected>All Departments</option>'; // Default option

                    while ($deptRow = $departmentResult->fetch_assoc()) {
                        $selected = isset($_POST['departmentFilter']) && $_POST['departmentFilter'] == $deptRow['department'] ? 'selected' : '';
                        echo '<option value="' . $deptRow["department"] . '" ' . $selected . '>' . $deptRow["department"] . '</option>';
                    }

                    echo '</select>';

                    $conn->close();
                    ?>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary mt-4">Filter</button>
                </div>
            </div>
        </form>

        <!-- Display Assign Table -->
        <form method="post" action="process_assign.php">
            <table class="table" id="assignTable">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Staff Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
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

                    // Fetch course details based on the selected department
                    $selectedDepartment = isset($_POST['departmentFilter']) ? $_POST['departmentFilter'] : '';
                    $courseQuery = "SELECT * FROM assign";

                    if (!empty($selectedDepartment)) {
                        $courseQuery .= " WHERE department = '$selectedDepartment'";
                    }

                    $courseResult = $conn->query($courseQuery);

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
                        echo '<td>' . $courseRow["staff_name"] . '</td>';
                        echo '<td><button type="submit" class="btn btn-primary" name="submit" value="' . $courseRow["course_code"] . '">Assign</button></td>';
                        echo '</tr>';
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
