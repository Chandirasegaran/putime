<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Timetable Pro</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'index.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item <?php echo (basename($_SERVER['PHP_SELF']) == 'course.php') ? 'active' : ''; ?>">
                    <a class="nav-link" href="course.php">Course Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="staff.php">Staff Details</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="assign.php">Assign Staff</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="export.php">Export</a>
                </li>
                <!-- Add other navbar links as needed -->
            </ul>
        </div>
    </div>
</nav>
