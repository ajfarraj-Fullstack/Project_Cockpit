<!-- POPUP إضافة مهمة جديدة -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4 position-relative">

      <!-- زر الإغلاق -->
      <button type="button" class="btn-close position-absolute top-3 end-3" data-bs-dismiss="modal"></button>

      <h4 class="mb-4 text-center" style="color:#063858">
        إضافة مهمة جديدة
      </h4>

      <form id="taskForm" method="post">
        <div class="row g-3">

          <!-- User -->
    <div class="mb-3">
  <label class="form-label">المستخدم المسؤول عن المهمة</label>

  <div class="border rounded p-3" style="max-height:220px; overflow-y:auto;">
    <?php foreach ($resultUser as $rowUser) { ?>
      <div class="form-check">
        <input 
          class="form-check-input" 
          type="checkbox" 
          name="taskUsers[]" 
          value="<?= $rowUser['id']; ?>" 
          id="user_<?= $rowUser['id']; ?>"
        >
        <label class="form-check-label" for="user_<?= $rowUser['id']; ?>">
          <?= $rowUser['fullName']; ?>
        </label>
      </div>
    <?php } ?>
  </div>
</div>


          <!-- KPI -->
          <div class="col-12">
            <label class="form-label">KPI</label>
            <select class="form-select" name="taskKpis" required>
              <option value="">اختر KPI</option>
              <?php foreach ($resultKPIs as $rowKpis){ ?>
              <option value="<?php echo $rowKpis['id'];?>"><?php echo $rowKpis['kpiName'];?></option>
              <?php } ?>
            </select>
          </div>


          <!-- ملاحظات -->
          <div class="col-12">
            <label class="form-label">ملاحظات / تعليق</label>
            <textarea class="form-control" name="taskSummary" rows="3"></textarea>
          </div>

          <!-- التواريخ -->
          <div class="col-md-6">
            <label class="form-label">تاريخ البدء</label>
            <input type="date" name="taskStartDate" class="form-control" required>
          </div>

          <div class="col-md-6">
            <label class="form-label">تاريخ الانتهاء</label>
            <input type="date"  name="taskEndDate" class="form-control" required>
          </div>

          <!-- حفظ -->
          <div class="col-12 text-center mt-4">
            <button type="submit" name="save" class="btn-blue btn-lg px-5">
              حفظ المهمة
            </button>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>