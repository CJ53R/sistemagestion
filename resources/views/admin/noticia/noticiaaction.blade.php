<form action="{{route('admin.noticia.destroy', $noticia)}}" method="POST" class="{{$noticia->id}}">
    @csrf
    @method('DELETE')
    @can('admin.noticia.edit')
    <a href="{{route('admin.noticia.edit', $noticia)}}" class="btn btn-warning btn-sm">Editar</a>
    @endcan
    @can('admin.noticia.destroy')
    <button type="submit"  class="btn btn-danger btn-sm btn-delete" id="{{$noticia->id}}">Eliminar</button>
    @endcan
</form>