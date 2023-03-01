<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\activamatricula;
use App\Models\div;
use App\Models\imagennoticia;
use App\Models\noticia;
use App\Models\portada;
use Illuminate\Support\Facades\Storage;

class paginaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function portada()
    {
        $portadas = portada::all();
        return view('admin.pagina.portada', compact('portadas'));
    }

    public function portadastore(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);

        $files = $request->file;

        if($request->hasfile('file')){
            foreach ($files as $file){
                $imagen = $file->store('public/portada');
                $url = Storage::url($imagen);
                $imagenportada = new portada();
                $imagenportada->url = $url;
                $imagenportada->save();
            }
        }
        return redirect()->route('admin.portada.portada')->with('save', 'ok');
    }


    public function destroy(portada $portada)
    {

            $url = str_replace('storage','public', $portada->url);
            Storage::delete($url);
            $portada->delete();

        return redirect()->route('admin.portada.portada')->with('eliminar', 'ok');
    }











    public function activamatricula(){
        $div = div::where('id', '=', 1)->first();
        $estados = activamatricula::all();
        return view('admin.matricula.activadiv', compact('div', 'estados'));
    }

    public function updatediv(Request $request, div $div)
    {
        $request->validate([
            'estado' => 'required|numeric'
        ]);

        $div->activamatricula_id= $request->estado;
        $div->save();
            return redirect()->route('admin.matricula.activa', compact('div'))->with('edit', 'ok');
    }



    public function allnews(){
        $noticias = noticia::all();
        $imagenes = imagennoticia::all();
        return view('home.noticia.allnews', compact('noticias', 'imagenes'));
    }





    public function activaaviso(){
        $div = div::where('id', '=', 2)->first();
        $estados = activamatricula::all();
        return view('admin.aviso.activaaviso', compact('div', 'estados'));
    }

    
    public function updateaviso(Request $request, div $div)
    {
        $request->validate([
            'estado' => 'required|numeric',
            'file' => 'image'
        ]);

        if($request->hasfile('file')){
            if($div->url!=''){
                $imagen = $request->file('file')->store('public/aviso');
                $url = Storage::url($imagen);
                $urldel = str_replace('storage', 'public', $div->url);
                Storage::delete($urldel);

                $div->url = $url;
                $div->save();
            }else{
                $imagen = $request->file('file')->store('public/aviso');
                $url = Storage::url($imagen);

                $div->url = $url;
                $div->save();
            }
        }

        $div->activamatricula_id= $request->estado;
        $div->save();
            return redirect()->route('admin.aviso.activa', compact('div'))->with('edit', 'ok');
    }

    public function updateavisoimg(div $div)
    {

        $urldel = str_replace('storage', 'public', $div->url);
        Storage::delete($urldel);

        $div->url = '';
        $div->save();

        return redirect()->route('admin.aviso.activa', compact('div'))->with('edit', 'ok');
    }
}
