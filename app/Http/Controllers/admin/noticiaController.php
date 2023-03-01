<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\estadonoticia;
use App\Models\imagennoticia;
use App\Models\noticia;
use Illuminate\Support\Facades\Storage;

class noticiaController extends Controller
{

    public function index()
    {
        return view('admin.noticia.index');
    }

    public function showDataNoticiaList(){
        $noticias= noticia::select('id', 'titulo','shortdescripcion', 'fpublicacion')->get();
        return datatables()->of($noticias)->addColumn('actions',
        function(noticia $noticia){
            return view('admin.noticia.noticiaaction', compact('noticia'));
        })
        ->rawColumns(['actions'])->toJson();  
    }


    public function create()
    {
        $estados = estadonoticia::all();
        return view('admin.noticia.create', compact('estados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'titulo' => 'required|max:200',
            'fpublicacion' => 'required|date',
            'estado' => 'required|numeric',
            'shortdescripcion' => 'required|max:250',
            'largedescripcion' => 'required|max:1500',
            'file.*' => 'required',
        ]);
        $noticia = new noticia();
        $noticia->titulo = $request->titulo;
        $noticia->fpublicacion = $request->fpublicacion;
        $noticia->shortdescripcion = $request->shortdescripcion;
        $noticia->largedescripcion = $request->largedescripcion;
        $noticia->estadonoticia_id = $request->estado;
        $noticia->save();
         $id= $noticia->id;

        $files = $request->file;

        if($request->hasfile('file')){
            foreach ($files as $file){
                $imagen = $file->store('public/imageneslugar');
                $url = Storage::url($imagen);
                $imagennoticia = new imagennoticia();
                $imagennoticia->url = $url;
                $imagennoticia->noticia_id= $id;
                $imagennoticia->save();
            }
        }
            return redirect()->route('admin.noticia.create')->with('save', 'ok');
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(noticia $noticia)
    {
        $imagenes= imagennoticia::where('noticia_id', '=', $noticia->id)->get();
        return view('admin.noticia.show', compact('noticia', 'imagenes'));
    }

    public function showall(noticia $noticia)
    {
        $imagenes= imagennoticia::where('noticia_id', '=', $noticia->id)->get();
        return view('admin.noticia.showall', compact('noticia', 'imagenes'));
    }


    public function edit(noticia $noticia)
    {
        $estados = estadonoticia::all();
        $imagenesnoticia = imagennoticia::where('noticia_id', '=', $noticia->id)->get();
        return view('admin.noticia.edit', compact('estados', 'noticia', 'imagenesnoticia'));
    }


    public function update(Request $request, noticia $noticia)
    {
        $request->validate([
            'titulo' => 'required|max:200',
            'fpublicacion' => 'required|date',
            'estado' => 'required|numeric',
            'shortdescripcion' => 'required|max:250',
            'largedescripcion' => 'required|max:1500',
            'file.*' => 'required',
        ]);

        $noticia->titulo = $request->titulo;
        $noticia->fpublicacion = $request->fpublicacion;
        $noticia->shortdescripcion = $request->shortdescripcion;
        $noticia->largedescripcion = $request->largedescripcion;
        $noticia->estadonoticia_id = $request->estado;
        $noticia->save();
         $id= $noticia->id;

        $files = $request->file;
        
        if($request->hasfile('file')){
            foreach ($files as $file){
                $imagen = $file->store('public/imageneslugar');
                $url = Storage::url($imagen);
                $imagennoticia = new imagennoticia();
                $imagennoticia->url = $url;
                $imagennoticia->noticia_id= $id;
                $imagennoticia->save();
            }
        }
            return redirect()->route('admin.noticia.edit', compact('noticia'))->with('edit', 'ok');
    }

    
    public function destroy(noticia $noticia)
    {
        $imagenes = imagennoticia::where('noticia_id','=', $noticia->id)->get();

        foreach ($imagenes as $imagen){
            $url = str_replace('storage','public', $imagen->url);
            Storage::delete($url);
            $imagen->delete();
        }

        $noticia->delete();

        return redirect()->route('admin.noticia.index')->with('eliminar', 'ok');
    }
}
