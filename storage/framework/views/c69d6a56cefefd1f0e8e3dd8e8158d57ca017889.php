
<?php $__env->startSection('title','Lista de Productos'); ?>
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
                        <li class="breadcrumb-item active">Lista de Productos</li>
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
                  <h3 class="card-title">Lista de Productos</h3>
                  <div class="card-tools">

                     <a href="<?php echo e(route('admin.productos.create')); ?>" class="btn btn-primary">
                        Agregar producto
                     </a>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                  <table id="example2" class="table table-hover text-nowrap">
                    <thead>
                     <tr>
                        <th>ID</th>
                        <th>NOMBRE DEL PRODUCTO</th>
                        <th>CLASE</th>
                        <th>ACCIONES</th>
                     </tr>
                     
                    </thead>
                    
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
            title: 'El Producto se Actualizo con Exito.'
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
            title: 'El Producto se Creo con Exito.'
        })
      });
</script>
<?php endif; ?>
<?php if(session('flash') == 'eliminado'): ?>
<script>
    Swal.fire(
        '¡Eliminado!',
        'El Producto se Elimino con Exito.',
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


<script>
    $(function () {
        $('#example2').DataTable({
            "serverSide": true,
            "ajax": "<?php echo e(url('api/products')); ?>",

            "columns":
                [{data: 'id'},
                {data: 'detproducto'},
                {data: 'clase'},
                {data: 'btn'},
                ],

            "paging": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\paa2022\resources\views/admin/productos/index.blade.php ENDPATH**/ ?>