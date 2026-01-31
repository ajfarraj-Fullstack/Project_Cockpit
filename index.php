<?php 
// file  config
session_start();

if (isset($_SESSION['user_id'], $_SESSION['role'])) {

    if ($_SESSION['role'] === "admin") {
        header("Location: dashbord.php");
        exit;
    }

    if ($_SESSION['role'] === "user") {
        header("Location: reportemployee.php"); // أو replotemployee.php حسب اسم الملف الحقيقي
        exit;
    }

}

// إذا ما في جلسة → خلي المستخدم يكمل صفحة تسجيل الدخول

include "include/config.php"; 
// file  login Controller
include "controller/loginController.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include "header/include.php" ?>  
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>



   <?php  include "view/ViewLogin.php" ?>


</body>
</html>