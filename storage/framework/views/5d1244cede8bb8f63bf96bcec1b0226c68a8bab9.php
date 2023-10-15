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
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH C:\laragon\www\paa2022\resources\views/admin/planadquisiciones/planadquisicione_all.blade.php ENDPATH**/ ?>