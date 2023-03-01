<form action="{{route('admin.trabajador.destroy', $trabajador)}}" method="POST" class="{{$trabajador->id}}">
    @csrf
    @method('DELETE')
    @can('admin.trabajador.show')
    <a href="{{route('admin.trabajador.show', $trabajador)}}" class="btn btn-success btn-sm">Ver</a>
    @endcan
    @can('admin.trabajador.edit')
    <a href="{{route('admin.trabajador.edit', $trabajador)}}" class="btn btn-warning btn-sm">Editar</a>
    @endcan
    @can('admin.trabajador.destroy')
    <button type="submit"  class="btn btn-danger btn-sm btn-delete" id="{{$trabajador->id}}">Eliminar</button>
    @endcan
</form>


