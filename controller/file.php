<?php

if (isset($_POST['upload'])) {

  $project_id = intval($_POST['project_id']);
  $user_id = $_SESSION['user_id'];

  if (!$project_id) {
    die('Project ID missing');
  }

  // 🔹 نجيب assigned_project_id من قاعدة البيانات
  $res = mysqli_query($conn,
    "SELECT id FROM assigned_projects WHERE project_id = $project_id LIMIT 1"
  );

  if (!$res || mysqli_num_rows($res) == 0) {
    die('Assigned project not found');
  }

  $row = mysqli_fetch_assoc($res);
  $assigned_project_id = $row['id'];

  $folder = "uploads/projects/$project_id/";
  if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
  }

  foreach ($_FILES['projectFiles']['tmp_name'] as $i => $tmp) {

    if ($_FILES['projectFiles']['error'][$i] === 0) {

      $fileName = basename($_FILES['projectFiles']['name'][$i]);
      $path = $folder . time() . "_" . $fileName;

      if (move_uploaded_file($tmp, $path)) {

        mysqli_query($conn, "INSERT INTO files
          (name_file, path_file, user_id, assigned_project_id, created_at, created_by)
          VALUES
          ('$fileName','$path','$user_id','$assigned_project_id',NOW(),'$user_id')");

        $file_id = mysqli_insert_id($conn);

        mysqli_query($conn, "INSERT INTO project_file_assigned
          (file_id, assigned_project_id, created_at, created_by)
          VALUES
          ('$file_id','$assigned_project_id',NOW(),'$user_id')");
      }
    }
  }

  header("Location:file.php?project_id=$project_id");
  exit;
}
?>
