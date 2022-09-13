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
        if ($this->checkAdmin() == false)
            return redirect(route('trangchu'))->with('thongbao', 'Bạn không phải admin');;
        return $next($request);
    }

    public function checkAdmin(){
        return false;
    }
}
