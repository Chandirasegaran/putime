<?php
// delete_staff.php
$regno = $_GET['REGNO'];

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['regno'])) {
    // Assuming you have a database connection
    include 'db_connection.php';
    // Collect registration number from the query parameters
    $regno = $_GET['regno'];

    // Delete the staff record from the staff table
    $deleteQuery = "DELETE FROM staff WHERE REGNO = $regno";

    if ($conn->query($deleteQuery) === TRUE) {
        // Record deleted successfully

        // Update regno sequence to fill any gaps
        $updateQuery = "SET @count = 0";
        $conn->query($updateQuery);

        $updateQuery = "UPDATE staff SET staff.REGNO = @count:= @count + 1";
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
