<table >
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
            <th>Productos</th>
        </tr>
    </thead>
    <tbody>
     
        <tr>
            <td><?php echo e($plan->id); ?></td>
            <td><?php echo e($plan->descripcioncont); ?></td>

            <td><?php echo e($plan->mese->nommes); ?></td>
            <td><?php echo e($plan->duracont); ?></td>
            <td><?php echo e($plan->modalidade->detmodalidad); ?></td>
            <td><?php echo e($plan->fuente->detfuente); ?></td>
            <td><?php echo e($plan->valorestimadocont); ?></td>
            <td><?php echo e($plan->valorestimadovig); ?></td>
            <td><?php echo e($plan->requiproyecto->detproyeto); ?></td>

            <td><?php echo e($plan->codbpim); ?></td>
            <td><?php echo e($plan->requipoai->detpoai); ?></td>
            <td><?php echo e($plan->tipozona->tipozona); ?></td>

            <td><?php echo e($plan->tipoadquisicione->dettipoadquisicion); ?></td>
            <td><?php echo e($plan->tipoproceso->dettipoproceso); ?></td>
            <td><?php echo e($plan->tipoprioridade->detprioridad); ?></td>
            <td><?php echo e($plan->estadovigencia->detestadovigencia); ?></td>
            <td><?php echo e($plan->area->nomarea); ?></td>
            <td>
               
                <?php $__currentLoopData = $plan->productos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                [<?php echo e($item->id); ?>,<?php echo e($item->detproducto); ?>],
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </td>
        </tr>
   
    </tbody>
</table>
<?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/admin/planadquisiciones/plantilla_de_excel.blade.php ENDPATH**/ ?>