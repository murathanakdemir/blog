<?php

namespace App\Http\Controllers;

use App\Talep;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class YazarlikTalepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        if(Talep::where("user_id",Auth::user()->id)->count()){
            Session::flash('durum',3);
            return redirect('/');
        }
        return view('yazarlik-talebi');
    }
    public function gonder(Request $request){
        $this->validate($request,['aciklama'=>'required']);

        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        Talep::create($input);
        Session::flash('durum',2);
        return redirect('/');
    }
}
