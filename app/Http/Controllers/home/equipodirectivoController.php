<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\trabajador;

class equipodirectivoController extends Controller
{
    public function director(){
        $directores= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec')->where('tipousuario_id', '=',3)->where('estadouser_id', '=',1)->orderBy("name")->get();
        
        return view('home.equipodirectivo.director', compact('directores'));
    }
    public function sdirectorp(){
        $subdirectores= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec')->where('tipousuario_id', '=',10)->where('nivel_id', '=',1)
        ->where('estadouser_id', '=',1)->orderBy("name")->get();
        return view('home.equipodirectivo.sdirectorp', compact('subdirectores'));
    }
    public function sdirectors(){
        $subdirectores= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec')->where('tipousuario_id', '=',10)->where('nivel_id', '=',2)
        ->where('estadouser_id', '=',1)->orderBy("name")->get();
        return view('home.equipodirectivo.sdirectors', compact('subdirectores'));
    }
}
