<?php $__env->startSection('title','Panel administrador'); ?>
<?php $__env->startSection('style'); ?>

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Panel Administrador</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Inicio</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">

            <?php if(auth()->user()->hasRole('Admin')): ?>
            <div class="row"> 
            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3><?php echo e($adquisiciones); ?></h3>
                        <p>Plan de Adquisiciones</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="<?php echo e(route('planadquisiciones.index')); ?>" class="small-box-footer">Ver Todo <i class="fas fa-arrow-circle-right"></i></a>
                </div> 
            </div>                  
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-blue">
                        <div class="inner">
                            <h3><?php echo e($users); ?></h3>
                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-tie"></i>                                                       
                        </div>
                        <a href="<?php echo e(route('users.index')); ?>" class="small-box-footer">Ver todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo e($products); ?></h3>
                            <p>Productos</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-bitcoin"></i>
                        </div>
                        <a href="<?php echo e(route('admin.productos.index')); ?>" class="small-box-footer">Ver Todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo e($clases); ?></h3>
                            <p>Clases</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <a href="<?php echo e(route('admin.clases.index')); ?>" class="small-box-footer">Ver Todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3><?php echo e($familias); ?></h3>
                            <p>Familias</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="<?php echo e(route('admin.familias.index')); ?>" class="small-box-footer">Ver Todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3><?php echo e($segmentos); ?></h3>
                            <p>Segmentos</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-chess-king"></i> 
                        </div>
                        <a href="<?php echo e(route('admin.segmentos.index')); ?>" class="small-box-footer">Ver Todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3><?php echo e($dependencias); ?></h3>
                            <p>Dependencias</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-xbox"></i>
                        </div>
                        <a href="<?php echo e(route('admin.dependencias.index')); ?>" class="small-box-footer">Ver Todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-pink">
                        <div class="inner">
                            <h3><?php echo e($areas); ?></h3>
                            <p>Areas</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-playstation"></i>
                        </div>
                        <a href="<?php echo e(route('admin.areas.index')); ?>" class="small-box-footer">Ver Todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="row">
                <section class="col-lg-12 connectedSortable">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-chart-pie mr-1"></i>
                                Plan de Adquisiciones
                            </h3>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.export')): ?>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="btn btn-success" href="<?php echo e(route('planadquisiciones.export')); ?>" >
                                            <i class="far fa-file-excel"></i>  Exportar Todo</a>
                                    </li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <canvas id="planes"></canvas>
                        </div>
                    </div>
                </section>
            </div> 
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('adminlte/plugins/chart.js/Chart.min.js')); ?>"></script>

<script>
    $(function(){
        var varCompra=document.getElementById('planes').getContext('2d');
    
            var charCompra = new Chart(varCompra, {
                type: 'line',
                data: {
                    labels: [<?php foreach ($planes as $reg)
                        { 
                    
                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish'); 
                    $mes_traducido=strftime('%B',strtotime($reg->mes));
            
                    echo '"'. $mes_traducido.'",';} ?>],
                    datasets: [{
                        label: 'Total del mes',
                        data: [<?php foreach ($planes as $reg)
                            {echo ''. $reg->totalmes.',';} ?>],

                        backgroundColor: '#E91E63',
                        borderColor: '#E91E63',

                        borderWidth:3
                    }]
                },
                
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                            
                            beginAtZero:true
                        }
                      }]
                    },
                    legend: {
                      display: false
                    },
                    elements: {
                      point: {
                        radius: 5
                      }
                    }
                }
            });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\paa2022v1\resources\views/home.blade.php ENDPATH**/ ?>