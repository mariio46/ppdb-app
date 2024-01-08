<?php

namespace App\Http\Middleware\HasRole;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        return session()->get('logged_in') === true ? $next($request) : to_route('login');
    }
}
