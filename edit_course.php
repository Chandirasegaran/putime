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
        <tbody>
        <?php
// Display fetched rows in the table
if ($result && $result->num_rows > 0) {
    echo '<form action="update_subject.php" method="post">';
    echo '<input type="hidden" name="courseName" value="' . $courseName . '">';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td> <input  type="text" placeholder="' . $row['subjectCode'] . '"></td>';
        echo '<td> <input name="subjectName" type="text"  placeholder="' . $row['subjectName'] . '"></td>';
        echo '<td> <input name="hoursRequired" type="number"  placeholder="' . $row['hoursRequired'] . '"></td>';
        echo '<td> <input name="lab" type="text"  placeholder="' . $row['lab'] . '"></td>';
        echo '</tr>';
    }

    echo '<td><button type="submit" class="btn btn-primary">Save Changes</button></td>';
    echo '</form>';
} 
else {
    echo '<tr><td colspan="5">No subjects available</td></tr>';
}
?>
        </tbody>
    </table>
    <!-- JavaScript for editing -->
    <script>
    </script>
</body>
</html>