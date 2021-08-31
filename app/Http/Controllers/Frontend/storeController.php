<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class storeController extends Controller
{
    public function index(Request $request)
    {
        dd("store");
        return view('index');
    }
}
