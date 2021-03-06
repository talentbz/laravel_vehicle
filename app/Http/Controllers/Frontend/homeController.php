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
            ['img'=>'/images/frontend/home/car-list/3.png', 'name'=>'冷凍・冷蔵', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/4.png', 'name'=>'平ボディ', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/5.png', 'name'=>'クレーン車', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/6.png', 'name'=>'ダンプ・ミキサー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/7.png', 'name'=>'タンクローリー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/8.png', 'name'=>'トラクタ・トレーラー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/9.png', 'name'=>'キャリアカー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/10.png', 'name'=>'セルフローダー', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/11.png', 'name'=>'バス', 'link'=>'#'],
            ['img'=>'/images/frontend/home/car-list/12.png', 'name'=>'その他', 'link'=>'#'],
        ];

        $vehicle_infos = Vehicle::leftJoin('vehicle_equipment', 'vehicle.id', '=', 'vehicle_equipment.vehicle_id')
                                ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                                ->leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                                ->groupBy('vehicle.id');
                  
        $vehicle_count =Vehicle::select('id')->count();
        $bulletin_infos = Bulletin::orderBy('created_at', 'DESC')->get();                                   
        $bulletin_categories = [
            '全て',
            '求人',
            '仕事求む',
            '仕事依頼',
            '車両探し',
            'その他',
        ];                             
        //car list search feature
        $years = [
            '昭和50年(1975年)',
            '昭和51年(1976年)',
            '昭和52年(1977年)',
            '昭和53年(1978年)',
            '昭和54年(1979年)',
            '昭和55年(1980年)',
            '昭和56年(1981年)',
            '昭和57年(1982年)',
            '昭和58年(1983年)',
            '昭和59年(1984年)',
            '昭和60年(1985年)',
            '昭和61年(1986年)',
            '昭和62年(1987年)',
            '昭和63年(1988年)',
            '平成1年(1989年)',
            '平成2年(1990年)',
            '平成3年(1991年)',
            '平成4年(1992年)',
            '平成5年(1993年)',
            '平成6年(1994年)',
            '平成7年(1995年)',
            '平成8年(1996年)',
            '平成9年(1997年)',
            '平成10年(1998年)',
            '平成11年(1999年)',
            '平成12年(2000年)',
            '平成13年(2001年)',
            '平成14年(2002年)',    
            '平成15年(2003年)',
            '平成16年(2004年)',
            '平成17年(2005年)',
            '平成18年(2006年)',
            '平成19年(2007年)',
            '平成20年(2008年)',
            '平成21年(2009年)',
            '平成22年(2010年)',
            '平成23年(2011年)',
            '平成24年(2012年)',
            '平成25年(2013年)',
            '平成26年(2014年)',
            '平成27年(2015年)',
            '平成28年(2016年)',
            '平成29年(2017年)',
            '平成30年(2018年)',
            '令和1年(2019年)',
            '令和2年(2020年)',
            '令和3年(2021年)',
            '令和4年(2022年)',

        ];
        $shapes = [
            'ウィング',
            'バン',
            '冷凍・冷蔵',
            '平ボディ',
            'クレーン車',
            'ダンプ・ミキサー',
            'タンクローリー',
            'トラクタ・トレーラー',
            'キャリアカー',
            'セルフローダー',
            'バス',
            'その他',
        ];
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
        $classes = [
            '大型',
            '中型',
            '小型',
            'トレーラー',
            'バス',
            'その他',
        ];
        //pagination section
        
        //filter section 
        $filter = $request->query('filter');
        $bulltin_filter = $request->bulletin_filter;
        if (!empty($filter)) {
            if($filter == 'row_price') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle_fee.taxInc_price', 'asc'); 
            } elseif ($filter == 'high_price'){
                $vehicle_infos = $vehicle_infos->orderBy('vehicle_fee.taxInc_price', 'desc');
            } elseif ($filter == 'old_model_date') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.start_year', 'asc');
            } elseif ($filter == 'new_model_date') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.start_year', 'desc');
            } elseif ($filter == 'short_mileage') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.mileage', 'asc');
            } else {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.mileage', 'desc');
            }
            $vehicle_infos = $vehicle_infos->paginate(8);
            
            if ($request->ajax()) {
                if(!empty($bulltin_filter)){
                    if($bulltin_filter == 'すべて'){
                        $bulletin_infos = Bulletin::orderBy('created_at', 'DESC')->get();      
                    } else {
                        $bulletin_infos = Bulletin::where('category', $bulltin_filter)->orderBy('created_at', 'DESC')->get();  
                    }
                    return view('frontend.pages.home.bulletin', [
                        'bulletin_infos' => $bulletin_infos,
                    ]);  
                } else {
                    return view('frontend.pages.home.carlist', [
                        'vehicle_infos' => $vehicle_infos,
                    ]); 
                } 
            }
        } else {
            $vehicle_infos  = $vehicle_infos->orderBy('vehicle.id', 'desc')->paginate(8);
            if ($request->ajax()) {
                if(!empty($bulltin_filter)){
                    if($bulltin_filter == 'すべて'){
                        $bulletin_infos = Bulletin::orderBy('created_at', 'DESC')->get();      
                    } else {
                        $bulletin_infos = Bulletin::where('category', $bulltin_filter)->orderBy('created_at', 'DESC')->get();  
                    }
                    return view('frontend.pages.home.bulletin', [
                        'bulletin_infos' => $bulletin_infos,
                    ]);  
                } else {
                    return view('frontend.pages.home.carlist', [
                        'vehicle_infos' => $vehicle_infos,
                    ]); 
                } 
            }
        }
       
        
        
        return view('frontend.pages.home.index', [
            'body_lists' => $body_lists,
            'vehicle_count' =>$vehicle_count,
            'vehicle_infos' => $vehicle_infos,
            'bulletin_infos' => $bulletin_infos,
            'bulletin_categories' => $bulletin_categories,
            'years'=>$years,
            'shapes'=>$shapes,
            'areas'=>$areas,
            'classes'=>$classes,
            'filter' =>$filter,
        ]);
    }
    public function bodyCategory(Request $request, $name)
    {
        $vehicle_infos = Vehicle::leftJoin('vehicle_equipment', 'vehicle.id', '=', 'vehicle_equipment.vehicle_id')
                                ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                                ->leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                                ->groupBy('vehicle.id')
                                ->where('vehicle.shape', '=', $name);
                                
        $years = [
            '昭和50年(1975年)',
            '昭和51年(1976年)',
            '昭和52年(1977年)',
            '昭和53年(1978年)',
            '昭和54年(1979年)',
            '昭和55年(1980年)',
            '昭和56年(1981年)',
            '昭和57年(1982年)',
            '昭和58年(1983年)',
            '昭和59年(1984年)',
            '昭和60年(1985年)',
            '昭和61年(1986年)',
            '昭和62年(1987年)',
            '昭和63年(1988年)',
            '平成1年(1989年)',
            '平成2年(1990年)',
            '平成3年(1991年)',
            '平成4年(1992年)',
            '平成5年(1993年)',
            '平成6年(1994年)',
            '平成7年(1995年)',
            '平成8年(1996年)',
            '平成9年(1997年)',
            '平成10年(1998年)',
            '平成11年(1999年)',
            '平成12年(2000年)',
            '平成13年(2001年)',
            '平成14年(2002年)',    
            '平成15年(2003年)',
            '平成16年(2004年)',
            '平成17年(2005年)',
            '平成18年(2006年)',
            '平成19年(2007年)',
            '平成20年(2008年)',
            '平成21年(2009年)',
            '平成22年(2010年)',
            '平成23年(2011年)',
            '平成24年(2012年)',
            '平成25年(2013年)',
            '平成26年(2014年)',
            '平成27年(2015年)',
            '平成28年(2016年)',
            '平成29年(2017年)',
            '平成30年(2018年)',
            '令和1年(2019年)',
            '令和2年(2020年)',
            '令和3年(2021年)',
            '令和4年(2022年)',

        ];
        $shapes = [
            'ウィング',
            'バン',
            '冷凍・冷蔵',
            '平ボディ',
            'クレーン車',
            'ダンプ・ミキサー',
            'タンクローリー',
            'トラクタ・トレーラー',
            'キャリアカー',
            'セルフローダー',
            'バス',
            'その他',
        ];
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
        $classes = [
            '大型',
            '中型',
            '小型',
            'トレーラー',
            'バス',
            'その他',
        ];
        
        $filter = $request->query('filter');
        if (!empty($filter)) {
            if($filter == 'row_price') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle_fee.taxInc_price', 'asc'); 
            } elseif ($filter == 'high_price'){
                $vehicle_infos = $vehicle_infos->orderBy('vehicle_fee.taxInc_price', 'desc');
            } elseif ($filter == 'old_model_date') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.start_year', 'asc');
            } elseif ($filter == 'new_model_date') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.start_year', 'desc');
            } elseif ($filter == 'short_mileage') {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.mileage', 'asc');
            } else {
                $vehicle_infos = $vehicle_infos->orderBy('vehicle.mileage', 'desc');
            }
            $vehicle_infos = $vehicle_infos->paginate(8);
            
            if ($request->ajax()) {
                return view('frontend.pages.category.carlist', [
                    'vehicle_infos' => $vehicle_infos,
                ]); 
            }
        } else {
            $vehicle_infos  = $vehicle_infos->orderBy('vehicle.id', 'desc')->paginate(8);
            if ($request->ajax()) {
                return view('frontend.pages.category.carlist', [
                    'vehicle_infos' => $vehicle_infos,
                ]); 
            }
        }
        return view('frontend.pages.category.body', [
            'years' => $years,
            'shapes' => $shapes,
            'areas' => $areas,
            'classes' => $classes,
            'vehicle_infos' => $vehicle_infos,
            'filter' => $filter,
        ]);
    }

}
