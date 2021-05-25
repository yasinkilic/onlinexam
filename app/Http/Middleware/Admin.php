<?php

namespace App\Http\Middleware;

use Closure;
use Toastr;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
        public function handle($request, Closure $next)
        {
          
      	  if(auth()->guard('panel')->check()){

             return $next($request);

           }
           
           else{

              Toastr::error('Bu Sayfayı Görme Yetkiniz Yok!!','Hata');

              return redirect()->route('admin.login.index');

           }

           

      }
}
