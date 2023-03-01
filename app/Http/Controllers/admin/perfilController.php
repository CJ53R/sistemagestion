<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\generot;
use App\Models\trabajador;
use App\Models\User;

class perfilController extends Controller
{
    public function index(User $user){
        $this->authorize('author', $user);
        $docentes = User::where('tipousuario_id', '=', 4)->where('estadouser_id', '=', 1)->get();
        $sub = User::where('tipousuario_id', '=', 10)->where('estadouser_id', '=', 1)->get();
        $auxeducacion = User::where('tipousuario_id', '=', 5)->where('estadouser_id', '=', 1)->get();
        $trabajadores = User::where('estadouser_id', '=', 1)->get();
        return view('admin.home', compact('user', 'docentes', 'sub',  'auxeducacion' ,  'trabajadores'));
    }

    public function edit(User $user){
        $this->authorize('author', $user);
        $trabajador= trabajador::where('users_id', '=', $user->id)->first();
        $generos = generot::all();
        return view('admin.perfil.edit', compact('user', 'trabajador', 'generos'));
    }

    public function update(Request $request, User $user){
        $this->authorize('author', $user);
        $trabajador = trabajador::where('users_id', '=', $user->id)->first();
        
        $trabajador->telefono =  $request->telefono;
        $trabajador->direccion =  $request->direccion;
        $trabajador->email =  $request->email;
        $trabajador->genero_id =  $request->genero;
        $trabajador->save();

        return redirect()->route('admin.perfil.edit', $user)->with('saveplace', 'ok');
    }

    
}
