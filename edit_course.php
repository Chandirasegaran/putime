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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>

<body>
    <header>
        <h1 id="coursename"><?php echo $courseName; ?></h1>
    </header>


    <!-- Table -->
    <table class="table">
        <thead>
            <tr>
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Hours Required</th>
                <th>Lab</th>
            </tr>
        </thead>
        <form id="subjectForm" action="update_subject.php" method="post">
        <tbody>
        <input type="hidden" name="courseName" value="' . $courseName . '">
            <?php
         $iter=1;
         // Display fetched rows in the table
         if ($result && $result->num_rows > 0) {     
             while ($row = $result->fetch_assoc()) {
                 echo '<tr>';
                 echo '<td> <input type="text" name="subjectCode'.$iter.'" value="' . (isset($_POST['subjectCode'.$iter]) ? $_POST['subjectCode'.$iter] : $row['subjectCode']) . '" placeholder="' . $row['subjectCode'] . '"></td>';
                 echo '<td> <input name="subjectName'.$iter.'" value="' . (isset($_POST['subjectName'.$iter]) ? $_POST['subjectName'.$iter] : $row['subjectName']) . '" type="text" placeholder="' . $row['subjectName'] . '"></td>';
                 echo '<td> <input name="hoursRequired'.$iter.'" value="' . (isset($_POST['hoursRequired'.$iter]) ? $_POST['hoursRequired'.$iter] : $row['hoursRequired']) . '" type="number" placeholder="' . $row['hoursRequired'] . '"></td>';
                 echo '<td> <input name="lab'.$iter.'" value="' . (isset($_POST['lab'.$iter]) ? $_POST['lab'.$iter] : $row['lab']) . '" type="text" placeholder="' . $row['lab'] . '"></td>';
                 echo '</tr>';
                //  echo '<div id="tbody">';
                //  echo '</div>';
                 $iter++;
             }

         }  
          else {
             echo '<tr><td colspan="5">No subjects available</td></tr>';
            }
            ?>
        </tbody>




 <input type="hidden" name="numberOfSubjects" value="' . $iter . '">';
<td><button  type="button" class="btn btn-success float-right " onclick="addRow()">AddRow</button></td>';

<td><button type="submit" class="btn btn-primary">Save Changes</button></td>';
    </table>
    </form>
</body>

    <script>
        let lab_count = 2;
        let subname_count = 2;
        let subcode_count = 2;
        let hoursRequiredcount=2;
        // Function to add a new row to the table
        function addRow() {
            var newRow = '<tr>' +
                '<td><input type="text" class="form-control" name="subjectCode' + subcode_count + '" maxlength="8" Required></td>' +
                '<td><input type="text" class="form-control" name="subjectName' + subname_count + '" maxlength="50" Required></td>' +
                '<td><input type="number" class="form-control" name="hoursRequired'+hoursRequiredcount+'" Required></td>' +
                '<td>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + lab_count + '" value="no" checked> No' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + lab_count + '" value="1"> 1' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + lab_count + '" value="2"> 2' +
                '</div>' +
                '</td>' +
                '<td><button  id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                '</tr>';
            document.querySelector('tbody').insertAdjacentHTML('beforeend', newRow);
            lab_count++;
            subname_count++;
            subcode_count++;
            hoursRequiredcount++;
        }
    </script>
</html>