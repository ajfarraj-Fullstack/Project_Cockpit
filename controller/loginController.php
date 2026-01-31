<?php
$msg="";
if (isset($_POST['login'])) {

  $userName = $conn->real_escape_string($_POST['userName']);
  $password = $_POST['password'];

  // جلب المستخدم حسب اسم المستخدم فقط
  $GetUser = "SELECT * FROM users WHERE userName='$userName' LIMIT 1";
  $result = $conn->query($GetUser);

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    // التحقق من كلمة المرور المشفرة
    if (password_verify($password, $row['password'])) {
      // تسجيل الدخول ناجح
      session_start();
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['userName'] = $row['userName'];
      $_SESSION['role'] = $row['role'];
      header("Location: dashbord.php");
      exit;

    } else {
      $msg= "❌ Wrong password!";
    }

  } else {
    $msg= "❌ User not found!";
  }

}
?>