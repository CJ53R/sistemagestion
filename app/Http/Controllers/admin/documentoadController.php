<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\documento;
use Illuminate\Support\Facades\Storage;

class documentoadController extends Controller
{
    public function index()
    {
        return view('admin.documento.index');
    }

    public function showDataDocumentoList(){
        $documentos= documento::select('id', 'nombre', 'url')->get();
        return datatables()->of($documentos)->addColumn('actions',
        function(documento $documento){
            return view('admin.documento.documentoaction', compact('documento'));
        })
        ->rawColumns(['actions'])->toJson();  
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.documento.create');
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
            'nombre' => 'required|max:50',
            'file' => 'required'
        ]);

        $pdf = $request->file('file')->store('public/documentos');

        $url = Storage::url($pdf);


        
        $documento = new documento();
        $documento->nombre = $request->nombre;
        $documento->url = $url;
        $documento->save();

        return redirect()->route('admin.documento.create')->with('save', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(documento $documento)
    {
        return view('admin.documento.edit', compact('documento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, documento $documento)
    {
        $request->validate([
            'nombre' => 'required|max:50'
        ]);

        if($request->hasFile("file")){

            $urldel = str_replace('storage', 'public', $documento->url);
            Storage::delete($urldel);

            $pdf = $request->file('file')->store('public/documentos');
            
            $url = Storage::url($pdf);
            
            $documento->nombre = $request->nombre;
            $documento->url = $url;
            $documento->save();

        }else{
            $documento->nombre = $request->nombre;
            $documento->save();
        }

        return redirect()->route('admin.documento.edit', compact('documento'))->with('edit', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(documento $documento)
    {
        $urldel = str_replace('storage', 'public', $documento->url);
        Storage::delete($urldel);
        $documento->delete();
        return redirect()->route('admin.documento.index')->with('info', 'delete');
    }
}
