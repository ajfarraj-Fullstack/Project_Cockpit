<?php include "ViewNavbar.php" ?>

<style>
  .filter-container {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 15px 0;
    font-family: 'Segoe UI', Tahoma, sans-serif;
  }

  .filter-container label {
    font-weight: 600;
    color: #333;
  }

  #jobFilter {
    padding: 8px 12px;
    border: 2px solid #3b82f6;
    /* أزرق قريب */
    border-radius: 6px;
    font-size: 14px;
    outline: none;
    transition: 0.3s;
  }

  #jobFilter:focus {
    border-color: #2563eb;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
  }

  .filter-btn {
    padding: 8px 16px;
    background-color: #3b82f6;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
  }

  .filter-btn:hover {
    background-color: #2563eb;
  }
</style>
<div class="container">

  <!-- عنوان وأزرار -->
  <div class="d-flex justify-content-between align-items-center mt-4 mb-2">
    <h5 style="color:#063858" class="m-0">قائمة التاسكات</h5>
    <?php if ($_SESSION['role'] === "admin") { ?>

      <div class="d-flex gap-2">
        <button type="button" class="btn-blue btn-sm" data-bs-toggle="modal" data-bs-target="#addTaskModal">
          ➕ إضافة مهمة
        </button>

      </div>
    <?php } ?>
  </div>


  <!-- بطاقات المهام -->
  <div class="row g-3 mt-4">
    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>التاسكات المنجزة</h5>
          <i class="bi bi-check2-circle fs-2"></i>
        </div>
        <h2><?php echo $done ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>قيد العمل</h5>
          <i class="bi bi-hourglass-split fs-2"></i>
        </div>
        <h2><?php echo $pending; ?></h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>التاسكات المتوقفة</h5>
          <i class="bi bi-pause-circle fs-2"></i>
        </div>
        <h2>
          <?php echo $edit; ?>
        </h2>
      </div>
    </div>
  </div>


  <div class="filter-container">
    <label for="jobFilter">اختر الحالة:</label>

    <select id="jobFilter">
      <option value=""> الحالة</option>
      <option value="approved">approved</option>
      <option value="pending">pending</option>
      <option value="edit">edit</option>
    </select>
  </div>

  <!-- جدول المشاريع -->

  <table id="example" class="table align-middle table-bordered text-center display">
    <div class="table-responsive mt-4">
      <thead class="table-light">
        <tr>
          <th>اسم المشروع</th>
          <th>KPIs</th>
          <th>الوصف</th>
          <th>التكليف</th>
          <th>الحالة</th>
          <th>تاريخ البدء</th>
          <th>تاريخ الانتهاء</th>
          <th> الاجراءت</th>
        </tr>
      </thead>

      <tbody>
        <!-- صف 1 -->
        <?php if (isset($_GET['assign_project_id'])) { ?>

          <?php foreach ($resultgetDetailsForProject as $rowGetDetailsForProject) { ?>
            <tr>
              <td><?= $rowGetDetailsForProject['projectName']; ?></td>
              <td><?= $rowGetDetailsForProject['kpiName']; ?></td>
              <td><?= $rowGetDetailsForProject['taskSummary']; ?></td>
              <td><span class="badge text-dark"><?= $rowGetDetailsForProject['fullName']; ?></span></td>
              <td><span class="badge bg-warning text-dark"><?= $rowGetDetailsForProject['status']; ?></span></td>
              <td><?= $rowGetDetailsForProject['taskStartDate']; ?></td>
              <td><?= $rowGetDetailsForProject['taskEndDate']; ?></td>
              <td>
                <?php if ($_SESSION['role'] === "admin") { ?>
                  <button class="btn btn-sm btn-outline-primary btn-edit" data-bs-toggle="modal" data-bs-target="#editModal"
                    data-id="<?= $rowGetDetailsForProject['project_kpi_assigned_id']; ?>"
                    data-user="<?= $rowGetDetailsForProject['user_id']; ?>"
                    data-kpi="<?= $rowGetDetailsForProject['kpi_id']; ?>"
                    data-summary="<?= $rowGetDetailsForProject['taskSummary']; ?>"
                    data-start="<?= $rowGetDetailsForProject['taskStartDate']; ?>"
                    data-end="<?= $rowGetDetailsForProject['taskEndDate']; ?>"
                    data-status="<?= $rowGetDetailsForProject['status']; ?>">
                    ✏️ تعديل
                  </button>


                  <a href="<?= $_SERVER['REQUEST_URI']; ?>&delete=<?= $rowGetDetailsForProject['project_kpi_assigned_id']; ?>"
                    class="btn btn-sm btn-outline-danger">🗑️ حذف</a>
                <?php } ?>
                <button  style="display:none;" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#attachmentsModal2">
                  عرض المرفقات
                </button>
                <a href="reportemployee.php?assign_project_id=<?= $rowGetDetailsForProject['assign_project_id']; ?>&project_kpi_assigned_id=<?= $rowGetDetailsForProject['project_kpi_assigned_id']; ?>&kpi_id=<?= $rowGetDetailsForProject['kpi_id']; ?> "
                  class="btn btn-sm btn-outline-secondary">عرض التقرير</a>
              </td>

            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
  </table>
</div>
</div>



<!-- مودال المرفقات للصف 2 -->
<div class="modal fade" id="attachmentsModal2" tabindex="-1" aria-labelledby="attachmentsLabel2" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-3">
      <h5 class="text-center mb-3">المرفقات - مشروع مدينة الأيزو – بني كنانة</h5>
      <div class="table-responsive">
        <table class="table table-bordered text-center">
          <thead class="table-light">
            <tr>
              <th>اسم المرفق</th>
              <th>تنزيل</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>عقد المقاول.pdf</td>
              <td><a href="files/contract.pdf" class="btn btn-sm btn-primary" download>تنزيل</a></td>
            </tr>
            <tr>
              <td>خطة التنفيذ.xlsx</td>
              <td><a href="files/execution.xlsx" class="btn btn-sm btn-primary" download>تنزيل</a></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="text-center mt-2">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>

<!-- التعديل الخاص في التاسك من قبل المديد تعديل الحالة  -->
<div class="modal fade" id="editModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <form method="POST">
      <div class="modal-content">
        <div class="" style="padding-inline: 25px;
    padding-top: 18px;">
          <button type="button" class="btn-close position-absolute top-3 end-3" data-bs-dismiss="modal"></button>
          <h4 class="mb-4 text-center">تعديل المهمة</h4>
        </div>

        <div class="modal-body">

          <input type="hidden" name="project_kpi_assigned_id" id="edit_id">

          <div class="row">
            <div class="col-md-6">
              <label>الموظف</label>
              <select name="taskUser" id="edit_user" class="form-select">
                <?php foreach ($resultUser as $u) { ?>
                  <option value="<?= $u['id']; ?>"><?= $u['fullName']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6">
              <label>KPI</label>
              <select name="taskKpis" id="edit_kpi" class="form-select">
                <?php foreach ($resultKPIs as $k) { ?>
                  <option value="<?= $k['id']; ?>"><?= $k['kpiName']; ?></option>
                <?php } ?>
              </select>
            </div>

            <div class="col-md-6">
              <label>الحالة</label>
              <select name="status" id="edit_status" class="form-select">
                <option value="pending">pending</option>
                <option value="edit">edit</option>
                <option value="approved">approved</option>
              </select>
            </div>


            <div class="col-md-12 mb-3">
              <label>الوصف</label>
              <input type="text" name="taskSummary" id="edit_summary" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
              <label>تاريخ البداية</label>
              <input type="date" name="taskStartDate" id="edit_start" class="form-control">
            </div>

            <div class="col-md-6 mb-3">
              <label>تاريخ النهاية</label>
              <input type="date" name="taskEndDate" id="edit_end" class="form-control">
            </div>
          </div>

        </div>

        <div class="modal-footer" style="justify-content: center;">
          <button type="submit" name="update" class="btn btn-primary">حفظ</button>
        </div>

      </div>
    </form>
  </div>
</div>









<?php include "ViewAddTaskFromAdmin.php"; ?>
<?php include "ViewAddUserFromTheProject.php"; ?>

<script src="js/jsFilter.js"></script>

<script>
  document.querySelectorAll('.btn-edit').forEach(btn => {
    btn.addEventListener('click', function () {
      document.getElementById('edit_id').value = this.dataset.id;
      console.log(document.getElementById('edit_id').value);
      document.getElementById('edit_user').value = this.dataset.user;
      document.getElementById('edit_kpi').value = this.dataset.kpi;
      document.getElementById('edit_summary').value = this.dataset.summary;
      document.getElementById('edit_start').value = this.dataset.start;
      document.getElementById('edit_end').value = this.dataset.end;
      document.getElementById('edit_status').value = this.dataset.status;
    });
  });
</script>






<!-- Bootstrap JS فقط مرة واحدة في آخر الصفحة -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>