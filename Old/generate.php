<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Generate - Timetable Pro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Include the navbar -->
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <!-- Display Number of Departments and Department Names -->
        <h2>Number of Departments</h2>
        
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

        // Query to get the number of departments
        $departmentCountQuery = "SELECT COUNT(*) AS count FROM courses";
        $departmentCountResult = $conn->query($departmentCountQuery);

        if ($departmentCountResult->num_rows > 0) {
            $row = $departmentCountResult->fetch_assoc();
            $numberOfDepartments = $row["count"];

            echo '<p>Number of Departments: ' . $numberOfDepartments . '</p>';
        } else {
            echo '<p>No departments found.</p>';
            $conn->close();
            exit();  // Exit if no departments are found
        }

        // Query to get department names
        $departmentNamesQuery = "SELECT dept FROM courses";
        $departmentNamesResult = $conn->query($departmentNamesQuery);

        if ($departmentNamesResult->num_rows > 0) {
            $departmentNames = array();
            $lab = array(); // Initialize the lab array
            $hardcore = array(); // Initialize the hardcore array
            $softcore = array(); // Initialize the softcore array

            // Fetch department names and store in the array
            while ($deptRow = $departmentNamesResult->fetch_assoc()) {
                $departmentNames[] = $deptRow["dept"];

                // Query to get the number of labs for each department
                $labCountQuery = "SELECT COUNT(*) AS lab_count FROM subjects WHERE department = '" . $deptRow["dept"] . "' AND lab = 'yes'";
                $labCountResult = $conn->query($labCountQuery);

                if ($labCountResult->num_rows > 0) {
                    $labRow = $labCountResult->fetch_assoc();
                    $lab[$deptRow["dept"]] = $labRow["lab_count"];
                } else {
                    // If no labs are found, set the count to 0
                    $lab[$deptRow["dept"]] = 0;
                }

                // Query to get the number of hardcore courses for each department
                $hardcoreCountQuery = "SELECT COUNT(*) AS hardcore_count FROM subjects WHERE department = '" . $deptRow["dept"] . "' AND course_core = 'hardcore'";
                $hardcoreCountResult = $conn->query($hardcoreCountQuery);

                if ($hardcoreCountResult->num_rows > 0) {
                    $hardcoreRow = $hardcoreCountResult->fetch_assoc();
                    $hardcore[$deptRow["dept"]] = $hardcoreRow["hardcore_count"];
                } else {
                    // If no hardcore courses are found, set the count to 0
                    $hardcore[$deptRow["dept"]] = 0;
                }

                // Query to get the number of softcore courses for each department
                $softcoreCountQuery = "SELECT COUNT(*) AS softcore_count FROM subjects WHERE department = '" . $deptRow["dept"] . "' AND course_core = 'softcore'";
                $softcoreCountResult = $conn->query($softcoreCountQuery);

                if ($softcoreCountResult->num_rows > 0) {
                    $softcoreRow = $softcoreCountResult->fetch_assoc();
                    $softcore[$deptRow["dept"]] = $softcoreRow["softcore_count"];
                } else {
                    // If no softcore courses are found, set the count to 0
                    $softcore[$deptRow["dept"]] = 0;
                }
            }

            // Output department names and lab counts
            echo '<h2>Department Names and Lab, Hardcore, Softcore Counts</h2>';
            echo '<ul>';
            foreach ($departmentNames as $dept) {
                echo '<li>' . $dept . ': ' . $lab[$dept] . ' Labs, ' . $hardcore[$dept] . ' Hardcore, ' . $softcore[$dept] . ' Softcore</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>No department names found.</p>';
        }

        $conn->close();
        ?>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
