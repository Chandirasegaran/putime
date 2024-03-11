<?php
include 'navbar.php';
include 'db_connection.php';
include 'move-to-top.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merged Table</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <!-- Check the value of the 'whichsem' cookie -->
        <?php
        $whichSemCookie = $_COOKIE['whichsem'];
        $adminTable = ($whichSemCookie === 'odd') ? 'adminodd' : 'admineven';

        // Define the new name of the merged table
        $workflow = 'work_flow'; // Updated table name

        // Check if 'merged_table' already exists and delete it if it does
        $sqlCheckTable = "SHOW TABLES LIKE '$workflow'";
        $resultCheckTable = $conn->query($sqlCheckTable);
        if ($resultCheckTable->num_rows > 0) {
            $sqlDropTable = "DROP TABLE $workflow";
            $conn->query($sqlDropTable);
        }

        // Create the 'merged_table' with a serial number field
        $sqlCreateTable = "CREATE TABLE $workflow (
                serialNo INT AUTO_INCREMENT PRIMARY KEY,
                facultyName VARCHAR(255),            
                stype VARCHAR(255),
                theory VARCHAR(255),
                hours INT(11),
                lab VARCHAR(10)
            )";
        $conn->query($sqlCreateTable);

        // Get the list of table names from the 'adminodd' table
        $sqlGetTableNames = "SELECT CONCAT(course, '_subjects') AS tableName FROM $adminTable";
        $resultGetTableNames = $conn->query($sqlGetTableNames);

        if ($resultGetTableNames->num_rows > 0) {
            while ($row = $resultGetTableNames->fetch_assoc()) {
                $subjectTableWithSuffix = $row['tableName'];
                $coursenamewithtrim = str_replace(['odd', 'even', '_subjects'], '', trim($subjectTableWithSuffix));

                // Merge data from individual subject tables into 'merged_table'
                $sqlMergeData = "INSERT INTO $workflow (facultyName, stype, theory, hours, lab)
                SELECT 
                    CASE WHEN staffName IS NULL OR staffName = '' THEN 'Not allocated' ELSE staffName END AS facultyName,
                    stype AS stype, 
                    CONCAT(subjectCode, ' - ', subjectName) AS theory,
                    hoursRequired AS hours,
                    lab AS lab
                FROM $subjectTableWithSuffix";
                $conn->query($sqlMergeData);

                $sqlMergeData = "INSERT INTO $workflow (facultyName, stype, theory, hours, lab)
                                SELECT labStaffName AS facultyName, 
                                    stype AS stype, 
                                    CONCAT(subjectCode, ' - ', subjectName) AS theory,
                                    hoursRequired AS hours,
                                    lab AS lab
                                FROM $subjectTableWithSuffix
                                WHERE labStaffName IS NOT NULL AND labStaffName <> 'Nil'";

                $conn->query($sqlMergeData);
            }
        }
        ?>

        <!-- Display the merged_table data in a Bootstrap table with rowspan and sorted by faculty name -->
        <h2 style="text-align:center">PONDICHERRY UNIVERSITY</h2>
        <h3 style="text-align:center">COMPUTER SCIENCE DEPARTMENT</h3>
        <h3 style="text-align:center">
            <?php
            if (isset($_COOKIE['whichsem'])) {
                echo '' . ucfirst($_COOKIE['whichsem']) . ' Semester Workload';
            }
            ?>
        </h3>
        <br>
        <table class="table table-bordered" id="wf_table">
        <?php
    // Query the merged_table to retrieve data sorted by faculty name and staff table order
    $sqlGetData = "
        SELECT $workflow.facultyName, $workflow.stype, $workflow.theory, $workflow.hours
        FROM $workflow
        LEFT JOIN staff ON $workflow.facultyName = staff.Name
        ORDER BY CASE WHEN staff.Regno IS NULL THEN 1 ELSE 0 END, staff.Regno ASC";
    
    $resultGetData = $conn->query($sqlGetData);

    if ($resultGetData->num_rows > 0) {
        $serial = 1;
        $prevFacultyName = '';
        $headerDisplayed = false;
        $totalTLHrs = 0; // Initialize the total hours variable
        $sid = 1;

        while ($row = $resultGetData->fetch_assoc()) {
            if (!$headerDisplayed) {
                echo "<tr>
                        <th>S.NO</th>
                        <th>FACULTY NAME</th>
                        <th>Hardcore/Softcore</th>
                        <th>THEORY(HARD CORE/SOFT CORE) & LAB</th>
                        <th>TL HRS</th>
                        <th>Total TL HRS</th> <!-- New column for total hours -->
                      </tr>";
                $headerDisplayed = true;
            }

            echo "<tr>";
            if ($prevFacultyName != $row["facultyName"]) {
                if ($prevFacultyName != '') {
                    echo "<td ></td>"; // Empty cell for serial number
                    echo "<td ></td>"; // Empty cell for faculty name
                    echo "<td ></td>"; // Empty cell for stype
                    echo "<td colspan='2' style='text-align: right;'><b>TOTAL HOURS TAKEN</b></td>"; // Empty cell for theory
                    echo "<td id=".'row'.$sid++." ><b> $totalTLHrs</b></td>"; // Display total hours
                    echo "</tr>";
                    $totalTLHrs = 0; // Reset total hours for a new staff
                }

                echo "<tr>";
                echo "<td id=".'row'.$sid++.">" . $serial++ . "</td>";
                echo "<td >" . $row["facultyName"] . "</td>";
            } else {
                echo "<td id=".'row'.$sid++."></td>"; // Empty cell for serial number
                echo "<td ></td>"; // Empty cell for faculty name
            }
            echo "<td >" . ($row["stype"] === 'hc' ? 'Hardcore' : 'Softcore') . "</td>";
            echo "<td >" . $row["theory"] . "</td>";
            echo "<td >" . $row["hours"] . "</td>"; // Display the 'hours' column
            $totalTLHrs += $row["hours"]; // Accumulate total hours

            // Display total hours on the last row for each faculty
            if ($resultGetData->num_rows > 1 && $prevFacultyName == $row["facultyName"]) {
                echo "<td id=".'row'.$sid++."></td>"; // Empty cell for total hours
                echo "</tr>";
            }

            $prevFacultyName = $row["facultyName"];
        }

        // Display the total hours for the last faculty
        echo "<tr>";
        echo "<td ></td>"; // Empty cell for serial number
        echo "<td ></td>"; // Empty cell for faculty name
        echo "<td ></td>"; // Empty cell for stype
        echo "<td colspan='2' style='text-align: right;'><b>TOTAL HOURS TAKEN</b></td>"; // Empty cell for theory
        echo "<td id=".'row'.$sid." ><b> $totalTLHrs</b></td>"; // Display total hours
        echo "</tr>";

    } else {
        echo "<tr><td colspan='6'>No data available</td></tr>";
    }
?>




            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <script>
                function prt() {
                    document.getElementById('btnhid').style.display = 'none';
                    document.getElementById('btnhid1').style.display = 'none';
                    document.getElementById('moveToTopBtn').style.display = 'none';
                    window.print();
                    location.reload();
                }
            </script>
            <!-- <button type="button" id="btnhid" class="btn btn-primary col-3" onclick="prt()">Print</button> -->
        </div>
        
        <pre><br></pre>
        <div class="d-flex justify-content-center">
        <script>
    // ... (previous functions) ...

    function exportToCSV() {
        var table = document.getElementById('wf_table');
        var rows = table.querySelectorAll('tr');
        var csv = [];

        // Collect column headers
        var headerRow = rows[0];
        var headers = headerRow.querySelectorAll('th');
        var header = [];

        for (var i = 0; i < headers.length; i++) {
            header.push(headers[i].innerText);
        }

        csv.push(header.join(','));

        // Collect data rows
        for (var i = 1; i < rows.length; i++) {
            var row = [];
            var cols = rows[i].querySelectorAll('td');

            for (var j = 0; j < cols.length; j++) {
                var cellText = cols[j].innerText;

                // Move "TOTAL HOURS TAKEN" one step right
                if (cellText === 'TOTAL HOURS TAKEN' && j > 0) {
                    row.push(''); // Add an empty cell
                }

                row.push(cellText);
            }

            csv.push(row.join(','));
        }

        // Create and download the CSV file
        var csvContent = csv.join('\n');
        var blob = new Blob([csvContent], { type: 'text/csv' });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'Workflow.csv';
        link.click();
    }
</script>
    <button type="button" id="btnhid" class="btn btn-primary col-3" onclick="prt()">Print</button>
    <button type="button" id="btnhid1" class="btn btn-success ml-2 col-3" onclick="exportToCSV()">Export CSV</button>
</div>
<pre><br></pre>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>


<?php
include 'db_connection_close.php';
?>