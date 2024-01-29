<!DOCTYPE html>
<html lang="es">
  <head>
    <title>
        <?php echo $__env->yieldContent('title'); ?>
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
  
    
    <?php echo Html::style('homeland/fonts/icomoon/style.css'); ?>


    <?php echo Html::style('homeland/css/bootstrap.min.css'); ?>

    <?php echo Html::style('homeland/css/magnific-popup.css'); ?>

    <?php echo Html::style('homeland/css/jquery-ui.css'); ?>

    <?php echo Html::style('homeland/css/owl.carousel.min.css'); ?>

    <?php echo Html::style('homeland/css/owl.theme.default.min.css'); ?>

    <?php echo Html::style('homeland/css/bootstrap-datepicker.css'); ?>

    <?php echo Html::style('homeland/css/mediaelementplayer.css'); ?>

    <?php echo Html::style('homeland/css/animate.css'); ?>

    <?php echo Html::style('homeland/fonts/flaticon/font/flaticon.css'); ?>

    <?php echo Html::style('homeland/css/fl-bigmug-line.css'); ?>


    
    


    <?php echo Html::style('homeland/css/aos.css'); ?>


    <?php echo Html::style('homeland/css/style.css'); ?>

    
  </head>
  <body>
  
  <div class="site-loader"></div>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="<?php echo e(route('welcome')); ?>" class="text-white h2 mb-0"><strong><span class="text-danger">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li>
                    <a class="active" href="<?php echo e(route('welcome')); ?>">Inicio</a>
                  </li>

                    <?php if(Route::has('login')): ?>
                    
                    <?php if(auth()->guard()->check()): ?>
                    <li><a href="<?php echo e(url('/home')); ?>">Mi Cuenta</a></li>     
                    <?php else: ?>
                    <li><a class="btn btn-outline-primary" style="padding:5px" href="<?php echo e(route('login')); ?>">Iniciar Sesión</a></li>     
                    
                    <?php endif; ?>
                      
                    <?php endif; ?>

                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

    <?php echo $__env->yieldContent('content'); ?>


    <footer class="site-footer">
      
    </footer>

  </div>

  <?php echo Html::script('homeland/js/jquery-3.3.1.min.js'); ?>

  <?php echo Html::script('homeland/js/jquery-migrate-3.0.1.min.js'); ?>

  <?php echo Html::script('homeland/js/jquery-ui.js'); ?>

  <?php echo Html::script('homeland/js/popper.min.js'); ?>

  <?php echo Html::script('homeland/js/bootstrap.min.js'); ?>

  <?php echo Html::script('homeland/js/owl.carousel.min.js'); ?>

  <?php echo Html::script('homeland/js/mediaelement-and-player.min.js'); ?>

  <?php echo Html::script('homeland/js/jquery.stellar.min.js'); ?>

  <?php echo Html::script('homeland/js/jquery.countdown.min.js'); ?>

  <?php echo Html::script('homeland/js/jquery.magnific-popup.min.js'); ?>

  <?php echo Html::script('homeland/js/bootstrap-datepicker.min.js'); ?>

  <?php echo Html::script('homeland/js/aos.js'); ?>


  <?php echo Html::script('homeland/js/circleaudioplayer.js'); ?>


  <?php echo Html::script('homeland/js/main.js'); ?>

    
  </body>
</html><?php /**PATH C:\laragon\www\paa2022v1\resources\views/layouts/principal.blade.php ENDPATH**/ ?>