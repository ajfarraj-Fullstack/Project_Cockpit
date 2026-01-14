<?php include "ViewNavbar.php" ?>

<div class="container mt-4">

  <!-- زر إضافة تقرير -->
  <div class="d-flex align-items-center gap-2 mb-5">

    <?php include "ViewAddNewTaskForEmployee.php" ?>

  </div>

  <!-- جدول التقارير -->
  <table class="table table-bordered text-center align-middle">
    <thead class="table-light">
      <tr>
        <th>#</th>
        <th>اسم الملف</th>
        <th>القيمة</th>
        <th>الاجرات</th>

      </tr>
    </thead>

    <tbody>

      <!-- صف 1 -->
      <tr>
        <td>1</td>
        <td>تقرير الأعمال</td>
        <td>1500</td>

        <td>
          <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewFile1">
            عرض
          </button>



          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit1">
            تعديل
          </button>



          <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete1">
            حذف
          </button>
        </td>
      </tr>

      <!-- صف 2 -->
      <tr>
        <td>2</td>
        <td>تقرير مالي</td>
        <td>2300</td>

        <td>
          <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewFile2">
            عرض
          </button>



          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit2">
            تعديل
          </button>



          <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete2">
            حذف
          </button>
        </td>
      </tr>

    </tbody>
  </table>
</div>






<!-- ---------------- عرض ملف صف 1 ---------------- -->
<div class="modal fade" id="viewFile1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3 text-center">
      <h5>عرض الملف</h5>
      <p>سيتم فتح الملف هنا</p>
    </div>
  </div>
</div>

<!-- ---------------- عرض ملف صف 2 ---------------- -->
<div class="modal fade" id="viewFile2">
  <div class="modal-dialog modal-lg">
    <div class="modal-content p-3 text-center">
      <h5>عرض الملف</h5>
      <p>سيتم فتح الملف هنا</p>
    </div>
  </div>
</div>



<!-- ---------------- تعديل صف 1 ---------------- -->
<div class="modal fade" id="edit1">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <h5 class="text-center">تعديل التقرير</h5>

      <label>اسم الملف</label>
      <input type="text" class="form-control mb-2" value="تقرير الأعمال">

      <label>القيمة</label>
      <input type="number" class="form-control mb-2" value="1500">

      <button class="btn btn-primary w-100">حفظ</button>
    </div>
  </div>
</div>

<!-- ---------------- تعديل صف 2 ---------------- -->
<div class="modal fade" id="edit2">
  <div class="modal-dialog">
    <div class="modal-content p-3">
      <h5 class="text-center">تعديل التقرير</h5>

      <label>اسم الملف</label>
      <input type="text" class="form-control mb-2" value="تقرير مالي">

      <label>القيمة</label>
      <input type="number" class="form-control mb-2" value="2300">

      <button class="btn btn-primary w-100">حفظ</button>
    </div>
  </div>
</div>



<!-- ---------------- حذف صف 1 ---------------- -->
<div class="modal fade" id="delete1">
  <div class="modal-dialog">
    <div class="modal-content p-3 text-center">
      <h5>هل تريد حذف التقرير؟</h5>
      <button class="btn btn-secondary mb-3" data-bs-dismiss="modal">إلغاء</button>
      <button class="btn btn-danger">حذف</button>
    </div>
  </div>
</div>

<!-- ---------------- حذف صف 2 ---------------- -->
<div class="modal fade" id="delete2">
  <div class="modal-dialog">
    <div class="modal-content p-3 text-center">
      <h5>هل تريد حذف التقرير؟</h5>
      <button class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
      <button class="btn btn-danger">حذف</button>
    </div>
  </div>
</div>