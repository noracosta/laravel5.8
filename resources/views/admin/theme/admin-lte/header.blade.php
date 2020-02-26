  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      @if(session()->get("roles") && count(session()->get("roles")) > 1)
      <!-- Roles -->
      <li class="nav-item d-none d-md-block">
        <a class="nav-link cambiar-rol" href="#" title="Cambiar de rol" name="Cambiar de rol">
          <i class="fas fa-user-tag"></i> Cambiar de rol
        </a>
      </li>
      <li class="nav-item d-block d-md-none">
        <a class="nav-link cambiar-rol" href="#" title="Cambiar de rol" name="Cambiar de rol">
          <i class="fas fa-user-tag"></i>
        </a>
      </li>
      @endif
      <!-- Logout -->
      <li class="nav-item d-none d-md-block">
        <a class="nav-link" href="{{route('logout')}}" title="Salir" name="Salir">
          <i class="fas fa-sign-out-alt"></i> Salir
        </a>
      </li>
      <li class="nav-item d-block d-md-none">
        <a class="nav-link" href="{{route('logout')}}" title="Salir" name="Salir">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->