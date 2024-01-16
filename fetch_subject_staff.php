<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    $course = $conn->real_escape_string($_POST['course']);
    
    // Fetch subject details based on the selected course
    $subjectQuery = "SELECT subjectCode, subjectName, hoursRequired, lab FROM " . $course . "_subjects";
    $subjectResult = $conn->query($subjectQuery);

    // Fetch staff names
    $staffQuery = "SELECT DISTINCT name FROM staff";
    $staffResult = $conn->query($staffQuery);

    // Build HTML for the subject details, staff names, hoursRequired, and lab table
    $tableHtml = '<table class="table table-bordered">';
    $tableHtml .= '<thead><tr><th>Subject Code</th><th>Subject Name</th><th>Staff Name</th><th>Hours Required</th><th>Lab</th></tr></thead>';
    $tableHtml .= '<tbody>';

    while ($subjectRow = $subjectResult->fetch_assoc()) {
        $tableHtml .= '<tr>';
        $tableHtml .= '<td>' . $subjectRow['subjectCode'] . '</td>';
        $tableHtml .= '<td>' . $subjectRow['subjectName'] . '</td>';
        $tableHtml .= '<td><select class="custom-select" name="staffName">';
        
        // Add an initial option with value "Select"
        $tableHtml .= '<option value="">Select</option>';

        // Reset the data pointer to the beginning of the staff result set
        $staffResult->data_seek(0);

        // Populate dropdown with staff names
        while ($staffRow = $staffResult->fetch_assoc()) {
            $tableHtml .= '<option value="' . $staffRow['name'] . '">' . $staffRow['name'] . '</option>';
        }

        $tableHtml .= '</select></td>';
        $tableHtml .= '<td>' . $subjectRow['hoursRequired'] . '</td>';
        $tableHtml .= '<td>' . $subjectRow['lab'] . '</td>';
        $tableHtml .= '</tr>';
    }

    $tableHtml .= '</tbody>';
    $tableHtml .= '</table>';

    echo $tableHtml;
}

$conn->close();
?>
