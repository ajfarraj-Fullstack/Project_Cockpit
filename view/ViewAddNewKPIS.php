<?php include "ViewNavbar.php" ?>
<?php if (empty($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("location:index.php");
} ?>
<!-- زر إضافة KPI -->
<div class="container mt-4 text-end">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKpiModal">
    إضافة KPI جديد
  </button>
</div>

<!-- جدول KPIs -->
<div class="container mt-3">
  <div class="table-responsive">
    <table   id="example"  class="table table-hover text-center align-middle display">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>اسم الـ KPI</th>
          <th>رمز الـ KPI</th>
          <th>تاريخ الإنشاء</th>
          <th>الإجراءات</th>
        </tr>
      </thead>
      <tbody>
        <!-- مثال صف -->
        <?php if (mysqli_num_rows($result) > 0) { ?>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['kpiName']; ?></td>
              <td><?php echo $row['kpiCode']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              <td>
                <button class="btn btn-sm btn-warning" style="color:#fff;font-weight:900;" data-bs-toggle="modal"
                  data-bs-target="#editKpiModal" data-id="<?= $row['id']; ?>" data-kpiname="<?= $row['kpiName']; ?>"
                  data-kpicode="<?= $row['kpiCode']; ?>">
                  تعديل
                </button>
                <form method="POST" style="display:inline;">
                  <input type="hidden" name="delete_id" value="<?= $row['id']; ?>">
                  <button type="submit" class="btn btn-sm btn-danger" style="color:#fff;font-weight:900;">
                    حذف
                  </button>
                </form>
              </td>
            </tr>
          <?php } ?>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Popup إضافة KPI -->
<div class="modal fade" id="addKpiModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">إضافة KPI جديد</h5>

      <form method="post">

        <div class="mb-2">
          <label>اسم الـ KPI</label>

          <input type="text" name="kpiName" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>رمز الـ KPI</label>
          <input type="text" name="kpiCode" class="form-control" placeholder="مثال: KPI-001" required>
        </div>

        <div class="text-center mt-3">
          <button type="submit" name="save" class="btn btn-success">حفظ</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Popup تعديل KPI -->
<div class="modal fade" id="editKpiModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">تعديل بيانات الـ KPI</h5>

      <form method="post">

        <input type="hidden" name="id" id="edit_id">

        <div class="mb-2">
          <label>اسم الـ KPI</label>
          <input type="text" name="kpiName" id="edit_kpiName" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>رمز الـ KPI</label>
          <input type="text" name="kpiCode" id="edit_kpiCode" class="form-control" required>
        </div>
        <div class="text-center mt-3">
          <button type="submit" name="update" class="btn btn-primary">حفظ التعديلات</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        </div>

      </form>
    </div>
  </div>
</div>


<!-- Start this function for edit using js and php  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="js/jsFilter.js"></script>


<script>
  document.addEventListener('DOMContentLoaded', function () {

    var editModal = document.getElementById('editKpiModal');

    editModal.addEventListener('show.bs.modal', function (event) {

      var button = event.relatedTarget;

      document.getElementById('edit_id').value = button.dataset.id;
      document.getElementById('edit_kpiName').value = button.dataset.kpiname;
      document.getElementById('edit_kpiCode').value = button.dataset.kpicode;

    });

  });
</script>
<!-- End this function for edit using js and php  -->
