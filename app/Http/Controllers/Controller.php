<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // public function create(Request $request)
    // {
    //     if ($request->hasFile('fileToUpload')) {
    //         $file = $request->fileToUpload;
    //         $path = $file->store('images');
    //         $file->move(public_path('images'), $path);
    //     }
    //     return "<img src='/".$path."'>";
    // }

}
