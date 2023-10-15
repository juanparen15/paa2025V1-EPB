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
                    <h1 class="m-0">Panel administrador</h1>
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
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo e($users); ?></h3>
                            <p>Usuarios</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
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
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="<?php echo e(route('admin.productos.index')); ?>" class="small-box-footer">Ver todo <i class="fas fa-arrow-circle-right"></i></a>
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
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo e(route('admin.clases.index')); ?>" class="small-box-footer">Ver todo <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo e($adquisiciones); ?></h3>

                            <p>Plan de adquisiciones</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="<?php echo e(route('planadquisiciones.index')); ?>" class="small-box-footer">Ver todo <i class="fas fa-arrow-circle-right"></i></a>
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
                                Plan de adquisiciones
                            </h3>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('planadquisiciones.export')): ?>
                            <div class="card-tools">
                                <ul class="nav nav-pills ml-auto">
                                    <li class="nav-item">
                                        <a class="btn btn-success" href="<?php echo e(route('planadquisiciones.export')); ?>" >Exportar todo</a>
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\plan-de-adquisiciones\resources\views/home.blade.php ENDPATH**/ ?>