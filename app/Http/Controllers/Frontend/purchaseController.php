<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class purchaseController extends Controller
{
    public function index(Request $request)
    {
        dd("purchase");
        return view('index');
    }
    public function purchaseFlow(Request $request)
    {
        dd("purchaseFlow");
        return view('index');
    }
}
