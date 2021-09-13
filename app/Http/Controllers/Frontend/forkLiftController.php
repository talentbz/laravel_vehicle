<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class forkLiftController extends Controller
{
    public function index(Request $request)
    {
        return view('frontend.pages.forklift.index', [
            // 'years' => $years,
        ]);
    }
    public function searchResult(Request $request)
    {
        return view('frontend.pages.forklift.search', [
            // 'years' => $years,
        ]);
    }
}
