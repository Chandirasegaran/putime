<?php
// export.php

require('fpdf/fpdf.php'); // Include the FPDF library

class PDF extends FPDF
{
    // Header
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'PONDICHERRY UNIVERSITY', 0, 1, 'C');
        $this->Cell(0, 10, 'COMPUTER SCIENCE DEPARTMENT', 0, 1, 'C');
        $this->Ln(10); // Add a line break
    }

    // Footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

// Check if the export button is clicked
if (isset($_POST['export'])) {
    // Get selected semester type
    $semesterType = isset($_POST['semesterType']) ? $_POST['semesterType'] : '';

    // Create PDF object
    $pdf = new PDF();
    $pdf->AddPage();

    // Add title line
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'FACULTY SUBJECT ALLOCATION', 0, 1, 'C');
    $pdf->Ln(10); // Add a line break

    // Add table headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(15, 10, 'S.No', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Staff Name', 1, 0, 'C');
    $pdf->Cell(60, 10, 'Subject', 1, 0, 'C');
    $pdf->Cell(30, 10, 'Sem', 1, 1, 'C'); // Add a line break

    // Fetch data from the assign table based on semester type
    $servername = "localhost";
    $username = "root";
    $password = "2503";
    $dbname = "timetablepro";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $assignQuery = "SELECT * FROM assign WHERE sem_type = '$semesterType' ORDER BY staff_name ASC";
    $assignResult = $conn->query($assignQuery);

    $counter = 1;

    while ($assignRow = $assignResult->fetch_assoc()) {
        $pdf->Cell(15, 10, $counter++, 1, 0, 'C');
        $pdf->Cell(60, 10, $assignRow['staff_name'], 1, 0, 'C');
        $pdf->Cell(60, 10, $assignRow['course_name'], 1, 0, 'C');
        $pdf->Cell(30, 10, $assignRow['sem_type'], 1, 1, 'C'); // Add a line break
    }

    // Output the PDF
    $pdf->Output('timetable.pdf', 'D');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Export - Timetable Pro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <!-- Export Form -->
        <form method="post" action="export.php">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="semesterType" id="odd" value="odd" checked>
                <label class="form-check-label" for="odd">Odd</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="semesterType" id="even" value="even">
                <label class="form-check-label" for="even">Even</label>
            </div>
            <button type="submit" class="btn btn-primary" name="export">Export</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
