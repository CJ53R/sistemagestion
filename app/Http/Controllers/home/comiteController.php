<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\imagenpag;
use App\Models\masimagenpag;

class comiteController extends Controller
{
    public function comitegb(){
        $imagenp = imagenpag::where('id', '=',4)->first();
        $imagenes = masimagenpag::where('imagenpag_id', '=',4)->get();
        return view('home.comite.comitegb', compact('imagenp', 'imagenes'));
    }
    public function comitegco(){
        $imagenp = imagenpag::where('id', '=',2)->first();
        $imagenes = masimagenpag::where('imagenpag_id', '=',2)->get();
        return view('home.comite.comitegco', compact('imagenp', 'imagenes'));
    }

    public function comitegp(){
        $imagenp = imagenpag::where('id', '=',3)->first();
        $imagenes = masimagenpag::where('imagenpag_id', '=',3)->get();
        return view('home.comite.comitegp', compact('imagenp', 'imagenes'));
    }

}
