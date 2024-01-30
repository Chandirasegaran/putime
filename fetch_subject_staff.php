<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    $course = $conn->real_escape_string($_POST['course']);

    // Fetch subject details based on the selected course
    $subjectQuery = "SELECT subjectCode, subjectName, hoursRequired, lab, staffName FROM " . $course . "_subjects";
    $subjectResult = $conn->query($subjectQuery);

    // Fetch staff names
    $staffQuery = "SELECT DISTINCT name FROM staff";
    $staffResult = $conn->query($staffQuery);

    // Build HTML for the subject details, staff names, hoursRequired, and lab table
    $tableHtml = '<form method="post" action="update_staff.php">'; // Assuming the update script is named update_staff.php
    $tableHtml .= '<table class="table table-bordered" id="stab" onchange="alertstaffupdate()">';
    $tableHtml .= '<thead><tr><th>Subject Code</th><th>Subject Name</th><th>Staff Name</th><th>Hours Required</th><th>Lab</th></tr></thead>';
    $tableHtml .= '<tbody>';
    $si = 0;
    while ($subjectRow = $subjectResult->fetch_assoc()) {
        $si++;
        $tableHtml .= '<tr>';
        $tableHtml .= '<td id="s' . $si . '1">' . $subjectRow['subjectCode'] . '</td>';
        $tableHtml .= '<td id="s' . $si . '2">' . $subjectRow['subjectName'] . '</td>';
        $tableHtml .= '<td "><select id="s' . $si . '3" class="custom-select" name="staffName[' . $subjectRow['subjectCode'] . ']" >';

        // Add an initial option with value "Select"
        $tableHtml .= '<option value="">Select</option>';

        // Reset the data pointer to the beginning of the staff result set
        $staffResult->data_seek(0);

        // Populate dropdown with staff names
        while ($staffRow = $staffResult->fetch_assoc()) {
            $selected = ($staffRow['name'] == $subjectRow['staffName']) ? 'selected' : '';
            $tableHtml .= '<option  value="' . $staffRow['name'] . '" ' . $selected . '>' . $staffRow['name'] . '</option>';
        }

        $tableHtml .= '</select></td>';
        $tableHtml .= '<td id="s' . $si . '4" >' . $subjectRow['hoursRequired'] . '</td>';
        $tableHtml .= '<td id="s' . $si . '5" >' . $subjectRow['lab'] . '</td>';
        $tableHtml .= '</tr>';
    }

    $tableHtml .= '</tbody>';
    $tableHtml .= '</table>';
    $tableHtml .= '<input type="hidden" name="course" value="' . $course . '">';
    $tableHtml .= '<input class="btn btn-success"  type="submit" value="Update Staff">';
    $tableHtml .= '</form>';
    echo $tableHtml;

    echo '<div id="hidval" style="display: none;">' . $si . '</div>';

}

$conn->close();
?>