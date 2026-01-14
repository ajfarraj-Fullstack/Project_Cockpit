<!-- POPUP إضافة مهمة جديدة -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4 position-relative">

      <!-- زر الإغلاق -->
      <button type="button"
              class="btn-close position-absolute top-3 end-3"
              data-bs-dismiss="modal"></button>

      <h4 class="mb-4 text-center" style="color:#063858">
        إضافة مهمة جديدة
      </h4>

      <form id="taskForm">
        <div class="row g-3">

          <!-- User -->
          <div class="col-12">
            <label class="form-label">المستخدم المسؤول عن المهمة</label>
            <select class="form-select" name="task_user" required>
              <option value="">اختر المستخدم</option>
              <option value="1">أحمد محمد</option>
              <option value="2">سارة علي</option>
              <option value="3">محمد خالد</option>
            </select>
          </div>

          <!-- KPI -->
          <div class="col-12">
            <label class="form-label">KPI</label>
            <select class="form-select" name="kpi" required>
              <option value="">اختر KPI</option>
              <option value="field_supervision">الإشراف على التنفيذ الميداني</option>
              <option value="contractor_coordination">التنسيق مع المقاولين</option>
              <option value="facade_management">إدارة الواجهات</option>
              <option value="timeline_control">ضبط الجداول الزمنية</option>
            </select>
          </div>

         

          <!-- ملاحظات -->
          <div class="col-12">
            <label class="form-label">ملاحظات / تعليق</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>

          <!-- التواريخ -->
          <div class="col-md-6">
            <label class="form-label">تاريخ البدء</label>
            <input type="date" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">تاريخ الانتهاء</label>
            <input type="date" class="form-control" required>
          </div>

          <!-- حفظ -->
          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn-blue btn-lg px-5">
             حفظ المهمة
            </button>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>
