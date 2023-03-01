
    @can('admin.imagenp.edit')
    <a href="{{route('admin.imagenp.edit', $imagenpag)}}" class="btn btn-warning btn-sm">Subir Portada de Sección</a>
    <a href="{{route('admin.moreimagen.create', $imagenpag)}}" class="btn btn-warning btn-sm">Subir Más Imagenes</a>
    @endcan