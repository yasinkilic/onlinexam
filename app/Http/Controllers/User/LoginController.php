<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Toastr;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest')->except('logout');
    }

    public function index(){

    	return view('Auth.Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (\Auth::guard()->attempt($credentials)) {
            Toastr::success('Giriş Başarılı','Başarılı');
            return redirect()->route('Exam.Index');
        }

        else{

            Toastr::error('E-Posta veya Şifre Hatalı','Hata');
            return redirect()->back();

        }
    }
    

    public function logout()
    {
        \Auth::logout();
        \Session::flush();

        return redirect()->back();
    }

}
