<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\activamatricula;
use App\Models\div;
use App\Models\imagennoticia;
use App\Models\imagenpag;
use App\Models\noticia;
use App\Models\portada;
use App\Models\pregunta;

class inicioController extends Controller
{
    public function index(){
        $noticias = noticia::where('estadonoticia_id', '=',1)->get();
        $imagenes = imagennoticia::all();
        $portadas = portada::all();
        $div = div::where('id', '=', 1)->first();
        $aviso = div::where('id', '=', 2)->first();
        return view('home.index', compact('noticias', 'imagenes', 'portadas', 'div', 'aviso'));
    }

    public function preguntas(){
        $preguntas = pregunta::all();
        $imagenp = imagenpag::where('id', '=',5)->first();
        return view('home.pregunta', compact('preguntas', 'imagenp'));
    }

    
}
