
<?php 
// file  config
session_start();
include "include/config.php"; 
// file  login Controller
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include "header/include.php" ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include "controller/ReportController.php";?>

<?php  include "view/ViewReportForEmployeeUpload.php" ?>

</body>

</html>