<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleFee;
use App\Models\VehicleMedia;
use App\Models\VehicleEquipment;
use App\Models\Bulletin;

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

        $vehicle_infos = Vehicle::leftJoin('vehicle_equipment', 'vehicle.id', '=', 'vehicle_equipment.vehicle_id')
                                ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                                ->leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                                ->groupBy('vehicle.id')
                                ->orderBy('vehicle.created_at', 'desc')
                                ->take(8)
                                ->get();     
        $bulletin_infos = Bulletin::orderBy('created_at', 'DESC')->take(10)->get();                                  
        $bulletin_categories = [
            '全て',
            '求人',
            '仕事求む',
            '仕事依頼',
            '車両探し',
            'その他',
        ];                                       
        return view('frontend.pages.home.index', [
            'body_lists' => $body_lists,
            'vehicle_infos' => $vehicle_infos,
            'bulletin_infos' => $bulletin_infos,
            'bulletin_categories' => $bulletin_categories,
        ]);
    }
    public function category(Request $request, $name)
    {
       
        return view('frontend.pages.category.body', [
            // 'years' => $years,
        ]);
    }

}
