
<?php $__env->startSection('title','Crear Nueva Area'); ?>
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
            <h1>Crear Nueva Area</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('admin.areas.index')); ?>">Lista Areas</a></li>
              <li class="breadcrumb-item active">Crear Nueva Area</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo Form::open(['route'=>'admin.areas.store', 'method'=>'POST']); ?> 
        <div class="card">
            
            <div class="card-body">


              
           

            <div class="form-group">
                <?php echo Form::label('nomarea','NOMBRE AREA'); ?>

                <?php echo Form::text('nomarea',null,['class' => 'form-control', 'placeholder' =>'Ingrese el Nombre de la Area']); ?>

                 <?php $__errorArgs = ['nomarea'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                     <small class="text-danger"><?php echo e($message); ?></small>
                 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>


            

            <div class="form-group">
                <label for="dependencia_id">DEPENDENCIA</label>
                <select class="select2 <?php $__errorArgs = ['dependencia_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dependencia_id" id="dependencia_id" style="width: 100%;">

                    <option disabled selected>Selecciona una dependencia</option>
                    <?php $__currentLoopData = $dependencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dependencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($dependencia->id); ?>"
                        <?php echo e(old('dependencia_id') == $dependencia->id ? 'selected' : ''); ?>

                        ><?php echo e($dependencia->nomdependencia); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <?php $__errorArgs = ['dependencia_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\paa2022\resources\views/admin/areas/create.blade.php ENDPATH**/ ?>