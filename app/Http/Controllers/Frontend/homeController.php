<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index(Request $request)
    {
        $body_lists = [
            ['img'=>'/images/frontend/home/car-list/1.png', 'name'=>'ウィング', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/2.png', 'name'=>'バン', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/3.png', 'name'=>'冷蔵・冷凍車', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/4.png', 'name'=>'平ボディ', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/5.png', 'name'=>'クレーン', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/6.png', 'name'=>'ダンプ', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/7.png', 'name'=>'タンクローリー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/8.png', 'name'=>'トラクター/トレーラー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/9.png', 'name'=>'キャリアカー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/10.png', 'name'=>'セルフ', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/11.png', 'name'=>'バス', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/12.png', 'name'=>'その他', 'link'=>'#'],
        ];

        return view('frontend.pages.home.index', [
            'body_lists' => $body_lists,
        ]);
    }
    public function category(Request $request, $name)
    {
       
        return view('frontend.pages.category.body', [
            // 'years' => $years,
        ]);
    }

}
