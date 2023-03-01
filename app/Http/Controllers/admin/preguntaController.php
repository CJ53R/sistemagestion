<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\pregunta;

class preguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pregunta.index');
    }

    public function showDataPreguntaList(){
        $preguntas= pregunta::select('id', 'pregunta','respuesta')->get();
        return datatables()->of($preguntas)->addColumn('actions',
        function(pregunta $pregunta){
            return view('admin.pregunta.preguntaaction', compact('pregunta'));
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
        return view('admin.pregunta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pregunta' => 'required|max:100',
            'respuesta' => 'required|max:250',
        ]);

        $pregunta = new pregunta();
        $pregunta->pregunta = $request->pregunta;
        $pregunta->respuesta = $request->respuesta;
        $pregunta->save();

        return redirect()->route('admin.pregunta.create')->with('save','ok');
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
    public function edit(pregunta $pregunta)
    {
        return view('admin.pregunta.edit', compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pregunta $pregunta)
    {
        $request->validate([
            'pregunta' => 'required|max:100',
            'respuesta' => 'required|max:250',
        ]);

        $pregunta->pregunta = $request->pregunta;
        $pregunta->respuesta = $request->respuesta;
        $pregunta->save();

        return redirect()->route('admin.pregunta.edit', compact('pregunta'))->with('edit','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(pregunta $pregunta)
    {
        $pregunta->delete();
        return redirect()->route('admin.pregunta.index')->with('eliminar','ok');
    }
}
