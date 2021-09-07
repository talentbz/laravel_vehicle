<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class membership extends Controller
{
    public function index(Request $request){
        return view('frontend.pages.membership.index', [
            // 'body_lists' => $body_lists,
        ]);
    }

    public function dealer(Request $request){
        return view('frontend.pages.membership.dealer', [
            // 'body_lists' => $body_lists,
        ]);
    }

    public function shipping(Request $request){
        return view('frontend.pages.membership.shipping', [
            // 'body_lists' => $body_lists,
        ]);
    }
}
