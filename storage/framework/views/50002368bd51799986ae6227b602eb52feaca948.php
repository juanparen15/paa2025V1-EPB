
<?php $__env->startSection('title','Perfil de usuario'); ?>
<?php $__env->startSection('style'); ?>
<!-- SweetAlert2 -->
<?php echo Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perfil</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">Usuarios</a></li>
              <li class="breadcrumb-item active"><?php echo e($user->name); ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <h3 class="card-title">Perfil de Usuario</h3>
              </div><!-- /.card-header -->

              <?php echo Form::model($user, ['route'=>['update.profile',$user],'method'=>'PUT','files' => true]); ?>


              <div class="card-body">
                <div class="tab-content">
                  <div class="form-row">
                    <div class="col-md-8">

                      <strong><i class="fas fa-map-marker-alt mr-1"></i> Correo electrónico Institucional</strong>
                      <p class="text-muted">
                        <?php echo e($user->email); ?>

                      </p>
                      <hr>
                      <div class="form-group">
                          <label for="name"><i class="fas fa-book mr-1"></i>  Nombre del Area o Dependencia </label>
                          <input type="text" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                          <?php $__errorArgs = ['name'];
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
                      <div class="form-group">
                          <label for="apellido"><i class="far fa-file-alt mr-1"></i>  Nombres y Apellidos del Responsable</label>
                          <input type="text" id="apellido" name="apellido" value="<?php echo e(old('apellido', $user->apellido)); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                          <?php $__errorArgs = ['apellido'];
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
                      <div class="form-group">
                          <label for="telefono"><i class="fas fa-map-marker-alt mr-1"></i>Teléfono</label>
                          <input type="text" id="telefono" name="telefono" value="<?php echo e(old('telefono', $user->telefono)); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                          <?php $__errorArgs = ['telefono'];
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
                      <div class="form-group">
                          <label for="documento"><i class="fas fa-map-marker-alt mr-1"></i>  Número de documento del Responsable</label>
                          <input type="number" id="documento" name="documento" value="<?php echo e(old('documento', $user->documento)); ?>" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                          <?php $__errorArgs = ['documento'];
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
                    <div class="col-md-4">
                      <div class="text-center mb-3">
                        <img src="<?php echo e(asset('adminlte/dist/img/'.auth()->user()->avatar)); ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">
                      </div>
                      

                      <div class="col-md-12">
                          <div class="form-group">
                              <label>Cambiar Foto de Perfil</label>
                              <div class="custom-file">
                                  <input type="file" name="avatar" class="custom-file-input" id="avatar" lang="es">
                                  <label class="custom-file-label" for="avatar">Seleccionar Archivo</label>
                              </div>
                          </div>
                      </div>

                    </div>
                  </div>
                  
                </div>
                <!-- /.tab-content -->
              </div>
              <div class="card-footer">

                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-secondary">Cancel</a>

                <button type="submit" class="btn btn-primary float-right">Actualizar</button>

              </div>

              <?php echo Form::close(); ?>


            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

        

    </section>
    <!-- /.content -->
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<!-- SweetAlert2 -->
<?php echo Html::script('adminlte/plugins/sweetalert2/sweetalert2.min.js'); ?>

<?php if(session('flash') == 'actualizado'): ?>
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'success',
            title: 'Usuario actualizado correctamente.'
        })
      });
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\paa2022\resources\views/admin/users/show.blade.php ENDPATH**/ ?>