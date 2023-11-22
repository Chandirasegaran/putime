<?php
include('db_connection.php');
$selectedCourse = 'All';
$semesterFilter = 'All';
$hcscFilter = 'All';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    // Get form data
    $selectedCourse = isset($_POST['selectedCourse']) ? $_POST['selectedCourse'] : 'All';
    $selectedStaff = isset($_POST['selectedStaff']) ? $_POST['selectedStaff'] : '';
    $semesterFilter = isset($_POST['semester_filter']) ? $_POST['semester_filter'] : 'All';
    $hcscFilter = isset($_POST['hcsc_filter']) ? $_POST['hcsc_filter'] : 'All';

    // Validate form data (you may need to add more validation)
    if (!empty($selectedCourse) && !empty($selectedStaff)) {
        // Perform database insertion
        $sql = "INSERT INTO assignments (subject_code, subject_name, subject_type, sem_no, staff_code, staff_name, hcsc) 
                SELECT subject_code, subject_name, subject_type, $semesterFilter, '$selectedStaff', staff_name, '$hcscFilter'
                FROM courses
                JOIN staff ON '$selectedStaff' = staff.staff_code
                WHERE subject_code = '$selectedCourse'";

        if ($conn->query($sql) === TRUE) {
            // Redirect to avoid form resubmission on page refresh
            header('Location: index.php');
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Fetch staff names
function fetchStaff() {
    global $conn;
    $sql = "SELECT * FROM staff";
    $result = $conn->query($sql);

    $staffNames = [];
    while ($row = $result->fetch_assoc()) {
        $staffNames[] = $row; // Modify to fetch the desired fields
    }

    return $staffNames;
}

// Fetch distinct course names
function fetchDistinctCourses() {
    global $conn;
    $sql = "SELECT DISTINCT course FROM courses";
    $result = $conn->query($sql);

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row['course']; // Fetch distinct course names
    }

    return $courses;
}

// Fetch courses based on the selected semester and hcsc filter
function fetchCoursesDynamic($courseFilter, $semesterFilter, $hcscFilter) {
    global $conn;

    // Build the SQL query based on course input, semester input, and hcsc filter
    $sql = "SELECT * FROM courses WHERE 1"; // Start with a true condition

    if (!empty($courseFilter) && $courseFilter !== 'All') {
        $sql .= " AND course = '$courseFilter'";
    }

    if (!empty($semesterFilter) && $semesterFilter !== 'All') {
        $sql .= " AND sem_no = $semesterFilter";
    }

    if ($hcscFilter !== 'All') {
        $sql .= " AND hcsc = '$hcscFilter'";
    }

    $result = $conn->query($sql);

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row; // Modify to fetch the desired fields
    }

    return $courses;
}

// Rest of the code remains unchanged...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PU Time Table</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">PU Time Table</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Assign Staffs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Add/Edit Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Add/Edit Staffs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">View Staff Allocation List</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    View Time Table
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">M.Tech CS</a>
                    <a class="dropdown-item" href="#">M.Tech NIS</a>
                    <a class="dropdown-item" href="#">MCA</a>
                    <a class="dropdown-item" href="#">M.Sc.</a>
                    <a class="dropdown-item" href="#">B.Sc.</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<br>

<div class="container mt-5">
    <form method="post" action="">
        <!-- Course Dropdown -->
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="course">Course</label>
                <select class="form-control" id="course" name="selectedCourse" onchange="this.form.submit()">
                    <option value="All" <?php if ($selectedCourse === 'All') echo 'selected'; ?>>All</option>
                    <?php
                    $courses = fetchDistinctCourses();
                    foreach ($courses as $course) {
                        $selected = ($selectedCourse === $course) ? 'selected' : '';
                        echo "<option value='{$course}' $selected>{$course}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="semesterFilter">Semester</label>
                <select class="form-control" id="semesterFilter" name="semester_filter" onchange="this.form.submit()">
                    <option value="All" <?php if ($semesterFilter === 'All') echo 'selected'; ?>>All</option>
                    <option value="1" <?php if ($semesterFilter === '1') echo 'selected'; ?>>1</option>
                    <option value="2" <?php if ($semesterFilter === '2') echo 'selected'; ?>>2</option>
                    <option value="3" <?php if ($semesterFilter === '3') echo 'selected'; ?>>3</option>
                    <option value="4" <?php if ($semesterFilter === '4') echo 'selected'; ?>>4</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label for="hcscFilter">HCSC</label>
                <select class="form-control" id="hcscFilter" name="hcsc_filter" onchange="this.form.submit()">
                    <option value="All" <?php if ($hcscFilter === 'All') echo 'selected'; ?>>All</option>
                    <option value="Hardcore" <?php if ($hcscFilter === 'Hardcore') echo 'selected'; ?>>Hardcore</option>
                    <option value="Softcore" <?php if ($hcscFilter === 'Softcore') echo 'selected'; ?>>Softcore</option>
                </select>
            </div>
        </div>

        <!-- Horizontal Line -->
        
        <hr>
       
        <!-- Boxes -->
        <div class="form-row">
            <!-- Box 1 - List of Courses -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of Courses</h5>
                        <form>
                            <table class="table table-fixed">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $dynamicCourses = fetchCoursesDynamic($selectedCourse, $semesterFilter, $hcscFilter);
                                    foreach ($dynamicCourses as $course) {
                                        echo "<tr>";
                                        echo "<td><input type='radio' name='selectedCourse' value='{$course['subject_code']}'></td>";
                                        echo "<td>{$course['subject_code']}</td>";
                                        echo "<td>{$course['subject_name']}</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Box 2 - List of Staff Names -->
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List of Staff Names</h5>
                        <form>
                            <?php
                            $staffNames = fetchStaff();
                            foreach ($staffNames as $staff) {
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='radio' name='selectedStaff' id='{$staff['staff_code']}' value='{$staff['staff_code']}'>";
                                echo "<label class='form-check-label' for='{$staff['staff_code']}'>{$staff['staff_name']}</label><br>";
                                echo "</div>";
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Assign Button -->
            <div class="col-md-4 mb-3">
                <button type="submit" class="btn btn-primary btn-block"  >Assign</button>
            </div>
        </div>
    </form>

    <!-- Third Table for Assigned Staff -->
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Assigned Staff</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Semester No</th>
                        <th>Staff Code</th>
                        <th>Staff Name</th>
                        <th>HCSC</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT assignments.*, courses.subject_name AS subject_name, staff.staff_name AS staff_name 
                            FROM assignments 
                            JOIN courses ON assignments.subject_code = courses.subject_code 
                            JOIN staff ON assignments.staff_code = staff.staff_code";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['subject_code']}</td>";
                        echo "<td>{$row['subject_name']}</td>";
                        echo "<td>{$row['sem_no']}</td>";
                        echo "<td>{$row['staff_code']}</td>";
                        echo "<td>{$row['staff_name']}</td>";
                        echo "<td>{$row['hcsc']}</td>";
                        echo "<td><button class='btn btn-danger'>Delete</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
