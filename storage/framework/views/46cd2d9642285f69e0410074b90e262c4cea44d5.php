
<?php $__env->startSection('title','Detalles de Aquisiciones'); ?>
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
            <h1>Detalles de Aquisiciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('planadquisiciones.index')); ?>">Adquisiciones </a></li>
              <li class="breadcrumb-item active">Detalles de Aquisiciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        
        <div class="card">
            
            <div class="card-body">

                <div class="row">
                    <div class="col-sm-4 invoice-col">
                      <address>
                        <strong>Descripción del Objeto contractual</strong><br>
                        <?php echo e($planadquisicione->descripcioncont); ?>

                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                      <address>
                        <strong>Valor total estimado</strong><br>
                        <?php echo e($planadquisicione->valorestimadocont); ?>

                      </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Valor estimado en vigencia actual</strong><br>
                            <?php echo e($planadquisicione->valorestimadovig); ?>

                        </address>
                    </div>
                    <!-- /.col -->


                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Duración estimada del contrato(número de mes(es))</strong><br>
                            <?php echo e($planadquisicione->duracont); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Codigo BPIM</strong><br>
                            <?php echo e($planadquisicione->codbpim); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Área</strong><br>
                            <?php echo e($planadquisicione->area->nomarea); ?>

                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>¿Se requieren vigencias futuras?</strong><br>
                            <?php echo e($planadquisicione->vigenfutura->detvigencia); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Tipo de zona de ejecucion del Contrato</strong><br>
                            <?php echo e($planadquisicione->tipozona->tipozona); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Estado solicitud vigencias futuras</strong><br>
                            <?php echo e($planadquisicione->estadovigencia->detestadovigencia); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Tipo de Proceso contractual</strong><br>
                            <?php echo e($planadquisicione->tipoproceso->dettipoproceso); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Tipo de Adquisición o contrato</strong><br>
                            <?php echo e($planadquisicione->tipoadquisicione->dettipoadquisicion); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>¿Se requiere Protecto?</strong><br>
                            <?php echo e($planadquisicione->requiproyecto->detproyeto); ?>

                        </address>
                    </div>
                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Fuente de los recursos</strong><br>
                            <?php echo e($planadquisicione->fuente->detfuente); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Tipo de Prioridad</strong><br>
                            <?php echo e($planadquisicione->tipoprioridade->detprioridad); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Fecha estimada de inicio del proceso(mes)</strong><br>
                            <?php echo e($planadquisicione->mese->nommes); ?>

                        </address>
                    </div>

                    <div class="col-sm-4 invoice-col">
                        <address>
                            <strong>Modalidad de selección</strong><br>
                            <?php echo e($planadquisicione->modalidade->detmodalidad); ?>

                        </address>
                    </div>

                    <div class="col-sm-12 invoice-col">
                        <address>
                            <strong>¿Se requiere POAI?</strong><br>
                            <?php echo e($planadquisicione->requipoai->detpoai); ?>

                        </address>
                    </div>

                    

                  



                  </div>

                  <div class="form-group">
                    <table class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th>ID</th>
                                <th>Producto</th>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('retirar_producto')): ?>
                                <th>Acciones</th>
                                <?php endif; ?> 
                            </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $planadquisicione->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td scope="row"><?php echo e($producto->id); ?></td>
                                    <td><?php echo e($producto->detproducto); ?></td>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('retirar_producto')): ?>
                                    <td>
                                             <a href="<?php echo e(route('retirar_producto', [$planadquisicione,$producto])); ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                    </td>
                                    <?php endif; ?> 
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                            </tbody>
                    </table>
                </div>



            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <div class="row">
            <div class="col-12 mb-2">
            <a href="<?php echo e(URL::previous()); ?>" class="btn btn-secondary">Cancel</a>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('agregar_producto')): ?>
            <a class="btn btn-primary float-right" href="<?php echo e(route('agregar_producto', $planadquisicione)); ?>">
                 Agregar producto
             </a>
            <?php endif; ?> 

        </div>
     
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

<script>
    function RefrescaProducto(){
      var ip = [];
      var i = 0;
      $('#guardar').attr('disabled','disabled'); //Deshabilito el Boton Guardar
      $('.iProduct').each(function(index, element) {
          i++;
          ip.push({ id_pro : $(this).val() });
      });
      // Si la lista de Productos no es vacia Habilito el Boton Guardar
      if (i > 0) {
          $('#guardar').removeAttr('disabled','disabled');
      }
      var ipt=JSON.stringify(ip); //Convierto la Lista de Productos a un JSON para procesarlo en tu controlador
      $('#ListaPro').val(encodeURIComponent(ipt));
    }
     function agregarProducto() {
  
          // var sel = $('#pro_id').find(':selected').val(); 
          //Capturo el Value del Producto
          // var text = $('#pro_id').find(':selected').text();
          //Capturo el Nombre del Producto- Texto dentro del Select
          
            var sel = $('#detproducto').find(':selected').val(); 
            var text = $('#detproducto').find(':selected').text();
         
         
          
          // var sptext = text.split();
          
          var newtr = '<tr class="item"  data-id="'+sel+'">';
          newtr = newtr + '<td class="iProduct" > <input type="hidden" name="producto_id[]" value="' +sel + '">' + sel + '</td>';
          newtr = newtr + '<td>'+ text +'</td>';
        
          
          newtr = newtr + '<td><button type="button" class="btn btn-danger btn-xs remove-item"><i class="fa fa-times"></i></button></td></tr>';
          
          $('#ProSelected').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected
  
          
          RefrescaProducto();//Refresco Productos
          limpiar(); 
          CierraPopup();
          $('.remove-item').off().click(function(e) {
              $(this).parent('td').parent('tr').remove(); //En accion elimino el Producto de la Tabla
              if ($('#ProSelected tr.item').length == 0)
                  $('#ProSelected .no-item').slideDown(300); 
              RefrescaProducto();
          });        
         $('.iProduct').off().change(function(e) {
              RefrescaProducto();
          });
         
         // cerrar el modal y setear los valores del modal en vacios 
        
    }
    
    function limpiar() {
      $("#medicine").val("");
      $("#detproducto").val("");
    }
    function CierraPopup() {
      $("#modal-default").modal('hide');//ocultamos el modal
      
    }
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/admin/planadquisiciones/show.blade.php ENDPATH**/ ?>