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
        $areas = [
            '北海道',
            '青森県',
            '岩手県',
            '宮城県',
            '秋田県',
            '山形県',
            '福島県',
            '茨城県',
            '栃木県',
            '群馬県',
            '埼玉県',
            '千葉県',
            '東京都',
            '神奈川県',
            '新潟県',
            '富山県',
            '石川県',
            '福井県',
            '山梨県',
            '長野県',
            '岐阜県',
            '静岡県',
            '愛知県',
            '三重県',
            '滋賀県',
            '京都府',
            '大阪府',
            '兵庫県',
            '奈良県',
            '和歌山県',
            '鳥取県',
            '島根県',
            '岡山県',
            '広島県',
            '山口県',
            '徳島県',
            '香川県',
            '愛媛県',
            '高知県',
            '福岡県',
            '佐賀県',
            '長崎県',
            '熊本県',
            '大分県',
            '宮崎県',
            '鹿児島県',
            '沖縄県',
        ];
        return view('frontend.pages.membership.dealerFrom', [
            'areas' => $areas,
        ]);
    }
    public function dealerStoreForm(Request $request){

        Mail::send('mail', array(
            'organ_name' => $request->get('organ_name'),
            'register_name' => $request->get('register_name'),
            'register_furigana' => $request->get('register_furigana'),
            'agency_name' => $request->get('agency_name'),
            'agency_firagana' => $request->get('agency_firagana'),
            'person_name' => $request->get('person_name'),
            'person_firagana' => $request->get('person_firagana'),
            'postal_code' => $request->get('postal_code'),
            'state' => $request->get('state'),
            'city_name' => $request->get('city_name'),
            'apartment' => $request->get('apartment'),
            'fax' => $request->get('fax'),
            'email' => $request->get('email'),
            'site_url' => $request->get('site_url'),
            'start_time' => $request->get('start_time'),
            'end_time' => $request->get('end_time'),
            'weekend_date' => $request->get('weekend_date'),
        ), function($message) use ($request){
            $message->from($request->email);
            $message->to('leragnezdina@mail.ru', '掲載申込みフォーム　運送会社様用')
            ->subject('掲載申込みフォーム　運送会社様用');
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
