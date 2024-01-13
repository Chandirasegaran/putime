<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['className']) && !empty($_POST['className'])) {
    // Retrieve form data
    $className = $_POST['className'];
    $subjectCodes = $_POST['subjectCode'];
    $subjectNames = $_POST['subjectName'];
    $hoursRequired = $_POST['hoursRequired'];
    $labs = $_POST['lab'];

    // Database connection
    include 'db_connection.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create new timetable table
    $table_name = $className . "_" . time(); // Use a unique table name
    $create_table_query = "CREATE TABLE $table_name (
        subjectCode VARCHAR(8),
        subjectName VARCHAR(20),
        hoursRequired INT,
        lab VARCHAR(2)
    )";

    if ($conn->query($create_table_query) === TRUE) {
        // Insert data into the new table
        $insert_data_query = "INSERT INTO $table_name (subjectCode, subjectName, hoursRequired, lab) VALUES ";

        for ($i = 0; $i < count($subjectCodes); $i++) {
            if (!empty($subjectCodes[$i]) && !empty($subjectNames[$i]) && !empty($hoursRequired[$i]) && isset($labs[$i])) {
                $insert_data_query .= "('" . $subjectCodes[$i] . "', '" . $subjectNames[$i] . "', " . $hoursRequired[$i] . ", '" . $labs[$i] . "')";
                if ($i < count($subjectCodes) - 1) {
                    $insert_data_query .= ",";
                }
            }
        }

        if (!empty($insert_data_query)) {
            if ($conn->query($insert_data_query) === TRUE) {
                // Insert table name into the admin table if classname is not empty
                $insert_admin_table_query = "INSERT INTO admin_table (classname) VALUES ('$className') ON DUPLICATE KEY UPDATE classname=VALUES(classname)";
                $conn->query($insert_admin_table_query);
            }
        }
    }

    $conn->close();
}
?>