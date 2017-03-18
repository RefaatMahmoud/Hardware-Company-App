<?php
//resume session
$title = "Logout";
session_start();
//unset Data
session_unset();
//Destroy Data
session_destroy();
header('Location:index.php');
exit();
?>