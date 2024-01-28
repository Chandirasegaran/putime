<?php
include("db_connection.php");
include("db_connection_close.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PU Time</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php include 'navbar.php' ?>

    <!-- Select Sem -->

    <!-- Modal  without bootstrap-->
    <!-- <div class="modal fade" id="semesterModal" tabindex="-1" role="dialog" aria-labelledby="semesterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="semesterModalLabel">Choose your semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="set_semester.php" method="post">
                        <label> 
                            <input type="radio" name="semester" value="odd" checked>
                            Odd Semester
                        </label>

                        <label>
                            <input type="radio" name="semester" value="even">
                            Even Semester
                        </label>

                        <br>

                        <input type="submit" value="Choose!">
                    </form>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Modal -->
    <div class="modal fade" id="semesterModal" tabindex="-1" role="dialog" aria-labelledby="semesterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="semesterModalLabel">Choose your semester</h5>
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> -->
                </div>
                <div class="modal-body">
                    <form action="set_semester.php" method="post">
                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="semester" value="odd" id="oddRadio"
                                checked>
                            <label class="form-check-label" for="oddRadio">Odd Semester</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="semester" value="even" id="evenRadio">
                            <label class="form-check-label" for="evenRadio">Even Semester</label>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">Choose!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php
    if (isset($_COOKIE['whichsem'])) {
        echo '<div class="container mt-3"><h1>' . ucfirst($_COOKIE['whichsem']) . ' Semester</h1></div>';
    }
    ?>
    <!-- Button trigger modal -->
    <div class="container">
        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
            ADD CLASS
        </button>
        <br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <!-- Increased modal width using modal-xl for larger screens -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="create_course.php" method="post">
                            <div class="form-group">
                                <label for="CourseName">Course Name:</label>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="hasbatches" id="batches">
                                    <label class="form-check-label" for="batches">Has Batches</label>
                                </div>
                                <br>
                                <input type="text" name="coursename" class="form-control" id="CourseName"
                                    placeholder="Enter class name" required oninput="allowTextOnly(this)">
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
                                    <tr>
                                        <td><input type="text" class="form-control" name="subjectCode1" maxlength="8"
                                                Required></td>
                                        <td><input type="text" class="form-control" name="subjectName1" maxlength="50"
                                                Required></td>
                                        <td><input type="number" class="form-control" name="hoursRequired1" Required>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="no"
                                                    checked> No
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="1"> 1
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="2"> 2
                                            </div>
                                        </td>
                                        <td><button id="c_delete_row_btn" class="btn btn-danger"
                                                onclick="deleteRow(this)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Add Row Button -->
                            <button id="c_add_row_btn" class="btn btn-success float-right " onclick="addRowhc()">Add
                                Row</button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Class</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <br>
        <div>
            <?php
            include 'db_connection.php';
            // Fetch and display class details
            // $classResult =$conn->query("SELECT * FROM adminodd"); // Initialize $classResult
            $sql = ("SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven"));
            // echo $sql;
            $classResult = $conn->query($sql);

            // if ($_COOKIE['whichsem'] == "Odd") {
            //     $classResult = $conn->query("SELECT * FROM adminodd");
            // } elseif ($_COOKIE['whichsem'] == "Even") {
            //     $classResult = $conn->query("SELECT * FROM admineven");
            // }
            if ($classResult === false) {
                die("Error executing the query: " . $conn->error);
            }
            if ($classResult->num_rows > 0) {
                echo '<h2>Course Details</h2>';
                echo '<table class="table">';
                echo '<thead><tr><th>Course Name</th><th>Action</th></tr></thead>';
                echo '<tbody>';
                while ($classRow = $classResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $classRow["COURSE"] . '</td>';
                    echo '<td><button class="btn btn-danger" onclick="deleteCourse(' . "'" . $classRow["COURSE"] . "'" . ')">Delete class</button></td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo 'No Course records found.';
            }
            $conn->close();
            ?>
        </div>
        <hr noshade>

        <div class="mt-5">
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#softcoreModal">
                ADD SOFTCORE
            </button>
        </div>
        <br>
        <div class="modal fade" id="softcoreModal" tabindex="-1" role="dialog" aria-labelledby="softcoreModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <!-- Increased modal width using modal-xl for larger screens -->
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class=" modal-title " id="softcoreModalLabel">Add Softcores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="create_softcore.php" method="post">

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
                                    <tr>
                                        <td><input type="text" class="form-control" name="subjectCode1" maxlength="8"
                                                Required></td>
                                        <td><input type="text" class="form-control" name="subjectName1" maxlength="50"
                                                Required></td>
                                        <td><input type="number" class="form-control" name="hoursRequired1" Required>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="no"
                                                    checked> No
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="1"> 1
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="2"> 2
                                            </div>
                                        </td>
                                        <td><button id="c_delete_row_btn" class="btn btn-danger"
                                                onclick="deleteRow(this)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Add Row Button -->
                            <button id="c_add_row_btn" class="btn btn-success float-right " onclick="addRowsc()">Add
                                Row</button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Softcores</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <?php
            include 'db_connection.php';
            $sql = ("SELECT * FROM SOFTCORETB");
            // echo $sql;
            $SCResult = $conn->query($sql);
            if ($SCResult === false) {
                die("Error executing the query: " . $conn->error);
            }
            if ($SCResult->num_rows > 0) {
                echo '<h2>Softcore Details</h2>';
                echo '<table class="table">';
                echo '<thead><tr><th>Course Code</th><th>Course Name</th><th>Action</th></tr></thead>';
                echo '<tbody>';
                while ($SCRow = $SCResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $SCRow["subjectCode"] . '</td>';
                    echo '<td>' . $SCRow["subjectName"] . '</td>';
                    echo '<td><button class="btn btn-danger" onclick="deleteScCourse(' . "'" . $SCRow["subjectName"] . "'" . ')">Delete class</button></td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo 'No Course records found.';
            }
            $conn->close();
            ?>
        </div>


        <!-- Skill Enhancement -->
        <br>
        <hr noshade>
        <div class="mt-5">
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#seModal">
                ADD SKILL ENHANCEMENT
            </button>
        </div>
        <br>
        <div class="modal fade" id="seModal" tabindex="-1" role="dialog" aria-labelledby="seModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <!-- Increased modal width using modal-xl for larger screens -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="seModalLabel">Add Skill Enhancement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <form action="create_se.php" method="post">

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
                                    <tr>
                                        <td><input type="text" class="form-control" name="subjectCode1" maxlength="8"
                                                Required></td>
                                        <td><input type="text" class="form-control" name="subjectName1" maxlength="50"
                                                Required></td>
                                        <td><input type="number" class="form-control" name="hoursRequired1" Required>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="no"
                                                    checked> No
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="1"> 1
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="2"> 2
                                            </div>
                                        </td>
                                        <td><button id="c_delete_row_btn" class="btn btn-danger"
                                                onclick="deleteRow(this)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Add Row Button -->
                            <button id="c_add_row_btn" class="btn btn-success float-right " onclick="addRowse()">Add
                                Row</button>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create Softcores</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <?php
            include 'db_connection.php';
            $sql = ("SELECT * FROM SETB");
            // echo $sql;
            $SCResult = $conn->query($sql);
            if ($SCResult === false) {
                die("Error executing the query: " . $conn->error);
            }
            if ($SCResult->num_rows > 0) {
                echo '<h2>Skill Enhancement Details</h2>';
                echo '<table class="table">';
                echo '<thead><tr><th>Course Code</th><th>Course Name</th><th>Action</th></tr></thead>';
                echo '<tbody>';
                while ($SCRow = $SCResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $SCRow["subjectCode"] . '</td>';
                    echo '<td>' . $SCRow["subjectName"] . '</td>';
                    echo '<td><button class="btn btn-danger" onclick="deleteSeCourse(' . "'" . $SCRow["subjectName"] . "'" . ')">Delete class</button></td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo 'No Course records found.';
            }
            $conn->close();
            ?>
        </div>


    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    <script>
        let lab_count = 2;
        let subname_count = 2;
        let subcode_count = 2;
        let hoursRequiredcount = 2;
        // Function to add a new row to the table
        function addRowhc() {
            var newRow = '<tr>' +
                '<td><input type="text" class="form-control" name="subjectCode' + subcode_count + '" maxlength="8" Required></td>' +
                '<td><input type="text" class="form-control" name="subjectName' + subname_count + '" maxlength="50" Required></td>' +
                '<td><input type="number" class="form-control" name="hoursRequired' + hoursRequiredcount + '" Required></td>' +
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
            document.querySelector('#exampleModal table tbody').insertAdjacentHTML('beforeend', newRow);
            lab_count++;
            subname_count++;
            subcode_count++;
            hoursRequiredcount++;
        }



        // Soft core table

        let sclab_count = 2;
        let scsubname_count = 2;
        let scsubcode_count = 2;
        let schoursRequiredcount = 2;
        // Function to add a new row to the table
        function addRowsc() {
            var newRow = '<tr>' +
                '<td><input type="text" class="form-control" name="subjectCode' + scsubcode_count + '" maxlength="8" Required></td>' +
                '<td><input type="text" class="form-control" name="subjectName' + scsubname_count + '" maxlength="50" Required></td>' +
                '<td><input type="number" class="form-control" name="hoursRequired' + schoursRequiredcount + '" Required></td>' +
                '<td>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + sclab_count + '" value="no" checked> No' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + sclab_count + '" value="1"> 1' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + sclab_count + '" value="2"> 2' +
                '</div>' +
                '</td>' +
                '<td><button  id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                '</tr>';
            document.querySelector('#softcoreModal table tbody').insertAdjacentHTML('beforeend', newRow);
            sclab_count++;
            scsubname_count++;
            scsubcode_count++;
            schoursRequiredcount++;
        }


        // Skill Enhancement table

        let selab_count = 2;
        let sesubname_count = 2;
        let sesubcode_count = 2;
        let sehoursRequiredcount = 2;
        // Function to add a new row to the table
        function addRowse() {
            var newRow = '<tr>' +
                '<td><input type="text" class="form-control" name="subjectCode' + sesubcode_count + '" maxlength="8" Required></td>' +
                '<td><input type="text" class="form-control" name="subjectName' + sesubname_count + '" maxlength="50" Required></td>' +
                '<td><input type="number" class="form-control" name="hoursRequired' + sehoursRequiredcount + '" Required></td>' +
                '<td>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + selab_count + '" value="no" checked> No' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + selab_count + '" value="1"> 1' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + selab_count + '" value="2"> 2' +
                '</div>' +
                '</td>' +
                '<td><button  id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                '</tr>';
            document.querySelector('#seModal table tbody').insertAdjacentHTML('beforeend', newRow);
            selab_count++;
            sesubname_count++;
            sesubcode_count++;
            sehoursRequiredcount++;
        }


        // Function to delete a row
        function deleteRow(button) {
            lab_count--;
            subname_count--;
            subcode_count--;
            hoursRequiredcount--;
            var row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);
        }

        function allowTextOnly(inputField) {
            inputField.value = inputField.value.replace(/[^A-Za-z0-9-]/g, '');
            inputField.value = inputField.value.toUpperCase();
        }

        function deleteCourse(courseName) {
            console.log('Delete Course called with courseName:', courseName);
            var confirmation = confirm("Are you sure you want to delete this Course record?");
            if (confirmation) {
                // Redirect to the PHP file that handles the deletion
                window.location.href = 'delete_course.php?coursename=' + courseName;
            }
        }
        function deleteScCourse(courseName) {
            console.log('Delete Course called with courseName:', courseName);
            var confirmation = confirm("Are you sure you want to delete this Course record?");
            if (confirmation) {
                // Redirect to the PHP file that handles the deletion
                window.location.href = 'delete_sc_course.php?coursename=' + courseName;
            }
        }

        function deleteSeCourse(courseName) {
            console.log('Delete Course called with courseName:', courseName);
            var confirmation = confirm("Are you sure you want to delete this Course record?");
            if (confirmation) {
                // Redirect to the PHP file that handles the deletion
                window.location.href = 'delete_se_course.php?coursename=' + courseName;
            }
        }
        // Select Sem

        function showSemesterModal() {
            var hasCookie = <?php echo isset($_COOKIE['whichsem']) ? 'true' : 'false'; ?>;
            if (!hasCookie) {
                $('#semesterModal').modal('show');
            }
        }

        // Call the function when the page is loaded
        $(document).ready(function () {
            showSemesterModal();
        });
    </script>

</body>

</html>