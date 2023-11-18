<?php
include('db_connection.php');

// Fetch courses based on the selected subject type and semester
function fetchCoursesDynamic($subjectType, $semesterFilter) {
    global $conn;

    // Build the SQL query based on subject type and semester input
    $sql = "SELECT * FROM courses WHERE subject_type = '$subjectType'";
    if (!empty($semesterFilter)) {
        $sql .= " AND sem_no = $semesterFilter";
    }

    $result = $conn->query($sql);

    $courses = [];
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row; // Modify to fetch the desired fields
    }

    // Generate HTML for the updated course list
    $output = "";
    foreach ($courses as $course) {
        $output .= "<tr>";
        $output .= "<td>{$course['subject_code']}</td>";
        $output .= "<td>{$course['course']}</td>";
        $output .= "</tr>";
    }

    echo $output;
}
?>
