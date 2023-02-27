<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->petugas == true) {
            return $next($request);
        }

        return back();
    }
}
