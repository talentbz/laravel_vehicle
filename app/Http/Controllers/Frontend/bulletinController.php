<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bulletin;

class bulletinController extends Controller
{
    public function index(Request $request)
    {
        $bulletin_infos = Bulletin::orderBy('created_at', 'DESC')->get(); 
        return view('frontend.pages.bulletin.index', [
            'bulletin_infos'=>$bulletin_infos,
        ]);
    }
}
