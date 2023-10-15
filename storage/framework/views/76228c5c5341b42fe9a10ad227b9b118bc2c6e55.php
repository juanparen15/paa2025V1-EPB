
<?php $__env->startSection('title','Agregar producto'); ?>
<?php $__env->startSection('style'); ?>
<!-- Select2 -->
<?php echo Html::style('adminlte/plugins/select2/css/select2.min.css'); ?>

<?php echo Html::style('adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Agregar producto</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('planadquisiciones.index')); ?>">Plan de adquisiciones </a></li>
              <li class="breadcrumb-item active">Agregar producto</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo Form::open(['route'=>['agregar_producto_store', $planadquisicion], 'method'=>'POST']); ?>

        <div class="card">

            <div class="card-body">

                <div class="form-group">
                    <label for="segmento_id">Segmentos</label>
                    <select id="segmento_id" class="form-control select2" required>
                        <option value="" disabled selected> -- Seleccione un segmento --</option>
                        <?php $__currentLoopData = $segmentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $segmento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option 
                        value="<?php echo e($segmento->id); ?>"
                        ><?php echo e($segmento->detsegmento); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="familia_id">Familias</label>
                    <select id="familia_id" class="form-control select2" required>
                        <option value="" disabled selected> -- Seleccione una familia --</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="clase_id">Clases</label>
                    <select id="clase_id" class="form-control select2" required>
                        <option value="" disabled selected> -- Seleccione una clase --</option>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label for="producto_id">Productos</label>
                    <select id="producto_id" name="producto_id" class="form-control select2" required>
                        <option value="" disabled selected> -- Seleccione una clase --</option>
                        
                    </select>
                </div>

            </div>
     
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


<script>
    var segmento_id = $('#segmento_id');
    var familia_id = $('#familia_id');
    segmento_id.change(function(){
        $.ajax({
            url: "<?php echo e(route('obtener_familias')); ?>",
            method: 'GET',
            data:{
                segmento_id: segmento_id.val(),
            },
            success: function(data){
                familia_id.empty();
                familia_id.append('<option disabled selected>-- Seleccione una familia --</option>');
                $.each(data, function(index, element){
                    familia_id.append('<option value="'+ element.id +'">'+ element.detfamilia +'</option>' )
                });
                
            }
        });
    });
</script> 

<script>
    var familia_id = $('#familia_id');
    var clase_id = $('#clase_id');
    familia_id.change(function(){
        $.ajax({
            url: "<?php echo e(route('obtener_clases')); ?>",
            method: 'GET',
            data:{
                familia_id: familia_id.val(),
            },
            success: function(data){
                clase_id.empty();
                clase_id.append('<option disabled selected>-- Seleccione una clase --</option>');
                $.each(data, function(index, element){
                    clase_id.append('<option value="'+ element.id +'">'+ element.detclase +'</option>' )
                });
                
            }
        });
    });
</script> 

<script>
    var clase_id = $('#clase_id');
    var producto_id = $('#producto_id');
    clase_id.change(function(){
        $.ajax({
            url: "<?php echo e(route('obtener_productos')); ?>",
            method: 'GET',
            data:{
                clase_id: clase_id.val(),
            },
            success: function(data){
                producto_id.empty();
                producto_id.append('<option disabled selected>-- Seleccione un producto --</option>');
                $.each(data, function(index, element){
                    producto_id.append('<option value="'+ element.id +'">'+ element.detproducto +'</option>' )
                });
                
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/admin/planadquisiciones/agregar_producto.blade.php ENDPATH**/ ?>