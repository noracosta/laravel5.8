@extends("admin.theme.$theme.layout")
@section('titulo')
    Roles 
@endsection
@section('seccion-title')
    Roles    
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>                
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">Roles</a></li>
    <li class="breadcrumb-item active">Ver</li>
    </ol>
@endsection    

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="row">  
            @if( can('ver-rol',false))
            <a class="btn btn-app" href="{{ route('roles.show', $role) }}">
                <i class="fa fa-search"></i> Ver
            </a>
            @endif
            @if( can('editar-rol',false))
            <a class="btn btn-app active" href="{{ route('roles.edit', $role) }}">
                <i class="fa fa-edit"></i> Editar
            </a>
            @endif
            @if( can('eliminar-rol',false))
            <a class="btn btn-app" href="{{ route('roles.delete', $role) }}">
                <i class="fa fa-trash"></i> Eliminar
            </a>
            @endif
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-header -->
    {!! Form::model($role, ['']) !!}
    <div class="card-body">
        <div class="row">  
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" value="{{ $role->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Nombre" disabled>
                    <div class="invalid-feedback">
                        {!! $errors->first('name') !!}
                    </div>
                </div>    
            </div>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="row">
            <div class="col-md-6 text-left">
                <a href="{{ route('roles.index') }}" class="btn btn-secondary" role="button">
                    <i class="fa fa-chevron-left"></i>&nbsp; Volver
                </a>
            </div>
            <div class="col-md-6 text-right">
            </div>
        </div>
    </div>
    <!-- /.card-footer -->
    {!! Form::close() !!}
</div>
<!-- /.card -->
@endsection