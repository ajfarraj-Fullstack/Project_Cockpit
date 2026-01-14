<!-- POPUP إضافة مستخدم للمشروع -->
<div class="modal fade" id="addUserToProjectModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-4 position-relative">

      <!-- زر الإغلاق -->
      <button type="button"
              class="btn-close position-absolute top-3 end-3"
              data-bs-dismiss="modal"></button>

      <h4 class="mb-4 text-center" style="color:#063858">
        إضافة مستخدم للمشروع
      </h4>

      <form id="addUserForm">
        <div class="row g-3">

          <!-- User Name -->
          <div class="col-12">
            <label class="form-label">اسم المستخدم</label>
            <select class="form-select" name="user_id" required>
              <option value="">اختر المستخدم</option>
              <option value="1">أحمد محمد</option>
              <option value="2">سارة علي</option>
              <option value="3">محمد خالد</option>
            </select>
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

          <!-- حفظ -->
          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn-blue btn-lg px-5">
               حفظ
            </button>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>
