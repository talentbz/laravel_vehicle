<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class rentController extends Controller
{
    public function index(Request $request)
    {
        dd("rent");
        return view('index');
    }
    public function rentFlow(Request $request)
    {
        dd("rentFlow");
        return view('index');
    }
}
