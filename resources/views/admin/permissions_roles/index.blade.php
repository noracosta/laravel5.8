@extends("admin.theme.$theme.layout")
@section('titulo')
    Permisos Roles 
@endsection
@section('seccion-title')
    Permisos Roles    
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>                
    <li class="breadcrumb-item active">Permisos Roles</li>
    </ol>
@endsection    

@section('content')

<div class="card card-primary card-outline">
    <div class="card-header">
        <div class="row">   
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-header -->    
    <div class="card-body table-responsive">
        <div class="flash-message"></div>
        <div class="row">  
            @csrf
            <table class="table table-striped table-bordered table-hover" id="tabla-data">
                <thead>
                    <tr>
                        <th>Permiso</th>
                        @foreach ($roles as $id => $name)
                        <th class="text-center">{{$name}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $key => $permission)
                        <tr>
                            <td class="font-weight-bold">{{$permission["name"]}}</td>
                            @foreach($roles as $id => $name)
                                <td class="text-center">
                                    <input
                                    type="checkbox"
                                    class="permiso_rol"
                                    name="permiso_rol[]"
                                    data-permisoid={{$permission[ "id"]}}
                                    value="{{$id}}" {{in_array($id, array_column($permissions_roles[$permission["id"]], "id"))? "checked" : ""}}>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
@section('scripts')
    <script src="{{asset("assets/permissions_roles/custom.js")}}" type="text/javascript"></script>
@endsection
