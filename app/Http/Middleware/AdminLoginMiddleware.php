<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminLoginMiddleware
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
        
       if($request->session()->get("users"))
        {
         
            return $next($request); 
            
        }
        else
        {
            return redirect('admin/dangnhap');
        }
    }
}
