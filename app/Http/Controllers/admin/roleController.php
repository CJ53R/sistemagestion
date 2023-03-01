<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\tipousuario;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class roleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.role.index');
    }

    public function showDataRoleList(){
        $roles= Role::select('id', 'name')->get();
        return datatables()->of($roles)->addColumn('actions',
        function(Role $role){
            return view('admin.role.roleaction', compact('role'));
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
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
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
            'name' => 'required|max:50'
        ]);

        $tipousuario = new tipousuario();
        $tipousuario->nombretipousuario = $request->name;
        $tipousuario->save();

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.edit', $role)->with('info','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        return view('admin.role.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $id_permission = $role->permissions->pluck('id');
        
        return view('admin.role.edit', compact('role', 'permissions', 'id_permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|max:50'
        ]);

        $tipousuario =tipousuario::findOrFail($role->id);
        $tipousuario->nombretipousuario = $request->name;
        $tipousuario->save();

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        return redirect()->route('admin.role.edit', $role)->with('info','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $tipousuario =tipousuario::findOrFail($role->id);
        $tipousuario->delete();
        $role->delete();
        return redirect()->route('admin.role.index')->with('eliminar','ok');
    }
}
