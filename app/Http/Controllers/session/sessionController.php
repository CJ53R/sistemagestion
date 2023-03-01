<?php

namespace App\Http\Controllers\session;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cliente;
use App\Models\trabajador;
use App\Models\User;

class sessionController extends Controller
{
    
    public function store(){

        request()->validate([
            'codigo' => 'required',
            'password' => 'required'
        ]);
        
        if(auth()->attempt(request(['codigo', 'password'])) ==false){
            return redirect()->route('index')->with('info', 'error');
        } else{
            if(auth()->user()->tipousuario_id!=2){
                return redirect()->route('admin.perfil.index', auth()->user());
            }else{
                return redirect()->route('alumno.perfil.index', auth()->user());
            }
        }
    }

    public function destroy(){
        auth()->logout();

        return redirect()->to('/');
    }
}
