<!-- staff.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Staff Details - Timetable Pro</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <!-- Include the navbar -->
    <?php include('navbar.php'); ?>

    <div class="container mt-4">
        <!-- Add Staff Record Button -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#addStaffModal">Add Staff Record</button>

        <!-- Add Staff Record Modal -->
        <div class="modal fade" id="addStaffModal" tabindex="-1" role="dialog" aria-labelledby="addStaffModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addStaffModalLabel">Add Staff Record</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add Staff Record Form -->
                        <form method="post" action="add_staff.php">
                            <div class="form-group">
                                <label for="staffName">Staff Name:</label>
                                <input type="text" class="form-control" id="staffName" name="staffName" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Record</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Display Staff Details -->
        <?php
        // Assuming you have a database connection
        $servername = "localhost";
        $username = "root";
        $password = "2503";
        $dbname = "timetablepro";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch and display staff details
        $staffQuery = "SELECT * FROM staff";
        $staffResult = $conn->query($staffQuery);

        if ($staffResult->num_rows > 0) {
            echo '<h2>Staff Details</h2>';
            echo '<table class="table">';
            echo '<thead><tr><th>Registration Number</th><th>Name</th><th>Action</th></tr></thead>';
            echo '<tbody>';
            while ($staffRow = $staffResult->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $staffRow["regno"] . '</td>';
                echo '<td>' . $staffRow["name"] . '</td>';
                echo '<td><button class="btn btn-danger" onclick="deleteStaff(' . $staffRow["regno"] . ')">Delete</button></td>';
                echo '</tr>';
            }
            echo '</tbody></table>';
        } else {
            echo 'No staff records found.';
        }

        $conn->close();
        ?>

    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- JavaScript function for staff deletion -->
    <script>
        function deleteStaff(regno) {
            var confirmation = confirm("Are you sure you want to delete this staff record?");
            if (confirmation) {
                // Redirect to the PHP file that handles the deletion
                window.location.href = 'delete_staff.php?regno=' + regno;
            }
        }
    </script>

</body>
</html>
