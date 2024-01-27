<?php
include("db_connection.php");
echo 'jm';
echo $_POST["subjectCode1"];
$courseName = isset($_POST["courseName"]) ? $_POST["courseName"] : '';
$numberOfSubjects = isset($_POST["numberOfSubjects"]) ? $_POST["numberOfSubjects"] : '';
echo $courseName;
echo $numberOfSubjects;
for ($i = 1; $i <= $numberOfSubjects; $i++) {
    ${"subjectCode{$i}"} = isset($_POST["subjectCode{$i}"]) ? $_POST["subjectCode{$i}"] : null;
    ${"subjectName{$i}"} = isset($_POST["subjectName{$i}"]) ? $_POST["subjectName{$i}"] : null;
    ${"hoursRequired{$i}"} = isset($_POST["hoursRequired{$i}"]) ? $_POST["hoursRequired{$i}"] : null;
    ${"lab{$i}"} = isset($_POST["lab{$i}"]) ? $_POST["lab{$i}"] : null;
    echo  ${"subjectCode{$i}"};
    echo  ${"subjectName{$i}"};
    echo  ${"hoursRequired{$i}"};
    echo  ${"lab{$i}"};

}
// include 'db_connection.php';

// // Drop existing Subject table
// $sqlDrop = 'truncate TABLE ' . $courseName . '_Subjects';


// if ($conn->query($sqlDrop) !== TRUE) {
//     echo 'Error dropping Subject table: ' . $conn->error;
// }



// // Create Subject table
// $sqlCreate = 'CREATE TABLE IF NOT EXISTS ' . $courseName . '_Subjects (
//     subjectCode VARCHAR(8),
//     subjectName VARCHAR(255),
//     hoursRequired int(255),
//     lab VARCHAR(10),
//     staffName VARCHAR(255)
// )';



// if ($conn->query($sql) !== TRUE) {
//     echo 'Error creating Subject table: ' . $conn->error;
// } else {
//     echo 'tabe created';
//     $numberOfSubjects = 25;

//     for ($i = 1; $i <= $numberOfSubjects; $i++) {
//         echo ${"subjectCode{$i}"};
//         echo  ${"subjectName{$i}"};
//         echo ${"hoursRequired{$i}"};
//         echo ${"lab{$i}"};
//     }
// }

// // Example: Insert data into a table
// for ($i = 1; $i <= $numberOfSubjects; $i++) {
//     if (${"subjectCode{$i}"} !== null) {
//         $sql = "INSERT INTO {$courseName}_Subjects (subjectCode, subjectName, hoursRequired, lab)
//                 VALUES ('${"subjectCode{$i}"}', '${"subjectName{$i}"}', '${"hoursRequired{$i}"}', '${"lab{$i}"}')";
//         if ($conn->query($sql) !== TRUE) {
//             echo 'Error: ' . $sql . '<br>' . $conn->error;
//         }
//     } else {
//         break;
//     }
// }
// include 'db_connection_close.php';
// // header("Location: index.php");
?>
