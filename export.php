<?php
include 'navbar.php';
include 'db_connection.php';
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
        $mergedTable = 'merged_table'; // Updated table name
        
        // Check if 'merged_table' already exists and delete it if it does
        $sqlCheckTable = "SHOW TABLES LIKE '$mergedTable'";
        $resultCheckTable = $conn->query($sqlCheckTable);
        if ($resultCheckTable->num_rows > 0) {
            $sqlDropTable = "DROP TABLE $mergedTable";
            $conn->query($sqlDropTable);
        }
        
        // Create the 'merged_table' with a serial number field
        $sqlCreateTable = "CREATE TABLE $mergedTable (
            serialNo INT AUTO_INCREMENT PRIMARY KEY,
            facultyName VARCHAR(255),
            stype VARCHAR(255),
            theory VARCHAR(255)
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
                $sqlMergeData = "INSERT INTO $mergedTable (facultyName, stype, theory)
                                 SELECT staffName, stype AS stype, CONCAT(subjectCode, ' - ', subjectName) AS theory
                                 FROM $subjectTableWithSuffix" ;
                $conn->query($sqlMergeData);
            }
        }
        ?>

        <!-- Display the merged_table data in a Bootstrap table with rowspan and sorted by faculty name -->
        <h2>PONDICHERRY UNIVERSITY</h2>
        <h3>COMPUTER SCIENCE DEPARTMENT</h3>
        <h4>MERGED TABLE</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="col-1">S.no</th> <!-- Adjust column width here -->
                    <th class="col-2">Faculty Name</th>
                    <th class="col-2">Hardcore/Softcore</th> <!-- Adjust column width here -->
                    <th class="col-4">Theory</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query the merged_table to retrieve data sorted by faculty name
                $sqlGetData = "SELECT facultyName, stype, theory FROM $mergedTable ORDER BY facultyName ASC";
                $resultGetData = $conn->query($sqlGetData);
                
                if ($resultGetData->num_rows > 0) {
                    $prevFacultyName = '';
                    $serial = 1;
                    while ($row = $resultGetData->fetch_assoc()) {
                        echo "<tr>";
                        if ($prevFacultyName != $row["facultyName"]) {
                            echo "<td rowspan='1'>" . $serial++ . "</td>";
                            echo "<td rowspan='1'>" . $row["facultyName"] . "</td>";
                            echo "<td rowspan='1'>" . ($row["stype"] === 'hc' ? 'Hardcore' : 'Softcore') . "</td>";
                            $prevFacultyName = $row["facultyName"];
                        } else {
                            echo "<td rowspan='1'></td>";
                            echo "<td rowspan='1'></td>";
                            echo "<td rowspan='1'></td>";
                        }
                        echo "<td>" . $row["theory"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data available</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include 'db_connection_close.php';
?>
