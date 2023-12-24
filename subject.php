<!-- course.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Subject Details - Timetable Pro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Include the navbar -->
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <!-- Add Course Button -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">Add Subject</button>

        <!-- Add Course Modal -->
        <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="addCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCourseModalLabel">Add Subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Course Form -->
                        <form method="post" action="add_subject.php">
                            <div class="form-group">
                                <label for="courseCode">Subject Code:</label>
                                <input type="text" class="form-control" id="courseCode" name="courseCode" required>
                            </div>
                            <div class="form-group">
                                <label for="courseName">Subject Name:</label>
                                <input type="text" class="form-control" id="courseName" name="courseName" required>
                            </div>
                            <div class="form-group">
                                <label for="semType">Semester Type:</label>
                                <select class="form-control" id="semType" name="semType" required>
                                    <option value="odd">Odd</option>
                                    <option value="even">Even</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="department">Course:</label>
                                <!-- Assuming you have a departments table -->
                                <?php
                                $servername = "localhost";
                                $username = "root";
                                $password = "2503";
                                $dbname = "timetablepro";

                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                $departmentQuery = "SELECT * FROM courses";
                                $departmentResult = $conn->query($departmentQuery);

                                echo '<select class="form-control" id="department" name="department" required>';
                                while ($deptRow = $departmentResult->fetch_assoc()) {
                                    echo '<option value="' . $deptRow["dept"] . '">' . $deptRow["dept"] . '</option>';
                                }
                                echo '</select>';

                                $conn->close();
                                ?>
                            </div>
                            <div class="form-group">
                            <label for="lab">Lab:</label>
                            <select class="form-control" id="lab" name="lab" required>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                            <div class="form-group">
                                <label for="credit">Credit:</label>
                                <select class="form-control" id="credit" name="credit" required>
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="priority">Priority:</label>
                                <select class="form-control" id="priority" name="priority" required>
                                    <?php
                                    for ($i = 0; $i <= 6; $i++) {
                                        echo '<option value="' . $i . '">' . $i . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- Added dropdown for subject type -->
                            <div class="form-group">
                                <label for="courseCore">Subject Type:</label>
                                <select class="form-control" id="courseCore" name="courseCore" required>
                                    <option value="hardcore">Hardcore</option>
                                    <option value="softcore">Softcore</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
// Initialize $semesterTypeFilter and $departmentFilter variables
$semesterTypeFilter = isset($_POST['semesterTypeFilter']) ? $_POST['semesterTypeFilter'] : 'all';
$departmentFilter = isset($_POST['departmentFilter']) ? $_POST['departmentFilter'] : 'all';
?>

        <!-- Filter Form -->
<form method="post" action="">
    <div class="form-group">
        <label for="semesterTypeFilter">Filter by Semester Type:</label>
        <select class="form-control" id="semesterTypeFilter" name="semesterTypeFilter">
            <option value="all" <?php if ($semesterTypeFilter == 'all') echo 'selected'; ?>>All</option>
            <option value="odd" <?php if ($semesterTypeFilter == 'odd') echo 'selected'; ?>>Odd</option>
            <option value="even" <?php if ($semesterTypeFilter == 'even') echo 'selected'; ?>>Even</option>
        </select>
    </div>
    <div class="form-group">
        <label for="departmentFilter">Filter by Department:</label>
        <?php
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $departmentQuery = "SELECT * FROM courses";
        $departmentResult = $conn->query($departmentQuery);

        echo '<select class="form-control" id="departmentFilter" name="departmentFilter">';
        echo '<option value="all" ' . ($departmentFilter == 'all' ? 'selected' : '') . '>All</option>';
        while ($deptRow = $departmentResult->fetch_assoc()) {
            echo '<option value="' . $deptRow["dept"] . '" ' . ($departmentFilter == $deptRow["dept"] ? 'selected' : '') . '>' . $deptRow["dept"] . '</option>';
        }
        echo '</select>';

        $conn->close();
        ?>
    </div>
    <button type="submit" class="btn btn-primary">Filter</button>
</form>


        <!-- Display Filtered Courses -->
        <?php
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Filter conditions
        $semesterTypeFilter = isset($_POST['semesterTypeFilter']) ? $_POST['semesterTypeFilter'] : 'all';
        $departmentFilter = isset($_POST['departmentFilter']) ? $_POST['departmentFilter'] : 'all';

        // Build the SQL query based on filters
        $sql = "SELECT * FROM subjects";
        if ($semesterTypeFilter != 'all') {
            $sql .= " WHERE sem_type = '$semesterTypeFilter'";
            if ($departmentFilter != 'all') {
                $sql .= " AND department = '$departmentFilter'";
            }
        } elseif ($departmentFilter != 'all') {
            $sql .= " WHERE department = '$departmentFilter'";
        }

        // Execute the query
        $result = $conn->query($sql);

        // Display filtered courses with delete buttons
        if ($result->num_rows > 0) {
            echo '<h2>Filtered Subjects</h2>';
            echo '<table class="table">';
            echo '<thead><tr><th>Subject Code</th><th>Subject Name</th><th>Semester Type</th><th>Course</th><th>Lab</th><th>Credit</th><th>Priority</th><th>Subject Type</th><th>Action</th></tr></thead>';
            echo '<tbody>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["course_code"] . '</td>';
                echo '<td>' . $row["course_name"] . '</td>';
                echo '<td>' . $row["sem_type"] . '</td>';
                echo '<td>' . $row["department"] . '</td>';
                echo '<td>' . $row["lab"] . '</td>';
                echo '<td>' . $row["credit"] . '</td>';
                echo '<td>' . $row["priority"] . '</td>';
                echo '<td>' . $row["course_core"] . '</td>'; // Added column
                echo '<td><button class="btn btn-danger" onclick="deleteCourse(' . $row["course_id"] . ')">Delete</button></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo 'No courses found.';
        }

        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript function for course deletion -->
    <script>
        function deleteCourse(courseId) {
            var confirmation = confirm("Are you sure you want to delete this course?");
            if (confirmation) {
                // Redirect to the PHP file that handles the deletion
                window.location.href = 'delete_course.php?course_id=' + courseId;
            }
        }
    </script>
</body>
</html>
