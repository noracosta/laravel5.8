<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="/" class="brand-link elevation-4">
    <img src="{{asset("assets/$theme/dist/img/AdminLTELogo.png")}}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">Ir al sitio web</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!--<img src="{{asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle elevation-2" alt="User Image">-->
      </div>
      <div class="info">
      <a href="#" class="d-block">{{session()->get('user_name')}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @foreach ($menusComposer as $key => $item)
            @if ($item["menu_id"] != 0)
                @break
            @endif
            @include("admin.theme.$theme.menu-item", ["item" => $item])
        @endforeach
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>