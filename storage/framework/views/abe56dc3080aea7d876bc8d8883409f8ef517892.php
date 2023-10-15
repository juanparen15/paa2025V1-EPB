
<?php $__env->startSection('title','Plan Aquisiciones'); ?>
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
            <h1>Plan Aquisiciones</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Inicio</a></li>
              <li class="breadcrumb-item"><a href="<?php echo e(route('planadquisiciones.index')); ?>">Plan de adquisiciones </a></li>
              <li class="breadcrumb-item active">Plan Aquisiciones</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo Form::open(['route'=>'planadquisiciones.store', 'method'=>'POST']); ?>

        <div class="card">
            <div class="card-body">

                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="descripcioncont">Descripción del Objeto contractual</label>
                            <input type="text" name="descripcioncont" id="descripcioncont" class="form-control" required>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <label>Valor total estimado</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="text" class="form-control"  name="valorestimadocont" id="valorestimadocont" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label>Valor estimado en vigencia actual</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input type="text" class="form-control"  name="valorestimadovig" id="valorestimadovig" required>
                        </div>
                    </div>
                    


                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="duracont">Duración estimada del contrato(número de mes(es))</label>
                        <input type="text" name="duracont" id="duracont" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="codbpim">Codigo BPIM</label>
                        <input type="text" name="codbpim" id="codbpim" class="form-control" required>
                    </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                        <label for="area_id">Área</label>
                        <select class="select2 <?php $__errorArgs = ['area_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="area_id" id="area_id" style="width: 100%;">
      
                            <option disabled selected>Selecciona un area</option>
                            <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($area->id); ?>"
                                <?php echo e(old('area_id') == $area->id ? 'selected' : ''); ?>

                                ><?php echo e($area->nomarea); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['area_id'];
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
                        <div class="form-group">
                            <label for="vigenfutura_id">¿Se requieren vigencias futuras?</label>
                            <select class="select2 <?php $__errorArgs = ['vigenfutura_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="vigenfutura_id" id="vigenfutura_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $vigenfuturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vigenfutura): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($vigenfutura->id); ?>"
                                    <?php echo e(old('vigenfutura_id') == $vigenfutura->id ? 'selected' : ''); ?>

                                    ><?php echo e($vigenfutura->detvigencia); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['vigenfutura_id'];
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
                        <div class="form-group">
                            <label for="tipozona_id">Tipo de zona de ejecucion del Contrato</label>
                            <select class="select2 <?php $__errorArgs = ['tipozona_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tipozona_id" id="tipozona_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $tipozonas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipozona): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipozona->id); ?>"
                                    <?php echo e(old('tipozona_id') == $tipozona->id ? 'selected' : ''); ?>

                                    ><?php echo e($tipozona->tipozona); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['tipozona_id'];
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
                        <div class="form-group">
                            <label for="estadovigencia_id">Estado solicitud vigencias futuras</label>
                            <select class="select2 <?php $__errorArgs = ['estadovigencia_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="estadovigencia_id" id="estadovigencia_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $estadovigencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estadovigencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($estadovigencia->id); ?>"
                                    <?php echo e(old('estadovigencia_id') == $estadovigencia->id ? 'selected' : ''); ?>

                                    ><?php echo e($estadovigencia->detestadovigencia); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['estadovigencia_id'];
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

                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="tipoproceso_id">Tipo de Proceso contractual</label>
                            <select class="select2 <?php $__errorArgs = ['tipoproceso_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tipoproceso_id" id="tipoproceso_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $tipoprocesos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoproceso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipoproceso->id); ?>"
                                    <?php echo e(old('tipoproceso_id') == $tipoproceso->id ? 'selected' : ''); ?>

                                    ><?php echo e($tipoproceso->dettipoproceso); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['tipoproceso_id'];
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
                        <div class="form-group">
                            <label for="tipoadquisicione_id">Tipo de Adquisición o contrato</label>
                            <select class="select2 <?php $__errorArgs = ['tipoadquisicione_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tipoadquisicione_id" id="tipoadquisicione_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $tipoadquisiciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoadquisicion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipoadquisicion->id); ?>"
                                    <?php echo e(old('tipoadquisicione_id') == $tipoadquisicion->id ? 'selected' : ''); ?>

                                    ><?php echo e($tipoadquisicion->dettipoadquisicion); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['tipoadquisicione_id'];
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
                        <div class="form-group">
                            <label for="requiproyecto_id">¿Se requiere Protecto?</label>
                            <select class="select2 <?php $__errorArgs = ['requiproyecto_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="requiproyecto_id" id="requiproyecto_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $requiproyectos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requiproyecto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($requiproyecto->id); ?>"
                                    <?php echo e(old('requiproyecto_id') == $requiproyecto->id ? 'selected' : ''); ?>

                                    ><?php echo e($requiproyecto->detproyeto); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['requiproyecto_id'];
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
                        <div class="form-group">
                            <label for="fuente_id">Fuente de los recursos</label>
                            <select class="select2 <?php $__errorArgs = ['fuente_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="fuente_id" id="fuente_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $fuentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fuentes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fuentes->id); ?>"
                                    <?php echo e(old('fuente_id') == $fuentes->id ? 'selected' : ''); ?>

                                    ><?php echo e($fuentes->detfuente); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['fuente_id'];
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
                        <div class="form-group">
                            <label for="tipoprioridade_id">Tipo de Prioridad</label>
                            <select class="select2 <?php $__errorArgs = ['tipoprioridade_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="tipoprioridade_id" id="tipoprioridade_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $tipoprioridades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipoprioridad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($tipoprioridad->id); ?>"
                                    <?php echo e(old('tipoprioridade_id') == $tipoprioridad->id ? 'selected' : ''); ?>

                                    ><?php echo e($tipoprioridad->detprioridad); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['tipoprioridade_id'];
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mese_id">Fecha estimada de inicio del proceso(mes)</label>
                            <select class="select2 <?php $__errorArgs = ['mese_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="mese_id" id="mese_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $meses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($mes->id); ?>"
                                    <?php echo e(old('mese_id') == $mes->id ? 'selected' : ''); ?>

                                    ><?php echo e($mes->nommes); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['mese_id'];
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

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="modalidade_id">Modalidad de selección</label>
                            <select class="select2 <?php $__errorArgs = ['modalidade_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="modalidade_id" id="modalidade_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $modalidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modalidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($modalidad->id); ?>"
                                    <?php echo e(old('modalidade_id') == $modalidad->id ? 'selected' : ''); ?>

                                    ><?php echo e($modalidad->detmodalidad); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['modalidade_id'];
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


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="requipoai_id">¿Se requiere POAI?</label>
                            <select class="select2 <?php $__errorArgs = ['requipoai_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="requipoai_id" id="requipoai_id" style="width: 100%;">
        
                                <?php $__currentLoopData = $requipoais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requipoai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($requipoai->id); ?>"
                                    <?php echo e(old('requipoai_id') == $requipoai->id ? 'selected' : ''); ?>

                                    ><?php echo e($requipoai->detpoai); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['requipoai_id'];
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
                </div>

                



            </div>
            <!-- /.card-body -->
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
 

    $(document).ready(function(){
   
        $('#valorestimadocont').mask("#,##0.00", {reverse: true});
        $('#valorestimadovig').mask("#,##0.00", {reverse: true});
    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/admin/planadquisiciones/create.blade.php ENDPATH**/ ?>