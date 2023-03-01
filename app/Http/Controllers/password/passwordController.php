<?php

namespace App\Http\Controllers\password;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\trabajador;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class passwordController extends Controller
{
    public function index(User $user){
        $this->authorize('author', $user);
        return view('admin.password.index', compact('user'));
    }

    public function update(Request $request, User $user){
        $this->authorize('author', $user);
        $request->validate([
            'password' => 'required|max:50',
            'repeat_password' => 'required|max:50',
            'old_password' => 'required|max:50'
        ]);

        if(Hash::check($request->old_password, Auth::user()->password)){
            $user->password = $request->password;
            $user->save();
            return redirect()->route('user.password.index', compact('user'))->with('info', 'ok');
        }else{
            return redirect()->route('user.password.index', compact('user'))->with('info', 'error');
        }

    }

    public function updatead(Request $request, User $user){
        $request->validate([
            'password' => 'required|max:50',
            'repeat_password' => 'required|max:50'
        ]);
            $user->password = $request->password;
            $user->save();

        $trabajador = trabajador::where('users_id', '=', $user->id)->first();
        return redirect()->route('admin.trabajador.edit', $trabajador)->with('saveplace', 'ok');
    }
}
