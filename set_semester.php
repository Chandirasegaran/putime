<?php
// set_semester.php

if (isset($_POST['semester'])) {
    $semester = $_POST['semester'];
    setcookie("whichsem", $semester, time() + 100000, "/");
    header("Location: index.php");
    // echo $semester;
    exit(); // Add exit() to stop script execution after header redirect
} else {
    echo 'error';
}
