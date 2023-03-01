<form action="{{route('admin.role.destroy', $role)}}" method="POST" class="{{$role->id}}">
    @csrf
    @method('DELETE')
    <a href="#" class="btn btn-success btn-sm">Ver</a>
    @can('admin.role.edit')
    <a href="{{route('admin.role.edit', $role)}}" class="btn btn-warning btn-sm">Editar</a>
    @endcan
    @can('admin.role.destroy')
    <button type="submit"  class="btn btn-danger btn-sm btn-delete" id="{{$role->id}}">Eliminar</button>
    @endcan
</form>