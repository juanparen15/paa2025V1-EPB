<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
      <?php echo $__env->yieldContent('title'); ?>
  </title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <?php echo Html::style('adminlte/plugins/fontawesome-free/css/all.min.css'); ?>

  <!-- icheck bootstrap -->
  <?php echo Html::style('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css'); ?>

  <!-- Theme style -->
  <?php echo Html::style('adminlte/dist/css/adminlte.min.css'); ?>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <?php echo $__env->yieldContent('content'); ?>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<?php echo Html::script('adminlte/plugins/jquery/jquery.min.js'); ?>

<!-- Bootstrap 4 -->
<?php echo Html::script('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>

<!-- AdminLTE App -->
<?php echo Html::script('adminlte/dist/js/adminlte.min.js'); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\paa2022\resources\views/layouts/login.blade.php ENDPATH**/ ?>