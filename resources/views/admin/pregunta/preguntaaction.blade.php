<form action="{{route('admin.pregunta.destroy', $pregunta)}}" method="POST" class="{{$pregunta->id}}">
    @csrf
    @method('DELETE')
    @can('admin.pregunta.edit')
    <a href="{{route('admin.pregunta.edit', $pregunta)}}" class="btn btn-warning btn-sm">Editar</a>
    @endcan
    @can('admin.pregunta.destroy')
    <button type="submit"  class="btn btn-danger btn-sm btn-delete" id="{{$pregunta->id}}">Eliminar</button>
    @endcan
</form>