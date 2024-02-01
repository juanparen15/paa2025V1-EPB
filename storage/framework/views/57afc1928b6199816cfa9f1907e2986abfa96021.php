
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
                        <li class="breadcrumb-item active">Listado Plan Adquisiciones</li>
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
                    <h3 class="card-title">Listado Plan Adquisiciones</h3>

                    <div class="card-tools">
                        

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.export')): ?>
                        <a href="<?php echo e(route('planadquisiciones.export')); ?>" class="btn btn-success">
                            <i class="far fa-file-excel"></i> Exportar Todo
                        </a>
                        <?php endif; ?>
                    </div>

                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="example2" class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>SIIPAA<?= date('Y') ?></th>                                
                                <th>Fecha Estimada de Inicio del Proceso(Mes)</th>
                                <th>Duración Estimada del Contrato(Número de Mes(es))</th>
                                <th>Modalidad de Selección </th>
                                <th>Fuente de los Recursos</th>
                                <th>Valor Total Estimado $</th>
                                <th>Descripción del Objeto Contractual</th>
                                <th>Valor Estimado en Vigencia Actual $</th>                                
                                <th>¿Se Requiere Proyecto?</th>
                                <th>Dependencia o Area Responsable:</th>
                                <th>Código Banco De Programas Y Proyectos De Inversión Nacional--BPIN:</th>
                                <th>¿Se Requiere POAI?</th>
                                <th>Tipo de Zona de Ejecucion del Contrato</th>
                                <th>Tipo de Adquisición o Contrato</th>
                                <th>Tipo de Proceso Contractual</th>
                                <th>Tipo de Prioridad</th>
                                <th>Estado Solicitud Vigencias Futuras</th>                                
                                <th>ACCIONES</th>

                            </tr>
                        </thead>
                        <tbody>



                            <?php $__currentLoopData = $planadquisiciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $planadquisicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($planadquisicion->id); ?></td>   
                                <td><?php echo e($planadquisicion->mese->nommes); ?></td>
                                <td><?php echo e($planadquisicion->duracont); ?></td>
                                <td><?php echo e($planadquisicion->modalidade->detmodalidad); ?></td>
                                <td><?php echo e($planadquisicion->fuentes); ?></td>
                                <td><?php echo e($planadquisicion->valorestimadocont); ?></td>
                                <td><?php echo e($planadquisicion->descripcioncont); ?></td>
                                <td><?php echo e($planadquisicion->valorestimadovig); ?></td>
                                <td><?php echo e($planadquisicion->requiproyecto->detproyeto); ?></td>
                                <td><?php echo e($planadquisicion->area->nomarea); ?></td>
                                <td><?php echo e($planadquisicion->codbpim); ?></td>
                                <td><?php echo e($planadquisicion->requipoai->detpoai); ?></td>
                                <td><?php echo e($planadquisicion->tipozona->tipozona); ?></td>
                                <td><?php echo e($planadquisicion->tipoadquisicione->dettipoadquisicion); ?></td>
                                <td><?php echo e($planadquisicion->tipoproceso->dettipoproceso); ?></td>
                                <td><?php echo e($planadquisicion->tipoprioridade->detprioridad); ?></td>
                                <td><?php echo e($planadquisicion->estadovigencia->detestadovigencia); ?></td>                               


                                <td>
                                    <form action="<?php echo e(route('planadquisiciones.destroy',$planadquisicion)); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>

                                        
                                        

                                       

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.show')): ?>
                                        <a class="btn btn-info btn-sm"
                                            href="<?php echo e(route('planadquisiciones.show', $planadquisicion)); ?>">Detalles</a>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\paa2022v1\resources\views/admin/planadquisiciones/index.blade.php ENDPATH**/ ?>