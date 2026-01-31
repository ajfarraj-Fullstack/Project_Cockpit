<style>
  /* Upload Card */
.upload-card {
  border-radius: 18px;
  border: none;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
  background: white;
}

/* Card Header */
.upload-card .card-header {
  background: linear-gradient(135deg, #0E79BE, #063858);
  color: white;
  border-radius: 18px 18px 0 0;
  padding: 18px;
}

/* File Input */
.file-input {
  border-radius: 12px;
  padding: 10px;
  border: 2px dashed #0E79BE;
  cursor: pointer;
}

.file-input:focus {
  box-shadow: none;
  border-color: #063858;
}

/* Buttons */
.upload-card .btn {
  border-radius: 12px;
  font-weight: 600;
}

.btn-outline-secondary {
  border-color: #adb5bd;
  color: #495057;
}

.btn-outline-secondary:hover {
  background: #e9ecef;
}

/* Mobile tweaks */
@media (max-width: 768px) {
  .upload-card {
    margin: 10px;
  }

  .upload-card h5 {
    font-size: 1rem;
  }
}

  </style>
<?php include "ViewNavbar.php"; ?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">

      <div class="card upload-card">
        <div class="card-header text-center">
          <h5 class="mb-0">📁 إضافة ملفات للمشروع</h5>
        </div>

        <div class="card-body">
          <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="project_id" value="<?= $project_id ?>">

            <div class="mb-4">
              <label class="form-label fw-bold">اختر الملفات</label>
              <input type="file" name="projectFiles[]" class="form-control file-input" multiple>
              <small class="text-muted">يمكنك رفع أكثر من ملف مرة واحدة</small>
            </div>

            <div class="d-flex justify-content-between align-items-center">
              <a href="dashbord.php" class="btn btn-outline-secondary">
             رجوع الى صفحة المشاريع   ⬅ 
              </a>

              <button type="submit" name="upload" class="btn btn-primary px-4">
                ⬆ رفع الملفات
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
