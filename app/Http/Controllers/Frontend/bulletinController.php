<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class bulletinController extends Controller
{
    public function index(Request $request)
    {
        dd("bulletin");
        return view('index');
    }
}
