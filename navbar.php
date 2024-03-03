<head>
    <title>PU Time</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap JS (popper.js and bootstrap.js) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

   <style>
        .disSem {
            margin-top: 9px;
        }
    </style>
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Timetable Pro</a>
        <?php
        if (isset($_COOKIE['whichsem'])) {
            echo '<span class="navbar-brand disSem" ><h6>' . ucfirst($_COOKIE['whichsem']) . ' Semester</h6></span>';
        }
        ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'staff.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="staff.php">Staff Details</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="scheduleDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Schedule
                </a>
                <div class="dropdown-menu bg-dark" aria-labelledby="scheduleDropdown">
                    <a class="dropdown-item text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'schedule.php') ? 'active' : ''; ?>" href="schedule.php" onmouseover="this.classList.add('bg-primary')" onmouseout="this.classList.remove('bg-primary')">Schedule Class</a>
                    <a class="dropdown-item text-white <?php echo (basename($_SERVER['PHP_SELF']) == 'sl.php') ? 'active' : ''; ?>" href="sl.php" onmouseover="this.classList.add('bg-primary')" onmouseout="this.classList.remove('bg-primary')">Schedule Lab</a>
                </div>
            </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'workflow.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="workflow.php">Work Load</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'export.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="export.php">Export</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="ap.php">AP Page</a>
                </li> -->
                <!-- Add other navbar links as needed -->
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-primary" href="reset_semester.php">Reset Semester</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>