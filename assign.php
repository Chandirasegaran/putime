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

    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <form method="post" action="assign.php">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="departmentFilter">Department</label>
                    <select class="form-control" id="departmentFilter" name="departmentFilter">
                        <option value="all" <?php echo (isset($departmentFilter) && $departmentFilter === 'all') ? 'selected' : ''; ?>>All Departments</option>
                        <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "2503";
                        $dbname = "timetablepro";

                        $conn = new mysqli($servername, $username, $password, $dbname);

                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $departmentQuery = "SELECT * FROM department";
                        $departmentResult = $conn->query($departmentQuery);

                        while ($departmentRow = $departmentResult->fetch_assoc()) {
                            echo '<option value="' . $departmentRow["dept"] . '" ' . (isset($departmentFilter) && $departmentFilter === $departmentRow["dept"] ? 'selected' : '') . '>' . $departmentRow["dept"] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="semesterFilter">Semester</label>
                    <select class="form-control" id="semesterFilter" name="semesterFilter">
                        <option value="all" <?php echo (isset($semesterFilter) && $semesterFilter === 'all') ? 'selected' : ''; ?>>All Semesters</option>
                        <option value="odd" <?php echo (isset($semesterFilter) && $semesterFilter === 'odd') ? 'selected' : ''; ?>>Odd</option>
                        <option value="even" <?php echo (isset($semesterFilter) && $semesterFilter === 'even') ? 'selected' : ''; ?>>Even</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <button type="submit" class="btn btn-primary mt-4">Apply Filter</button>
                </div>
            </div>
        </form>

        <h2>Assign Staff</h2>

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
                <tbody>
                    <?php
                    $departmentFilter = isset($_POST['departmentFilter']) ? $_POST['departmentFilter'] : 'all';
                    $semesterFilter = isset($_POST['semesterFilter']) ? $_POST['semesterFilter'] : 'all';

                    $filterQuery = "SELECT * FROM course WHERE 1";

                    if ($departmentFilter !== 'all') {
                        $filterQuery .= " AND department = '$departmentFilter'";
                    }

                    if ($semesterFilter !== 'all') {
                        $filterQuery .= " AND sem_type = '$semesterFilter'";
                    }

                    $courseResult = $conn->query($filterQuery);

                    while ($courseRow = $courseResult->fetch_assoc()) {
                        echo '<tr';

                        $assignedQuery = "SELECT * FROM assign WHERE course_code = '" . $courseRow["course_code"] . "'";
                        $assignedResult = $conn->query($assignedQuery);

                        if ($assignedResult->num_rows > 0) {
                            echo ' style="background-color: lightgreen;"';
                        }

                        echo '>';

                        echo '<td>' . $courseRow["course_code"] . '</td>';
                        echo '<td>' . $courseRow["course_name"] . '</td>';

                        echo '<td>';
                        echo '<select class="form-control" name="staffName[' . $courseRow["course_code"] . ']">';
                        echo '<option value="" selected disabled>Select Staff</option>';

                        $assignedStaffName = '';
                        if ($assignedResult->num_rows > 0) {
                            $assignedRow = $assignedResult->fetch_assoc();
                            $assignedStaffName = $assignedRow["staff_name"];
                        }

                        $staffQuery = "SELECT name FROM staff";
                        $staffResult = $conn->query($staffQuery);

                        while ($staffRow = $staffResult->fetch_assoc()) {
                            $selected = ($staffRow["name"] == $assignedStaffName) ? 'selected' : '';
                            echo '<option value="' . $staffRow["name"] . '" ' . $selected . '>' . $staffRow["name"] . '</option>';
                        }

                        echo '</select>';
                        echo '</td>';
                        echo '<td><button type="submit" class="btn btn-primary" name="submit" value="' . $courseRow["course_code"] . '">Assign</button></td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
