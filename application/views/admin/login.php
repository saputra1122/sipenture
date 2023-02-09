
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eliy's Furniture</title>

  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/logosipenture.png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE-3.2.0/dist/css/adminlte.min.css">

<!--<style>
body {
  background-image: url('assets/img/bg3.jpg');
}
</style>-->

</head>
<body class="hold-transition login-page">

<div class="login-box">
 
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?= base_url() ?>assets/AdminLTE-3.2.0/index2.html" class="h2"><b>Eliy's</b> Furniture</a>
    </div>
    <div class="card-body">
      <?php if(isset($_GET['msg'])&&$_GET['msg']=="gagal") { ?>
        <div class="alert alert-danger" role="alert">
          Mohon isi username dan password dengan benar !
        </div>

      <?php }else if(isset($_GET['msg'])&&$_GET['msg']=="logout") { ?>
        <div class="alert alert-success" role="alert">
          Anda berhasil logout !
        </div>

      <?php }else{ ?>
        <p class="login-box-msg">Masuk untuk memulai sesi Anda</p>
      <?php } ?>
      <form action="<?= base_url() ?>Auth/login" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" autofocus="auto" placeholder="Username" name="username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="d-flex mb-5 align-items-center">
                <!-- <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>  -->
              </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- jQuery -->
<script src="<?= base_url() ?>assets/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
<script>$(".alert").delay(5000).slideUp(200, function () {
        $(this).alert('close');
    });</script>
</body>
</html>
