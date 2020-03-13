<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function index404() {
        return view('errors.notFoundHttpException');
    }   

    public function invalidArgumentException() {
        return view('errors.invalidArgumentException');
    }
}
