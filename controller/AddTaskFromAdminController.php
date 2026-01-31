<?php
// --------------------------------------- Start  Select getDetailsForProject    ---------------------------------------//

$user_id=$_SESSION['user_id'];

if (isset($_GET['assign_project_id'])) {
  $assigned_project_id = $_GET['assign_project_id'];
  if($_SESSION['role']==='admin'){
    $Wherequery="ap.id='$assigned_project_id'";

} else {
     $Wherequery="ap.id='$assigned_project_id' AND kpa.user_id='$user_id'";
}
  $getDetailsForProject = "SELECT 
p.projectName,
p.id AS main_project_id,
ap.project_id,
ap.id AS assign_project_id ,
kpa.taskSummary,
kpa.status,
kpa.taskStartDate,
kpa.taskEndDate,
kpa.user_id,
kpa.id AS project_kpi_assigned_id,
k.kpiName,
k.id AS kpi_id,
u.fullName
FROM projects p JOIN assigned_projects ap ON 
p.id=ap.project_id JOIN kpis_project_assigned kpa ON  kpa.assign_project_id=ap.id JOIN kpis k 
ON kpa.kpi_id=k.id JOIN users u ON kpa.user_id=u.id
 WHERE $Wherequery";
  $resultgetDetailsForProject = mysqli_query($conn, $getDetailsForProject);
}

// --------------------------------------- End Select getDetailsForProject    ---------------------------------------//


// --------------------------------------- Start  Insert getDetailsForProject    ---------------------------------------//
if (isset($_GET['assign_project_id'])) {

    if (isset($_POST['save'])) {

        session_start();

        $user_session_id = $_SESSION['user_id'];
        $assigned_project_id = intval($_GET['assign_project_id']);

        $taskUsers     = $_POST['taskUsers']; // array
        $taskKpis      = mysqli_real_escape_string($conn, $_POST['taskKpis']);
        $taskSummary   = mysqli_real_escape_string($conn, $_POST['taskSummary']);
        $taskStartDate = mysqli_real_escape_string($conn, $_POST['taskStartDate']);
        $taskEndDate   = mysqli_real_escape_string($conn, $_POST['taskEndDate']);

        // تأكيد اختيار مستخدم واحد على الأقل
        if (empty($taskUsers)) {
            die("يجب اختيار مستخدم واحد على الأقل");
        }

        foreach ($taskUsers as $taskUser) {

            $taskUser = mysqli_real_escape_string($conn, $taskUser);

            $insertDetailsForProject = "
                INSERT INTO kpis_project_assigned
                (user_id, kpi_id, assign_project_id, taskSummary, taskStartDate, taskEndDate, created_by)
                VALUES
                ('$taskUser', '$taskKpis', '$assigned_project_id', '$taskSummary', '$taskStartDate', '$taskEndDate', '$user_session_id')
            ";

            mysqli_query($conn, $insertDetailsForProject);
        }

        header("Location: project.php?assign_project_id=$assigned_project_id");
        exit;
    }
}

// --------------------------------------- End  Insert getDetailsForProject    ---------------------------------------//


// ---------------------------------- Start update the stastu  -----------------------------------//

if (isset($_POST['update'])) {



  $taskUser = $_POST['taskUser'];
  $taskKpis = $_POST['taskKpis'];
  $taskSummary = $_POST['taskSummary'];
  $taskStartDate = $_POST['taskStartDate'];
  $taskEndDate = $_POST['taskEndDate'];
  $status = $_POST['status'];
  $id = $_POST['project_kpi_assigned_id'];

  mysqli_query($conn, "
    UPDATE kpis_project_assigned SET
      user_id='$taskUser',
      kpi_id='$taskKpis',
      taskSummary='$taskSummary',
      taskStartDate='$taskStartDate',
      taskEndDate='$taskEndDate',
      status='$status'
    WHERE id='$id'
  ");

  header("Location: " . $_SERVER['REQUEST_URI']);
}



// ----------------------------------End update the stastu -----------------------------------//





// ---------------------------------- Start Delet the KPIS For the project    ----------------------------------//

if (isset($_GET['delete'])) {
  $delete_kpi_project_id = $_GET['delete'];
  $delete_kpi_project = mysqli_query($conn, "DELETE FROM kpis_project_assigned WHERE id='$delete_kpi_project_id' ");
  header("location:project.php?assign_project_id=$assigned_project_id");
}

// ----------------------------------    End Delet the KPIS For the project          ----------------------------------//



// -------------------------------------------------- Start  Dropdown list for all users from the users table  //
$quaryDropdownFroUser = "SELECT  * FROM users";
$resultUser = mysqli_query($conn, $quaryDropdownFroUser);

// -------------------------------------------------- End  Dropdown list for all users from the users table //

// ------------ Start  Dropdown list for all KIPs from the kpis table  -------------------------------------------------- //

$quaryDropdownFroKPIs = "SELECT  * FROM kpis";
$resultKPIs = mysqli_query($conn, $quaryDropdownFroKPIs);

$quaryDropdownFrostatus = "SELECT status FROM kpis_project_assigned";
$resultstatus = mysqli_query($conn, $quaryDropdownFrostatus);


// ----------------- End  Dropdown list for all KIP from the kpis table  -------------------------------------------------- //

// ----------------------------- start num rows for the project  -------------------------------//

$totalStatuses = [];

if (isset($_GET['assign_project_id'])) {


    $assign_project_id = intval($_GET['assign_project_id']);
if($_SESSION['role']==="admin"){
    $rolecounter="kpa.assign_project_id = '$assign_project_id'";

} else {
        $rolecounter=" kpa.assign_project_id = '$assign_project_id' AND kpa.user_id='$user_id'";
}
    
    $queryapproved = "
        SELECT COUNT(*) AS total
        FROM kpis_project_assigned kpa
        WHERE $rolecounter AND status = 'approved'
    ";

    $querypending = "
        SELECT COUNT(*) AS total
        FROM kpis_project_assigned kpa
        WHERE $rolecounter AND status = 'pending'
    ";

    $queryedit = "
        SELECT COUNT(*) AS total
        FROM kpis_project_assigned kpa
        WHERE $rolecounter AND status = 'edit'
    ";

    $resultapproved = mysqli_query($conn, $queryapproved);
    $resultpending  = mysqli_query($conn, $querypending);
    $resultedit     = mysqli_query($conn, $queryedit);

    $rowapproved = mysqli_fetch_assoc($resultapproved);
    $rowpending  = mysqli_fetch_assoc($resultpending);
    $rowedit     = mysqli_fetch_assoc($resultedit);

    $pending = $rowpending['total'] ?? 0;
    $done    = $rowapproved['total'] ?? 0;
    $edit    = $rowedit['total'] ?? 0;
    }

// --------------
// ---------------End num rows for the project ------------------------------//



//----------Select ------------ //

?>