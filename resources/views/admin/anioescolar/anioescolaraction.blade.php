<form action="{{route('admin.anioescolar.destroy', $anioescolar)}}" method="POST" class="{{$anioescolar->id}}">
    @csrf
    @method('DELETE')
    <a href="{{asset($anioescolar->url)}}" class="btn btn-success btn-sm" target="blank">Ver</a>
    @can('admin.anioescolar.edit')
    <a href="{{route('admin.anioescolar.edit', $anioescolar)}}" class="btn btn-warning btn-sm">Editar</a>
    @endcan
    @can('admin.anioescolar.destroy')
    <button type="submit"  class="btn btn-danger btn-sm btn-delete" id="{{$anioescolar->id}}">Eliminar</button>
    @endcan
</form>