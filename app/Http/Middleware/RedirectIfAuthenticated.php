<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            if($request->user()->rolId==1){
                 //return redirect('adminIndex/'.$request->user()->id);
                 return redirect()->route('admin', [$request->user()->id]);

            }else{
                
                return redirect()->route('contactos.show', [$request->user()->id]);
                //return redirect('contactos/'.$request->user()->id);

            }

               
           
        }

        return $next($request);
    }
}
