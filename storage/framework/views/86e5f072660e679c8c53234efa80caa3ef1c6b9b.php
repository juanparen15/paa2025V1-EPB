
<?php $__env->startSection('title','Usuarios'); ?>
<?php $__env->startSection('style'); ?>
<!-- SweetAlert2 -->
<?php echo Html::style('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'); ?>

<!-- DataTables -->
<?php echo Html::style('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>

<?php echo Html::style('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'); ?>

<?php echo Html::style('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'); ?>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
                        <li class="breadcrumb-item active">Usuarios</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Usuarios del Sistema</h3>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <div class="btn-group">
                      <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                        <i class="fas fa-wrench"></i>
                      </button>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                        <a href="<?php echo e(route('users.create')); ?>" class="dropdown-item">Registrar</a>
                        
                      </div>
                    </div>
                    
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="example2" class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Nombres y Apellidos del Responsable</th>
                        <th>Correo electrónico Institucional</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td>
                                <a href="<?php echo e(route('users.show', $user)); ?>">
                                    <?php echo e($user->name); ?>

                                </a>
                            </td>
                            <td><?php echo e($user->email); ?></td>
                            <td>
                                <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($role); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-primary btn-sm" href="<?php echo e(route('users.show', $user)); ?>">
                                    <i class="fas fa-folder">
                                    </i>
                                    Ver
                                </a>
                                <a class="btn btn-info btn-sm" href="<?php echo e(route('users.edit', $user)); ?>">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Editar
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="enviar_formulario()">
                                    <i class="fas fa-trash">
                                    </i>
                                    Eliminar
                                </a>

                                
                            </td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table>
                </div>
                
                <form method="POST" action="<?php echo e(route('users.destroy', $user)); ?>" name="delete_form">
                    <?php echo e(csrf_field()); ?>

                    <?php echo e(method_field('DELETE')); ?>

                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
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
<?php if(session('flash') == 'registrado'): ?>
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
            title: 'Usuario registrado correctamente.'
        })
      });
</script>
<?php endif; ?>
<?php if(session('flash') == 'eliminado'): ?>
<script>
    Swal.fire(
        '¡Eliminado!',
        'El registro ha sido eliminado.',
        'success'
      )
</script>
<?php endif; ?>
<script>
    function enviar_formulario(){
        Swal.fire({
            title: '¿Estas seguro?',
            text: "¡No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, estoy seguro!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.delete_form.submit();
            }
        })
    }
</script>
<!-- DataTables  & Plugins -->
<?php echo Html::script('adminlte/plugins/datatables/jquery.dataTables.min.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js'); ?>

<?php echo Html::script('adminlte/plugins/jszip/jszip.min.js'); ?>

<?php echo Html::script('adminlte/plugins/pdfmake/pdfmake.min.js'); ?>

<?php echo Html::script('adminlte/plugins/pdfmake/vfs_fonts.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-buttons/js/buttons.print.min.js'); ?>

<?php echo Html::script('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js'); ?>

<?php echo $__env->make('includes._datatable_language', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\paa2022v1\resources\views/admin/users/index.blade.php ENDPATH**/ ?>