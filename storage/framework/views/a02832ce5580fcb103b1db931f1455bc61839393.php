<aside class="main-sidebar sidebar-dark-blue elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('home')); ?>" class="brand-link">
      <img src="<?php echo asset('adminlte/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Plan de Adquisiciones</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         

          

          <?php if(auth()->user()->hasRole('Admin')): ?>

          

          <li class="nav-item">
            <a href="<?php echo e(route('empresa.index')); ?>" class="nav-link 
            <?php echo active_class(route('empresa.index')); ?>

            ">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Empresa
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('users.index')); ?>" class="nav-link 
            <?php echo active_class(route('users.index')); ?>

            ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.areas.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.areas.index')); ?>

            ">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Áreas
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.clases.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.clases.index')); ?>

            ">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Clases
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.acta.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.acta.index')); ?>

            ">
              <i class="nav-icon fas fa-list-ul"></i>
              <p>
                Actas
              </p>
            </a>
          </li> 
           
          <li class="nav-item">
            <a href="<?php echo e(route('admin.dependencias.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.dependencias.index')); ?>

            ">       
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Dependencias
              </p>
            </a>
          </li>          

          <li class="nav-item">
            <a href="<?php echo e(route('admin.estadovigencias.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.estadovigencias.index')); ?>

            ">
              <i class="nav-icon fas fa-calendar-minus"></i>
              <p>
                Estado de vigencia
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.familias.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.familias.index')); ?>

            ">
              <i class="nav-icon fas fa-house-user"></i>
              <p>
                Familias
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.fuentes.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.fuentes.index')); ?>

            ">
              <i class="nav-icon fas fa-location-arrow"></i>
              <p>
                Fuentes
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.meses.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.meses.index')); ?>

            ">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Meses
              </p>
            </a>
          </li>  

          <li class="nav-item">
            <a href="<?php echo e(route('admin.modalidades.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.modalidades.index')); ?>

            ">
              <i class="nav-icon fas fa-stream"></i>
              <p>
                Modalidades
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('planadquisiciones.index')); ?>" class="nav-link 
            <?php echo active_class(route('planadquisiciones.index')); ?>

            ">
            <i class="fas fa-parking"></i>
              <p>
                Plan de Adquisiciones
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.productos.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.productos.index')); ?>

            ">
              <i class="nav-icon fab fa-product-hunt"></i>
              <p>
                Productos
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.segmentos.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.segmentos.index')); ?>

            ">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Segmentos
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.tipoadquicsiciones.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.tipoadquicsiciones.index')); ?>

            ">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                REQUIPOIAS
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.tipoadquicsiciones55.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.tipoadquicsiciones55.index')); ?>

            ">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Tipo de Adquisiciones
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('admin.tipoprioridades.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.tipoprioridades.index')); ?>

            ">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Tipo de Prioridades
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo e(route('admin.tipoprocesos.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.tipoprocesos.index')); ?>

            ">
              <i class="nav-icon fas fa-list-alt"></i>
              <p>
                Tipo de Procesos
              </p>
            </a>
          </li> 

          <li class="nav-item">
            <a href="<?php echo e(route('tipozonas.index')); ?>" class="nav-link 
            <?php echo active_class(route('tipozonas.index')); ?>

            ">
              <i class="nav-icon far fa-map"></i>
              <p>
                Tipo de Zonas
              </p>
            </a>
          </li> 

          
          
          <li class="nav-item">
            <a href="<?php echo e(route('admin.proyectos.index')); ?>" class="nav-link 
            <?php echo active_class(route('admin.proyectos.index')); ?>

            ">
              <i class="nav-icon fas fa-poll"></i>
              <p>
                Requisitos del Proyecto
              </p>
            </a>
          </li> 

                    
          
          <?php else: ?>
          
          <li class="nav-item">
            <a href="<?php echo e(route('planadquisiciones.index')); ?>" class="nav-link 
            <?php echo active_class(route('planadquisiciones.index')); ?>

            ">
            <i class="fas fa-parking"></i>
              <p>
                Plan de Adquisiciones
              </p>
            </a>
          </li> 

          <?php endif; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside><?php /**PATH C:\laragon\www\paa2022v1\resources\views/layouts/_nav.blade.php ENDPATH**/ ?>