<?php

namespace App\Http\Controllers;

use App\Makale;
use Illuminate\Http\Request;

class MakaleController extends Controller
{
    public function index($slug){
        $makale=Makale::where('slug',$slug)->first();
        return view('makale-detay',compact('makale'));
    }
}
