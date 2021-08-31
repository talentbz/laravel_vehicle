<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class saleController extends Controller
{
    public function index(Request $request)
    {
        dd("salepage");
        return view('index');
    }
}
