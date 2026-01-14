<!-- POPUP محسن -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4 position-relative">
      <!-- زر الإغلاق بعيد عن العنوان -->
      <button type="button" class="btn-close position-absolute top-3 end-3" data-bs-dismiss="modal" aria-label="Close"></button>

      <h4 class="mb-4 text-center" style="color:#063858">إضافة مشروع جديد</h4>

      <form id="projectForm">
        <div class="row g-3">
          <!-- اسم المشروع -->
          <div class="col-md-6">
            <label class="form-label">اسم المشروع</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
              <input type="text" class="form-control" placeholder="اسم المشروع" required>
            </div>
          </div>

          <!-- الميزانية -->
          <div class="col-md-6">
            <label class="form-label">الميزانية</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
              <input type="number" class="form-control" placeholder="الميزانية" required>
            </div>
          </div>

          <!-- ملفات المشروع -->
       <!-- ملفات المشروع -->
<div class="col-12">
  <label class="form-label">ملفات المشروع</label>

  <!-- هنا سيتم إضافة الملفات ديناميكياً -->
  <div id="filesContainer" class="row g-2">

    <!-- عنصر واحد افتراضي -->
    <div class="col-12 file-item border rounded p-3">
      <div class="row g-2 align-items-center">

        <div class="col-md-5">
          <label>اسم الملف</label>
          <input type="text" class="form-control" placeholder="اسم الملف">
        </div>

        <div class="col-md-5">
          <label>اختر الملف</label>
          <input type="file" class="form-control">
        </div>

        <div class="col-md-2 text-center mt-4">
          <button type="button" class="btn btn-danger removeFileBtn">حذف</button>
        </div>

      </div>
    </div>

  </div>

  <!-- زر إضافة ملف جديد -->
  <div class="mt-3 text-center">
    <button type="button" class="btn btn-success" id="addFileBtn">➕ إضافة ملف جديد</button>
  </div>
</div>


       

      

          <!-- زر الحفظ كبير وواضح -->
          <div class="col-12 text-center mt-4">
            <button type="submit" class="btn-blue btn-lg px-5 py-2">💾 حفظ المشروع</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="js/JsCheckValidityForPopup.js"></script>

<script> 

document.getElementById("addFileBtn").addEventListener("click", function () {

  const container = document.getElementById("filesContainer");

  const newFile = document.createElement("div");
  newFile.className = "col-12 file-item border rounded p-3 mt-2";

  newFile.innerHTML = `
    <div class="row g-2 align-items-center">

      <div class="col-md-5">
        <label>اسم الملف</label>
        <input type="text" class="form-control" placeholder="اسم الملف">
      </div>

      <div class="col-md-5">
        <label>اختر الملف</label>
        <input type="file" class="form-control">
      </div>

      <div class="col-md-2 text-center mt-4">
        <button type="button" class="btn btn-danger removeFileBtn">حذف</button>
      </div>

    </div>
  `;

  container.appendChild(newFile);
});

// حذف عنصر ملف
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("removeFileBtn")) {
    e.target.closest(".file-item").remove();
  }
});
</script>

