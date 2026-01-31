<?php include "ViewNavbar.php" ?>
<div class="container mt-4">

  <!-- زر إضافة تقرير -->
  <div class="d-flex align-items-center gap-2 mb-5">

    <?php include "ViewAddNewTaskForEmployee.php" ?>

  </div>

  <!-- جدول التقارير -->
  <table id="example" class="table table-bordered text-center align-middle display">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>القيمة</th>
        <th>اسم التقرير</th>
        <th>ملخص التقرير</th>
        <th>الاجرات</th>
      </tr>
    </thead>
    <tbody>

      <?php if ($resultone && mysqli_num_rows($resultone) > 0) { ?>
        <?php foreach ($resultone as $rowResultRowReport) { ?>
          <tr>
            <td><?= $rowResultRowReport['report_id']; ?></td>
            <td><?= $rowResultRowReport['value']; ?></td>
            <td><?= $rowResultRowReport['nameReport']; ?></td>
            <td><?= $rowResultRowReport['summary']; ?></td>
            <td>
              <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewFile1">
                عرض
              </button>
              <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                data-bs-target="#edit<?= $rowResultRowReport['report_id'] ?>">
                تعديل
              </a>

              <a href="?delete_report=<?= $rowResultRowReport['report_id'] ?>" class="btn btn-danger btn-sm">
                حذف
              </a>
            </td>
          </tr>
        <?php } ?>
      <?php } ?>
    </tbody>
  </table>
</div>

<!-- ---------------- عرض ملف صف 1 ---------------- -->
<div class="modal fade" id="viewFile1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3 text-center">
      <h5>عرض الملف</h5>
      <a href="<?php echo $rowResultRowReport['path_file']; ?>"><?php echo $rowResultRowReport['path_file']; ?></a>
    </div>
  </div>
</div>


<!-- ---------------- تعديل صف 1 ---------------- -->
<div class="modal fade" id="edit<?= $rowResultRowReport['report_id'] ?>" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">تعديل التقرير</h5>

      <form method="POST" enctype="multipart/form-data">

        <input type="hidden" name="report_id"
               value="<?= $rowResultRowReport['report_id'] ?>">

        <label>اسم التقرير</label>
        <input type="text" name="nameReport"
               class="form-control mb-2"
               value="<?= $rowResultRowReport['nameReport'] ?>" required>

        <label>القيمة</label>
        <input type="number" name="value"
               class="form-control mb-2"
               value="<?= $rowResultRowReport['value'] ?>" required>

        <label>الملخص</label>
        <textarea name="summary"
                  class="form-control mb-2"><?= $rowResultRowReport['summary'] ?></textarea>

        <button type="submit" name="update_report"
                class="btn btn-primary w-100">
          حفظ
        </button>
      </form>

    </div>
  </div>
</div>

<script src="js/jsFilter.js"></script>