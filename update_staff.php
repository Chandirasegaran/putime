<?php
include 'db_connection.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    $course = $conn->real_escape_string($_POST['course']);
    // Check if 'staffName' is set and is an array
    if (isset($_POST['staffName']) && is_array($_POST['staffName'])) {
        // Loop through the submitted staff names and update the database
        foreach ($_POST['staffName'] as $subjectCode => $selectedStaffName) {
            // Assuming $selectedStaffName is sanitized and validated before using in the query
            $selectedStaffName = $conn->real_escape_string($selectedStaffName);
            // Truncate the table
            $truncate = "TRUNCATE TABLE " . $course;
            $conn->query($truncate);

            // Insert empty values
            $empty = "INSERT INTO `" . $course . "` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
            (1, 'MONDAY', '', '', '', '', '', '', '', ''),
            (2, 'TUESDAY', '', '', '', '', '', '', '', ''),
            (3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
            (4, 'THURSDAY', '', '', '', '', '', '', '', ''),
            (5, 'FRIDAY', '', '', '', '', '', '', '', '')";
            $conn->query($empty);

            // Update the staffName column in the $course table for the specific subjectCode
            $updateQuery = "UPDATE " . $course . "_subjects SET staffName = '$selectedStaffName' WHERE subjectCode = '$subjectCode'";

            // Execute the update query
            $conn->query($updateQuery);

            // You may want to add error handling here
        }
    }

    if (isset($_POST['labStaffName']) && is_array($_POST['staffName'])) {
        echo $_POST['labStaffName'];
        // Loop through the submitted staff names and update the database
        foreach ($_POST['labStaffName'] as $subjectCode => $selectedStaffName) {
            // Assuming $selectedStaffName is sanitized and validated before using in the query
            $selectedStaffName = $conn->real_escape_string($selectedStaffName);
            // Truncate the table
            $truncate = "TRUNCATE TABLE " . $course;
            $conn->query($truncate);

            // Insert empty values
            $empty = "INSERT INTO `" . $course . "` (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`) VALUES
            (1, 'MONDAY', '', '', '', '', '', '', '', ''),
            (2, 'TUESDAY', '', '', '', '', '', '', '', ''),
            (3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
            (4, 'THURSDAY', '', '', '', '', '', '', '', ''),
            (5, 'FRIDAY', '', '', '', '', '', '', '', '')";
            $conn->query($empty);

            // Update the staffName column in the $course table for the specific subjectCode
            $updateQuerylab = "UPDATE " . $course . "_subjects SET labStaffName = '$selectedStaffName' WHERE subjectCode = '$subjectCode'";

            // Execute the update query
            $conn->query($updateQuerylab);

            // You may want to add error handling here
        }
    }
    for ($lab = 1; $lab <= 4; $lab++) {
        // Generate table name dynamically with semester
        $tableName = $currsem . "lab" . $lab;
    
        // Truncate the table
        $truncateQuery = "TRUNCATE TABLE $tableName";
        $conn->query($truncateQuery);
    
        // Insert values into the table
        $insertQuery = "INSERT INTO $tableName (`ORDER`, `DAY`, `9_30`, `10_30`, `11_30`, `12_30`, `1_30`, `2_30`, `3_30`, `4_30`)
                        VALUES
                        (1, 'MONDAY', '', '', '', '', '', '', '', ''),
                        (2, 'TUESDAY', '', '', '', '', '', '', '', ''),
                        (3, 'WEDNESDAY', '', '', '', '', '', '', '', ''),
                        (4, 'THURSDAY', '', '', '', '', '', '', '', ''),
                        (5, 'FRIDAY', '', '', '', '', '', '', '', '')";
    
        $conn->query($insertQuery);
    }

    // Redirect to the page where the form was submitted
    header("Location:index.php");
    exit();
}
$conn->close();
