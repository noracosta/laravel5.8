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
        <div class="row">  
            Bienvenido
        </div>
        <!--/.row -->    
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection