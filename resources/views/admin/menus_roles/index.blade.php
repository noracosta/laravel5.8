@extends("admin.theme.$theme.layout")
@section('titulo')
    Menú Roles 
@endsection
@section('seccion-title')
    Menú Roles    
@endsection
@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>                
    <li class="breadcrumb-item active">Menus Roles</li>
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
                        <th>Menú</th>
                        @foreach ($roles as $id => $name)
                        <th class="text-center">{{$name}}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $key => $menu)
                    @if ($menu["menu_id"] != 0)
                        @break
                    @endif
                        <tr>
                            <td><i class="fa fa-arrows-alt"></i> {{$menu["name"]}}</td>
                            @foreach($roles as $id => $name)
                                <td class="text-center">
                                    <input
                                    type="checkbox"
                                    class="menu_role"
                                    name="menu_role[]"
                                    data-menuid={{$menu[ "id"]}}
                                    value="{{$id}}" {{in_array($id, array_column($menus_roles[$menu["id"]], "id"))? "checked" : ""}}>
                                </td>
                            @endforeach
                        </tr>
                        @foreach($menu["submenu"] as $key => $hijo)
                            <tr>
                                <td><i class="fa fa-arrow-right pl-2"></i> {{ $hijo["name"] }}</td>
                                @foreach($roles as $id => $nombre)
                                    <td class="text-center">
                                        <input
                                        type="checkbox"
                                        class="menu_role"
                                        name="menu_role[]"
                                        data-menuid={{$hijo[ "id"]}}
                                        value="{{$id}}" {{in_array($id, array_column($menus_roles[$hijo["id"]], "id"))? "checked" : ""}}>
                                    </td>
                                @endforeach
                            </tr>
                            @foreach ($hijo["submenu"] as $key => $hijo2)
                                <tr>
                                    <td><i class="fa fa-arrow-right pl-4"></i> {{$hijo2["name"]}}</td>
                                    @foreach($roles as $id => $nombre)
                                        <td class="text-center">
                                            <input
                                            type="checkbox"
                                            class="menu_role"
                                            name="menu_role[]"
                                            data-menuid={{$hijo2[ "id"]}}
                                            value="{{$id}}" {{in_array($id, array_column($menus_roles[$hijo2["id"]], "id"))? "checked" : ""}}>
                                        </td>
                                    @endforeach
                                </tr>
                                @foreach ($hijo2["submenu"] as $key => $hijo3)
                                    <tr>
                                        <td><i class="fa fa-arrow-right pl-5"></i> {{$hijo3["name"]}}</td>
                                        @foreach($roles as $id => $nombre)
                                        <td class="text-center">
                                            <input
                                            type="checkbox"
                                            class="menu_role"
                                            name="menu_role[]"
                                            data-menuid={{$hijo3[ "id"]}}
                                            value="{{$id}}" {{in_array($id, array_column($menus_roles[$hijo3["id"]], "id"))? "checked" : ""}}>
                                        </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
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
    <script src="{{asset("assets/menus_roles/custom.js")}}" type="text/javascript"></script>
@endsection
