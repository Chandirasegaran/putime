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
                $sqlMergeData = "INSERT INTO $workflow (facultyName, stype, theory, lab)
                SELECT 
                    CASE WHEN staffName IS NULL OR staffName = '' THEN 'Not allocated' ELSE staffName END AS facultyName,
                    stype AS stype, 
                    CONCAT(subjectCode, ' - ', subjectName) AS theory,
                    lab AS lab
                FROM $subjectTableWithSuffix";
                $conn->query($sqlMergeData);

                $sqlMergeData = "INSERT INTO $workflow (facultyName, stype, theory, lab)
                SELECT labStaffName AS facultyName, 
                       stype AS stype, 
                       CONCAT(subjectCode, ' - ', subjectName) AS theory,
                       lab AS lab
                FROM $subjectTableWithSuffix
                WHERE labStaffName IS NOT NULL AND labStaffName <> 'Nil'";

                $conn->query($sqlMergeData);
            }
        }
        ?>

        <!-- Display the merged_table data in a Bootstrap table with rowspan and sorted by faculty name -->
        <h2>PONDICHERRY UNIVERSITY</h2>
        <h3>COMPUTER SCIENCE DEPARTMENT</h3>
        <br>
        <table class="table table-bordered" >
            <thead>
                <tr>
                    <th class="col-1">S.no</th> <!-- Adjust column width here -->
                    <th class="col-2">Faculty Name</th>
                    <th class="col-2">Hardcore/Softcore</th> <!-- Adjust column width here -->
                    <th class="col-4">Subject</th>
                </tr>
            </thead>
            <tbody>
                
            <?php
    // Query the merged_table to retrieve data sorted by faculty name and staff table order
    $sqlGetData = "
        SELECT $workflow.facultyName, $workflow.stype, $workflow.theory
        FROM $workflow
        LEFT JOIN staff ON $workflow.facultyName = staff.Name
        ORDER BY CASE WHEN staff.Regno IS NULL THEN 1 ELSE 0 END, staff.Regno ASC";
    
    $resultGetData = $conn->query($sqlGetData);

    if ($resultGetData->num_rows > 0) {
        $serial = 1;
        while ($row = $resultGetData->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $serial++ . "</td>";
            echo "<td>" . $row["facultyName"] . "</td>";
            echo "<td>" . ($row["stype"] === 'hc' ? 'Hardcore' : 'Softcore') . "</td>";
            echo "<td>" . $row["theory"] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No data available</td></tr>";
    }
?>


            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <script>
                function prt() {
                    document.getElementById('btnhid').style.display = 'none';
                    document.getElementById('moveToTopBtn').style.display = 'none';
                    window.print();
                    location.reload();
                }
            </script>
            <button type="button" id="btnhid" class="btn btn-primary col-3" onclick="prt()">Print</button>
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