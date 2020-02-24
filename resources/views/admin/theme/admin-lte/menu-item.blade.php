@if ($item["submenu"] == [])
    <li class="nav-item">
        <a href="{{url($item['url'])}}" class="nav-link {{getMenuActivo($item["url"])}}">
            <i class="nav-icon {{$item["icon"]}}"></i>
            <p>
                {{$item["name"]}}
            </p>
        </a>
    </li>
@else
    <li class="nav-item has-treeview" {{getMenuAbierto($item["url"])}}>
        <a href="javascript:;" class="nav-link {{getMenuActivo($item["url"])}}">
        <i class="nav-icon {{$item["icon"]}}"></i>
        <p>
            {{$item["name"]}}
            <i class="right fas fa-angle-left"></i>
        </p>
        </a>
        <ul class="nav nav-treeview">
            @foreach ($item["submenu"] as $submenu)
                @include("admin.theme.$theme.menu-item", ["item" => $submenu])
            @endforeach
        </ul>
    </li>
@endif