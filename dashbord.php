
<?php 
// file  config
session_start();
include "include/config.php"; 
// file  login Controller
include "controller/ProjectsController.php";
?>
<html lang="en">

<head>
  <?php include "header/include.php" ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <?php include "view/ViewNavbar.php" ?>
  <?php include "view/ViewDashbord.php" ?>


</body>

</html>