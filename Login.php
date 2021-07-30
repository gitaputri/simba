<!DOCTYPE html>
<html>
<?php require_once('Include/Head.php'); ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>SIMBA</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sistem Monitoring Barang Aset</p>
      <form action="<?php echo base_url("WelcomeController/login"); ?>" method="post">
        <div class="input-group mb-3">
          <input type="username" class="form-control" placeholder="Username" name="username" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url(); ?>Assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>Assets/dist/js/adminlte.min.js"></script>

</body>
</html>
