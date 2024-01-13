<?php
// delete_staff.php

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['regno'])) {
    // Assuming you have a database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "timetablepro";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Collect registration number from the query parameters
    $regno = $_GET['regno'];

    // Check if the staff is assigned to any course in the assign table
    $assignedQuery = "SELECT * FROM assign WHERE staff_name IN (SELECT name FROM staff WHERE regno = $regno)";
    $assignedResult = $conn->query($assignedQuery);

    if ($assignedResult->num_rows > 0) {
        // Delete corresponding records from the assign table
        $deleteAssignQuery = "DELETE FROM assign WHERE staff_name IN (SELECT name FROM staff WHERE regno = $regno)";
        if (!$conn->query($deleteAssignQuery)) {
            echo "Error deleting records from assign table: " . $conn->error;
            $conn->close();
            exit();
        }
    }

    // Delete the staff record from the staff table
    $deleteQuery = "DELETE FROM staff WHERE regno = $regno";

    if ($conn->query($deleteQuery) === TRUE) {
        // Record deleted successfully

        // Update regno sequence to fill any gaps
        $updateQuery = "SET @count = 0";
        $conn->query($updateQuery);

        $updateQuery = "UPDATE staff SET staff.regno = @count:= @count + 1";
        $conn->query($updateQuery);

        $updateQuery = "ALTER TABLE staff AUTO_INCREMENT = 1";
        $conn->query($updateQuery);

        $conn->close();
        header("Location: staff.php"); // Redirect back to the staff.php page
        exit();
    } else {
        echo "Error deleting staff record: " . $conn->error;
    }

    $conn->close();
}
?>
