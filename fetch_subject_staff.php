<?php
include 'db_connection.php';
$colorArray = [
    '#24d7a3',
    '#bed7ea',
    '#f5db5c',
    '#f5d6b1',
    '#e2f5c6',
    '#29ffe3',
    '#97c8c3',
    '#8db365',
    '#4aafaa',
    '#516d14',
    '#f89a9b',
    '#c8c8ab',
    '#1abc9c',
    '#9b59b6',
    '#d35400',
    '#27ae60',
    '#c0392b'
];
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course'])) {
    $course = $conn->real_escape_string($_POST['course']);

    // Fetch subject details based on the selected course
    $subjectQuery = "SELECT subjectCode, subjectName, hoursRequired, lab, staffName,labStaffName,stype FROM " . $course . "_subjects";
    $subjectResult = $conn->query($subjectQuery);

    // Fetch staff names
    $staffQuery = "SELECT DISTINCT name FROM staff";
    $staffResult = $conn->query($staffQuery);

    // Build HTML for the subject details, staff names, hoursRequired, and lab table
    $tableHtml = '<form method="post" action="update_staff.php" onmouseover="hourCheck()" >'; // Assuming the update script is named update_staff.php
    // 


    $tableHtml .= '<table class="table table-bordered" id="stab" onchange="alertstaffupdate()">';
    $tableHtml .= '<thead><tr><th>Subject Code</th><th>Subject Name</th><th>Staff Name</th><th>Hours Required</th><th>Lab</th><th>HC/SC</th></tr></thead>';
    $tableHtml .= '<tbody>';
    $si = 0;
    $colorarr = 0;
    while ($subjectRow = $subjectResult->fetch_assoc()) {


        $si++;
        $tableHtml .= '<tr style="background-color:' . $colorArray[$colorarr++] . '">';
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

        $tableHtml .= '</select>';
        if ($subjectRow['lab'] != "no") {

            $tableHtml .= '<select id="st' . $si . '3" class="custom-select" name="labStaffName[' . $subjectRow['subjectCode'] . ']" >';

            // Add an initial option with value "Select"
            $tableHtml .= '<option value="Nil">Select</option>';

            // Reset the data pointer to the beginning of the staff result set
            $staffResult->data_seek(0);

            // Populate dropdown with staff names
            while ($staffRow = $staffResult->fetch_assoc()) {
                $selected = ($staffRow['name'] == $subjectRow['labStaffName']) ? 'selected' : '';
                $tableHtml .= '<option value="' . $staffRow['name'] . '" ' . ($selected ? 'selected' : '') . '>' . $staffRow['name'] . '</option>';
            }
        }


        $tableHtml .= '</td>';

        $tableHtml .= '<td id="s' . $si . '4" >' . $subjectRow['hoursRequired'] . '</td>';
        $tableHtml .= '<td id="s' . $si . '5" >' . $subjectRow['lab'] . '</td>';
        $tableHtml .= '<td id="s' . $si . '6" >' . $subjectRow['stype'] . '</td>';
        $tableHtml .= '</tr>';
    }

    $tableHtml .= '</tbody>';
    $tableHtml .= '</table>';


    // 
    $tableHtml .= '<input type="hidden" name="course" value="' . $course . '">';
    $tableHtml .= '<input class="btn btn-success"  type="submit" value="Update Staff">';
    $tableHtml .= '</form>';
    echo $tableHtml;

    echo '<div id="hidval" style="display: none;">' . $si . '</div>';
}

$conn->close();
