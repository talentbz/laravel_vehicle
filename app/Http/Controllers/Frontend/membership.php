<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

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
    public function dealerShow(Request $request){
        return view('frontend.pages.membership.dealerFrom', [
            // 'body_lists' => $body_lists,
        ]);
    }
    public function dealerStoreForm(Request $request){
        
        Mail::send('mail', array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'subject' => $request->get('subject'),
            'msg' => $request->get('message'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('leragnezdina@mail.ru', 'Hello Admin')->subject($request->get('subject'));
        });      

      return back()->with('success', 'Thanks for contacting!');
        // return view('frontend.pages.membership.dealer', [
        //     // 'body_lists' => $body_lists,
        // ]);
    }
    public function shipping(Request $request){
        return view('frontend.pages.membership.shipping', [
            // 'body_lists' => $body_lists,
        ]);
    }
    
}
