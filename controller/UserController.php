<?php
// ------------------------- Start  Insert  add  New user  ----------------------- //
 
if (isset($_POST['save'])) {

  $userName = mysqli_real_escape_string($conn, $_POST['userName']);
  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $jobTitle = mysqli_real_escape_string($conn, $_POST['jobTitle']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO users (userName, fullName,jobTitle,role,password)
            VALUES ('$userName', '$fullName','$jobTitle','$role','$password')";

  if (mysqli_query($conn, $sql)) {
    echo "User added successfully ✅";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}  
// ------------------------- End Insert  add  New user  ----------------------- //

// ------------------------- Start Select all Users   ----------------------- //

$sqlSelect = "SELECT id, userName, fullName, jobTitle, role,created_at FROM users";
$result = mysqli_query($conn, $sqlSelect);

// ------------------------- End Select all Users   ----------------------- //



// ------------------------- Edit Select all Users   ----------------------- //

if (isset($_POST['update'])) {

  $id=$_POST['id'];
  $userName = mysqli_real_escape_string($conn, $_POST['userName']);
  $fullName = mysqli_real_escape_string($conn, $_POST['fullName']);
  $jobTitle = mysqli_real_escape_string($conn, $_POST['jobTitle']);

  $sqlupdate = "UPDATE users SET
            userName='$userName',
            fullName='$fullName',
            jobTitle='$jobTitle'
          WHERE id='$id'";

  if (mysqli_query($conn, $sqlupdate)) {
    echo "<script>alert('تم التعديل بنجاح ✅');</script>";
  }
}
// ------------------------- Edit Select all Users   ----------------------- //





// ------------------------- Delite Select all Users   ----------------------- //

if (isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']); 

    
    $sqlDELETE = "DELETE FROM users WHERE id=$id";

    if (mysqli_query($conn, $sqlDELETE)) {
        // إذا نجح الحذف
        echo "<script>alert('تم الحذف بنجاح ✅');</script>";
        // إعادة تحميل الصفحة لتحديث الجدول
        echo "<script>window.location.href=window.location.href;</script>";
        exit;
    } else {
        echo "<script>alert('فشل الحذف: " . mysqli_error($conn) . "');</script>";
    }
}
// ------------------------- Delite Select all Users   ----------------------- //

?>