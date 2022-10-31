<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdmin
{
    public function __construct(){
        // echo "Middleware CheckAdmin";
    }
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()==null)
            return redirect(route('login'))->with('error', 'Bạn cần login');
        if(auth()->user()->getAccount->getRole->role_name != 'admin')
            return redirect(route('login'))->with('error', 'Bạn không phải admin');
        return $next($request);
    }
}
