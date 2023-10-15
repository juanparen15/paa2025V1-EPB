<?php $__env->startSection('title', 'Plan de adquisiciones'); ?>

<?php $__env->startSection('content'); ?>
<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(homeland/images/hero_bg_2.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
      <div class="row align-items-center justify-content-center text-center">
        <div class="col-md-10">
          <h1 class="mb-2"><?php echo e($empresa->nombre); ?></h1>
        </div>
      </div>
    </div>
</div>
  

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
          <img src="homeland/images/about.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-5 ml-auto"  data-aos="fade-up" data-aos-delay="200">
          <div class="site-section-title">
            <h2>Misión</h2>
          </div>
          <p class="lead">
            <?php echo e($empresa->mision); ?>

          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="site-section">
      <div class="container">
        <div class="row mb-5 justify-content-center"  data-aos="fade-up" >
            <div class="col-md-7">
                <div class="site-section-title text-center">
                    <h2>Visión</h2>
                    <p>
                        <?php echo e($empresa->vision); ?>  
                    </p>
                </div>
            </div>
        </div>
      
    </div>
 </div>


 <div class="site-section">
    <div class="container">

      <div class="row justify-content-center mb-5">
        <div class="col-md-7 text-center">
          <div class="site-section-title">
            <h2>Visita Nuestro sitio web Alcaldia Municipal de Puerto Boyacá</h2>
          </div>

          <p><a href="<?php echo $empresa->url; ?>" class="btn btn-white btn-outline-secondary  py-3 px-5 rounded-0 btn-2">Ir a la pagina</a></p>

        </div>
      </div>

    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/welcome.blade.php ENDPATH**/ ?>