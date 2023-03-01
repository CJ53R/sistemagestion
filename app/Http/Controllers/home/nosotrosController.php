<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\imagenpag;
use App\Models\infraestructura;
use App\Models\trabajador;

class nosotrosController extends Controller
{
    public function index(){
        return view('home.nosotros.historia');
    }

    public function nosotros(){
        $imagenp = imagenpag::where('id', '=',1)->first();
        return view('home.nosotros.nosotros', compact('imagenp'));
    }

    public function himno(){
        return view('home.nosotros.himno');
    }

    public function docentes(){

        $pdocentes= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->join('nivel', 'trabajador.nivel_id','=','nivel.id')->select('trabajador.id','name', 'email', 'telefono', 'nivsec', 'url')
        ->where('tipousuario_id', '=',4)->where('estadouser_id', '=',1)->where('nivel_id', '=',1)->orderBy("nivsec")->get();

        $sdocentes= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->join('nivel', 'trabajador.nivel_id','=','nivel.id')->select('trabajador.id','name', 'email', 'telefono', 'nivsec', 'url')
        ->where('tipousuario_id', '=',4)->where('estadouser_id', '=',1)->where('nivel_id', '=',2)->orderBy("nivsec")->get();
        return view('home.nosotros.docentes', compact('pdocentes', 'sdocentes'));
    }

    public function auxiliares(){

        $auxiliares= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url')->where('tipousuario_id', '=',5)->where('estadouser_id', '=',1)->orderBy("name")->get();

        return view('home.nosotros.auxiliares', compact('auxiliares'));
    }

    public function personaladministrativo(){

        $oficinistas= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url')->where('tipousuario_id', '=',6)->where('estadouser_id', '=',1)->orderBy("name")->get();

        $abibliotecas= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url')->where('tipousuario_id', '=',7)->where('estadouser_id', '=',1)->orderBy("name")->get();

        $alaboratorios= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url')->where('tipousuario_id', '=',8)->where('estadouser_id', '=',1)->orderBy("name")->get();

        $pservicios= trabajador::join('users', 'trabajador.users_id','=','users.id')->leftjoin('avatar', 'users.avatar_id', '=', 'avatar.id')
        ->select('trabajador.id','name', 'email', 'telefono', 'url')->where('tipousuario_id', '=',9)->where('estadouser_id', '=',1)->orderBy("name")->get();

        return view('home.nosotros.personaladministrativo', compact('oficinistas', 'abibliotecas', 'alaboratorios', 'pservicios'));
    }

    public function infraestructura(){
        $imagenes = infraestructura::all();
        return view('home.nosotros.infraestructura', compact('imagenes'),);
    }
}
