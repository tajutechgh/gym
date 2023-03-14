<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function pagenotFound()
    {
        return view('error.404');
    }
}
