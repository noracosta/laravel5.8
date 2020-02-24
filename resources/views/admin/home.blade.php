@extends("admin.theme.$theme.layout")
@section('titulo')
    Inicio 
@endsection
@section('seccion-title')
    Bienvenido    
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>                
    <li class="breadcrumb-item active">Inicio</li>
    </ol>
@endsection    

@section('content')

<div class="card card-primary card-outline">
    <div class="card-body table-responsive"> 
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fa fa-ban"></i> Error!</h5>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">  
            Bienvenido
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection