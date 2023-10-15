<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">

      <img src="<?php echo e(asset('adminlte/dist/img/'.auth()->user()->avatar)); ?>" class="user-image img-circle elevation-2" alt="<?php echo e(Auth::user()->name); ?>">

      <span class="d-none d-md-inline"><?php echo e(Auth::user()->name); ?></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
      <!-- User image -->
      <li class="user-header bg-primary">
        <img src="<?php echo e(asset('adminlte/dist/img/'.auth()->user()->avatar)); ?>" class="img-circle elevation-2" alt="<?php echo e(Auth::user()->name); ?>">

        <p>
          <?php echo e(Auth::user()->name); ?>

          <small><?php echo e(Auth::user()->created_at->diffForHumans()); ?></small>
        </p>
      </li>
      <!-- Menu Body -->
      
      <!-- Menu Footer-->
      <li class="user-footer">
        <a 
        
        
        
        href="<?php echo e(route('users.show', Auth::user())); ?>"
        
        class="btn btn-default btn-flat">Perfil</a>
        <a href="<?php echo e(route('logout')); ?>"
        onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();" class="btn btn-default btn-flat float-right">Cerrar sesión</a>

        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
          <?php echo csrf_field(); ?>
        </form>
      </li>
    </ul>
</li><?php /**PATH C:\laragon\www\paa2022\resources\views/layouts/_user_menu.blade.php ENDPATH**/ ?>