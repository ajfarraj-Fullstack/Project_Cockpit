<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="container mt-4">
  <!-- METRICS -->
  <div class="row g-3">
    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>المشاريع المنجزة</h5>
          <i class="bi bi-check-circle fs-2"></i>
        </div>
        <h2>0</h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>المشاريع المتأخرة</h5>
          <i class="bi bi-exclamation-triangle fs-2"></i>
        </div>
        <h2>0</h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>إجمالي المشاريع</h5>
          <i class="bi bi-folder2-open fs-2"></i>
        </div>
        <h2><?php echo $totalProjects; ?></h2>
      </div>
    </div>
  </div>



  <!-- BUTTON تحت NAVBAR -->
  <?php if ($_SESSION['role'] === 'admin') { ?>
    <div class="top-button">
      <button class="btn-blue" data-bs-toggle="modal" data-bs-target="#addProjectModal">
        ➕ إضافة مشروع
      </button>
    </div>
  <?php } ?>
  <div class="table-responsive mt-3">
    <table id="example" class="table table-hover align-middle text-center display">
      <thead>
        <tr>
          <th>#</th>
          <th>اسم المشروع</th>
          <th>الميزانية</th>
          <th>نسبة الإنجاز</th>
          <th>الحالة</th>
          <th>الإجراءات</th>
        </tr>
      </thead>

      <tbody>

        <!-- Row 2 -->
        <tr>
          <?php if (mysqli_num_rows($result) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <td><?php echo $row['project_id']; ?></td>
              <td><?php echo $row['projectName']; ?></td>
              <td><?php echo $row['budgetProject']; ?></td>
              <td>
                <div class="progress" style="height: 18px;">
                  <div class="progress-bar" style="width: 90%;">90%</div>
                </div>
              </td>


              <td>
                <span class="badge bg-success">مكتمل</span>
              </td>

              <?php ?>
              <td>
                <?php if ($_SESSION['role'] === 'admin') { ?>
                  <a href="dashbord.php?edit_id_project=<?= $row['project_id']; ?>" class="btn btn-sm btn-outline-info">
                    تعديل المشروع
                  </a>
                <?php } ?>
                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                  data-bs-target="#attachmentsModal<?= $row['project_id']; ?>">
                  عرض الملفات
                </button>
                <a href="project.php?assign_project_id=<?= $row['assign_project_id']; ?>"
                  class="btn btn-sm btn-outline-success">
                  عرض المهام
                </a>
                <?php if ($_SESSION['role'] === 'admin') { ?>
                  <a href="file.php?project_id=<?= $row['project_id']; ?>" class="btn btn-sm btn-outline-danger">
                    إضافة ملفات
                  </a>
                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        <?php } ?>


      </tbody>
    </table>
  </div>

  <!-- مودال المرفقات للصف 1 -->
  <?php foreach ($projects as $project): ?>
    <div class="modal fade" id="attachmentsModal<?= $project['id'] ?>" tabindex="-1" aria-hidden="true">

      <div class="modal-dialog modal-md">
        <div class="modal-content p-3">

          <h5 class="text-center mb-3">
            المرفقات - <?= htmlspecialchars($project['projectName']) ?>
          </h5>

          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead class="table-light">
                <tr>
                  <th>اسم المرفق</th>
                  <th>تنزيل</th>
                  <th>حذف</th>
                </tr>
              </thead>

              <tbody>
                <?php if (!empty($project['files'])): ?>
                  <?php foreach ($project['files'] as $file): ?>
                    <tr>
                      <td><?= htmlspecialchars($file['name_file']) ?></td>

                      <td>
                        <a href="<?= htmlspecialchars($file['path_file']) ?>" class="btn btn-sm btn-primary" download>
                          تنزيل
                        </a>
                      </td>

                      <td>
                        <a href="dashbord.php?delete_file_project=<?= $file['id']; ?>"
                          class="btn btn-sm btn-danger delete-file" data-id="<?= $file['id'] ?>">
                          حذف
                        </a>
                      </td>
                    </tr>



                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="3" class="text-muted">
                      لا يوجد مرفقات
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>

            </table>
          </div>
          <div class="text-center mt-2">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              إغلاق
            </button>
          </div>

        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <script>
    document.addEventListener("click", function (e) {
      if (e.target.classList.contains("delete-attachment")) {
        if (confirm("هل أنت متأكد من حذف هذا المرفق؟")) {
          e.target.closest("tr").remove();
        }
      }
    });
  </script>



  <script src="js/jsFilter.js"></script>


  <!-- Start POPUP for add new project and users and uploud all files -->
  <?php include "View/ViewPOPUPAddNewProject.php" ?>

  <!-- End POPUP for add new project and users and uploud all files -->

  <!-- Start POPUP for edit the  project and users and uploud all files -->

  <?php include "ViewEditProject.php" ?>

  <!-- End POPUP for edit the  project and users and uploud all files -->

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">

  </script>


  <script src="js/JschartForProject.js">
  </script>