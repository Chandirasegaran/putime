<?php
// Include your database connection script
include("db_connection.php");

// Initialize an array to store the response
$response = array();
// Check if the courseName is set in the POST request
if (isset($_POST['courseName'])) {
    $courseName = $_POST['courseName'];

    // Prepare the SQL query
    $query = "SELECT * FROM " . $courseName . "_subjects";

    // Execute the query
    $result = $conn->query($query);

    if ($result) {
        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            $subjects = array();

            // Fetch all rows from the result
            // Fetch all rows from the result
            while ($row = $result->fetch_assoc()) {
                // Check if the key exists before accessing it
                $code = isset($row['subjectCode']) ? $row['subjectCode'] : null;
                $name = isset($row['subjectName']) ? $row['subjectName'] : null;
                $hours = isset($row['hoursRequired']) ? $row['hoursRequired'] : null;

                // Change lab data type from number to string
                $lab = isset($row['lab']) ? strval($row['lab']) : null;

                $subjects[] = array(
                    'code' => $code,
                    'name' => $name,
                    'hours' => $hours,
                    'lab' => $lab,
                    // Include other fields as needed
                );
            }


            // Success response with course data
            $response = array(
                'status' => 'success',
                'data' => array(
                    'course_name' => $courseName,
                    'subjects' => $subjects
                )
            );
        } else {
            // No subjects found
            $response = array(
                'status' => 'error',
                'message' => 'No subjects found for the given course.'
            );
        }
    } else {
        // Error executing the query
        $response = array(
            'status' => 'error',
            'message' => 'Error executing the query: ' . $conn->error
        );
    }
} else {
    // courseName not set in POST request
    $response = array(
        'status' => 'error',
        'message' => 'Course name is required.'
    );
}

// Close the database connection
$conn->close();

// Set the content type to application/json
header('Content-Type: application/json');

// Encode and return the response as JSON
echo json_encode($response);
?>