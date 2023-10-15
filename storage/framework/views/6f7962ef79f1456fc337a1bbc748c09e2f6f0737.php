<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <?php echo Html::style('adminlte/plugins/fontawesome-free/css/all.min.css'); ?>

    <?php echo $__env->yieldContent('style'); ?>
    <?php echo Html::style('adminlte/dist/css/adminlte.min.css'); ?>

    
    <style>
        .sidebar-dark-blue{
            background: #0c2a66 !important;
        }
        .sidebar a {
            color: #ffffff !important;
        }
    </style>
    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <?php echo $__env->make('layouts._user_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <?php echo $__env->make('layouts._nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline">
                Contáctanos
            </div>
            <strong>Copyright &copy;
                <script type="text/javascript">
                    document.write(new Date().getFullYear());
                </script>
                <p>
                    <a href="#">Plan de adquisiciones</a>.</strong> Todos los derechos reservados por la Alcaldia Municipal de Puerto Boyacá.
                </p><br>
                <a>Diseño y desarrollo: Oficina de Sistemas Municipal</a>
        </footer>
    </div>
    <?php echo Html::script('adminlte/plugins/jquery/jquery.min.js'); ?>

    <!-- Bootstrap 4 -->
    <?php echo Html::script('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>

    <?php echo $__env->yieldContent('script'); ?>
    <?php echo Html::script('adminlte/dist/js/adminlte.min.js'); ?>

</body>
</html>
<?php /**PATH C:\laragon\www\paa2022\resources\views/layouts/admin.blade.php ENDPATH**/ ?>