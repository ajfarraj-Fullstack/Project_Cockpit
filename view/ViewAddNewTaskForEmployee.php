<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<button type="button" class="btn btn-primary btn-lg mt-5" data-bs-toggle="modal" data-bs-target="#addProjectModal">
  إضافة تقرير
</button>

<!-- POPUP محسن -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4 position-relative">

      <!-- زر الإغلاق -->
      <button type="button" class="btn-close position-absolute top-3 end-3" data-bs-dismiss="modal"></button>

      <h4 class="mb-4 text-center" style="color:#063858"> إضافة تقرير
      </h4>

      <form id="projectForm" method="POST"  enctype="multipart/form-data">
        <div class="row g-3">

          <!-- السعر -->
          <div class="col-md-12">
            <label class="form-label"> القيمة </label>
            <input type="number"  name="value" class="form-control" placeholder="القيمة اختياري ">
          </div>

            <!-- ملف واحد -->
          <div class="col-md-12">
            <label class="form-label">اسم التقرير </label>
            <input type="text"  name="nameReport" class="form-control" placeholder="اسم التقرير" required>
          </div>

          <!-- ملف واحد -->
          <div class="col-md-6">
            <label class="form-label">اسم الملف </label>
            <input type="text" name="nameFile[]" class="form-control" placeholder="اسم ملف " required>
          </div>

          <div class="col-md-6">
            <label class="form-label">ملف KPIs</label>
            <input type="file"  name="usersfile[]" class="form-control" required>
          </div>

          <!-- التعليق -->
          <div class="col-12">
            <label class="form-label">ملخص التقرير</label>
            <textarea  name="summary" class="form-control" rows="10" 
              placeholder="اكتب أي ملاحظات هنا..."></textarea>
          </div>


          <!-- زر الحفظ -->
          <div class="col-12 text-center mt-4">
            <button type="submit" name="save" class="btn-blue btn-lg px-5">حفظ</button>
          </div>

        </div>
      </form>

    </div>
  </div>
</div>