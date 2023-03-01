<form action="{{route('admin.documento.destroy', $documento)}}" method="POST" class="{{$documento->id}}">
    @csrf
    @method('DELETE')
    <a href="{{asset($documento->url)}}" class="btn btn-success btn-sm" target="blank">Ver</a>
    @can('admin.documento.edit')
    <a href="{{route('admin.documento.edit', $documento)}}" class="btn btn-warning btn-sm">Editar</a>
    @endcan
    @can('admin.documento.destroy')
    <button type="submit"  class="btn btn-danger btn-sm btn-delete" id="{{$documento->id}}">Eliminar</button>
    @endcan
</form>