<?php
//-------------------------- Start insert report    ----------------------------- //
if (isset($_POST['save'])) {
  $nameReport = mysqli_real_escape_string($conn, $_POST['nameReport']);
  $value = mysqli_real_escape_string($conn, $_POST['value']);
  $summary = mysqli_real_escape_string($conn, $_POST['summary']);


  if (isset($_GET['assign_project_id']) && isset($_GET['kpi_id']) && isset($_GET['project_kpi_assigned_id'])) {

    $assigned_project_id = $_GET['assign_project_id'];
    $kpi_id = $_GET['kpi_id'];
    $kpi_project_assigned_id = $_GET['project_kpi_assigned_id'];
    $user_id = $_SESSION['user_id'];

    $folder = "uploads/projects/$assigned_project_id/";
    if (!is_dir($folder)) {
      mkdir($folder, 0777, true);
    }
    foreach ($_FILES['usersfile']['tmp_name'] as $i => $tmp) {

      if ($_FILES['usersfile']['error'][$i] == 0) {

        $fileName = basename($_FILES['usersfile']['name'][$i]);
        $path = $folder . time() . "_" . $fileName;
        move_uploaded_file($tmp, $path);
        mysqli_query($conn, "INSERT INTO files
              (name_file,path_file,user_id,kpi_id,assigned_project_id,created_at,created_by)
              VALUES
              ('$fileName','$path','$user_id','$kpi_id','$assigned_project_id',NOW(),'$user_id')");
      }
    }
    $file_id = mysqli_insert_id($conn);
    mysqli_query($conn, "INSERT INTO report_file_assigned
              (file_id,kpi_project_assigned_id,user_id,created_at,created_by)
              VALUES
              ('$file_id','$kpi_project_assigned_id','$user_id',NOW(),'$user_id')");

    $report_assinged_file_id = mysqli_insert_id($conn);

    mysqli_query($conn, "INSERT INTO reports (nameReport,value,summary,kpi_project_assigned_id,report_file_assigned_id,
created_by) VALUES ('$nameReport','$value','$summary','$kpi_project_assigned_id','$report_assinged_file_id','$user_id')");

  }
  echo "<script> windows.reload();</script>";

}
  
//-------------------------- End insert report      ----------------------------- //

// ------------------------- Start Select for all the data report   --------------------//

$kpi_project_assigned_id = $_GET['project_kpi_assigned_id'] ?? null;
$resultone = false; 

if ($kpi_project_assigned_id) {
    $query = "
    SELECT 
        r.id AS report_id,
        r.nameReport,
        r.value,
        r.summary,
        f.name_file,
        f.path_file
    FROM reports r
    JOIN report_file_assigned rfa ON r.report_file_assigned_id = rfa.id
    JOIN files f ON rfa.file_id = f.id
    WHERE r.kpi_project_assigned_id = '$kpi_project_assigned_id'
    ";

    $resultone = mysqli_query($conn, $query);
}
// ------------------------- End Select for all the data report   --------------------//

//-------------------------- Start delete all the data report    -------------------//
if (isset($_GET['delete_report'])) {

    $report_id = intval($_GET['delete_report']);

    $sqlQuaryDelete = "
        SELECT 
            r.id AS report_id,
            f.id AS file_id,
            f.path_file,
            rfa.id AS rfa_id
        FROM reports r
        LEFT JOIN report_file_assigned rfa 
            ON r.report_file_assigned_id = rfa.id
        LEFT JOIN files f 
            ON rfa.file_id = f.id
        WHERE r.id = '$report_id'
    ";

    $q = mysqli_query($conn, $sqlQuaryDelete);

    if ($q && mysqli_num_rows($q) > 0) {

        $row = mysqli_fetch_assoc($q);

        // 1️⃣ حذف الملف من السيرفر
        if (!empty($row['path_file']) && file_exists($row['path_file'])) {
            unlink($row['path_file']);
        }

        // 2️⃣ حذف من files
        if (!empty($row['file_id'])) {
            mysqli_query($conn, "DELETE FROM files WHERE id = '{$row['file_id']}'");
        }

        // 3️⃣ حذف من الربط
        if (!empty($row['rfa_id'])) {
            mysqli_query($conn, "DELETE FROM report_file_assigned WHERE id = '{$row['rfa_id']}'");
        }

        // 4️⃣ حذف التقرير
        mysqli_query($conn, "DELETE FROM reports WHERE id = '$report_id'");

    } else {
        echo "التقرير غير موجود";
    } 
     echo "<script> windows.reload();</script>";

}
//-------------------------- End delete all the data report    -------------------//


// -------------------------  Start Update all the data  for the report  -----------------------------//

if (isset($_POST['update_report'])) {

    $report_id = intval($_POST['report_id']);

    $nameReport = mysqli_real_escape_string($conn, $_POST['nameReport']);
    $value      = mysqli_real_escape_string($conn, $_POST['value']);
    $summary    = mysqli_real_escape_string($conn, $_POST['summary']);

    // تحديث بيانات التقرير
    mysqli_query($conn, "
        UPDATE reports SET
            nameReport = '$nameReport',
            value = '$value',
            summary = '$summary'
        WHERE id = '$report_id'
    ");

    /* =============================
       تحديث الملف (اختياري)
    ============================== */

    if (!empty($_FILES['usersfile']['name'][0])) {

        // جلب الملف القديم
        $q = mysqli_query($conn, "
            SELECT f.id, f.path_file
            FROM reports r
            LEFT JOIN report_file_assigned rfa ON r.report_file_assigned_id = rfa.id
            LEFT JOIN files f ON rfa.file_id = f.id
            WHERE r.id = '$report_id'
        ");

        if ($q && mysqli_num_rows($q) > 0) {

            $row = mysqli_fetch_assoc($q);

            // حذف الملف القديم
            if (!empty($row['path_file']) && file_exists($row['path_file'])) {
                unlink($row['path_file']);
            }

            // رفع الملف الجديد
            $folder = "uploads/projects/{$_GET['assign_project_id']}/";
            if (!is_dir($folder)) {
                mkdir($folder, 0755, true);
            }

            $fileName = $_FILES['usersfile']['name'][0];
            $tmp      = $_FILES['usersfile']['tmp_name'][0];
            $path     = $folder . time() . "_" . $fileName;

            move_uploaded_file($tmp, $path);

            // تحديث الملف في DB
            if (!empty($row['id'])) {
                mysqli_query($conn, "
                    UPDATE files SET
                        name_file = '$fileName',
                        path_file = '$path'
                    WHERE id = '{$row['id']}'
                ");
            }
        }
    }
    // إعادة تحميل الصفحة
    header("Location: reportemployee.php?assign_project_id={$_GET['assign_project_id']}&project_kpi_assigned_id={$_GET['project_kpi_assigned_id']}&kpi_id={$_GET['kpi_id']}");
    exit;
}




?>