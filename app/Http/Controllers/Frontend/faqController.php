<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class faqController extends Controller
{
    public function index(Request $request)
    {
        dd("faq");
        return view('index');
    }
}
