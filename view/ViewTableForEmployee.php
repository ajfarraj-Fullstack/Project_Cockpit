<!--Start for nav bar -->
<?php include "ViewNavbar.php" ?>
<!--End for nav bar -->

<div class="d-flex align-items-center gap-2">

  <button class="btn btn-primary btn-lg mt-5" data-bs-toggle="modal" data-bs-target="#attachmentsModal2">
    عرض مرفقات المشروع
  </button>

</div>

<div class="table-responsive mt-4">
  <table class="table align-middle table-bordered text-center">
    <thead class="table-light">
      <tr>
        <th>اسم المشروع</th>
        <th>KPIs</th>
        <th>الوصف</th>
        <th>التكليف</th>
        <th>الحالة</th>
        <th>تاريخ البدء</th>
        <th>تاريخ الانتهاء</th>
        <th>المرفقات</th>
        <th> الاجراءت</th>
      </tr>
    </thead>

    <tbody>
      <!-- صف 1 -->
      <tr>
        <td>مشروع مدينة الأيزو – الحمر</td>
        <td>الإشراف + التنسيق</td>
        <td>قيد المتابعة</td>
        <td><span class="badge text-dark"> احمد فراج</span></td>
        <td><span class="badge bg-warning text-dark">قيد المراجعة</span></td>
        <td>2026-01-01</td>
        <td>2026-03-15</td>

        <td><i class="bi bi-paperclip"></i> 3 ملفات</td>
        <td>
          <a href="reportemployee.php" class="btn btn-sm btn-outline-secondary">عرض التقرير</a>
        </td>


      </tr>

      <!-- صف 2 -->
      <tr>
        <td>مشروع مدينة الأيزو – بني كنانة</td>
        <td>التنسيق مع المقاولين</td>
        <td>تم التنفيذ جزئيًا</td>
        <td><span class="badge text-dark"> احمد فراج</span></td>
        <td><span class="badge bg-warning text-dark">قيد المراجعة</span></td>
        <td>2026-01-05</td>
        <td>2026-04-20</td>
        <td><i class="bi bi-paperclip"></i> 2 ملفات</td>
        <td>
          <a href="view_report.php" class="btn btn-sm btn-outline-secondary">عرض التقرير</a>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div>

<!-- مودال المرفقات للصف 1 -->
<div class="modal fade" id="attachmentsModal1" tabindex="-1" aria-labelledby="attachmentsLabel1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-3">
      <h5 class="text-center mb-3">المرفقات - مشروع مدينة الأيزو – الحمر</h5>
      <div class="table-responsive">
        <table class="table table-bordered text-center">
          <thead class="table-light">
            <tr>
              <th>اسم المرفق</th>
              <th>تنزيل</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>مستند خطة العمل.pdf</td>
              <td><a href="files/plan.pdf" class="btn btn-sm btn-primary" download>تنزيل</a></td>
            </tr>
            <tr>
              <td>تقرير ميداني.xlsx</td>
              <td><a href="files/report.xlsx" class="btn btn-sm btn-primary" download>تنزيل</a></td>
            </tr>
            <tr>
              <td>صور الموقع.zip</td>
              <td><a href="files/site.zip" class="btn btn-sm btn-primary" download>تنزيل</a></td>
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

<!-- مودال المرفقات للصف 2 -->
<div class="modal fade" id="attachmentsModal2" tabindex="-1" aria-labelledby="attachmentsLabel2" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content p-3">
      <h5 class="text-center mb-3">المرفقات - مشروع مدينة الأيزو – بني كنانة</h5>
      <div class="table-responsive">
        <table class="table table-bordered text-center">
          <thead class="table-light">
            <tr>
              <th>اسم المرفق</th>
              <th>تنزيل</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>عقد المقاول.pdf</td>
              <td><a href="files/contract.pdf" class="btn btn-sm btn-primary" download>تنزيل</a></td>
            </tr>
            <tr>
              <td>خطة التنفيذ.xlsx</td>
              <td><a href="files/execution.xlsx" class="btn btn-sm btn-primary" download>تنزيل</a></td>
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



<!-- Bootstrap JS فقط مرة واحدة في آخر الصفحة -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>








<!-- Start for View popup view folder -->
<?php include "ViewPopupFoloder.php" ?>
<!-- End for View popup view folder -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>