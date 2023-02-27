<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasyarakatMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->masyarakat == true) {
            return $next($request);
        }

        return back();
    }
}
