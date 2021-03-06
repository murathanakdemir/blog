<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('created_at','desc')->paginate(10);
        return view('admin.user-index',compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('admin.user-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|max:150',
            'email'=>'required|email|unique:users,email,'.$id,
            'password'=>!empty($request->password)?'required|min:6':''
        ]);

        if(!empty($request->password)){
            $input=$request->all();
            $input['password']=bcrypt($request->password);
            User::find($id)->update($input);
        }
        else{

            User::find($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
            ]);
        }
        DB::table('role_user')->where('user_id',$id)->delete();
        $roller=[];
        foreach ($request->rol as $role){
            $yeni_rol=['role_id'=>$role, 'user_id'=>$id];
            array_push($roller,$yeni_rol);
        }
        DB::table('role_user')->insert($roller);
        Session::flash('durum',1);
        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        DB::table('role_user')->where('user_id',$id)->delete();
        Session::flash('durum',1);
        return redirect('/user');
    }
}
