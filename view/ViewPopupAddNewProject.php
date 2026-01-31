<div class="modal fade" id="addProjectModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-4 position-relative">

      <button type="button" class="btn-close position-absolute top-3 end-3" data-bs-dismiss="modal"></button>

      <h4 class="mb-4 text-center" style="color:#063858">إضافة مشروع جديد</h4>

      <form method="POST" enctype="multipart/form-data" id="projectForm">

        <div class="row g-3">

          <div class="col-md-6">
            <label>اسم المشروع</label>
            <input type="text" class="form-control" name="projectName" required>
          </div>

          <div class="col-md-6">
            <label>الميزانية</label>
            <input type="number" class="form-control" name="budgetProject" required>
          </div>

          <div class="col-12">
            <label>ملفات المشروع</label>

            <div id="filesContainer">

              <div class="file-item border p-3 rounded mb-2">
                <input type="text" class="form-control mb-2" name="fileNames[]" placeholder="اسم الملف">
                <input type="file" class="form-control" name="projectFiles[]">
                <button type="button" class="btn btn-danger mt-2 removeFileBtn">حذف</button>
              </div>

            </div>
            <button type="button" class="btn btn-success mt-3" id="addFileBtn">➕ إضافة ملف</button>
          </div>
          <div class="col-12 text-center">
            <button type="submit" name="save" class="btn btn-primary px-5">حفظ المشروع</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script>
document.getElementById("addFileBtn").addEventListener("click", function () {

  const container = document.getElementById("filesContainer");

  const div = document.createElement("div");
  div.className = "file-item border p-3 rounded mb-2";

  div.innerHTML = `
    <input type="text" class="form-control mb-2" name="fileNames[]" placeholder="اسم الملف">
    <input type="file" class="form-control" name="projectFiles[]">
    <button type="button" class="btn btn-danger mt-2 removeFileBtn">حذف</button>
  `;

  container.appendChild(div);
});

document.addEventListener("click", function(e){
  if(e.target.classList.contains("removeFileBtn")){
    e.target.closest(".file-item").remove();
  }
});
</script>
