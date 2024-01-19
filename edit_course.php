<?php
include("db_connection.php");

$courseName = isset($_POST["coursename"]) ? $_POST["coursename"] : null;

// Check if the course name is set and not empty
if (!empty($courseName)) {

    // Fetch rows from the dynamically named table
    $sql = "SELECT subjectCode, subjectName, hoursRequired, lab FROM " . $courseName . "_Subjects";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        echo 'Error accessing table: ' . $conn->error;
    }
} else {
    echo 'Course name not provided.';
}

include 'db_connection_close.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Subject List</title>
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

</head>

<body>
    <header><h1 id="coursename" ><?php echo $courseName;?></h1></header>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Subject Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form for editing subject details -->
                    <form id="editForm" action="update_subject.php" method="post">
                        <div class="form-group">
                            <label for="editSubjectCode">Subject Code:</label>
                            <input type="text" id="editSubjectCode" name="subjectCode" class="form-control"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="editSubjectName">Subject Name:</label>
                            <input type="text" id="editSubjectName" name="subjectName" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="editHoursRequired">Hours Required:</label>
                            <input type="text" id="editHoursRequired" name="hoursRequired" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="editLab">Lab:</label>
                            <input type="text" id="editLab" name="lab" class="form-control">
                        </div>
                        <div class="form-group" hidden >
                            <input type="text" id="courseName" name="courseName" value="<?php echo $courseName;?>" placeholder="<?php echo $courseName;?>"  class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Hours Required</th>
                <th>Lab</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display fetched rows in the table
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['subjectCode'] . '</td>';
                    echo '<td>' . $row['subjectName'] . '</td>';
                    echo '<td>' . $row['hoursRequired'] . '</td>';
                    echo '<td>' . $row['lab'] . '</td>';
                    echo '<td><button type="button" class="btn btn-warning" onclick="editRow(\'' . $row['subjectCode'] . '\', \'' . $row['subjectName'] . '\', \'' . $row['hoursRequired'] . '\', \'' . $row['lab'] . '\')" data-toggle="modal" data-target="#editModal">Edit</button></td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr><td colspan="5">No subjects available</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <!-- JavaScript for editing -->

    <script>
        function editRow(subjectCode, subjectName, hoursRequired, lab) {
            // Set values in the modal form
            document.getElementById('editSubjectCode').value = subjectCode;
            document.getElementById('editSubjectCode').value = subjectCode;
            document.getElementById('editSubjectName').value = subjectName;
            document.getElementById('editHoursRequired').value = hoursRequired;
            document.getElementById('editLab').value = lab;
            console.log(subjectCode, subjectName, hoursRequired, lab);
            // Show the modal
            $('#editModal').modal('show');
        }
    </script>

</body>

</html>
