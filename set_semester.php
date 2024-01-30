<?php
// set_semester.php

if (isset($_POST['semester'])) {
    $semester = $_POST['semester'];
    setcookie("whichsem", $semester, time() + 100000, "/");
    header("Location: index.php");
    exit(); // Add exit() to stop script execution after header redirect
} else {
    echo 'error';
}
?>
