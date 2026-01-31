<?php 
session_start();
// file  config
include "include/config.php"; 
// file  login Controller
include "controller/file.php";
?>

<head>
  <?php include "header/include.php" ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php 

$project_id = $_GET['project_id'] ?? null;

if (!$project_id) {
  die('Missing data from URL');
}

include 'view/ViewAddProjectFiles.php';

?>

</body>

</html>