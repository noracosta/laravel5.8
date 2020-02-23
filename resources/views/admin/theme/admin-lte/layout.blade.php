<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Administrador | @yield('titulo','Inicio')</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="{{asset("assets/$theme/plugins/ionicons/css/ionicons.min.css")}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
        @yield('styles')
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition sidebar-mini layout-navbar-fixed">
        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Header -->
            @include("admin/theme/$theme/header")
            <!-- /. Header -->
            <!-- Aside -->
            @include("admin/theme/$theme/aside")
            <!-- /. Aside -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>@yield('seccion-title')</h1>
                    </div>
                    <div class="col-sm-6">
                        @yield('breadcrumb')
                    </div>
                    </div>
                </div><!-- /.container-fluid -->
                </section>
                <!-- Main content -->
                <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            @yield('content')
                        </div>
                    </div>
                </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <!-- Footer -->
            @include("admin/theme/$theme/footer")
            <!-- /. Footer -->
        </div>
        <!-- jQuery -->
        <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
        @yield('scripts')
    </body>
</html>