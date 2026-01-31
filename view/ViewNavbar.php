<?php
if (!isset($_SESSION['user_id'])){
  header("location:index.php");
  }

// تعيين الصفحة الحالية ديناميكياً
$currentPage = basename($_SERVER['PHP_SELF']);
$role = $_SESSION['role'];
?>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container-fluid">

    <!-- تسجيل الخروج + اسم المستخدم على الشمال -->
    <div class="d-flex align-items-center me-auto gap-2">
      <a href="logout.php"><i class="bi bi-box-arrow-right fs-5" style="color:#e63946; cursor:pointer"></i></a>
      <span class="fw-bold" style="color:#063858">👤<?= $_SESSION['userName'];?></span>
    </div>

    <!-- زر الهامبرغر للشاشات الصغيرة -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTabs"
      aria-controls="navbarTabs" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Tabs الروابط -->
    <div class="collapse navbar-collapse" id="navbarTabs">
      <ul class="nav nav-tabs ms-auto" style="border-bottom:none;">
        <?php if ($role == 'admin') { ?>
          <li class="nav-item">
            <a class="nav-link <?php echo ($currentPage == 'dashbord.php') ? 'active' : ''; ?>" href="dashbord.php"
              style="color:#063858;">🏠 الرئيسية</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo ($currentPage == 'users.php') ? 'active' : ''; ?>" href="users.php"
              style="color:#063858;">ادارة المستخدم</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo ($currentPage == 'kpis.php') ? 'active' : ''; ?>" href="kpis.php"
              style="color:#063858;">ادارة KPIs</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo ($currentPage == 'roles.php') ? 'active' : ''; ?>" href="roles.php"
              style="color:#063858;display:none;">⚙ ادارة الادوار</a>
          </li>
        <?php } elseif ($role == "user") { ?>
          
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

