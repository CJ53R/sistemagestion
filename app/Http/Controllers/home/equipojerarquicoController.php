<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\trabajador;

class equipojerarquicoController extends Controller
{
    public function coordinadorpedagogico(){
        $coordinadores= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec')->where('tipousuario_id', '=',11)->where('estadouser_id', '=',1)->orderBy("name")->get();
        return view('home.equipojerarquico.coordinadorpedagogico', compact('coordinadores'));
    }
    public function coordinadortoe(){
        $coordinadores= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec')->where('tipousuario_id', '=',12)->where('estadouser_id', '=',1)->orderBy("name")->get();

        return view('home.equipojerarquico.coordinadortoe', compact('coordinadores'));
    }
    public function jefelaboratorio(){
        $bjefes= trabajador::join('users', 'trabajador.users_id','=','users.id')->join('tipousuario', 'users.tipousuario_id','=','tipousuario.id')
        ->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec', 'nombretipousuario')
        ->where('tipousuario_id', '=',13)->where('estadouser_id', '=',1)->orderBy("name")->get();

        $fjefes= trabajador::join('users', 'trabajador.users_id','=','users.id')->join('tipousuario', 'users.tipousuario_id','=','tipousuario.id')
        ->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec', 'nombretipousuario')
        ->where('tipousuario_id', '=',15)->where('estadouser_id', '=',1)->orderBy("name")->get();

        $qjefes= trabajador::join('users', 'trabajador.users_id','=','users.id')->join('tipousuario', 'users.tipousuario_id','=','tipousuario.id')
        ->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec', 'nombretipousuario')
        ->where('tipousuario_id', '=',14)->where('estadouser_id', '=',1)->orderBy("name")->get();

        return view('home.equipojerarquico.jefelaboratorio', compact('bjefes', 'fjefes', 'qjefes'));
    }
    public function jefetaller(){
        $jefes= trabajador::join('users', 'trabajador.users_id','=','users.id')->join('tipousuario', 'users.tipousuario_id','=','tipousuario.id')
        ->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')->select('trabajador.id','name', 'email', 'telefono', 'url','genero_id', 'nivsec', 'nombretipousuario')
        ->where('tipousuario_id', '=',16)->where('estadouser_id', '=',1)->orderBy("name")->get();

        return view('home.equipojerarquico.jefetaller', compact('jefes'));
    }
}
