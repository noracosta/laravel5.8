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
    <li class="breadcrumb-item active">Agregar</li>
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
            <a class="btn btn-app" href="{{ route('roles.create') }}">
                <i class="fa fa-plus"></i> Agregar
            </a>
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-header -->
    {!! Form::open(['route' => 'roles.store', 'method' => 'POST','id' => 'form', 'autocomplete' => 'off']) !!}    
    <div class="card-body">
        <div class="row">  
            <div class="col-md-4">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" placeholder="Nombre" required>
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
                <button type="submit" class="btn btn-primary">
                    Guardar
                </button>
            </div>
        </div>
    </div>
    <!-- /.card-footer -->
    {!! Form::close() !!}
</div>
<!-- /.card -->
@endsection
@section('scripts')
<!-- jquery-validation -->
<script src="{{asset("assets/jquery-validation/jquery.validate.min.js")}}"></script>
<script src="{!! asset('assets/jquery-validation/additional-methods.min.js') !!}"></script>
<script src="{{asset("assets/jquery-validation/localization/messages_es.min.js")}}"></script>
<script>
   jQuery.validator.setDefaults({
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });

    $('#form').validate({
        ignore: [],
        rules: {
            name: {
                required: true
            },
        },
        
    })
</script> 
@endsection