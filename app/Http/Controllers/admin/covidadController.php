<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\covid;
use Illuminate\Support\Facades\Storage;

class covidadController extends Controller
{

    public function index(){
        $covid = covid::where('id', '=',1)->first();
        return view('admin.covid.index', compact('covid'));
    }


    public function subirpdf(Request $request, covid $covid){
        $request->validate([
            'file' => 'required',
        ]);


        if($request->hasFile("file")){
            $pdf = $request->file('file')->store('public/coviddocumento');
            $url = Storage::url($pdf);

            $urldel = str_replace('storage', 'public', $covid->urlcovid);
            Storage::delete($urldel);

            $covid->urlcovid = $url;
            $covid->save();

        }
        return redirect()->route('admin.covid.index', compact('covid'))->with('editpdf','ok');
    }
}
