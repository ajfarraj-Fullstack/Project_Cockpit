<?php
// ------------------------- Start  Insert  add  new KPIs  ----------------------- //
if (isset($_POST['save'])) {

  $kpiName = mysqli_real_escape_string($conn, $_POST['kpiName']);
  $kpiCode = mysqli_real_escape_string($conn, $_POST['kpiCode']);

  $sqlinsert = "INSERT INTO kpis (kpiName, kpiCode)
            VALUES ('$kpiName', '$kpiCode')";

  if (mysqli_query($conn, $sqlinsert)) {
    echo "KPIs added successfully ✅";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
// ------------------------- End Insert  add  new KPIs  ----------------------- //


// ------------------------- Start  Select  add  new KPIs  ----------------------- //

$sqlSelect = "SELECT id, kpiName, kpiCode ,created_at FROM kpis";
$result = mysqli_query($conn, $sqlSelect);

// ------------------------- End Select  add  new KPIs  ----------------------- //


// ------------------------- Start  Update  add  new KPIs  ----------------------- //

if (isset($_POST['update'])) {

  $id = $_POST['id'];
  $kpiName = mysqli_real_escape_string($conn, $_POST['kpiName']);
  $kpiCode = mysqli_real_escape_string($conn, $_POST['kpiCode']);

  $sqlupdate = "UPDATE kpis SET
            kpiName='$kpiName',
            kpiCode='$kpiCode'
            WHERE id='$id'";

  if (mysqli_query($conn, $sqlupdate)) {
    echo "<script>alert('تم التعديل بنجاح ✅');</script>";
  }
}
// ------------------------- End Update  add  new KPIs  ----------------------- //




// ------------------------- Start  delete  add  new KPIs  ----------------------- //



if (isset($_POST['delete_id'])) {
    $id = intval($_POST['delete_id']); 

    
    $sqlDELETE = "DELETE FROM kpis WHERE id=$id";

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


// ------------------------- End delete  add  new KPIs  ----------------------- //




?>