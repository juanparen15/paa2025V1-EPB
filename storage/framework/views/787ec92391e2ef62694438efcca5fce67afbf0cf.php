
<?php $__env->startSection('title','Listado Plan Aquisiciones'); ?>
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
                        <li class="breadcrumb-item active">Listado Plan Aquisiciones</li>
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
                    <h3 class="card-title">Listado Plan Aquisiciones</h3>

                    <div class="card-tools">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.create')): ?>
                        <a href="<?php echo e(route('planadquisiciones.create')); ?>" class="btn btn-primary">
                            Agregar Nuevo Plan Adquisicion
                        </a>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.export')): ?>
                        <a href="<?php echo e(route('planadquisiciones.export')); ?>" class="btn btn-success">
                            Exportar todo
                        </a>
                        <?php endif; ?>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID PPA</th>
                                <th>Descripción del Objeto contractual</th>
                                <th>Fecha estimada de inicio del proceso(mes)</th>
                                <th>Duración estimada del contrato(número de mes(es))</th>
                                <th>Modalidad de selección </th>
                                <th>Fuente de los recursos</th>
                                <th>Valor total estimado</th>
                                <th>Valor estimado en vigencia actual</th>
                                <th>¿Se requieren vigencias futuras?</th>
                                <th>¿Se requiere Protecto?</th>
                                <th>Codigo BPIM</th>
                                <th>¿Se requiere POAI?</th>
                                <th>Tipo de zona de ejecucion del Contrato</th>
                                <th>Tipo de Adquisición o contrato</th>
                                <th>Tipo de Proceso contractual</th>
                                <th>Tipo de Prioridad</th>
                                <th>Estado solicitud vigencias futuras</th>

                                <th>ACCIONES</th>

                            </tr>
                        </thead>
                        <tbody>



                            <?php $__currentLoopData = $planadquisiciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planadquisicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($planadquisicion->id); ?></td>
                                <td><?php echo e($planadquisicion->descripcioncont); ?></td>

                                <td><?php echo e($planadquisicion->mese->nommes); ?></td>
                                <td><?php echo e($planadquisicion->duracont); ?></td>
                                <td><?php echo e($planadquisicion->modalidade->detmodalidad); ?></td>
                                <td><?php echo e($planadquisicion->fuente->detfuente); ?></td>
                                <td><?php echo e($planadquisicion->valorestimadocont); ?></td>
                                <td><?php echo e($planadquisicion->valorestimadovig); ?></td>
                                <td><?php echo e($planadquisicion->requiproyecto->detproyeto); ?></td>

                                <td><?php echo e($planadquisicion->codbpim); ?></td>
                                <td><?php echo e($planadquisicion->requipoai->detpoai); ?></td>
                                <td><?php echo e($planadquisicion->tipozona->tipozona); ?></td>

                                <td><?php echo e($planadquisicion->tipoadquisicione->dettipoadquisicion); ?></td>
                                <td><?php echo e($planadquisicion->tipoproceso->dettipoproceso); ?></td>
                                <td><?php echo e($planadquisicion->tipoprioridade->detprioridad); ?></td>
                                <td><?php echo e($planadquisicion->estadovigencia->detestadovigencia); ?></td>
                                <td><?php echo e($planadquisicion->area->nomarea); ?></td>


                                <td>
                                    <form action="<?php echo e(route('planadquisiciones.destroy',$planadquisicion)); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('agregar_producto')): ?>
                                        <a class="btn btn-primary btn-sm"
                                            href="<?php echo e(route('agregar_producto', $planadquisicion)); ?>">
                                            Agregar producto
                                        </a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('exportar_planadquisiciones_excel')): ?>
                                        <a class="btn btn-success btn-sm"
                                            href="<?php echo e(route('exportar_planadquisiciones_excel', $planadquisicion)); ?>">
                                            <i class="far fa-file-excel"></i> Exportar
                                        </a>
                                        <?php endif; ?>




                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.show')): ?>
                                        <a class="btn btn-info btn-sm"
                                            href="<?php echo e(route('planadquisiciones.show', $planadquisicion)); ?>">Detalles</a>
                                        <?php endif; ?>


                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.edit')): ?>
                                        <a class="btn btn-primary btn-sm"
                                            href="<?php echo e(route('planadquisiciones.edit', $planadquisicion)); ?>">Editar</a>
                                        <?php endif; ?>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.destroy')): ?>
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        <?php endif; ?>
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


<?php if(session('flash') == 'registrado'): ?>
<script>
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'success',
            title: 'La Modalidad se Creo con Exito.'
        })
    });

</script>
<?php endif; ?>
<?php if(session('flash') == 'actualizado'): ?>
<script>
    $(function () {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });
        Toast.fire({
            icon: 'success',
            title: 'El Plan adquisiciones se Actualizo con Exito.'
        })
    });

</script>
<?php endif; ?>
<?php if(session('flash') == 'eliminado'): ?>
<script>
    Swal.fire(
        '¡Eliminado!',
        'El Plan de Adquisiciones se Elimino con Exito.',
        'success'
    )

</script>
<?php endif; ?>
<script>
    function enviar_formulario() {
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/admin/planadquisiciones/index.blade.php ENDPATH**/ ?>