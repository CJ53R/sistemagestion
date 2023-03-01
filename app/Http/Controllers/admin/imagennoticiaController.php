<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\imagennoticia;
use App\Models\noticia;
use Illuminate\Support\Facades\Storage;

class imagennoticiaController extends Controller
{
    public function destroy(imagennoticia $imagennoticia)
    {
        $noticia = noticia::find($imagennoticia->noticia_id);
        $urldel = str_replace('storage', 'public', $imagennoticia->url);
        Storage::delete($urldel);
        $imagennoticia->delete();
        return redirect()->route('admin.noticia.edit', compact('noticia'))->with('eliminarimg','ok');
    }
}
