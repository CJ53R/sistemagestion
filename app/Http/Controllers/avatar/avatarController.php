<?php

namespace App\Http\Controllers\avatar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\avatar;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class avatarController extends Controller
{
    public function index(User $user){
        $this->authorize('author', $user);
        return view('admin.avatar.index', compact('user'));
    }

    public function store(Request $request, User $user){
        $this->authorize('author', $user);
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $imagen = $request->file('file')->store('public/avatar');

        $url = Storage::url($imagen);

        if($user->avatar_id!=''){
            $avatar = avatar::find($user->avatar_id);

            $urldel = str_replace('storage', 'public', $avatar->url);
            Storage::delete($urldel);
            $avatar->url = $url;
            $avatar->save();
            return redirect()->route('user.avatar.index', compact('user'))->with('info', 'edit');
        }else{
            $avatar = new avatar();
            $avatar->url = $url;
            $avatar->save();
            $user->avatar_id= $avatar->id;
            $user->save();
            return redirect()->route('user.avatar.index', compact('user'))->with('info', 'ok');
        }

    }

    public function destroy(User $user){
        $this->authorize('author', $user);
        $avatar = avatar::find($user->avatar_id);
        $urldel = str_replace('storage', 'public', $avatar->url);
        Storage::delete($urldel);
        $avatar->delete();
        return redirect()->route('user.avatar.index', compact('user'))->with('info', 'delete');
    }

}
