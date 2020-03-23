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
    <li class="breadcrumb-item"><a href="{{ route('menus.index') }}">Menús</a></li>
    <li class="breadcrumb-item active">Eliminar</li>
    </ol>
@endsection    

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="row">
            @if( can('ver-menu',false))
            <a class="btn btn-app" href="{{ route('menus.list') }}">
                <i class="fas fa-list"></i> Listar árbol
            </a>  
            @endif
            @if( can('ver-menu',false))
            <a class="btn btn-app" href="{{ route('menus.show', $menu) }}">
                <i class="fa fa-search"></i> Ver
            </a>
            @endif
            @if( can('editar-menu',false))
            <a class="btn btn-app active" href="{{ route('menus.edit', $menu) }}">
                <i class="fa fa-edit"></i> Editar
            </a>
            @endif
            @if( can('eliminar-menu',false))
            <a class="btn btn-app" href="{{ route('menus.delete', $menu) }}">
                <i class="fa fa-trash"></i> Eliminar
            </a>
            @endif
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-header -->
    {!! Form::model($menu, ['route' => ['menus.destroy', $menu], 'method' => 'DELETE']) !!}
    <div class="card-body">
        <div class="row">  
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" value="{{ $menu->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Nombre" disabled>
                    <div class="invalid-feedback">
                        {!! $errors->first('name') !!}
                    </div>
                </div>    
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="url">URL</label>
                    <input type="text" value="{{ $menu->url }}" class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" id="url" name="url" placeholder="Url" disabled>
                    <div class="invalid-feedback">
                        {!! $errors->first('url') !!}
                    </div>
                </div>    
            </div> 
            <div class="col-md-4">
                <div class="form-group">
                    <label for="icon">Icono</label>
                    <input type="text" value="{{ $menu->icon }}" class="form-control {{ $errors->has('icon') ? 'is-invalid' : '' }}" id="icon" name="icon" placeholder="Icono" disabled>
                    <div class="invalid-feedback">
                        {!! $errors->first('icon') !!}
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="row">
            <div class="col-md-6 text-left">
                <a href="{{ route('menus.index') }}" class="btn btn-secondary" role="button">
                    <i class="fa fa-chevron-left"></i>&nbsp; Volver
                </a>
            </div>
            <div class="col-md-6 text-right">
                <button type="submit" class="btn btn-danger">
                    Eliminar
                </button>
            </div>
        </div>
    </div>
    <!-- /.card-footer -->
    {!! Form::close() !!}
</div>
<!-- /.card -->
@endsection