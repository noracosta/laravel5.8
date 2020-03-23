<div class="btn-group">
    <a href="{{ route('permissions.show', $permission) }}" role="button" class="btn btn-sm btn-default">
        <i class="fas fa-search"></i> Ver
    </a>
    <button type="button" class="btn btn-default dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
    </button>
    <div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(67px, -2px, 0px);">
        @if( can('editar-permiso',false))
        <a class="dropdown-item" href="{{ route('permissions.edit', $permission) }}">Editar</a>
        @endif
        @if( can('eliminar-permiso',false))
        <a class="dropdown-item" href="{{ route('permissions.delete', $permission) }}">Eliminar</a>
        @endif
    </div>
</div>