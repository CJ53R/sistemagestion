<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\infraestructura;
use Illuminate\Support\Facades\Storage;

class infraestructuraController extends Controller
{
    public function infraestructura()
    {
        $imagenes = infraestructura::all();
        return view('admin.pagina.infraestructura', compact('imagenes'));
    }

    public function infraestructurastore(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $files = $request->file;

        if($request->hasfile('file')){
            foreach ($files as $file){
                $imagen = $file->store('public/infraestructura');
                $url = Storage::url($imagen);
                $imagen = new infraestructura();
                $imagen->url = $url;
                $imagen->save();
            }
        }
        return redirect()->route('admin.infraestructura.infraestructura')->with('save', 'ok');
    }


    public function destroy(infraestructura $infraestructura)
    {

            $url = str_replace('storage','public', $infraestructura->url);
            Storage::delete($url);
            $infraestructura->delete();

        return redirect()->route('admin.infraestructura.infraestructura')->with('eliminar', 'ok');
    }
}
