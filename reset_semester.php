<?php
setcookie("whichsem", "", time() - 10000000, "/");
header("Location: index.php");
echo 'Hello';
exit();
?>
