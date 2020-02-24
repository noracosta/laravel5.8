@extends("admin.theme.$theme.layout")
@section('titulo')
    Menús 
@endsection
@section('seccion-title')
    Menús    
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>                
    <li class="breadcrumb-item active">Menús</li>
    </ol>
@endsection    
@section('styles')
    <!-- Nestable -->
    <link rel="stylesheet" href="{{asset("assets/Nestable-master/jquery.nestable.css")}}">
@endsection
@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="row">
            <a class="btn btn-app" href="{{ route('menus.index') }}">
                <i class="fas fa-bars"></i> Listar
            </a>
            <a class="btn btn-app" href="{{ route('menus.create') }}">
                <i class="fa fa-plus"></i> Agregar
            </a>
            
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-header -->    
    <div class="card-body table-responsive">
        @include('flash::message')
        <div class="row">
            <div class="col-md">  
                <div class="box box-success">
                    <div class="box-header with-border">
                    </div>
                    <div class="box-body">
                        @csrf
                        <div class="dd" id="nestable">
                            <ol class="dd-list">
                                @foreach ($menus as $key => $item)
                                    @if ($item["menu_id"] != 0)
                                        @break
                                    @endif
                                    @include("admin.menus.menu_item",["item" => $item])
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
@section('scripts')
    <!-- Nestable -->
    <script src="{{asset("assets/Nestable-master/jquery.nestable.js")}}"></script>
    <script src="{{asset("assets/Nestable-master/custom.js")}}"></script>
@endsection
