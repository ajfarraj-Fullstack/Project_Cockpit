<?php 
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['userName']);
unset($_SESSION['role']);
session_destroy();
header("location:index.php");

?>