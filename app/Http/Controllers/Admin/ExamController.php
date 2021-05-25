<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Exam as Model;

use Toastr;

class ExamController extends Controller
{
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $customers = Model::all();
      return view('Admin.Exam.Index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Admin.Exam.Create');
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

        $customer= new Model;
        
        $customer->fill($request->except('password'));

        $customer->password = $request->password;
        
       	if($customer->save()){
          \Toastr::success('Başarıyla Kaydedildi','Başarılı');
        }else{\Toastr::error('Lütfen Tekrar Deneyin','Hata');}
        
        return redirect()->route('admin.exam.index');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model $model)
    {
        return view('Admin.Exam.Edit')->with('model',$model);
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
         $password = \Hash::make($request->password);
        $model->fill(['name'=>$request->name,'email'=>$request->email,'password'=>$password]);

        if ($request['password']!=null||$request['password']!='') {
          $model->password = \Hash::make($request['password']);
      }
      
      if($model->save()){

        \Toastr::success('Güncelleme Başarılı','Başarılı');
      }else{

        \Toastr::error('Güncelleme Başarısız','Başarısız');
      }

        return redirect()->route('admin.exam.index');
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
