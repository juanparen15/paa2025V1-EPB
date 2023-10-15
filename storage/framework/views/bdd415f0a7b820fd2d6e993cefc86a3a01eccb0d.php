
<?php $__env->startSection('title','Crear Nueva Modalidad'); ?>
<?php $__env->startSection('style'); ?>
<!-- Select2 -->
<?php echo Html::style('adminlte/plugins/select2/css/select2.min.css'); ?>

<?php echo Html::style('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Nueva Modalidad</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.modalidades.index')); ?>">Modalidades</a></li>
              <li class="breadcrumb-item active">Crear Nueva Modalidad</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo Form::open(['route'=>'admin.modalidades.store', 'method'=>'POST']); ?> 
        <div class="card">
            
            <div class="card-body">

                <div class="form-group">
                    <?php echo Form::label('detmodalidad','NOMBRE DE LA MODALIDAD'); ?>

                    <?php echo Form::text('detmodalidad',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la Modalidad']); ?>

                     <?php $__errorArgs = ['detmodalidad'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                         <span class="text-danger"><?php echo e($message); ?></span>
                     <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                 </div>
      
               
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row">
            <div class="col-12 mb-2">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Registrar" class="btn btn-primary float-right">
            </div>
        </div>
        <?php echo Form::close(); ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- Select2 -->
<?php echo Html::script('adminlte/plugins/select2/js/select2.full.min.js'); ?>

<script>
    $(function () {
  
      //Initialize Select2 Elements
       $('.select2').select2()
  
    })
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\paa2022\resources\views/admin/modalidades/create.blade.php ENDPATH**/ ?>