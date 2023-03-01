<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\imagenpag;
use App\Models\masimagenpag;
use Illuminate\Support\Facades\Storage;

class imagenpagController extends Controller
{
    
    public function index()
    {
        return view('admin.pagina.indeximagenp');
    }

    public function showDataImagenpList(){
        $imagenpags= imagenpag::select('id', 'nombrep')->get();
        return datatables()->of($imagenpags)->addColumn('actions',
        function(imagenpag $imagenpag){
            return view('admin.pagina.imagenpaction', compact('imagenpag'));
        })
        ->rawColumns(['actions'])->toJson();  
    }


    public function edit(imagenpag $imagenpag)
    {
        
        return view('admin.pagina.editimagenp', compact('imagenpag'));
    }

    
    public function update(Request $request, imagenpag $imagenpag)
    {
        $request->validate([
            'file' => 'required|image'
        ]);

        $imagen= $request->file('file')->store('public/imagenp');

        $url = Storage::url($imagen);
        if($imagenpag->url!=''){
            $urldel = str_replace('storage', 'public', $imagenpag->url);
            Storage::delete($urldel);
        }

        $imagenpag->url = $url;
        $imagenpag->save();
        return redirect()->route('admin.imagenp.edit', compact('imagenpag'))->with('info', 'edit');
    }






    public function editmore(imagenpag $imagenpag)
    {
        $imagenes = masimagenpag::where('imagenpag_id', '=', $imagenpag->id)->get();
        return view ('admin.pagina.moreimagen', compact('imagenpag', 'imagenes'));
    }



    public function masimagenesstore(Request $request, imagenpag $imagenpag)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $files = $request->file;

        if($request->hasfile('file')){
            foreach ($files as $file){
                $imagen = $file->store('public/masimagenes');
                $url = Storage::url($imagen);
                $imagen = new masimagenpag();
                $imagen->url = $url;
                $imagen->imagenpag_id = $imagenpag->id;
                $imagen->save();
            }
        }

        return redirect()->route('admin.moreimagen.create', compact('imagenpag'))->with('info', 'edit');
    }


    public function destroy(masimagenpag $masimagenpag)
    {

        $imagenpag= imagenpag::where('id','=',$masimagenpag->imagenpag_id)->first();
            $url = str_replace('storage','public', $masimagenpag->url);
            Storage::delete($url);
            $masimagenpag->delete();

        return redirect()->route('admin.moreimagen.create', compact('imagenpag'))->with('eliminar', 'ok');
    }
}
