<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Manager' || Auth::user()->role == 'PO') {
            return $next($request);
        }

        return redirect('/')->with('error', "Only admin can access!");
    }
}