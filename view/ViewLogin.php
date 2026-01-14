<link rel="stylesheet" href="css/StyleCssLogin.css">

<div class="card-login">

  <h3 class="title">Sign In</h3>
  <p class="sub">Access your dashboard</p>

  <div class="mb-3">
    <label class="form-label">Username</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-person"></i></span>
      <input type="text" class="form-control" placeholder="Enter username">
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-lock"></i></span>

      <input type="password" class="form-control" id="passwordInput" placeholder="Enter password">

      <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer;">
        <i id="eyeIcon" class="bi bi-eye"></i>
      </span>
    </div>
  </div>

  <button class="btn btn-blue w-100 mt-2">
    <i class="bi bi-box-arrow-in-right me-1"></i>
    Sign In
  </button>

</div>

<script src="js/JsLoginHideAndShow.js"></script>