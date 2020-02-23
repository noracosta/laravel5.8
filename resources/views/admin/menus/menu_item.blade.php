@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <i class="{{isset($item["icon"]) ? $item["icon"] : ""}}"></i>  {{$item["name"] . " - " . $item["url"]}}      
        <a href="{{route("menus.show", ['id' => $item["id"]])}}" alt="Ver" title="Ver"><i class="fa fa-search"></i></a>
        <a href="{{route("menus.edit", ['id' => $item["id"]])}}" alt="Editar" title="Editar"><i class="fa fa-edit fa-lg"></i></a>
        <a href="{{route('menus.delete', ['id' => $item["id"]])}}" alt="Eliminar" title="Eliminar"><i class="fa fa-trash fa-lg"></i></a>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <i class="{{isset($item["icon"]) ? $item["icon"] : ""}}"></i> {{ $item["name"] . " - " . $item["url"]}}
        <a href="{{route("menus.show", ['id' => $item["id"]])}}" alt="Ver" title="Ver"><i class="fa fa-search"></i></a>
        <a href="{{route("menus.edit", ['id' => $item["id"]])}}" alt="Editar" title="Editar"><i class="fa fa-edit fa-lg"></i></a>
        <a href="{{route('menus.delete', ['id' => $item["id"]])}}" alt="Eliminar" title="Eliminar"><i class="fa fa-trash fa-lg"></i></a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.menus.menu_item",[ "item" => $submenu ])
        @endforeach
    </ol>
</li>
@endif