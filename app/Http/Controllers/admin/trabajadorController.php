<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\avatar;
use App\Models\estadouser;
use App\Models\generot;
use App\Models\nivel;
use App\Models\tipodocumentot;
use App\Models\tipousuario;
use App\Models\trabajador;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class trabajadorController extends Controller
{
    /**************************************************************************************/
    /******************************Controller Create***************************************/
    /**************************************************************************************/
    public function create(){
        $tipodocumentos = tipodocumentot::all();
        $generos = generot::all();
        $trabajadores = trabajador::all();
        $tipousuarios = tipousuario::all();
        $estados = estadouser::all();
        $niveles = nivel::all();
        return view('admin.trabajador.trabajadorregister', compact('tipodocumentos', 'generos', 'trabajadores','tipousuarios', 'estados', 'niveles'));
    }

    public function store(Request $request){

        $request->validate([
            'codigo' => 'required|unique:users,codigo',
            'tipodocumento' => 'required',
            'numdocumento' => 'required|numeric|unique:trabajador,numDocumento',
            'nombre' => 'required|max:50',
            'apaterno' => 'required|max:20',
            'amaterno' => 'required|max:20',
            'genero' => 'required',
            'estado' => 'required',
            'tipousuario' => 'required',
            'fnacimiento' => 'required',
            'direccion' => 'max:200',
            'telefono' => 'max:9',
            'email' => 'max:200',
            'fregistro' => 'required'
        ]);

        if($request->hasfile('file')){
            $imagen = $request->file('file')->store('public/avatar');
            $url = Storage::url($imagen);

            $avatar = new avatar();
            $avatar->url = $url;
            $avatar->save();
        }

        $user = new User();        
        $user->codigo =  $request->codigo;
        $user->password =  $request->codigo;
        $user->estadouser_id =  $request->estado;
        $user->tipousuario_id =  $request->tipousuario;
        if($request->hasfile('file')){
            $user->avatar_id= $avatar->id;
        }
        $user->name=strtolower($request->nombre.' '.$request->apaterno.' '.$request->amaterno);
        $user->save();


        $trabajador = new trabajador();

        $trabajador->tipodocumento_id =  $request->tipodocumento;
        $trabajador->numDocumento =  $request->numdocumento;
        $trabajador->nombres =  $request->nombre;
        $trabajador->apaterno =  $request->apaterno;
        $trabajador->amaterno =  $request->amaterno;
        $trabajador->fregistro =  $request->fregistro;
        $trabajador->fnacimiento =  $request->fnacimiento;
        $trabajador->telefono =  $request->telefono;
        $trabajador->direccion =  $request->direccion;
        $trabajador->email =  $request->email;
        $trabajador->genero_id =  $request->genero;
        $trabajador->nivel_id =  $request->nivel;
        $trabajador->nivsec =  $request->nivsec;
        $trabajador->users_id =  $user->id;
        $trabajador->save();
        $tipousuario= tipousuario::findOrFail($request->tipousuario);
        $trabajador->users->assignRole($tipousuario->nombretipousuario);


        return redirect()->route('admin.trabajador.create')->with('saveplace', 'ok');
    }

    /**************************************************************************************/
    /***************************Controller DataTable***************************************/
    /**************************************************************************************/

    public function showTrabajadorList(){
        $trabajadores= trabajador::all();

        return view('admin.trabajador.trabajadorlist', compact('trabajadores'));
    }


    public function showDataTrabajadorList(){
        $trabajadores= trabajador::join('users', 'trabajador.users_id','=','users.id')->join('tipousuario', 'users.tipousuario_id','=','tipousuario.id')->
        join('estadouser', 'users.estadouser_id','=','estadouser.id')->join('generot', 'trabajador.genero_id','=','generot.id')
        ->select('trabajador.id', 'numDocumento','name','nombregenero', 'codigo', 'nombretipousuario', 'nombreestadouser')->get();
        return datatables()->of($trabajadores)->addColumn('actions',
        function(trabajador $trabajador){
            return view('admin.trabajador.trabajadoraction', compact('trabajador'));
        })
        ->rawColumns(['actions'])->toJson();    
    }


    /**************************************************************************************/
    /******************************Controller Update***************************************/
    /**************************************************************************************/

    public function edit(trabajador $trabajador){

        $tipodocumentos = tipodocumentot::all();
        $generos = generot::all();
        $estados = estadouser::all();
        $trabajadores = trabajador::all();
        $tipousuarios = tipousuario::all();
        $niveles = nivel::all();
        return view('admin.trabajador.trabajadoredit', compact('trabajador', 'trabajadores'
        ,'tipodocumentos', 'generos', 'estados', 'tipousuarios', 'niveles'));
    }

    public function update(Request $request,  trabajador $trabajador){

        $request->validate([
            'codigo' => 'required',
            'nombre' => 'required|max:50',
            'apaterno' => 'required|max:20',
            'amaterno' => 'required|max:20',
            'genero' => 'required',
            'fnacimiento' => 'required',
            'direccion' => 'max:200',
            'telefono' => 'max:9',
            'email' => 'max:200',
            'fregistro' => 'required',
            'estado' => 'required',
            'tipousuario' => 'required'
        ]);

        if($request->hasfile('file')){
            $user = User::where('id', '=', $trabajador->users_id)->first();

            $imagen = $request->file('file')->store('public/avatar');
            $url = Storage::url($imagen);

            if($user->avatar_id!=''){
                $avatar = avatar::find($user->avatar_id);

                $urldel = str_replace('storage', 'public', $avatar->url);
                Storage::delete($urldel);
                $avatar->url = $url;
                $avatar->save();
            }else{
                $avatar = new avatar();
                $avatar->url = $url;
                $avatar->save();
                $user->avatar_id= $avatar->id;
                $user->save();
            }
        }
        $trabajador->nombres =  $request->nombre;
        $trabajador->apaterno =  $request->apaterno;
        $trabajador->amaterno =  $request->amaterno;
        $trabajador->fregistro =  $request->fregistro;
        $trabajador->fnacimiento =  $request->fnacimiento;
        $trabajador->telefono =  $request->telefono;
        $trabajador->direccion =  $request->direccion;
        $trabajador->email =  $request->email;
        $trabajador->genero_id =  $request->genero;
        $trabajador->nivel_id =  $request->nivel;
        $trabajador->nivsec =  $request->nivsec;
        $trabajador->users->codigo =  $request->codigo;
        $trabajador->users->estadouser_id =  $request->estado;
        $trabajador->users->tipousuario_id =  $request->tipousuario;
        $trabajador->users->name=strtolower($request->nombre.' '.$request->apaterno.' '.$request->amaterno);
        $trabajador->save();
        $trabajador->users->save();
        $tipousuario= tipousuario::findOrFail($request->tipousuario);
        $trabajador->users->assignRole($tipousuario->nombretipousuario);


        return redirect()->route('admin.trabajador.edit', $trabajador)->with('saveplace', 'ok');
    }

    /**************************************************************************************/
    /******************************Controller Delete***************************************/
    /**************************************************************************************/

    public function destroy(trabajador $trabajador){
        $trabajador->delete();
        $trabajador->users->delete();

        if($trabajador->users->avatar_id!=''){
            $avatar = avatar::find($trabajador->users->avatar_id);
            $urldel = str_replace('storage', 'public', $avatar->url);
            Storage::delete($urldel);
            $avatar->delete();
        }

        return redirect()->route('admin.trabajador.showTrabajadorList')->with('eliminar', 'ok');
    }

     /**************************************************************************************/
    /******************************Controller Show***************************************/
    /**************************************************************************************/

    public function show(trabajador $trabajador){

        $trabajadores = trabajador::all();

        return view('admin.trabajador.trabajadorview', compact('trabajadores', 'trabajador'));
    }
}
