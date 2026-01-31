<?php 
// file  config
session_start();
include "include/config.php"; 
// file  login Controller
include "controller/UserController.php";

?>

<html>
<head>
<?php include "header/include.php" ?>  
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
    <?php  include "view/ViewAddNewUser.php" ?>
    
</body>
</html>