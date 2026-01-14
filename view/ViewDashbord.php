<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<?php include "ViewNavbar.php" ?>


<div class="container mt-4">
  <!-- METRICS -->
  <div class="row g-3">
    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>المشاريع المنجزة</h5>
          <i class="bi bi-check-circle fs-2"></i>
        </div>
        <h2>12</h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>المشاريع المتأخرة</h5>
          <i class="bi bi-exclamation-triangle fs-2"></i>
        </div>
        <h2>3</h2>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card-metric">
        <div class="d-flex justify-content-between align-items-center">
          <h5>إجمالي المشاريع</h5>
          <i class="bi bi-folder2-open fs-2"></i>
        </div>
        <h2>18</h2>
      </div>
    </div>
  </div>



  <!-- BUTTON تحت NAVBAR -->
  <div class="top-button">
    <button class="btn-blue" data-bs-toggle="modal" data-bs-target="#addProjectModal">
      ➕ إضافة مشروع
    </button>
  </div>

  <div class="table-responsive mt-3">
    <table class="table table-hover align-middle text-center">
      <thead>
        <tr>
          <th>اسم المشروع</th>
          <th>نسبة الإنجاز</th>
          <th>الحالة</th>
          <th>الإجراءات</th>
        </tr>
      </thead>

      <tbody>

        <!-- Row 1 -->
        <tr>
          <td>مشروع مدينة الأيزو – الحمر</td>

          <!-- Progress Percentage -->
          <td>
            <div class="progress" style="height: 18px;">
              <div class="progress-bar" style="width: 45%;">45%</div>
            </div>
          </td>

          <!-- Status -->
          <!-- قيد التنفيذ - أصفر -->
          <td>
            <span class="badge bg-warning text-dark">قيد التنفيذ</span>
          </td>

          <!-- مكتمل - أخضر -->
          <!--

<td>
  <span class="badge bg-success">مكتمل</span>
</td>
-->
          <!-- متوقف - أحمر -->
          <!--
<td>
  <span class="badge bg-danger">متوقف</span>
</td>
-->
          <!-- View Attachments Button -->
          <td>
            <a href="#.php" class="btn btn-sm btn-outline-primary">
              عرض الملفات
            </a>
            <a href="project.php" class="btn btn-sm btn-outline-success">
              عرض المهام
            </a>
          </td>


        </tr>

        <!-- Row 2 -->
        <tr>
          <td>مشروع مدينة الأيزو – بني كنانة</td>

          <td>
            <div class="progress" style="height: 18px;">
              <div class="progress-bar" style="width: 90%;">90%</div>
            </div>
          </td>
          <!-- Status -->
          <!-- قيد التنفيذ - أصفر -->
          <!--

<td>
  <span class="badge bg-warning text-dark">قيد التنفيذ</span>
</td>
-->
          <!-- مكتمل - أخضر -->


          <td>
            <span class="badge bg-success">مكتمل</span>
          </td>

          <!-- متوقف - أحمر -->
          <!--
<td>
  <span class="badge bg-danger">متوقف</span>
</td>
-->

          <td>

            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#attachmentsModal1">
              عرض الملفات
            </button>
            <a href="project.php" class="btn btn-sm btn-outline-success">
              عرض المهام
            </a>
          </td>
        </tr>

      </tbody>
    </table>
  </div>





  <!--
  
   
  <div class="row mt-4 g-3">

 
    <div class="col-md-6">
      <div class="chart-box p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 style="color:#063858" class="m-0">مشروع مدينة الأيزو – الحمر</h6>
          <a class="btn btn-blue btn-outline-primary btn-sm"
            href="project.php">
            عرض المشروع
          </a>
        </div>
        <canvas id="chart1"></canvas>
      </div>
    </div>

  
    <div class="col-md-6">
      <div class="chart-box p-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
          <h6 style="color:#063858" class="m-0">مشروع مدينة الأيزو – بني كنانة</h6>
          <a class="btn btn-blue btn-outline-primary btn-sm"
            href="project.php">
            عرض المشروع
          </a>
        </div>
        <canvas id="chart2"></canvas>
      </div>
    </div>

  </div>

</div>

-->



  <!-- مودال المرفقات للصف 1 -->
 <div class="modal fade" id="attachmentsModal1" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-3">
      <h5 class="text-center mb-3">المرفقات - مشروع مدينة الأيزو – الحمر</h5>

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
            <tr>
              <td>مستند خطة العمل.pdf</td>
              <td><a href="files/plan.pdf" class="btn btn-sm btn-primary" download>تنزيل</a></td>
              <td><button class="btn btn-sm btn-danger delete-attachment">حذف</button></td>
            </tr>
            <tr>
              <td>تقرير ميداني.xlsx</td>
              <td><a href="files/report.xlsx" class="btn btn-sm btn-primary" download>تنزيل</a></td>
              <td><button class="btn btn-sm btn-danger delete-attachment">حذف</button></td>
            </tr>
            <tr>
              <td>صور الموقع.zip</td>
              <td><a href="files/site.zip" class="btn btn-sm btn-primary" download>تنزيل</a></td>
              <td><button class="btn btn-sm btn-danger delete-attachment">حذف</button></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="text-center mt-2">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
      </div>

    </div>
  </div>
</div>







<script>
document.addEventListener("click", function(e){
  if(e.target.classList.contains("delete-attachment")){
    if(confirm("هل أنت متأكد من حذف هذا المرفق؟")){
      e.target.closest("tr").remove();
    }
  }
});
</script>



  <!-- Start POPUP for add new project and users and uploud all files -->
  <?php include "View/ViewPOPUPAddNewProject.php" ?>

  <!-- End POPUP for add new project and users and uploud all files -->



  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js">

  </script>
  <script src="js/JschartForProject.js">
  </script>