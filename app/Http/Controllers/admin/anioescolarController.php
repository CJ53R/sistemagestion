<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\anioescolar;
use App\Models\nivel;
use Illuminate\Support\Facades\Storage;

class anioescolarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.anioescolar.index');
    }

    public function showDataAnioescolarList(){
        $anioescolares= anioescolar::join('nivel', 'anioescolar.nivel_id','=','nivel.id')->select('anioescolar.id', 'nombre', 'nombrenivel', 'url')->get();
        return datatables()->of($anioescolares)->addColumn('actions',
        function(anioescolar $anioescolar){
            return view('admin.anioescolar.anioescolaraction', compact('anioescolar'));
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
        $niveles = nivel::all();
        return view('admin.anioescolar.create', compact('niveles'));
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
            'nivel' => 'required|numeric',
            'file' => 'required'
        ]);

        $pdf = $request->file('file')->store('public/horarios');

        $url = Storage::url($pdf);


        
        $horario = new anioescolar();
        $horario->nombre = $request->nombre;
        $horario->nivel_id = $request->nivel;
        $horario->url = $url;
        $horario->save();

        return redirect()->route('admin.anioescolar.create')->with('save', 'ok');
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
    public function edit(anioescolar $anioescolar)
    {
        $niveles = nivel::all();
        return view('admin.anioescolar.edit', compact('niveles', 'anioescolar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, anioescolar $anioescolar)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'nivel' => 'required|numeric'
        ]);

        if($request->hasFile("file")){

            $urldel = str_replace('storage', 'public', $anioescolar->url);
            Storage::delete($urldel);

            $pdf = $request->file('file')->store('public/horarios');
            
            $url = Storage::url($pdf);
            
            $anioescolar->nombre = $request->nombre;
            $anioescolar->nivel_id = $request->nivel;
            $anioescolar->url = $url;
            $anioescolar->save();

        }else{
            $anioescolar->nombre = $request->nombre;
            $anioescolar->nivel_id = $request->nivel;
            $anioescolar->save();
        }

        return redirect()->route('admin.anioescolar.edit', compact('anioescolar'))->with('edit', 'ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(anioescolar $anioescolar)
    {
        $urldel = str_replace('storage', 'public', $anioescolar->url);
        Storage::delete($urldel);
        $anioescolar->delete();
        return redirect()->route('admin.anioescolar.index')->with('info', 'delete');
    }
}
