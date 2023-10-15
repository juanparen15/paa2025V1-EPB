
<?php $__env->startSection('title','Lista Segmentos'); ?>
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
                        <li class="breadcrumb-item active">Lista Segmentos</li>
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
                  <h3 class="card-title">Lista Segmentos</h3>
                  <div class="card-tools">

                     <a href="<?php echo e(route('admin.segmentos.create')); ?>" class="btn btn-primary">
                        Agregar Segmento
                     </a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="example2" class="table table-hover text-nowrap">
                    <thead>
                     <tr>
                        <th>ID</th>
                        <th>NOMBRE DEL SEGMENTO</th>
                        <th>ACCIONES</th>
                     </tr>
                      
                    </thead>
                    <tbody>
                     <?php $__currentLoopData = $segmentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segmento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <tr>
                       <td><?php echo e($segmento->id); ?></td>
                       <td><?php echo e($segmento->detsegmento); ?></td>
                       <td >
                           <form action="<?php echo e(route('admin.segmentos.destroy',$segmento)); ?>" method="POST">
                              <?php echo csrf_field(); ?>
                               <?php echo method_field('delete'); ?>

                               <a class="btn btn-primary btn-sm" href="<?php echo e(route('admin.segmentos.edit', $segmento)); ?>">Editar</a>

                               <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                           </form>
                       </td>
                     </tr>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                  </table>
                </div>
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
            title: 'El Segmento se Actualizo con Exito.'
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
            title: 'El Segmento se Creo con Exito.'
        })
      });
</script>
<?php endif; ?>
<?php if(session('flash') == 'eliminado'): ?>
<script>
    Swal.fire(
        '¡Eliminado!',
        'El Segmento se Elimino con Exito.',
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/admin/segmentos/index.blade.php ENDPATH**/ ?>