<?php 
  // تعيين الصفحة الحالية ديناميكياً
  $currentPage = basename($_SERVER['PHP_SELF']); 
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container-fluid">

    <!-- تسجيل الخروج + اسم المستخدم على الشمال -->
    <div class="d-flex align-items-center me-auto gap-2">
      <i class="bi bi-box-arrow-right fs-5" style="color:#e63946; cursor:pointer"></i>
      <span class="fw-bold" style="color:#063858">👤 Ahmad</span>
    </div>

    <!-- زر الهامبرغر للشاشات الصغيرة -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTabs"
      aria-controls="navbarTabs" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Tabs الروابط -->
    <div class="collapse navbar-collapse" id="navbarTabs">
      <ul class="nav nav-tabs ms-auto" style="border-bottom:none;">

        <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage=='dashbord.php')?'active':''; ?>" 
             href="dashbord.php" style="color:#063858;">🏠 الرئيسية</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage=='users.php')?'active':''; ?>" 
             href="users.php" style="color:#063858;">ادارة المستخدم</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage=='kpis.php')?'active':''; ?>" 
             href="kpis.php" style="color:#063858;">ادارة KPIs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo ($currentPage=='roles.php')?'active':''; ?>" 
             href="roles.php" style="color:#063858;">⚙ ادارة الادوار</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
