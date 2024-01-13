<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Timetable Pro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<body>

    <!-- Navbar -->
    <?php include('navbar.php'); ?>

<!-- Content -->
<div class="container mt-4">
    <!-- Home Page Section -->
<section id="home">
    <div class="container">
        <h2>Add Course</h2>
        <form method="post" action="process.php">
            <div class="form-group">
                <label for="deptName">Course Name:</label>
                <input type="text" class="form-control" id="deptName" name="deptName" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Course</button>
        </form>

        <hr>

        <h2>Course List</h2>
        <?php
        // PHP code to fetch and display departments in a table with delete buttons
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "timetablepro";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch and display departments in a table with delete buttons
        $sql = "SELECT * FROM courses";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead><tr><th>Serial Number</th><th>Course Name</th><th>Action</th></tr></thead>';
            echo '<tbody>';
            $serialNumber = 1;
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $serialNumber . '</td>';
                echo '<td>' . $row["dept"] . '</td>';
                echo '<td><form method="post" action="delete.php"><input type="hidden" name="deptId" value="' . $row["sno"] . '"><button type="submit" class="btn btn-danger">Delete</button></form></td>';
                echo '</tr>';
                $serialNumber++;
            }
            echo '</tbody></table>';
        } else {
            echo "No Courses found.";
        }

        $conn->close();
        ?>
    </div>
</section>


   
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>