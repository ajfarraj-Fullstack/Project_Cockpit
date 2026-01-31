<?php include "ViewNavbar.php" ?>
<?php if (empty($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
  header("location:index.php");
}
?>
<!-- زر إضافة مستخدم جديد -->
<div class="container mt-4 text-end">
  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
    إضافة مستخدم جديد
  </button>
</div>

<!-- جدول المستخدمين -->
<div class="container mt-3">
  <div class="table-responsive">
    <table  id="example" class="table table-hover text-center align-middle display">
      <thead class="table-light">
        <tr>
          <th>#</th>
          <th>اسم المستخدم</th>
          <th>دور</th>
          <th>الاسم الكامل</th>
          <th>المسمى الوظيفي</th>
          <th>تاريخ الإنشاء</th>
          <th>الإجراءات</th>
        </tr>
      </thead>

      <tbody>

        <?php if (mysqli_num_rows($result) > 0) { ?>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>

            <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['userName']; ?></td>
              <td><?php echo $row['role']; ?></td>
              <td><?php echo $row['fullName']; ?></td>
              <td><?php echo $row['jobTitle']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              <td>
                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal"
                  data-id="<?= $row['id']; ?>" data-username="<?= $row['userName']; ?>"
                  data-fullname="<?= $row['fullName']; ?>" data-jobtitle="<?= $row['jobTitle']; ?>">
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


<!-- Popup إضافة مستخدم -->
<div class="modal fade" id="addUserModal">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">إضافة مستخدم جديد</h5>

      <form method="post">

        <div class="mb-2">
          <label>اسم المستخدم</label>
          <input type="text" name="userName" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>الاسم الكامل</label>
          <input type="text" name="fullName" class="form-control" required>
        </div>

        <div class="mb-2">
          <label>المسمى الوظيفي</label>
          <input type="text" name="jobTitle" class="form-control" required>
        </div>
        <!-- Role -->
        <div class="col-12">
          <label class="form-label">الدور (Role)</label>
          <select class="form-select" name="role" required>
            <option value="">اختر الدور</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="full_admin">Full Admin</option>
          </select>
        </div>

        <div class="mb-2">
          <label>كلمة المرور</label>
          <input type="password" name="password" class="form-control" required>
        </div>

        <div class="text-center mt-3">
          <button type="submit" name="save" class="btn btn-success">حفظ</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
        </div>

      </form>

    </div>
  </div>
</div>



<!-- Popup تعديل مستخدم -->
<div class="modal fade" id="editUserModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content p-3">

      <h5 class="text-center mb-3">تعديل بيانات المستخدم</h5>

      <form method="POST">

        <input type="hidden" name="id" id="edit_id">

        <div class="mb-2">
          <label>اسم المستخدم</label>
          <input type="text" name="userName" id="edit_userName" class="form-control">
        </div>

        <div class="mb-2">
          <label>الاسم الكامل</label>
          <input type="text" name="fullName" id="edit_fullName" class="form-control">
        </div>

        <div class="mb-2">
          <label>المسمى الوظيفي</label>
          <input type="text" name="jobTitle" id="edit_jobTitle" class="form-control">
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

<script src="js/jsFilter.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {

    var editModal = document.getElementById('editUserModal');

    editModal.addEventListener('show.bs.modal', function (event) {

      var button = event.relatedTarget;

      document.getElementById('edit_id').value = button.getAttribute('data-id');
      document.getElementById('edit_userName').value = button.getAttribute('data-username');
      document.getElementById('edit_fullName').value = button.getAttribute('data-fullname');
      document.getElementById('edit_jobTitle').value = button.getAttribute('data-jobtitle');

    });

  });
</script>
<!-- End this function for edit using js and php  -->