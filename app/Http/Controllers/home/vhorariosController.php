<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\anioescolar;

class vhorariosController extends Controller
{
    public function horario(){
        $phorarios = anioescolar::select('nombre','url')->where('nivel_id', '=', 1)->orderBy("nombre")->get();;
        $shorarios = anioescolar::select('nombre','url')->where('nivel_id', '=', 2)->orderBy("nombre")->get();;
        return view('home.periodo.horario', compact('phorarios', 'shorarios'));
    }
}
