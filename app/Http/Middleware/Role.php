<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (! Auth::check()) {
            return redirect()->route('login');
        }
    
        if (Auth::user()->rol->rol_id == 1) {
            return redirect()->route('admin');
        }
    
        if (Auth::user()->rol_id_fk == 2) {
            return redirect()->route('client');
        }
    
        if (Auth::user()->rol_id_fk == 3) {
            return redirect()->route('user');
        }
    }
}
