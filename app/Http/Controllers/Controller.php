<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
//tambahan
use RealRashid\SweetAlert\Facades\Alert;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }
            if (session('error')) {
                Alert::error(session('error'));
            }
            return $next($request);
        });
    }

}
