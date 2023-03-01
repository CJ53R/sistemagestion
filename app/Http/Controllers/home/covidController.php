<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\covid;

class covidController extends Controller
{
    public function covid(){
        $covid = covid::where('id', '=',1)->first();
        return view('home.covid.covid', compact('covid'));
    }
}
