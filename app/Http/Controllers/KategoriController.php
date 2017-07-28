<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Makale;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index($slug){
        $kategori=Kategori::where('slug',$slug)->first();
        $makaleler=Makale::where('kategori_id',$kategori->id)->where('durum',1)->paginate(10);
        return view('kategori-makale',compact('kategori','makaleler'));
    }
}
