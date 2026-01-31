<link rel="stylesheet" href="css/StyleCssLogin.css">
<div class="card-login" style="direction:ltr !important;">

  <h3 class="title">Sign In</h3>
  <p class="sub">Access your dashboard</p>

 <form  method="post">
   <div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
     <?php if(!empty($msg)) {?>
  <h4 class="text-center pt-2"style="color:red">  <?php echo $msg;?></h4>
  <?php }?>
  </div>

  <div class="mb-3">
    <label class="form-label">Username</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-person"></i></span>
      <input type="text"  name="userName" class="form-control" placeholder="Enter username">
    </div>
  </div>

  <div class="mb-3">
    <label class="form-label">Password</label>
    <div class="input-group">
      <span class="input-group-text"><i class="bi bi-lock"></i></span>

      <input type="password" name="password" class="form-control" id="passwordInput" placeholder="Enter password">

      <span class="input-group-text" onclick="togglePassword()" style="cursor:pointer;">
        <i id="eyeIcon" class="bi bi-eye"></i>
      </span>
    </div>
  </div>

   <button  type="submit" name="login"class="btn btn-blue w-100 mt-2">
    <i class="bi bi-box-arrow-in-right me-1"></i>
    Sign In
  </button>
</form>
</div>

<script src="js/JsLoginHideAndShow.js"></script>