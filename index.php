<?php
include("db_connection.php");
include("db_connection_close.php");
include 'move-to-top.php';  
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <script>
        function processInput(inputField) {15

            var inputValue = inputField.value;
            var cleanedInput = inputValue.replace(/[^a-zA-Z0-9_]/g, '_');
            inputField.value = cleanedInput; // Update the input field value
        }
    </script>
    <?php include 'navbar.php' ?>
    <!-- Modal -->
    <div class="modal fade" id="semesterModal" tabindex="-1" role="dialog" aria-labelledby="semesterModalLabel" aria-hidden="true" data-backdrop="static">
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
                            <input type="radio" class="form-check-input" name="semester" value="odd" id="oddRadio" checked>
                            <label class="form-check-label" for="oddRadio">Odd Semester</label>
                        </div>

                        <div class="form-check">
                            <input type="radio" class="form-check-input" name="semester" value="even" id="evenRadio">
                            <label class="form-check-label" for="evenRadio">Even Semester</label>
                        </div>

                        <br>

                        <button type="submit" class="btn btn-primary">Set</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Get the last selected option from localStorage, default to "odd" if not set
    var lastSelectedSemester = localStorage.getItem('lastSelectedSemester') || 'odd';

    // Set the checked attribute for the corresponding radio button
    if (lastSelectedSemester === 'even') {
        document.getElementById('evenRadio').checked = true;
    } else {
        document.getElementById('oddRadio').checked = true;
    }

    // Add event listener to update last selected option in localStorage
    document.querySelectorAll('input[name="semester"]').forEach(function(radio) {
        radio.addEventListener('change', function() {
            localStorage.setItem('lastSelectedSemester', this.value);
        });
    });
</script>

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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl" role="document">
                <!-- Increased modal width using modal-xl for larger screens -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.href = 'index.php';">
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
                                <input type="text" name="coursename" class="form-control" id="CourseName" placeholder="Enter class name" required oninput="allowTextOnly(this)">
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
                                        <td><input type="text" class="form-control" name="subjectCode1" maxlength="15" oninput="processInput(this)" Required></td>
                                        <td><input type="text" class="form-control" name="subjectName1" maxlength="50" Required></td>
                                        <td><input type="number" class="form-control" name="hoursRequired1" Required>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="no" checked> No
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="1"> 1
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="2"> 2
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="3"> 3
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="4"> 4
                                            </div>
                                        </td>
                                        <td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Add Row Button -->
                            <button id="c_add_row_btn" class="btn btn-success float-right " onclick="addRowhc()">Add
                                Row</button>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'index.php';">Close</button>
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

            $sql = ("SELECT * FROM " . ($currsem == "odd" ? "adminodd" : "admineven"));
            // echo $sql;
            $classResult = $conn->query($sql);


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
                    $courseName = str_replace(['even', 'odd'], '', $classRow["COURSE"]);
                    echo '<td>' . $courseName . '</td>';
                                        echo '<td>
                    <button class="btn btn-warning" onclick="editCourse(\'' . addslashes($classRow['COURSE']) . '\')">Edit</button>
                    <button class="btn btn-success" onclick="resetScCourse(\'' . addslashes($classRow['COURSE']) . '\')">Reset Softcore</button>
                    <button class="btn btn-danger" onclick="deleteCourse(\'' . addslashes($classRow["COURSE"]) . '\')">Delete</button>
                    </td>';

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

        <!-- Edit Class Modal -->
        <div class="modal fade" id="editClassModal" tabindex="-1" role="dialog" aria-labelledby="editClassModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editClassModalLabel">Edit Class</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.href = 'index.php';">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editClassForm" action="update_edit_course.php" method="post">
                            <!-- Course Details -->
                            <div class="form-group">
                                <label for="editCourseName">Course Name:</label>
                                <input name="courseName" type="text" class="form-control" id="editCourseName" required>
                            </div>
                            <!-- Table for Hardcore subjects -->
                            <table class="table table-bordered" id="editSubjectsTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Subject Code</th>
                                        <th>Subject Name</th>
                                        <th>Hours Required</th>
                                        <th>Lab</th>
                                        <th>Type</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Rows will be added dynamically -->
                                </tbody>
                            </table>
                            <button type="button" id="ed_add_row_btn" class="btn btn-success float-right" onclick="addSubjectRow()">Add Subject</button>

                            <!-- Button to add a new row -->
                            <!-- </div> -->
                            <!-- <div class="modal-footer wt-5">
                        <button type="button" class="btn btn-secondary" onclick="refreshpage()" ; data-dismiss="modal">
                            Close</button>
                        <input class="btn btn-primary" type="submit" value="Save Changes">
                    </div> -->


                            <!-- Softcores Table -->
                            <?php
                            include 'db_connection.php';

                            // Fetch subject codes from the database table
                            $softcoreCodesQuery = $conn->query("SELECT subjectCode FROM softcoretb");
                            $softcoreCodes = array();

                            while ($row = $softcoreCodesQuery->fetch_assoc()) {
                                $softcoreCodes[] = $row['subjectCode'];
                            }

                            $conn->close();
                            ?>

                            <?php
                            include 'db_connection.php';

                            // Fetch subject names from the database table
                            $softcoreNamesQuery = $conn->query("SELECT subjectName FROM softcoretb");
                            $softcoreNames = array();

                            while ($row = $softcoreNamesQuery->fetch_assoc()) {
                                $softcoreNames[] = $row['subjectName'];
                            }

                            $conn->close();
                            ?>


                            <div class="mt-4">
                                <h5>Softcores</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="addSoftcoreTableId">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>Hours Required</th>
                                                <th>Lab</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Rows will be added dynamically -->
                                        </tbody>
                                    </table>
                                    <button type="button" id="ed_add_sc_row_btn" class="btn btn-success float-right" onclick="addSoftcoreRow()">Add Softcore</button>
                                </div>
                            </div>

                            <!-- Skill Enhancement Table -->
                            <?php
                            include 'db_connection.php';

                            // Fetch subject codes from the database table
                            $seQuery = $conn->query("SELECT subjectCode FROM setb");
                            $seCodes = array();

                            while ($row = $seQuery->fetch_assoc()) {
                                $seCodes[] = $row['subjectCode'];
                            }
                            ?>
                            <div class="mt-4">
                                <h5>Skill Enhancement</h5>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="addSkillTableId">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Subject Code</th>
                                                <th>Subject Name</th>
                                                <th>Hours Required</th>
                                                <th>Lab</th>
                                                <th>Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Rows will be added dynamically -->
                                        </tbody>
                                    </table>
                                    <button type="button" id="ed_add_se_row_btn" class="btn btn-success float-right" onclick="addSkillRow()">Add Skill Enhancement</button>
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'index.php';">Close</button>
                                <input class="btn btn-primary" type="submit" value="Save Changes">
                            </div>
                    </div>

                    </form>
                </div>
            </div>
        </div>


        <div class="mt-5">
            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#softcoreModal">
                ADD SOFTCORE
            </button>
        </div>
        <br>
        <div class="modal fade" id="softcoreModal" tabindex="-1" role="dialog" aria-labelledby="softcoreModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl" role="document">
                <!-- Increased modal width using modal-xl for larger screens -->
                <div class="modal-content">
                    <div class="modal-header ">
                        <h5 class=" modal-title " id="softcoreModalLabel">Add Softcores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.href = 'index.php';">
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
                                        <td><input type="text" class="form-control" name="subjectCode1" maxlength="15" oninput="processInput(this)" Required></td>
                                        <td><input type="text" class="form-control" name="subjectName1" maxlength="50" Required></td>
                                        <td><input type="number" class="form-control" name="hoursRequired1" Required>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="no" checked> No
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="1"> 1
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="2"> 2
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="3"> 3
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="4"> 4
                                            </div>
                                        </td>
                                        <td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Add Row Button -->
                            <button id="c_add_row_btn" class="btn btn-success float-right " onclick="addRowsc()">Add
                                Row</button>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'index.php';">Close</button>
                        <button type="submit" class="btn btn-primary">Create Softcores</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div>
            <script>
        function hideTable1(idname,idname1) {
            // console.log(idname,idname1)
        var hideCheckbox = document.getElementById(idname);
        var table = document.getElementById(idname1);
        
        if (hideCheckbox.checked) {
            table.style.cssText = ""; 
          
        } else {
            table.style.display = "none";
        }
    }
            </script>
            <?php
            include 'db_connection.php';
            $sql = ("SELECT * FROM SOFTCORETB");
            // echo $sql;
            $SCResult = $conn->query($sql);
            if ($SCResult === false) {
                die("Error executing the query: " . $conn->error);
            }
            if ($SCResult->num_rows > 0) {
                echo '<input type="checkbox" id="checkbox_sf" onchange="hideTable1(\'checkbox_sf\',\'table_sf\')">
                <label for="checkbox_sf">SHOW SOFTCORE LIST</label>';
                echo '<h2 >Softcore Details</h2>';
                echo '<table class="table" id="table_sf" style="display:none">';
                echo '<thead><tr><th>Course Code</th><th>Course Name</th><th>Action</th></tr></thead>';
                echo '<tbody>';
                while ($SCRow = $SCResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $SCRow["subjectCode"] . '</td>';
                    echo '<td>' . $SCRow["subjectName"] . '</td>';
                    echo '<td><button class="btn btn-danger" onclick="deleteScCourse(' . "'" . $SCRow["subjectName"] . "'" . ')">Delete</button></td>';
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
        <div class="modal fade" id="seModal" tabindex="-1" role="dialog" aria-labelledby="seModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog modal-xl" role="document">
                <!-- Increased modal width using modal-xl for larger screens -->
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="seModalLabel">Add Skill Enhancement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="location.href = 'index.php';">
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
                                        <td><input type="text" class="form-control" name="subjectCode1" oninput="processInput(this)" maxlength="15" Required></td>
                                        <td><input type="text" class="form-control" name="subjectName1" maxlength="50" Required></td>
                                        <td><input type="number" class="form-control" name="hoursRequired1" Required>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="no" checked> No
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="1"> 1
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="2"> 2
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="3"> 3
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" class="form-check-input" name="lab1" value="4"> 4
                                            </div>

                                        </td>
                                        <td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Add Row Button -->
                            <button id="c_add_row_btn" class="btn btn-success float-right " onclick="addRowse()">Add
                                Row</button>

                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = 'index.php';">Close</button>
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
                echo '<input type="checkbox" id="checkbox_skill" onchange="hideTable1(\'checkbox_skill\',\'hidsel\')">
                <label for="checkbox_skill">SHOW SOFTCORE LIST</label>';
                echo '<h2>Skill Enhancement Details</h2>';
                echo '<table class="table" id="hidsel" style="display:none">';
                echo '<thead><tr><th>Course Code</th><th>Course Name</th><th>Action</th></tr></thead>';
                echo '<tbody>';
                while ($SCRow = $SCResult->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $SCRow["subjectCode"] . '</td>';
                    echo '<td>' . $SCRow["subjectName"] . '</td>';
                    echo '<td><button class="btn btn-danger" onclick="deleteSeCourse(' . "'" . $SCRow["subjectName"] . "'" . ')">Delete</button></td>';
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


    <script>
        let lab_count = 2;
        let subname_count = 2;
        let subcode_count = 2;
        let hoursRequiredcount = 2;
        // Function to add a new row to the table
        function addRowhc() {
            var newRow = '<tr>' +
                '<td><input type="text" class="form-control" name="subjectCode' + subcode_count + '" maxlength="15" oninput="processInput(this)" Required></td>' +
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
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + lab_count + '" value="3"> 3' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + lab_count + '" value="4"> 4' +
                '</div>' +
                '</td>' +

                // '<td><input type="text" class="form-control" value="hc" name="type' + subname_count + '" ></td>' +


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
                '<td><input type="text" class="form-control" name="subjectCode' + scsubcode_count + '" maxlength="15" oninput="processInput(this)" Required></td>' +
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
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + sclab_count + '" value="3"> 3' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + sclab_count + '" value="4"> 4' +
                '</div>' +
                '</td>' +
                '<td><input type="text" class="form-control" value="sc" name="type' + scsubcode_count + '" ></td>' +

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
                '<td><input type="text" class="form-control" name="subjectCode' + sesubcode_count + '" maxlength="15" oninput="processInput(this)" Required></td>' +
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
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + selab_count + '" value="3"> 3' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + selab_count + '" value="4"> 4' +
                '</div>' +
                '</td>' +
                '<td><input type="text" class="form-control" value="se" name="type' + sesubcode_count + '" ></td>' +

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
            inputField.value = inputField.value.replace(/[^A-Za-z0-9-_]/g, '');
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
        $(document).ready(function() {
            showSemesterModal();
        });

        let editcount = 1;

        function editCourse(courseName) {
            console.log(courseName)
            // Use AJAX to fetch course details
            jQuery.ajax({
                url: 'get_course_details.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'courseName': courseName
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Populate the course name
                        $('#editCourseName').val(response.data.course_name);

                        // Clear existing rows in the table
                        var $tableBody = $('#editSubjectsTable tbody');
                        $tableBody.empty();
                        // Assuming 'subjects' is an array of subject objects associated with the course
                        response.data.subjects.forEach(function(subject) {
                            let a = subject.type;
                            if (a == ' hc' || a == 'hc') {
                                var row = '<tr>' +
                                    '<td><input name="subjectCode' + editcount + '" type="text" class="form-control" value="' + subject.code + '" oninput="processInput(this)"></td>' +
                                    '<td><input name="subjectName' + editcount + '" type="text" class="form-control" value="' + subject.name + '"></td>' +
                                    '<td><input name="hoursRequired' + editcount + '" type="number" class="form-control" value="' + subject.hours + '"></td>' +
                                    '<td>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="no" ' + (subject.lab === 'no' ? 'checked' : '') + '> No' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="1" ' + (subject.lab === '1' ? 'checked' : '') + '> 1' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="2" ' + (subject.lab === '2' ? 'checked' : '') + '> 2' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="3" ' + (subject.lab === '3' ? 'checked' : '') + '> 3' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="4" ' + (subject.lab === '4' ? 'checked' : '') + '> 4' +
                                    '</div>' +
                                    '</td>' +
                                    '<td><input type="text" class="form-control" value="' + subject.type + '" name="type' + editcount + '" ></td>' +

                                    '<td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                                    '</tr>';
                                editcount++;
                                $tableBody.append(row);
                            }
                        });

                        jQuery.noConflict();
                        jQuery('#editClassModal').modal('show');

                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while fetching the class details.');
                }
            });


            // Softcore
            jQuery.ajax({
                url: 'get_course_details.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'courseName': courseName
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Populate the course name
                        $('#editCourseName').val(response.data.course_name);

                        // Clear existing rows in the table
                        var $tableBody = $('#addSoftcoreTableId tbody');
                        $tableBody.empty();
                        // Assuming 'subjects' is an array of subject objects associated with the course
                        response.data.subjects.forEach(function(subject) {
                            let a = subject.type;
                            if (a == ' sc' || a == 'sc') {
                                var row = '<tr>' +
                                    '<td><input name="subjectCode' + editcount + '" type="text" class="form-control" value="' + subject.code + '" oninput="processInput(this)"></td>' +
                                    '<td><input name="subjectName' + editcount + '" type="text" class="form-control" value="' + subject.name + '"></td>' +
                                    '<td><input name="hoursRequired' + editcount + '" type="number" class="form-control" value="' + subject.hours + '"></td>' +
                                    '<td>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="no" ' + (subject.lab === 'no' ? 'checked' : '') + '> No' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="1" ' + (subject.lab === '1' ? 'checked' : '') + '> 1' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="2" ' + (subject.lab === '2' ? 'checked' : '') + '> 2' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="3" ' + (subject.lab === '3' ? 'checked' : '') + '> 3' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="4" ' + (subject.lab === '4' ? 'checked' : '') + '> 4' +
                                    '</div>' +
                                    '</td>' +
                                    '<td><input type="text" class="form-control" value="' + subject.type + '" name="type' + editcount + '" ></td>' +

                                    '<td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                                    '</tr>';
                                editcount++;
                                $tableBody.append(row);
                            }
                        });

                        jQuery.noConflict();
                        jQuery('#editClassModal').modal('show');

                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while fetching the class details.');
                }
            });

            // Skill Enhancement
            jQuery.ajax({
                url: 'get_course_details.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'courseName': courseName
                },
                success: function(response) {
                    if (response.status === 'success') {
                        // Populate the course name
                        $('#editCourseName').val(response.data.course_name);

                        // Clear existing rows in the table
                        var $tableBody = $('#addSkillTableId tbody');
                        $tableBody.empty();
                        // Assuming 'subjects' is an array of subject objects associated with the course
                        response.data.subjects.forEach(function(subject) {
                            let a = subject.type;
                            if (a == ' se' || a == 'se') {
                                var row = '<tr>' +
                                    '<td><input name="subjectCode' + editcount + '" type="text" class="form-control" value="' + subject.code + '" oninput="processInput(this)"></td>' +
                                    '<td><input name="subjectName' + editcount + '" type="text" class="form-control" value="' + subject.name + '"></td>' +
                                    '<td><input name="hoursRequired' + editcount + '" type="number" class="form-control" value="' + subject.hours + '"></td>' +
                                    '<td>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="no" ' + (subject.lab === 'no' ? 'checked' : '') + '> No' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="1" ' + (subject.lab === '1' ? 'checked' : '') + '> 1' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="2" ' + (subject.lab === '2' ? 'checked' : '') + '> 2' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="3" ' + (subject.lab === '3' ? 'checked' : '') + '> 3' +
                                    '</div>' +
                                    '<div class="form-check form-check-inline">' +
                                    '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="4" ' + (subject.lab === '4' ? 'checked' : '') + '> 4' +
                                    '</div>' +
                                    '</td>' +
                                    '<td><input type="text" class="form-control" value="' + subject.type + '" name="type' + editcount + '" ></td>' +

                                    '<td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                                    '</tr>';
                                editcount++;
                                $tableBody.append(row);
                            }
                        });

                        jQuery.noConflict();
                        jQuery('#editClassModal').modal('show');

                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while fetching the class details.');
                }
            });
        }

        // let edsubname_count = 2;
        // let edsubcode_count = 2;
        // let edhoursRequiredcount = 2;
        function addSubjectRow() {
            // Function to add a new row for a subject in the edit modal
            var newRow = '<tr>' +
                '<td><input type="text" class="form-control" name="subjectCode' + editcount + '" maxlength="15" oninput="processInput(this)" Required></td>' +
                '<td><input type="text" class="form-control" name="subjectName' + editcount + '" maxlength="50" Required></td>' +
                '<td><input type="number" class="form-control" name="hoursRequired' + editcount + '" Required></td>' +
                '<td>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="no" checked> No' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="1"> 1' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="2"> 2' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="3"> 3' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="4"> 4' +
                '</div>' +
                '</td>' +
                '<td><input type="text" class="form-control" value="hc" name="type' + editcount + '" ></td>' +
                '<td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                '</tr>';
            document.querySelector('#editSubjectsTable tbody').insertAdjacentHTML('beforeend', newRow);
            editcount++;
            // edsubname_count++;
            // edsubcode_count++;
            // edhoursRequiredcount++;
        }

        function addSoftcoreRow() {
            // Function to add a new row for a subject in the edit modal
            var newRow =
                '<tr>' +
                '<td><input list="softcoreCodes" class="form-control" name="subjectCode' + editcount + '" onchange="fetchScSubjectDetails(this)" required>' +
                '<datalist id="softcoreCodes">';



            // Add options for each softcore code
            <?php foreach ($softcoreCodes as $code) { ?>
                newRow += '<option value="<?= $code ?>">';
            <?php } ?>
            newRow += '</datalist></td>' +



                '<td><input list="softcoreNames" class="form-control" name="subjectName' + editcount + '" onchange="fetchScSubjectDetails1(this)" required>' +
                '<datalist id="softcoreNames">';

            <?php foreach ($softcoreNames as $code) { ?>
                newRow += '<option value="<?= $code ?>">';
            <?php } ?>
            newRow += '</datalist></td>' +


                '<td><input type="number" class="form-control" name="hoursRequired' + editcount + '" required></td>' +
                '<td>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="no" checked> No' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="1"> 1' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="2"> 2' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="3"> 3' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="4"> 4' +
                '</div>' +
                '</td>' +
                '<td><input type="text" class="form-control" value="sc" name="type' + editcount + '" ></td>' +

                '<td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                '</tr>';
            document.querySelector('#addSoftcoreTableId tbody').insertAdjacentHTML('beforeend', newRow);
            editcount++;
        }


        
        function fetchScSubjectDetails1(input) {
            var subjectName = input.value;
            var row = input.closest('tr'); // Getting the parent <tr> instead of <td>
            console.log("fa" + row);
            // Make an AJAX request to fetch subject details
            jQuery.ajax({
                url: 'get_sc_details_name_edit.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'subjectName': subjectName
                },
                success: function(response) {
                    if (response.error) {
                        console.error(response.error);
                        return;
                    }
                    console.log(response);
                    // Update the corresponding fields in the row
                    row.querySelector('[name^="subjectCode"]').value = response.subjectCode;
                    row.querySelector('[name^="hoursRequired"]').value = response.hoursRequired;
                    // Update radio button based on the lab value
                    row.querySelector('[name^="lab"][value="' + response.lab + '"]').checked = true;

                    row.querySelector('[name^="type"]').value = "sc";
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred while fetching subject details by name.');
                }
            });
        }


        function fetchScSubjectDetails(input) {
            // console.log(input.value );
            var subjectCode = input.value;
            var row = input.closest('tr');
            console.log("fB" + row);

            // Make an AJAX request to fetch subject details
            jQuery.ajax({
                url: 'get_sc_details_edit.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'subjectCode': subjectCode
                },
                success: function(response) {
                    if (response.error) {
                        console.error(response.error);
                        return;
                    }

                    // Update the corresponding fields in the row
                    row.querySelector('[name^="subjectName"]').value = response.subjectName;
                    row.querySelector('[name^="hoursRequired"]').value = response.hoursRequired;
                    // Update radio button based on the lab value
                    row.querySelector('[name^="lab"][value="' + response.lab + '"]').checked = true;

                    row.querySelector('[name^="type"]').value = "sc";
                },
                error: function(xhr, status, error) {
                    console.error('An error occurred while fetching subject details.');
                }
            });
        }


        // function addSkillRow() {
        //     // Function to add a new row for a subject in the edit modal
        //     var newRow = '<tr>' +
        //         '<td><input list="seCodes" class="form-control" name="subjectCode' + editcount + '" onchange="fetchseSubjectDetails(this)" required>' +
        //         '<datalist id="seCodes">';

        //     // Add options for each softcore code
        //     php foreach ($seCodes as $code) { ?>
        //         newRow += '<option value="= $code ?>">';
        //     php } ?>

        //     newRow += '</datalist></td>' +
        //         '<td><input type="text" class="form-control" name="subjectName' + editcount + '" required></td>' +
        //         '<td><input type="number" class="form-control" name="hoursRequired' + editcount + '" required></td>' +
        //         '<td>' +
        //         '<div class="form-check form-check-inline">' +
        //         '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="no" checked> No' +
        //         '</div>' +
        //         '<div class="form-check form-check-inline">' +
        //         '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="1"> 1' +
        //         '</div>' +
        //         '<div class="form-check form-check-inline">' +
        //         '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="2"> 2' +
        //         '</div>' +
        //         '<div class="form-check form-check-inline">' +
        //         '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="3"> 3' +
        //         '</div>' +
        //         '<div class="form-check form-check-inline">' +
        //         '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="4"> 4' +
        //         '</div>' +
        //         '</td>' +
        //         '<td><input type="text" class="form-control" value="se" name="type' + editcount + '" ></td>' +

        //         '<td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
        //         '</tr>';
        //     document.querySelector('#addSkillTableId tbody').insertAdjacentHTML('beforeend', newRow);
        //     editcount++;
        // }
        function addSkillRow() {
            // Function to add a new row for a subject in the edit modal
            var newRow =
                '<tr>' +
                '<td><input list="softcoreCodes" class="form-control" name="subjectCode' + editcount + '" onchange="fetchseSubjectDetails(this)" required>' +
                '<datalist id="softcoreCodes">';



            // Add options for each softcore code
            <?php foreach ($softcoreCodes as $code) { ?>
                newRow += '<option value="<?= $code ?>">';
            <?php } ?>
            newRow += '</datalist></td>' +



                '<td><input list="softcoreNames" class="form-control" name="subjectName' + editcount + '" onchange="fetchScSubjectDetails1(this)" required>' +
                '<datalist id="softcoreNames">';

            <?php foreach ($softcoreNames as $code) { ?>
                newRow += '<option value="<?= $code ?>">';
            <?php } ?>
            newRow += '</datalist></td>' +


                '<td><input type="number" class="form-control" name="hoursRequired' + editcount + '" required></td>' +
                '<td>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="no" checked> No' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="1"> 1' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="2"> 2' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="3"> 3' +
                '</div>' +
                '<div class="form-check form-check-inline">' +
                '<input type="radio" class="form-check-input" name="lab' + editcount + '" value="4"> 4' +
                '</div>' +
                '</td>' +
                '<td><input type="text" class="form-control" value="sc" name="type' + editcount + '" ></td>' +

                '<td><button id="c_delete_row_btn" class="btn btn-danger" onclick="deleteRow(this)">Delete</button></td>' +
                '</tr>';
            document.querySelector('#addSkillTableId tbody').insertAdjacentHTML('beforeend', newRow);
            editcount++;
        }


        // function fetchseSubjectDetails1(input) {
        //     console.log(input.value);
        //     var subjectCode = input.value;
        //     var row = input.closest('tr');

        //     // Make an AJAX request to fetch subject details
        //     jQuery.ajax({
        //         url: 'get_se_details_edit.php',
        //         type: 'POST',
        //         dataType: 'json',
        //         data: {
        //             'subjectCode': subjectCode
        //         },
        //         success: function(response) {
        //             if (response.error) {
        //                 console.error(response.error);
        //                 return;
        //             }

        //             // Update the corresponding fields in the row
        //             row.querySelector('[name^="subjectName"]').value = response.subjectName;
        //             row.querySelector('[name^="hoursRequired"]').value = response.hoursRequired;
        //             // Update radio button based on the lab value
        //             row.querySelector('[name^="lab"][value="' + response.lab + '"]').checked = true;
        //             row.querySelector('[name^="type"]').value = "se";

        //         },
        //         error: function(xhr, status, error) {
        //             console.error('An error occurred while fetching subject details.');
        //         }
        //     });
        // }

        function fetchseSubjectDetails(input) {
            console.log(input.value);
            var subjectCode = input.value;
            var row = input.closest('tr');

            // Make an AJAX request to fetch subject details
            jQuery.ajax({
                url: 'get_se_details_edit.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'subjectCode': subjectCode
                },
                success: function(response) {
                    if (response.error) {
                        console.error(response.error);
                        return;
                    }

                    // Update the corresponding fields in the row
                    row.querySelector('[name^="subjectName"]').value = response.subjectName;
                    row.querySelector('[name^="hoursRequired"]').value = response.hoursRequired;
                    // Update radio button based on the lab value
                    row.querySelector('[name^="lab"][value="' + response.lab + '"]').checked = true;
                    row.querySelector('[name^="type"]').value = "se";

                    

                },
                error: function(xhr, status, error) {
                    console.error('An error occurred while fetching subject details.');
                }
            });
        }

        function refreshpage() {
            location.reload();
        }


        function deleteRow(button) {
            // Function to delete a row from the subjects table
            $(button).closest('tr').remove();
        }

        function resetScCourse(courseName) {
            // Use AJAX to reset softcore values
            jQuery.ajax({
                url: 'reset_softcore.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    'courseName': courseName
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        // Perform any additional actions on success
                    } else {
                        alert('Error: ' + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while resetting softcore values.');
                }
            });
        }
    </script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>

</html>