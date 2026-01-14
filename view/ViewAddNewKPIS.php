
<?php include "ViewNavbar.php" ?>

<!-- زر إضافة KPI -->
<div class="container mt-4 text-end">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addKpiModal">
    إضافة KPI جديد
  </button>
</div>

<!-- جدول KPIs -->
<div class="container mt-3">
  <div class="table-responsive">
    <table class="table table-hover text-center align-middle">
      <thead class="table-light">
        <tr>
          <th>اسم الـ KPI</th>
          <th>رمز الـ KPI</th>
          <th>تاريخ الإنشاء</th>
          <th>الإجراءات</th>
        </tr>
      </thead>

      <tbody>
        <!-- مثال صف -->
        <tr>
          <td>الإشراف على التنفيذ الميداني</td>
          <td>KPI-001</td>
          <td>2026-01-12</td>
          <td>
            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editKpiModal">
              تعديل
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

<!-- Popup إضافة KPI -->
<div class="modal fade" id="addKpiModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">إضافة KPI جديد</h5>

      <form method="post" action="save_kpi.php">

        <div class="mb-2">
          <label>اسم الـ KPI</label>
          <input type="text" name="kpi_name" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>رمز الـ KPI</label>
          <input type="text" name="kpi_code" class="form-control" placeholder="مثال: KPI-001" required>
        </div>

        <div class="text-center mt-3">
          <button type="submit" class="btn btn-success">حفظ</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Popup تعديل KPI -->
<div class="modal fade" id="editKpiModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">تعديل بيانات الـ KPI</h5>

      <form method="post" action="update_kpi.php">

        <div class="mb-2">
          <label>اسم الـ KPI</label>
          <input type="text" name="kpi_name" class="form-control" value="الإشراف على التنفيذ الميداني" required>
        </div>

        <div class="mb-2">
          <label>رمز الـ KPI</label>
          <input type="text" name="kpi_code" class="form-control" value="KPI-001" required>
        </div>

        <div class="text-center mt-3">
          <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        </div>

      </form>

    </div>
  </div>
</div>
