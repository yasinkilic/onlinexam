<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User as Model;

use Toastr;

class UserController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers = Model::all();
      return view('Admin.User.Index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.User.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->password = \Hash::make($request->password);
             $request->validate([
            'name'		=> 'required',
            'email'		=> 'required|email',
            'password' 	=> 'required'
          ]);

        $user = new Model;
        
        $user->fill($request->except('password'));

        $user->password = $request->password;
        
       	if($user->save()){
          \Toastr::success('Başarıyla Kaydedildi','Başarılı');
        }else{\Toastr::error('Lütfen Tekrar Deneyin','Hata');}
        
        return redirect()->route('admin.user.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model $model)
    {
        return view('Admin.User.Show')->with('model',$model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        return view('Admin.User.Edit')->with('model',$model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Model $model,Request $request)
    {   

        if (isset($request->password)) {
          $model->password = \Hash::make($request->password);
        }

        $model->fill(['name'=>$request->name,'email'=>$request->email]);

        
      
      if($model->save()){

        \Toastr::success('Güncelleme Başarılı','Başarılı');
      }else{

        \Toastr::error('Güncelleme Başarısız','Başarısız');
      }

        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model $model)
    {
        Model::where('id',$model->id)->delete();
        return redirect()->back();
    }

   public function userList() 
   {
      $user = Model::select('user_id','name','email');
        return datatables()->of($user)
        ->addColumn('İşlemler', function ($user) {
                return ('<a href="'.route("admin.user.edit",$user).'" class="btn btn-default">Güncelle</a>');
             })->rawColumns(['İşlemler'])
            ->make(true);
   }
}
