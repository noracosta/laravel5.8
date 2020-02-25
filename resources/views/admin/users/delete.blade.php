@extends("admin.theme.$theme.layout")
@section('titulo')
    Usuarios 
@endsection
@section('seccion-title')
    Usuarios    
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>                
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
    <li class="breadcrumb-item active">Eliminar</li>
    </ol>
@endsection    
@section('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset("assets/$theme/plugins/datatables-bs4/css/dataTables.bootstrap4.css")}}">
@endsection

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="row">
            <a class="btn btn-app" href="{{ route('users.show', $user) }}">
                <i class="fa fa-search"></i> Ver
            </a>
            <a class="btn btn-app active" href="{{ route('users.edit', $user) }}">
                <i class="fa fa-edit"></i> Editar
            </a>
            <a class="btn btn-app active" href="{{ route('users.edit_password', $user) }}">
                <i class="fas fa-user-edit"></i> Editar contraseña
            </a>
            <a class="btn btn-app" href="{{ route('users.delete', $user) }}">
                <i class="fa fa-trash"></i> Eliminar
            </a>
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-header -->
    {!! Form::model($user, ['route' => ['users.destroy', $user], 'method' => 'DELETE']) !!}
    <div class="card-body">
        <div class="row">  
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" value="{{ $user->name }}" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Nombre" disabled>
                    <div class="invalid-feedback">
                        {!! $errors->first('name') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" value="{{ $user->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" placeholder="Email" disabled>
                    <div class="invalid-feedback">
                        {!! $errors->first('email') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="role_id">Rol</label>
                    {!! Form::select('role_id[]', $roles, $user_roles->roles, ['class' => 'form-control','disabled','multiple']) !!}
                    <div class="invalid-feedback">
                        {!! $errors->first('role_id') !!}
                    </div>
                </div>
            </div>    
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <div class="row">
            <div class="col-md-6 text-left">
                <a href="{{ route('users.index') }}" class="btn btn-secondary" role="button">
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
    {{ Form::hidden('id', $user->id) }}
    {!! Form::close() !!}
</div>
<!-- /.card -->
@endsection