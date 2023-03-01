<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\documento;

class documentoController extends Controller
{
    public function documento(){
        $documentos = documento::all();
        return view('home.documento.documento', compact('documentos'));
    }
}
