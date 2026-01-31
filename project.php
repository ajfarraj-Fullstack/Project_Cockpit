<?php 
session_start();
// file  config
include "include/config.php"; 
// file  login Controller
include "controller/AddTaskFromAdminController.php";
?>

<head>
  <?php include "header/include.php" ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <?php include "view/ViewReadMoreForProject.php" ?>

</body>

</html>