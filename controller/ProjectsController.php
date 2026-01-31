<?php
// ------------------------- Start  Insert  add  new Project  ----------------------- //
$global_assigned_project_id = NULL;
  $user_id=$_SESSION['user_id'];

if (isset($_POST['save'])) {
 
  $projectName = trim($_POST['projectName']);
  $budgetProject = floatval($_POST['budgetProject']);

  mysqli_query($conn, "INSERT INTO projects (projectName,budgetProject)
                          VALUES ('$projectName','$budgetProject')");

  $project_id = mysqli_insert_id($conn);
  $user_id = $_SESSION['user_id'];
  mysqli_query($conn, "INSERT INTO assigned_projects (project_id,created_by)
                          VALUES ('$project_id','$user_id')");


  $folder = "uploads/projects/$project_id/";
  if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
  }
  $assigned_project_id = mysqli_insert_id($conn);

  foreach ($_FILES['projectFiles']['tmp_name'] as $i => $tmp) {

    if ($_FILES['projectFiles']['error'][$i] == 0) {

      $fileName = basename($_FILES['projectFiles']['name'][$i]);
      $path = $folder . time() . "_" . $fileName;
      move_uploaded_file($tmp, $path);
      $global_assigned_project_id = $assigned_project_id;
      mysqli_query($conn, "INSERT INTO files
              (name_file,path_file,user_id,kpi_id,assigned_project_id,created_at,created_by)
              VALUES
              ('$fileName','$path','$user_id','$kpi_id','$global_assigned_project_id',NOW(),'$user_id')");
      $file_project_id = mysqli_insert_id($conn);

      mysqli_query($conn, "INSERT INTO project_file_assigned
              (file_id,assigned_project_id,created_at,created_by)
              VALUES
              ('$file_project_id','$global_assigned_project_id',NOW(),'$user_id')");
    }
  }

  header("location:dashbord.php");

}
// ------------------------- End  Insert  add  new Project  ----------------------- //


// ------------------------- Start  Select all Project and files for this project  ----------------------- //

if($_SESSION['role']==="admin"){

$sqlselect = "SELECT p.id AS project_id, ap.id AS assign_project_id , p.projectName,p.budgetProject,
    f.id AS file_id,f.name_file,f.path_file,f.created_at FROM projects p
    JOIN assigned_projects ap ON p.id=ap.project_id
LEFT JOIN files f ON p.id = f.assigned_project_id  ORDER BY p.id DESC  ";

$result = mysqli_query($conn, $sqlselect);
$projects = [];

} else {
  $sqlselect = "SELECT DISTINCT projectName,P.budgetProject,p.id AS project_id, ap.id AS assign_project_id FROM projects p JOIN assigned_projects ap ON p.id=ap.project_id JOIN kpis_project_assigned kpa ON kpa.assign_project_id=ap.id WHERE kpa.user_id='$user_id';
";
$result = mysqli_query($conn, $sqlselect);
$projects = [];

}
// ------------------------- End  Select all Project and files for this project  ----------------------- //



// -------------------------  End Update all the data  for the report  -----------------------------//
if($_SESSION['role']==="admin"){
$quaryNumRowsProject="SELECT COUNT(*)AS TOTAL FROM `projects`";
$resultNumRowsProject=mysqli_query($conn,$quaryNumRowsProject);
$numProjects = mysqli_fetch_assoc($resultNumRowsProject);
$totalProjects = $numProjects['TOTAL'];
} else {
  $quaryNumRowsProject="SELECT DISTINCT kpa.assign_project_id FROM projects p JOIN assigned_projects ap ON p.id=ap.project_id JOIN kpis_project_assigned kpa ON kpa.assign_project_id=ap.id WHERE kpa.user_id='$user_id';
";
$resultNumRowsProject=mysqli_query($conn,$quaryNumRowsProject);
$numProjects = mysqli_num_rows($resultNumRowsProject);
$totalProjects = $numProjects;
}

// -----------------------Start quary for num rows project  -------------------//



//------------------- Start  Select all  files for this project-------------//

$projects = [];

$q = mysqli_query($conn, "SELECT * FROM projects ORDER BY id DESC");

while ($p = mysqli_fetch_assoc($q)) {

  $pid = $p['id'];

  $filesQ = mysqli_query($conn, "
    SELECT f.*
    FROM files f
    JOIN assigned_projects ap ON ap.id = f.assigned_project_id
    WHERE ap.project_id = '$pid'
    ORDER BY f.id DESC
  ");

  $p['files'] = [];

  while ($f = mysqli_fetch_assoc($filesQ)) {
    $p['files'][] = $f;
  }

  $projects[] = $p;
}

//------------------- End  Select all  files for this project-------------//





//------------------- Start  select table project-------------//

if (isset($_GET['edit_id_project'])) {
  $edit_id_project = $_GET['edit_id_project'];
  $quarySelectallData = "SELECT * FROM projects WHERE id='$edit_id_project' ";
  $resultSelectallData = mysqli_query($conn, $quarySelectallData);
  $roweditproject = mysqli_fetch_assoc($resultSelectallData);

}
//------------------- End  select table project-------------//


// --------- Start Update the table project----------------------//

if (isset($_POST['saveupdate'])) {

  $edit_id_project = $_GET['edit_id_project'];
  $projectName = mysqli_real_escape_string($conn, $_POST['projectName']);
  $budgetProject = mysqli_real_escape_string($conn, $_POST['budgetProject']);

  mysqli_query($conn, "
    UPDATE projects 
    SET projectName='$projectName', budgetProject='$budgetProject'
    WHERE id='$edit_id_project'
  ");

  header("Location: dashbord.php");
  exit;
}

// --------- End Update the table project ----------------------//


//------------------- Start  Delet the   files for this project-------------//
if (isset($_GET['delete_file_project'])) {

  $delete_file_project = $_GET['delete_file_project'];

  // حذف الربط مع المشروع
  mysqli_query($conn, "
            DELETE FROM project_file_assigned
            WHERE file_id = $delete_file_project
        ");

  // حذف الملف نفسه
  mysqli_query($conn, "
            DELETE FROM files
            WHERE id = $delete_file_project
        ");
}

//------------------- End   Delet the   files for this project-------------//



//------------------- Start  Add file on the old project-------------//



if (isset($_GET['insert_id_file_project'])) {
  $project_id = (int) $_GET['insert_id_file_project'];
  $queryAssigned = "
    SELECT ap.id AS assigned_project_id
    FROM projects p
    JOIN assigned_projects ap ON ap.project_id = p.id
    WHERE p.id = $project_id
    LIMIT 1
";

  $resultAssigned = mysqli_query($conn, $queryAssigned);
  $rowAssigned = mysqli_fetch_assoc($resultAssigned);
  $assigned_project_id = (int) $rowAssigned['assigned_project_id'];
}

if (isset($_FILES['projectFiles']) && !empty($_FILES['projectFiles']['name'][0])) {
  $user_id = $_SESSION['user_id'];

  foreach ($_FILES['projectFiles']['tmp_name'] as $i => $tmp) {

    if ($_FILES['projectFiles']['error'][$i] === 0) {

      $originalName = basename($_FILES['projectFiles']['name'][$i]);
      $ext = pathinfo($originalName, PATHINFO_EXTENSION);

      $newName = uniqid('file_', true) . '.' . $ext;
      $path = $folder . $newName;

      if (move_uploaded_file($tmp, $path)) {

        // 4️⃣ INSERT into files
        mysqli_query($conn, "
                    INSERT INTO files
                    (name_file, path_file, user_id, created_at, created_by)
                    VALUES
                    ('$originalName', '$path', '$user_id', NOW(), '$user_id')
                ");

        // file id from LAST insert
        $file_id = mysqli_insert_id($conn);

        // 5️⃣ INSERT into project_file_assigned
        mysqli_query($conn, "
                    INSERT INTO project_file_assigned
                    (file_id, assigned_project_id, created_at, created_by)
                    VALUES
                    ('$file_id', '$assigned_project_id', NOW(), '$user_id')
                ");
      }
    }
  }
}



//------------------- End  Add file on the old project -------------//





// ----------✅ بس أضف ملفات على مشروع موجود ----------//







//---------   ---------//


?>