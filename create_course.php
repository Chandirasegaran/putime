<?php
include("db_connection.php");
$numberOfSubjects = 25;
for ($i = 1; $i <= $numberOfSubjects; $i++) {
    ${"subjectCode{$i}"} = isset($_POST["subjectCode{$i}"]) ? $_POST["subjectCode{$i}"] : null;
    ${"subjectName{$i}"} = isset($_POST["subjectName{$i}"]) ? $_POST["subjectName{$i}"] : null;
    ${"hoursRequired{$i}"} = isset($_POST["hoursRequired{$i}"]) ? $_POST["hoursRequired{$i}"] : null;
    ${"lab{$i}"} = isset($_POST["lab{$i}"]) ? $_POST["lab{$i}"] : null;
}

// for ($i = 1; $i <= $numberOfSubjects; $i++) {
//     if(${"subjectCode{$i}"}!=null){
//         echo ${"subjectCode{$i}"} .'  |   '. ${"subjectName{$i}"} .'<br>';
//     }
//     else{
//         break;
//     }
// }






?>
