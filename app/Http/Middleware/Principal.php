<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Principal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin');
        }

        if (Auth::user()->role == 'principal') {
            return $next($request);
        }

        if (Auth::user()->role == 'teacher') {
            return redirect()->route('teacher');
        }

        if (Auth::user()->role == 'parent') {
            return redirect()->route('parent');
        }
    }
    
}
