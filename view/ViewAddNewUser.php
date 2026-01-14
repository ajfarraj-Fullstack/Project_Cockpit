<link rel="stylesheet" href="css/StyleCssAddNewUser.css">
<link rel="stylesheet" href="css/StyleCssDashbord.css">
<link rel="stylesheet" href="css/StyleCssNavbar.css">
<link rel="stylesheet" href="css/StyleCssTable.css">
<?php include "ViewNavbar.php" ?>

<!-- زر إضافة مستخدم جديد -->
<div class="container mt-4 text-end">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
    إضافة مستخدم جديد
  </button>
</div>

<!-- جدول المستخدمين -->
<div class="container mt-3">
  <div class="table-responsive">
    <table class="table table-hover text-center align-middle">
      <thead class="table-light">
        <tr>
          <th>اسم المستخدم</th>
          <th>الاسم الكامل</th>
          <th>المسمى الوظيفي</th>
          <th>تاريخ الإنشاء</th>
          <th>الإجراءات</th>
        </tr>
      </thead>

      <tbody>

        <!-- مثال صف -->
        <tr>
          <td>ahmad.f</td>
          <td>أحمد فرّاج</td>
          <td>مصمم واجهات</td>
          <td>2026-01-12</td>
          <td>
            <button class="btn btn-sm btn-warning"
              data-bs-toggle="modal"
              data-bs-target="#editUserModal">
              تعديل
            </button>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>

<!-- Popup إضافة مستخدم -->
<div class="modal fade" id="addUserModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">إضافة مستخدم جديد</h5>

      <form>

        <div class="mb-2">
          <label>اسم المستخدم</label>
          <input type="text" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>الاسم الكامل</label>
          <input type="text" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>المسمى الوظيفي</label>
          <input type="text" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>كلمة المرور</label>
          <input type="password" class="form-control" required>
        </div>

        <div class="text-center mt-3">
          <button type="submit" class="btn btn-success">حفظ</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        </div>

      </form>

    </div>
  </div>
</div>

<!-- Popup تعديل مستخدم -->
<div class="modal fade" id="editUserModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">تعديل بيانات المستخدم</h5>

      <form>

        <div class="mb-2">
          <label>اسم المستخدم</label>
          <input type="text" class="form-control" value="ahmad.f">
        </div>

        <div class="mb-2">
          <label>الاسم الكامل</label>
          <input type="text" class="form-control" value="أحمد فرّاج">
        </div>

        <div class="mb-2">
          <label>المسمى الوظيفي</label>
          <input type="text" class="form-control" value="مصمم واجهات">
        </div>

        <div class="text-center mt-3">
          <button type="submit" class="btn btn-primary">حفظ التعديلات</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        </div>

      </form>

    </div>
  </div>
</div>
