<?php
include 'move-to-top.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PU Time - Lab Schedule</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./assets/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    include 'navbar.php';
    include 'db_connection.php';

    // Fetch and display lab courses from the "admin" table based on $currsem
    $tableName = ($currsem == "odd") ? "adminodd" : "admineven";
    $tableNamesResult = $conn->query("SELECT * FROM $tableName");

    if ($tableNamesResult->num_rows > 0) {
        echo '<div class="container-fluid">
                <H1>Lab Schedule</H1>
                <div class="form-group">
                    <label for="labDropdown">Select Lab:</label>
                    <select class="form-control" id="labDropdown" onchange="updateLabTable()">
                        <option value="1">Lab 1</option>
                        <option value="2">Lab 2</option>
                        <option value="3">Lab 3</option>
                        <option value="4">Lab 4</option>
                    </select>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>subjectCode</th>
                            <th>subjectName</th>
                            <th>hoursRequired</th>
                            <th>hoursRequiredDup</th>
                            <th>lab</th>
                            <th>staffName</th>
                            <th>labStaffName</th>
                            <th>stype</th>
                            <th>tablename</th>
                        </tr>
                    </thead>
                    <tbody>';

        while ($tableRow = $tableNamesResult->fetch_assoc()) {
            $subjectTableName = $tableRow["COURSE"] . "_subjects";
            $subjectsResult = $conn->query("SELECT * FROM $subjectTableName");

            while ($subjectRow = $subjectsResult->fetch_assoc()) {
                echo '<tr>
                        <td>' . $subjectRow["subjectCode"] . '</td>
                        <td>' . $subjectRow["subjectName"] . '</td>
                        <td>' . $subjectRow["hoursRequired"] . '</td>
                        <td>' . $subjectRow["hoursRequiredDup"] . '</td>
                        <td>' . $subjectRow["lab"] . '</td>
                        <td>' . $subjectRow["staffName"] . '</td>
                        <td>' . $subjectRow["labStaffName"] . '</td>
                        <td>' . $subjectRow["stype"] . '</td>
                        <td>'.$tableRow["COURSE"].'</td>
                    </tr>';
            }
        }

        echo '</tbody></table></div>';
    } else {
        echo 'No tables found.';
    }

    $conn->close();
    ?>

    <script>
        updateLabTable();
        function updateLabTable() {
            var selectedLab = document.getElementById("labDropdown").value;
            var rows = document.getElementsByTagName("tr");

            for (var i = 1; i < rows.length; i++) {
                var cells = rows[i].getElementsByTagName("td");
                var labValue = cells[4].innerText;

                if (selectedLab === "select" || labValue === selectedLab) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }
    </script>
</body>

</html>
